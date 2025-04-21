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
			<?php foreach ($numeros_fields['datos'] as $dato): ?>
				<div class="shadow-xl p-8">
					<p class="text-center text-[110px] leading-[100px] font-extrabold text-[#060082]">
						<?php echo esc_html($dato['numero']); ?>
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
			<div class="px-8 pt-12 pb-24 bg-[<?php echo $bgColor ?>] text-[<?php echo $textColor ?>] rounded-[40px] mb-8">
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
		<form action="/" class="bg-white shadow-[0px_0px_35px_#11111130] p-1 flex max-w-[617px] mx-auto rounded-lg">
			<input class="outline-none p-4 w-full" placeholder="Introduce tu dirección de correo electrónico"
				type="text">
			<button class="text-white font-semibold py-2 px-8 rounded-lg bg-[#4CAF4F]">Contáctanos</button>
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
								<img class="h-[118px] object-contain"
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
							<div class="flex items-center justify-between">
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

<section class="pt-[80px] relative z-50" id="contacto">
	<div class="tcp-container">
		<h3 class="font-bold text-[#060082] text-center text-[64px]"><?php echo $contactanos_fields['titulo'] ?></h3>
		<p class="max-w-[412px] mb-12 mx-auto text-center text-[#141F39]/70">
			<?php echo $contactanos_fields['bajada'] ?>
		</p>
	</div>
	<div class="bg-[url(<?php echo $contactanos_fields['imagen_fondo']['url'] ?>)] bg-cover py-8 rounded-[40px]">
		<div class="tcp-container">
			<div class="bg-white/90 p-4 max-w-full w-[550px] rounded-[20px] ml-auto">
				<?php echo do_shortcode('[contact-form-7 id="151ccd1" title="Contact form 1"]'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>