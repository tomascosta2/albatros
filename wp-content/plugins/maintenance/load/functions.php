<?php

function mtnc_get_custom_login_code()
{
    global $wp_query,
        $error;
    $mt_options   = mtnc_get_plugin_options(true);
    $user_connect = false;
    if (!is_array($wp_query->query_vars)) {
        $wp_query->query_vars = array();
    }
    $error_message  = $user_login = $user_pass = $error = '';
    $is_role_check  = true;
    $class_login    = 'user-icon';
    $class_password = 'pass-icon';
    $using_cookie   = false;

    if (isset($_POST['is_custom_login'])) {
        $user_login = '';
        if (isset($_POST['log']) && isset($_POST['mtnc_login_check']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mtnc_login_check'])), 'mtnc_login')) {
            $user_login = sanitize_user(wp_unslash($_POST['log']));
        }
        $user_login = sanitize_user($user_login);
        $user_pass  = '';
        if (isset($_POST['pwd']) && isset($_POST['mtnc_login_check']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mtnc_login_check'])), 'mtnc_login')) {
            $user_pass = sanitize_text_field(wp_unslash($_POST['pwd']));
        }
        $access                  = array();
        $access['user_login']    = esc_attr($user_login);
        $access['user_password'] = $user_pass;
        $access['remember']      = true;

        $user         = null;
        $user         = new WP_User(0, $user_login);
        $current_role = current($user->roles);

        if (!empty($mt_options['roles_array'])) {
            foreach (array_keys($mt_options['roles_array']) as $key) {
                if ($key === $current_role) {
                    $is_role_check = false;
                }
            }
        } else {
            $is_role_check = true;
        }

        if (!$is_role_check) {
            $error_message  = __('Permission access denied!', 'maintenance');
            $class_login    = 'error';
            $class_password = 'error';
        } else {

            if (is_ssl()) {
                $ssl = true;
            } else {
                $ssl = false;
            }

            $user_connect = wp_signon($access, $ssl);
            if (is_wp_error($user_connect)) {
                if ($user_connect->get_error_code() === 'invalid_username') {
                    $error_message = __('Login is incorrect!', 'maintenance');

                    $class_login    = 'error';
                    $class_password = 'error';
                } elseif ($user_connect->get_error_code() === 'incorrect_password') {
                    $error_message  = __('Password is incorrect!', 'maintenance');
                    $class_password = 'error';
                } else {
                    $error_message  = __('Login and password are incorrect!', 'maintenance');
                    $class_login    = 'error';
                    $class_password = 'error';
                }
            } else {
                wp_safe_redirect(home_url('/'));
                exit;
            }
        }
    }

    if (!$user_connect) {
        mtnc_get_headers_503();
    }

    return array($error_message, $class_login, $class_password, $user_login);
}

function mtnc_add_custom_style()
{
    global $wp_styles;

    // all.css loading in index.php inline by 2 steps
    wp_register_style('mtnc-style', MTNC_URI . 'load/css/style.css', '', filemtime(MTNC_DIR . 'load/css/style.css'));
    wp_register_style('mtnc-fonts', MTNC_URI . 'load/css/fonts.css', '', filemtime(MTNC_DIR . 'load/css/fonts.css'));
    $wp_styles->do_items('mtnc-style');
    $wp_styles->do_items('mtnc-fonts');
    mtnc_get_options_style();
}

function mtnc_add_bunny_fonts()
{
    global $wp_scripts;
    $mt_options = mtnc_get_plugin_options(true);
    $font_link  = array();

    if (!empty($mt_options['body_font_family'])) {
        $font_link[0] = mtnc_get_bunny_font(esc_attr($mt_options['body_font_family']));
        /*Check if chooses subset for fonts*/
        if (!empty($mt_options['body_font_subset'])) {
            $font_subset   = esc_attr($mt_options['body_font_subset']);
            $font_link[0] .= ':' . $font_subset . '';
        }
    }
    if (!empty($mt_options['countdown_font_family'])) {
        $font_link[1] = mtnc_get_bunny_font(esc_attr($mt_options['countdown_font_family']));
    }

    if ($font_link) {
        return $font_link;
    }
    return '';
}

function mtnc_add_custom_scripts()
{
    global $wp_scripts;
    $mt_options = mtnc_get_plugin_options(true);
    $js_options = array(
        'body_bg'        => '',
        'gallery_array'  => array(),
        'blur_intensity' => $mt_options['blur_intensity'],
        'font_link'      => '',
    );

    wp_register_script('_frontend', MTNC_URI . 'load/js/jquery.frontend.js', 'jquery', filemtime(MTNC_DIR . 'load/js/jquery.frontend.js'), true);

    // IE scripts
    wp_register_script('jquery_ie', $wp_scripts->registered['jquery-core']->src, array(), true, array());

    wp_script_add_data('jquery_ie', 'conditional', 'lte IE 10');

    if (!empty($mt_options['body_bg']) && empty($mt_options['gallery_array']['attachment_ids'])) {
        $bg                    = wp_get_attachment_image_src($mt_options['body_bg'], 'full');
        $js_options['body_bg'] = esc_url($bg[0]);
    }

    $js_options['font_link'] = mtnc_add_bunny_fonts();
    wp_localize_script('_frontend', 'mtnc_front_options', $js_options);

    $wp_scripts->do_items('jquery_ie');
    $wp_scripts->do_items('jquery_migrate_ie');
    $wp_scripts->do_items('_placeholder_ie');
    $wp_scripts->do_items('_frontend_ie');

    echo '<!--[if !IE]><!-->';
    $wp_scripts->do_items('jquery');
    echo '<!--<![endif]-->';

    $wp_scripts->do_items('_backstretch');

    $wp_scripts->do_items('_frontend');
}

add_action('load_custom_scripts', 'mtnc_add_custom_scripts', 15);
add_action('load_custom_style', 'mtnc_add_custom_style', 20);

function mtnc_get_page_title($error_message = null)
{
    $mt_options = mtnc_get_plugin_options(true);
    $title      = '';
    if (empty($mt_options['page_title'])) {
        $title = wp_title('|', false);
    } else {
        $title = wp_strip_all_tags(stripslashes($mt_options['page_title']));
    }

    echo '<title>' . esc_html($title) . '</title>';
}

function mtnc_get_options_style()
{
    $mt_options    = mtnc_get_plugin_options(true);
    $options_style = '';
    if (!empty($mt_options['body_bg_color'])) {
        $mt_options['body_bg_color'] = esc_attr($mt_options['body_bg_color']);
        $options_style .= 'body {background-color: ' . esc_attr($mt_options['body_bg_color']) . '}';
        $options_style .= '.preloader {background-color: ' . esc_attr($mt_options['body_bg_color']) . '}';
    }

    if (!empty($mt_options['is_blur']) && !empty($mt_options['blur_intensity'])) {
        $options_style .= '.bg-img img, .bg-img source{';
        $options_style .= '-webkit-filter: blur(' . $mt_options['blur_intensity'] . 'px);';
        $options_style .= '-moz-filter: blur(' . $mt_options['blur_intensity'] . 'px);';
        $options_style .= '-o-filter: blur(' . $mt_options['blur_intensity'] . 'px);';
        $options_style .= '-ms-filter: blur(' . $mt_options['blur_intensity'] . 'px);';
        $options_style .= 'filter:blur(' . $mt_options['blur_intensity'] . 'px);';
        $options_style .= 'filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius=' . $mt_options['blur_intensity'] . ', enabled=\'true\');';
        $options_style .= '}';
    }

    if ($mt_options['blur_intensity'] == '0') {
        $options_style .= ' body > .main-container:after { background-color: transparent; } ';
    }

    if (!empty($mt_options['body_font_family'])) {
        $options_style .= 'body {font-family: ' . esc_attr($mt_options['body_font_family']) . '; }';
    }

    if (!empty($mt_options['font_color'])) {
        $font_color     = esc_attr($mt_options['font_color']);
        $options_style .= '.site-title, .preloader i, .login-form, .login-form a.lost-pass, .btn-open-login-form, .site-content, .user-content-wrapper, .user-content, footer, .maintenance a{color: ' . $font_color . ';} ';
        $options_style .= 'a.close-user-content, #mailchimp-box form input[type="submit"], .login-form input#submit.button  {border-color:' . $font_color . '} ';
        $options_style .= 'input[type="submit"]:hover{background-color:' . $font_color . '} ';
        $options_style .= 'input:-webkit-autofill, input:-webkit-autofill:focus{-webkit-text-fill-color:' . $font_color . '} ';
    }

    if (!empty($mt_options['controls_bg_color'])) {
        $mt_options['controls_bg_color'] = esc_attr($mt_options['controls_bg_color']);
        $options_style .= "body > .login-form-container{background-color:{$mt_options['controls_bg_color']}}";
        $options_style .= ".btn-open-login-form{background-color:{$mt_options['controls_bg_color']}}";
        $options_style .= "input:-webkit-autofill, input:-webkit-autofill:focus{-webkit-box-shadow:0 0 0 50px {$mt_options['controls_bg_color']} inset}";
        $options_style .= "input[type='submit']:hover{color:{$mt_options['controls_bg_color']}} ";
        $options_style .= "#custom-subscribe #submit-subscribe:before{background-color:{$mt_options['controls_bg_color']}} ";
    }

    if (!empty($mt_options['custom_css'])) {
        $options_style .= wp_kses_stripslashes($mt_options['custom_css']);
    }

    echo '<style type="text/css">';
    mtnc_wp_kses($options_style);
    echo '</style>';
}

function mtnc_get_logo_box()
{
    $mt_options = mtnc_get_plugin_options(true);
    $logo_w     = $logo_h = '';

    if (!empty($mt_options['logo_width'])) {
        $logo_w = $mt_options['logo_width'];
    }
    if (!empty($mt_options['logo_height'])) {
        $logo_h = $mt_options['logo_height'];
    }
    if (!empty($mt_options['logo']) || !empty($mt_options['retina_logo'])) {
        $logo = false;
        if (is_numeric($mt_options['logo']) && $mt_options['logo'] > 0) {
            $logo = wp_get_attachment_image_src($mt_options['logo'], 'full', true);
        }

        if (!empty($logo)) {
            $image_link = esc_url_raw($logo[0]);
        } else {
            $image_link = $mt_options['logo'];
        }

        $retina_logo = false;
        if (is_numeric($mt_options['retina_logo']) && $mt_options['retina_logo'] > 0) {
            $retina_logo = wp_get_attachment_image_src($mt_options['retina_logo'], 'full', true);
        }

        if (!empty($retina_logo)) {
            $image_link_retina = esc_url_raw($retina_logo[0]);
        } else {
            $image_link_retina = $mt_options['retina_logo'];
        }

        $image_link        = empty($image_link) ? $image_link_retina : $image_link;
        $image_link_retina = empty($image_link_retina) ? $image_link : $image_link_retina;
?>
        <div class="logo-box" rel="home">
            <img src="<?php echo esc_url($image_link); ?>" srcset="<?php echo esc_url($image_link_retina); ?> 2x" width="<?php echo esc_attr($logo_w); ?>" <?php echo (!empty($logo_h)) ? 'height="' . esc_attr($logo_h) . '"' : ''; ?> alt="logo">
        </div>
    <?php
    } else {
        echo '<div class="logo-box istext" rel="home"><h1 class="site-title">' . esc_html(get_bloginfo('name')) . '</h1></div>';
    }
}
add_action('logo_box', 'mtnc_get_logo_box', 10);

function mtnc_get_content_section()
{
    $mt_options = mtnc_get_plugin_options(true);
    if (!empty($mt_options['body_font_subset'])) {
        $current_subset = esc_attr($mt_options['body_font_subset']);
        $font_weight    = (string) ((int) $current_subset);
        $font_style     = str_replace($font_weight, '', $current_subset);
    }

    if (empty($font_style) || $font_style === 'regular') {
        $font_style = 'normal';
    }
    if (empty($font_weight)) {
        $font_weight = 'normal';
    }
    $out_content = null;
    if (!empty($mt_options['heading'])) {
        $out_content .= '<h2 class="heading font-center" style="font-weight:' . $font_weight . ';font-style:' . $font_style . '">' . wp_kses_post(stripslashes($mt_options['heading'])) . '</h2>';
    }

    if (!empty($mt_options['description'])) {
        $description_content = wpautop(wp_kses_post(stripslashes($mt_options['description'])), true);
        $out_content        .= '<div class="description" style="font-weight:' . $font_weight . ';font-style:' . $font_style . '">' . $description_content . '</div>';
    } else {
        $site_description = get_bloginfo('description');
        $out_content     .= '<div class="description" style="font-weight:' . $font_weight . ';font-style:' . $font_style . '"><h3>' . $site_description . '</h3></div>';
    }

    mtnc_wp_kses($out_content);
}
add_action('content_section', 'mtnc_get_content_section', 10);

function mtnc_get_footer_section()
{
    $mt_options = mtnc_get_plugin_options(true);
    if (!empty($mt_options['body_font_subset'])) {
        $current_subset = esc_attr($mt_options['body_font_subset']);
        $font_weight    = (string) ((int) $current_subset);
        $font_style     = str_replace($font_weight, '', $current_subset);
    }

    if (empty($font_style) || $font_style === 'regular') {
        $font_style = 'normal';
    }
    if (empty($font_weight)) {
        $font_weight = 'normal';
    }

    $out_ftext = '';

    if (isset($mt_options['footer_text']) && !empty($mt_options['footer_text'])) {
        $out_ftext .= wp_kses_post(stripslashes($mt_options['footer_text']));
    }
    if (!empty($mt_options['show_some_love'])) {
        $out_ftext .= '<br><small>This site is using the free <a title="Free WP Maintenance Plugin" target="_blank" href="https://wordpress.org/plugins/maintenance/">WP Maintenance plugin</a>. Download and use it for free.</small>';
    }

    if ($out_ftext) {
        $out_ftext = '<div style="font-weight:' . $font_weight . ';font-style:' . $font_style . '">' . $out_ftext . '</div>';
    }

    mtnc_wp_kses($out_ftext);
}
add_action('footer_section', 'mtnc_get_footer_section', 10);

function mtnc_do_button_login_form($error = -1)
{
    ?>
    <div id="btn-open-login-form" class="btn-open-login-form">
        <i class="fi-lock"></i>

    </div>
    <div id="btn-sound" class="btn-open-login-form sound">
        <i id="value_botton" class="fa fa-volume-off" aria-hidden="true"></i>
    </div>
    <?php

}

function mtnc_do_login_form($user_login, $class_login, $class_password, $error = null)
{
    $mt_options     = mtnc_get_plugin_options(true);
    $out_login_form = $form_error = '';
    if (($class_login === 'error') || ($class_password === 'error')) {
        $form_error = ' active error';
    }

    $out_login_form .= '<form name="login-form" id="login-form" class="login-form' . $form_error . '" method="post">';
    $out_login_form .= '<label>' . __('User Login', 'maintenance') . '</label>';
    $out_login_form .= '<span class="login-error">' . $error . '</span>';
    $out_login_form .= '<span class="licon ' . $class_login . '"><input type="text" name="log" id="log" value="' . $user_login . '" size="20"  class="input username" placeholder="' . __('Username', 'maintenance') . '"/></span>';
    $out_login_form .= '<span class="picon ' . $class_password . '"><input type="password" name="pwd" id="login_password" value="" size="20"  class="input password" placeholder="' . __('Password', 'maintenance') . '" /></span>';
    $out_login_form .= '<a class="lost-pass" href="' . esc_url(wp_lostpassword_url()) . '" title="' . __('Lost Password', 'maintenance') . '">' . __('Lost Password', 'maintenance') . '</a>';
    $out_login_form .= '<input type="submit" class="button" name="submit" id="submit" value="' . __('Login', 'maintenance') . '" tabindex="4" />';
    $out_login_form .= '<input type="hidden" name="is_custom_login" value="1" />';
    $out_login_form .= wp_nonce_field('mtnc_login', 'mtnc_login_check');
    $out_login_form .= '</form>';

    if (isset($mt_options['is_login']) && $mt_options['is_login'] == true) {
        mtnc_wp_kses($out_login_form);
    }
}

function mtnc_reset_pass_url($lostpassword_url, $redirect)
{
    $mt_options     = mtnc_get_plugin_options(true);
    if($mt_options['state'] === 0){
        return $lostpassword_url;
    }
    $args             = array('action' => 'lostpassword');
    $lostpassword_url = add_query_arg($args, network_site_url('wp-login.php', 'login'));
    return $lostpassword_url;
}
add_filter('lostpassword_url', 'mtnc_reset_pass_url', 999, 2);

function mtnc_get_preloader_element()
{
    $mt_options = mtnc_get_plugin_options(true);
    if (!empty($mt_options['preloader_img'])) {
        $preloader_img = wp_get_attachment_image_src($mt_options['preloader_img'], 'full');
        $preloader_img = !empty($preloader_img) ? $preloader_img[0] : false;
    }

    $preloader = !empty($preloader_img) ? '<img src="' . $preloader_img . '">' : '<i class="fi-widget" aria-hidden="true"></i>';
    $out       = '<div class="preloader">' . $preloader . '</div>';
    mtnc_wp_kses($out);
}
add_action('before_content_section', 'mtnc_get_preloader_element', 5);

function mtnc_gg_analytics_code()
{
    $mt_options = mtnc_get_plugin_options(true);
    if (empty($mt_options['503_enabled']) && isset($mt_options['gg_analytics_id']) && ($mt_options['gg_analytics_id'] !== '')) {
    ?>
        <!-- Google tag (gtag.js) -->
        <script async src='https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($mt_options['gg_analytics_id']); ?>'></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo esc_attr($mt_options['gg_analytics_id']); ?>');
        </script>
<?php
    }
}
add_action('add_gg_analytics_code', 'mtnc_gg_analytics_code');

function mtnc_get_headers_503()
{
    $mt_options = mtnc_get_plugin_options(true);
    nocache_headers();
    if (!empty($mt_options['503_enabled'])) {
        $protocol = 'HTTP/1.0';
        if (isset($_SERVER['SERVER_PROTOCOL']) && 'HTTP/1.1' === $_SERVER['SERVER_PROTOCOL']) {
            $protocol = 'HTTP/1.1';
        }
        header("$protocol 503 Service Unavailable", true, 503);

        $v_curr_date_end = '';
        $vdate_end       = date_i18n('Y-m-d', strtotime(current_time('mysql', 0)));
        $vtime_end       = date_i18n('h:i a', strtotime('12:00 pm'));

        if (!empty($mt_options['expiry_date_end'])) {
            $vdate_end = $mt_options['expiry_date_end'];
        }
        if (!empty($mt_options['expiry_time_end'])) {
            $vtime_end = $mt_options['expiry_time_end'];
        }
        if ($mt_options['state'] && !empty($mt_options['expiry_date_end']) && !empty($mt_options['expiry_time_end'])) {
            $date_concat = $vdate_end . ' ' . $vtime_end;
            $v_curr_date = strtotime($date_concat);
            if (strtotime(current_time('mysql', 0)) < $v_curr_date) {
                header('Retry-After: ' . gmdate('D, d M Y H:i:s', $v_curr_date));
            } else {
                header('Retry-After: 3600');
            }
        } else {
            header('Retry-After: 3600');
        }
    }
}

function mtnc_wp_kses($html)
{
    add_filter('safe_style_css', function ($styles) {
        $styles_wf = array(
            'text-align',
            'margin',
            'color',
            'float',
            'border',
            'background',
            'background-color',
            'border-bottom',
            'border-bottom-color',
            'border-bottom-style',
            'border-bottom-width',
            'border-collapse',
            'border-color',
            'border-left',
            'border-left-color',
            'border-left-style',
            'border-left-width',
            'border-right',
            'border-right-color',
            'border-right-style',
            'border-right-width',
            'border-spacing',
            'border-style',
            'border-top',
            'border-top-color',
            'border-top-style',
            'border-top-width',
            'border-width',
            'caption-side',
            'clear',
            'cursor',
            'direction',
            'font',
            'font-family',
            'font-size',
            'font-style',
            'font-variant',
            'font-weight',
            'height',
            'letter-spacing',
            'line-height',
            'margin-bottom',
            'margin-left',
            'margin-right',
            'margin-top',
            'overflow',
            'padding',
            'padding-bottom',
            'padding-left',
            'padding-right',
            'padding-top',
            'text-decoration',
            'text-indent',
            'vertical-align',
            'width',
            'display',
        );

        foreach ($styles_wf as $style_wf) {
            $styles[] = $style_wf;
        }
        return $styles;
    });

    $allowed_tags = wp_kses_allowed_html('post');
    $allowed_tags['input'] = array(
        'type' => true,
        'style' => true,
        'class' => true,
        'id' => true,
        'checked' => true,
        'disabled' => true,
        'name' => true,
        'size' => true,
        'placeholder' => true,
        'value' => true,
        'data-*' => true,
        'size' => true,
        'disabled' => true
    );

    $allowed_tags['textarea'] = array(
        'type' => true,
        'style' => true,
        'class' => true,
        'id' => true,
        'checked' => true,
        'disabled' => true,
        'name' => true,
        'size' => true,
        'placeholder' => true,
        'value' => true,
        'data-*' => true,
        'cols' => true,
        'rows' => true,
        'disabled' => true,
        'autocomplete' => true
    );

    $allowed_tags['select'] = array(
        'type' => true,
        'style' => true,
        'class' => true,
        'id' => true,
        'checked' => true,
        'disabled' => true,
        'name' => true,
        'size' => true,
        'placeholder' => true,
        'value' => true,
        'data-*' => true,
        'multiple' => true,
        'disabled' => true
    );

    $allowed_tags['option'] = array(
        'type' => true,
        'style' => true,
        'class' => true,
        'id' => true,
        'checked' => true,
        'disabled' => true,
        'name' => true,
        'size' => true,
        'placeholder' => true,
        'value' => true,
        'selected' => true,
        'data-*' => true
    );
    $allowed_tags['optgroup'] = array(
        'type' => true,
        'style' => true,
        'class' => true,
        'id' => true,
        'checked' => true,
        'disabled' => true,
        'name' => true,
        'size' => true,
        'placeholder' => true,
        'value' => true,
        'selected' => true,
        'data-*' => true,
        'label' => true
    );

    $allowed_tags['a'] = array(
        'href' => true,
        'data-*' => true,
        'class' => true,
        'style' => true,
        'id' => true,
        'target' => true,
        'data-*' => true,
        'role' => true,
        'aria-controls' => true,
        'aria-selected' => true,
        'disabled' => true
    );

    $allowed_tags['div'] = array(
        'style' => true,
        'class' => true,
        'id' => true,
        'data-*' => true,
        'role' => true,
        'aria-labelledby' => true,
        'value' => true,
        'aria-modal' => true,
        'tabindex' => true
    );

    $allowed_tags['li'] = array(
        'style' => true,
        'class' => true,
        'id' => true,
        'data-*' => true,
        'role' => true,
        'aria-labelledby' => true,
        'value' => true,
        'aria-modal' => true,
        'tabindex' => true
    );

    $allowed_tags['span'] = array(
        'style' => true,
        'class' => true,
        'id' => true,
        'data-*' => true,
        'aria-hidden' => true
    );

    $allowed_tags['style'] = array(
        'class' => true,
        'id' => true,
        'type' => true
    );

    $allowed_tags['fieldset'] = array(
        'class' => true,
        'id' => true,
        'type' => true
    );

    $allowed_tags['link'] = array(
        'class' => true,
        'id' => true,
        'type' => true,
        'rel' => true,
        'href' => true,
        'media' => true
    );

    $allowed_tags['form'] = array(
        'style' => true,
        'class' => true,
        'id' => true,
        'method' => true,
        'action' => true,
        'data-*' => true
    );

    echo wp_kses($html, $allowed_tags);

    add_filter('safe_style_css', function ($styles) {
        $styles_wf = array(
            'text-align',
            'margin',
            'color',
            'float',
            'border',
            'background',
            'background-color',
            'border-bottom',
            'border-bottom-color',
            'border-bottom-style',
            'border-bottom-width',
            'border-collapse',
            'border-color',
            'border-left',
            'border-left-color',
            'border-left-style',
            'border-left-width',
            'border-right',
            'border-right-color',
            'border-right-style',
            'border-right-width',
            'border-spacing',
            'border-style',
            'border-top',
            'border-top-color',
            'border-top-style',
            'border-top-width',
            'border-width',
            'caption-side',
            'clear',
            'cursor',
            'direction',
            'font',
            'font-family',
            'font-size',
            'font-style',
            'font-variant',
            'font-weight',
            'height',
            'letter-spacing',
            'line-height',
            'margin-bottom',
            'margin-left',
            'margin-right',
            'margin-top',
            'overflow',
            'padding',
            'padding-bottom',
            'padding-left',
            'padding-right',
            'padding-top',
            'text-decoration',
            'text-indent',
            'vertical-align',
            'width'
        );

        foreach ($styles_wf as $style_wf) {
            if (($key = array_search($style_wf, $styles)) !== false) {
                unset($styles[$key]);
            }
        }
        return $styles;
    });
}
