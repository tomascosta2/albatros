<?php

$hero_fields = get_field('hero');
$experiencia_fields = get_field('experiencia');
$numeros_fields = get_field('numeros');
$servicios_fields = get_field('servicios');
$contacto_rapido_fields = get_field('contacto_rapido');
$logos_fields = get_field('logos');
$casos_de_exito_fields = get_field('casos_de_exito');
$testimonios_fields = get_field('testimonios');
$contactanos_fields = get_field('contacto');

$footer_fields = get_field('footer');

get_header(); ?>

<!-- Carrusel -->
<section id="inicio">
	<div class="swiper w-full h-[450px] relative">
		<div class="swiper-wrapper max-h-full">
			<?php foreach ($hero_fields['slider'] as $slide): ?>
				<?php
				$bg_url = !empty($slide['fondo']['url']) ? esc_url($slide['fondo']['url']) : '';
				$titulo = esc_html($slide['titulo']);
				$btn_title = esc_html($slide['boton']['title']);
				$btn_url = esc_url($slide['boton']['url']);
				?>
				<div class="swiper-slide bg-[url('<?php echo $bg_url; ?>')] bg-cover bg-center flex items-center justify-center bg-gray-300">
					<div class="tcp-container">
						<div class="w-fit max-w-[457px] mt-[50px] ml-auto">
							<h2 class="mb-2 text-[#060082] font-bold text-[64px] leading-[64px]">
								<?php echo $titulo; ?>
							</h2>
							<a class="al-btn mt-4" href="<?php echo $btn_url; ?>"><?php echo $btn_title; ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Paginación y flechas -->
		<div class="swiper-pagination"></div>
		<!-- <div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div> -->
	</div>
</section>
<section id="nosotros">
	<div class="tcp-container">
		<div class="bg-[#060082] p-[60px] rounded-br-[40px] rounded-bl-[40px]">
			<div class="max-w-[800px] mx-auto flex flex-col md:flex-row items-baseline gap-12">
				<div class="w-fit mx-auto">
					<p class="md:mx-0 w-fit leading-[155px] text-white font-extrabold tracking-tighter text-[190px]">
						<?php echo $experiencia_fields['numero'] ?>
					</p>
					<p
						class="md:mx-0 w-fit leading-[110px] -mt-[15px] text-[#54C4D2] font-extrabold tracking-tighter text-[140px]">
						<?php echo $experiencia_fields['tiempo'] ?>
					</p>
					<p
						class="md:mx-0 w-fit leading-[130%] text-[#FFCC00] font-extrabold tracking-tighter text-[22px]">
						<?php echo $experiencia_fields['bajada'] ?>
					</p>
				</div>
				<p class="text-white">
					<?php echo $experiencia_fields['texto'] ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section class="py-[80px]">
	<div class="tcp-container --lightblue">
		<h3 class="al-title mb-12"><span><?php echo $numeros_fields['titulo'] ?></span></h3>
		<div class="grid md:grid-cols-3 gap-10">
			<?php foreach ($numeros_fields['datos'] as $dato):
				$valor = $dato['numero']; // Ejemplo: "45%" o "30+"
				preg_match('/^(\d+)([^0-9]*)$/', $valor, $partes);
				$numero = isset($partes[1]) ? $partes[1] : 0;
				$extra = isset($partes[2]) ? $partes[2] : '';
			?>
				<div class="shadow-xl p-8">
					<p
						class="text-center text-[110px] leading-[100px] font-extrabold text-[#060082]">
						<span class="numero-animado" data-final="<?php echo esc_html($dato['numero']); ?>">0</span><?php echo esc_html($extra); ?>
					</p>
					<p class="text-center text-[80px] leading-[70px] font-extrabold text-[#54C4D2]">
						<?php echo esc_html($dato['tipo_de_dato']); ?>
					</p>
					<p class="text-center leading-[100%] font-extrabold text-[#54C4D2] text-[28px]">
						<?php echo esc_html($dato['detalle']); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="p-8 bg-[#54C4D2] mt-8">
			<h2 class="text-white mb-8 text-[40px] leading-[120%] md:text-[60px] font-medium text-center"><?php echo $numeros_fields['titulo_banner'] ?>r</h2>
			<p class="text-[#060082] text-[60px] leading-[120%] font-extrabold text-center md:leading-[120px] md:text-[130px]"><?php echo $numeros_fields['numero_banner'] ?></p>
		</div>
		<p class="text-[#52525B] text-[20px] leading-[28px] mt-8 max-w-[970px] mx-auto text-justify">
			<?php echo $numeros_fields['texto'] ?>
		</p>
	</div>
</section>

<section id="servicios">
	<div class="tcp-container">
		<h3 class="al-title --double-line --green mb-12"><span><?php echo $servicios_fields['titulo'] ?></span></h3>
		<?php
		$i = 0;
		foreach ($servicios_fields['planes'] as $plan):
			if ($i === 0) {
				$bgColor = '#060082';
				$textColor = '#FFFF';
			} elseif ($i === 1) {
				$bgColor = '#54C4D2';
				$textColor = '#060082';
			} else {
				$bgColor = '#FFCC00';
				$textColor = '#060082';
			}
			$i++;
		?>
			<div class="px-8 pt-12 pb-24 hover:scale-[103%] transition-all bg-[<?php echo $bgColor ?>] text-[<?php echo $textColor ?>] rounded-[40px] mb-8">
				<div class="md:flex mb-2 gap-4 items-baseline mb-8">
					<?php if (!empty($plan['icono'])): ?>
						<img class="size-[93px] object-fit" src="<?php echo esc_url($plan['icono']['url']); ?>" alt="<?php echo esc_attr($plan['icono']['alt']); ?>">
					<?php endif; ?>
					<h2 class="text-[32px] leading-[110%] mt-4 md:text-[60px] tracking-[-1px] font-medium">
						<?php echo esc_html($plan['titulo']); ?>
					</h2>
				</div>
				<p class="text-[18px] leading-[20px] text-justify">
					<?php echo esc_html($plan['texto']); ?>
				</p>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="py-[80px]">
	<div class="tcp-container">
		<h3 class="al-title mb-12"><span><?php echo $contacto_rapido_fields['titulo'] ?></span></h3>
		<form action="/" class="bg-white shadow-[0px_0px_35px_#11111130] hover:scale-[103%] transition-all p-1 flex max-w-[617px] mx-auto rounded-lg">
			<input class="outline-none p-4 w-full" placeholder="Introduce tu dirección de correo electrónico"
				type="text">
			<button class="text-white font-semibold py-2 px-8 rounded-lg bg-[#4CAF4F] cursor-pointer">Contáctanos</button>
		</form>
	</div>
</section>

<section class="py-[80px]">
	<div class="tcp-container">
		<div class="bg-white rounded-[20px] py-10 px-16 shadow-[0px_0px_35px_#11111130]">
			<div class="swiper logo-swiper">
				<div class="swiper-wrapper items-center">
					<?php foreach ($logos_fields['lista_de_logos'] as $item): ?>
						<?php if (!empty($item['logo'])): ?>
							<div class="swiper-slide flex justify-center items-center">
								<img class="h-[118px] hover:scale-[108%] transition-all object-contain"
									src="<?php echo esc_url($item['logo']['url']); ?>"
									alt="<?php echo esc_attr($item['logo']['alt']); ?>" />
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt-[80px] pb-[100px] bg-[#FAFAFA] rounded-[40px]" id="casosDeExito">
	<div class="tcp-container relative">
		<h3 class="al-title --green mb-12"><span><?php echo $casos_de_exito_fields['titulo'] ?></span></h3>
		<div class="swiper casos-swiper rounded-[20px] shadow-[0px_0px_35px_#11111130]">
			<div class="swiper-wrapper items-center">
				<?php foreach (($casos_de_exito_fields['slides']) as $slide): ?>
					<?php
					$ahorro = esc_html($slide['ahorro_final']);
					$proceso = esc_html($slide['proceso_en_meses']);
					$contrato = esc_html($slide['contrato_en_meses']);
					$empresa = esc_html($slide['datos_empresa']);
					?>
					<div class="swiper-slide">
						<div class="bg-white py-8 px-12 rounded-[20px]">
							<div class="flex md:flex-row flex-col gap-4 items-center justify-between">
								<div class="text-center">
									<h4 class="text-[40px] font-extrabold text-[#060082]">Ahorro final</h4>
									<span class="text-[110px] font-extrabold leading-[80px] text-[#060082]"><?php echo $ahorro; ?></span>
								</div>
								<div class="text-center">
									<h4 class="text-[#888] font-bold leading-[17px] text-[20px]">Proceso<br> en meses</h4>
									<span class="font-extrabold text-[80px] tracking-tighter leading-[75px] text-[#54C4D2]"><?php echo $proceso; ?></span>
								</div>
								<div class="text-center">
									<h4 class="text-[#888] font-bold leading-[17px] text-[20px]">Contrato<br> en meses</h4>
									<span class="font-extrabold text-[80px] tracking-tighter leading-[75px] text-[#FFCC00]"><?php echo $contrato; ?></span>
								</div>
								<div class="text-center text-[#888888] text-[25px] border border-[#111]/20 rounded-[10px] p-8">
									<?php echo $empresa; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="swiper-pagination --casos"></div>
	</div>
	</div>
</section>

<?php if ($testimonios_fields['lista_de_testimonios']) : ?>
<section class="py-[80px]">
	<div class="tcp-container relative">
		<h3 class="al-title --green mb-8"><span><?php echo $testimonios_fields['titulo'] ?></span></h3>
		<p class="max-w-[412px] mb-12 mx-auto text-center text-[#141F39]/70">
			<?php echo $testimonios_fields['bajada'] ?>
		</p>
		<div class="flex gap-4 w-fit ml-auto md:-mt-[99px] mb-12">
			<div class="swiper-button-prev --clientes bg-white shadow-sm rounded-full p-3 rounded-sm">
				<svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M7.30903 15.397L1.00903 8.25075M1.00903 8.25075L7.30903 1.10449M1.00903 8.25075L17.209 8.25075"
						stroke="#34A853" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</div>
			<div class="swiper-button-next --clientes bg-[#34A853] rounded-full p-3 rounded-sm">
				<svg class="rotate-180" width="29" height="17" viewBox="0 0 19 17" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M7.30903 15.397L1.00903 8.25075M1.00903 8.25075L7.30903 1.10449M1.00903 8.25075L17.209 8.25075"
						stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</div>
		</div>
		<div class="swiper testimonios-swiper">
			<div class="swiper-wrapper">
				<?php foreach ($testimonios_fields['lista_de_testimonios'] as $testimonio): ?>
					<?php
					$foto = $testimonio['foto'] ?? null;
					$nombre = esc_html($testimonio['nombre']);
					$profesion = esc_html($testimonio['profesion']);
					$texto = esc_html($testimonio['testimonio']);
					?>
					<div class="swiper-slide">
						<div class="p-4 rounded-lg">
							<div class="flex flex-col md:flex-row ,d:items-center gap-4">
								<?php if ($foto): ?>
									<img class="size-[80px] rounded-full object-cover bg-[#54C4D2]"
										src="<?php echo esc_url($foto['url']); ?>"
										alt="<?php echo esc_attr($foto['alt'] ?: $nombre); ?>">
								<?php else: ?>
									<div class="size-[80px] rounded-full bg-[#54C4D2]"></div>
								<?php endif; ?>
								<div>
									<h5 class="text-[20px] font-bold"><?php echo $nombre; ?></h5>
									<p class="text-[14px]"><?php echo $profesion; ?></p>
								</div>
							</div>
							<p class="text-[#717171] mt-4"><?php echo $texto; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="pt-[80px] relative z-50" id="contacto">
	<div class="tcp-container">
		<h3 class="font-bold text-[#060082] text-center text-[64px]"><?php echo $contactanos_fields['titulo'] ?></h3>
	</div>
	<div class="bg-[url(<?php echo $contactanos_fields['imagen_fondo']['url'] ?>)] bg-cover py-8 rounded-[40px]">
		<div class="tcp-container">
			<div class="bg-white/90 p-4 max-w-full w-[550px] rounded-[20px] ml-auto">
				<?php echo do_shortcode('[contact-form-7 id="151ccd1" title="Contact form 1"]'); ?>
			</div>
		</div>
	</div>
</section>

<footer class="bg-[#52525B] -mt-[35px] pt-[75px] pb-[40px]">
	<div class="tcp-container">
		<div class="flex md:flex-row flex-col md:gap-0 gap-8 justify-between text-white">
			<div class="max-w-[340px]">
				<img src="<?php echo $footer_fields['logo']['url'] ?>" alt="Albatros">
				<p class="mt-8"><?php echo $footer_fields['derechos'] ?></p>
				<p class="mt-2 mb-4"><?php echo $footer_fields['desarrollado_por'] ?></p>
				<a href="<?php echo $footer_fields['linkedin']['url'] ?>">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1.97862e-07 1.33673C1.97862e-07 0.982207 0.140834 0.642205 0.391519 0.39152C0.642204 0.140835 0.982205 1.78205e-06 1.33673 1.78205e-06H14.6618C14.8375 -0.000285165 15.0115 0.0340839 15.1739 0.101141C15.3363 0.168198 15.4839 0.266627 15.6082 0.390792C15.7325 0.514956 15.8311 0.662419 15.8983 0.824736C15.9655 0.987054 16.0001 1.16104 16 1.33673V14.6618C16.0002 14.8375 15.9657 15.0116 15.8986 15.174C15.8315 15.3364 15.733 15.4839 15.6087 15.6082C15.4845 15.7325 15.337 15.8311 15.1746 15.8983C15.0123 15.9655 14.8383 16.0001 14.6625 16H1.33673C1.16112 16 0.987243 15.9654 0.825016 15.8982C0.662789 15.831 0.515397 15.7324 0.391261 15.6082C0.267125 15.484 0.168678 15.3366 0.101544 15.1743C0.0344096 15.012 -9.53422e-05 14.8381 1.97862e-07 14.6625V1.33673ZM6.33309 6.10037H8.49964V7.18836C8.81236 6.56291 9.61236 6 10.8145 6C13.1193 6 13.6655 7.24582 13.6655 9.53164V13.7658H11.3331V10.0524C11.3331 8.75055 11.0204 8.016 10.2262 8.016C9.12436 8.016 8.66618 8.808 8.66618 10.0524V13.7658H6.33309V6.10037ZM2.33309 13.6662H4.66618V6H2.33309V13.6655V13.6662ZM5 3.49964C5.0044 3.6994 4.96885 3.89803 4.89545 4.08387C4.82204 4.2697 4.71226 4.43901 4.57253 4.58184C4.43281 4.72468 4.26596 4.83816 4.08179 4.91564C3.89761 4.99312 3.69981 5.03303 3.5 5.03303C3.30019 5.03303 3.10239 4.99312 2.91821 4.91564C2.73404 4.83816 2.56719 4.72468 2.42747 4.58184C2.28774 4.43901 2.17796 4.2697 2.10455 4.08387C2.03115 3.89803 1.9956 3.6994 2 3.49964C2.00863 3.10753 2.17046 2.7344 2.45083 2.46014C2.73119 2.18588 3.1078 2.03231 3.5 2.03231C3.8922 2.03231 4.26881 2.18588 4.54917 2.46014C4.82954 2.7344 4.99137 3.10753 5 3.49964Z" fill="white" />
					</svg>
				</a>
			</div>
			<div class="max-w-[253px]">
				<h5 class="font-bold"><?php echo $footer_fields['ciudad'] ?></h5>
				<p><?php echo $footer_fields['ubicacion'] ?></p>
				<p class="flex gap-2 items-center my-2">
					<svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.05694 1.41844L4.22394 1.06668C5.54645 0.668038 6.9594 1.31227 7.5258 2.5721L8.4275 4.57782C8.9102 5.65165 8.6558 6.91366 7.7948 7.71661L6.3005 9.1101C6.2568 9.1508 6.2291 9.2058 6.2225 9.2652C6.1781 9.6623 6.4474 10.4357 7.0676 11.51C7.5187 12.2913 7.9269 12.8391 8.2744 13.1473C8.5165 13.362 8.6498 13.4084 8.7065 13.3915L10.7169 12.7769C11.8425 12.4328 13.0623 12.8431 13.751 13.7976L15.0317 15.5726C15.8378 16.6898 15.6928 18.2311 14.6926 19.1784L13.8062 20.0178C12.8498 20.9236 11.4882 21.2611 10.2195 20.907C7.4654 20.1383 4.99608 17.8141 2.78421 13.9831C0.569259 10.1467 -0.207931 6.84222 0.508519 4.07043C0.836389 2.80195 1.80252 1.79656 3.05694 1.41844ZM3.48984 2.85461C2.73719 3.08148 2.15751 3.68472 1.96079 4.44581C1.35814 6.77732 2.047 9.7062 4.08325 13.2331C6.1168 16.7552 8.3057 18.8155 10.6227 19.4622C11.384 19.6747 12.2009 19.4722 12.7748 18.9287L13.6611 18.0893C14.1158 17.6587 14.1817 16.9581 13.8153 16.4503L12.5346 14.6753C12.2215 14.2415 11.667 14.0549 11.1554 14.2114L9.1401 14.8275C7.9704 15.1762 6.9087 14.2347 5.7686 12.26C5.00029 10.9293 4.6422 9.9006 4.73177 9.0987C4.77817 8.68322 4.97174 8.29812 5.27746 8.01303L6.7718 6.61958C7.1632 6.2546 7.2788 5.68096 7.0594 5.19286L6.1577 3.18714C5.90026 2.61449 5.25798 2.32165 4.65684 2.50285L3.48984 2.85461Z" fill="#54C4D2" />
					</svg>
					<?php echo $footer_fields['telefono'] ?>
				</p>
				<p class="flex gap-2 items-center my-2">
					<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.25 0H16.75C18.483 0 19.8992 1.35645 19.9949 3.06558L20 3.25V12.75C20 14.483 18.6435 15.8992 16.9344 15.9949L16.75 16H3.25C1.51697 16 0.10075 14.6435 0.00514007 12.9344L0 12.75V3.25C0 1.51697 1.35645 0.10075 3.06558 0.00513983L3.25 0ZM18.5 5.373L10.3493 9.6637C10.1619 9.7623 9.9431 9.7764 9.7468 9.706L9.6507 9.6637L1.5 5.374V12.75C1.5 13.6682 2.20711 14.4212 3.10647 14.4942L3.25 14.5H16.75C17.6682 14.5 18.4212 13.7929 18.4942 12.8935L18.5 12.75V5.373ZM16.75 1.5H3.25C2.33183 1.5 1.57881 2.20711 1.5058 3.10647L1.5 3.25V3.679L10 8.1525L18.5 3.678V3.25C18.5 2.33183 17.7929 1.57881 16.8935 1.5058L16.75 1.5Z" fill="#4CAF4F" />
					</svg>
					<?php echo $footer_fields['correo'] ?>
				</p>
			</div>
			<div class="w-fit">
				<?php foreach ($footer_fields['enlaces'] as $enlace) : ?>
					<a class="block mb-2" href="<?php echo $enlace['enlace']['url'] ?>"><?php echo $enlace['enlace']['title'] ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</footer>

<?php get_footer(); ?>