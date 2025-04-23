<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
?>

<!-- Header -->
<header class="py-2">
	<div class="tcp-container">
		<!-- Contacto arriba a la derecha -->
		<div class="flex items-center gap-2 justify-end w-full px-4">
			<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M3.25 0H16.75C18.483 0 19.8992 1.35645 19.9949 3.06558L20 3.25V12.75C20 14.483 18.6435 15.8992 16.9344 15.9949L16.75 16H3.25C1.51697 16 0.10075 14.6435 0.00514007 12.9344L0 12.75V3.25C0 1.51697 1.35645 0.10075 3.06558 0.00513983L3.25 0ZM18.5 5.373L10.3493 9.6637C10.1619 9.7623 9.9431 9.7764 9.7468 9.706L9.6507 9.6637L1.5 5.374V12.75C1.5 13.6682 2.20711 14.4212 3.10647 14.4942L3.25 14.5H16.75C17.6682 14.5 18.4212 13.7929 18.4942 12.8935L18.5 12.75V5.373ZM16.75 1.5H3.25C2.33183 1.5 1.57881 2.20711 1.5058 3.10647L1.5 3.25V3.679L10 8.1525L18.5 3.678V3.25C18.5 2.33183 17.7929 1.57881 16.8935 1.5058L16.75 1.5Z"
					fill="#4CAF4F" />
			</svg>
			<p class="text-[#060082] text-sm">info@albatrosspa.com</p>
		</div>

		<!-- Logo + menú -->
		<div class="flex items-center justify-between mt-2">
			<h1>
				<img class="h-[63px] w-[309px] object-fit" src="<?php echo $logo_url ?>" alt="Albatros SpA.">
			</h1>

			<!-- Botón hamburguesa (solo visible en mobile) -->
			<button id="menu-btn" class="md:hidden text-[#060082] focus:outline-none" aria-label="Abrir menú">
				<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			</button>

			<!-- Menú de navegación -->
			<nav id="menu"
				class="hidden z-50 flex-col gap-4 absolute top-[107px] left-0 w-full bg-white p-4 md:static md:top-0 flex md:flex md:flex-row md:items-center md:gap-4 md:w-auto">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'flex flex-col md:flex-row items-center gap-4',
					'link_before' => '<span class="text-[#060082]">',
					'link_after' => '</span>',
					'fallback_cb' => false,
				));
				?>
			</nav>
		</div>
	</div>
</header>