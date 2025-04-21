<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

if (is_active_sidebar('sidebar-1')) : ?>

	<footer class="bg-[#52525B] -mt-[35px] pt-[75px] pb-[40px]">
		<div class="tcp-container">
			<div class="flex justify-between text-white">
				<div class="max-w-[340px]">
					<img src="/wp-content/themes/oneonetwenty/assets/images/logo-white.png" alt="Albatros">
					<p class="mt-8">© 2025 Albatros SPA</p>
					<p class="mt-2 mb-4">Sitio Web desarrollado por ABLA Factoría Creativa</p>
					<a href="https://www.linkedin.com/company/albatrosspa/">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M1.97862e-07 1.33673C1.97862e-07 0.982207 0.140834 0.642205 0.391519 0.39152C0.642204 0.140835 0.982205 1.78205e-06 1.33673 1.78205e-06H14.6618C14.8375 -0.000285165 15.0115 0.0340839 15.1739 0.101141C15.3363 0.168198 15.4839 0.266627 15.6082 0.390792C15.7325 0.514956 15.8311 0.662419 15.8983 0.824736C15.9655 0.987054 16.0001 1.16104 16 1.33673V14.6618C16.0002 14.8375 15.9657 15.0116 15.8986 15.174C15.8315 15.3364 15.733 15.4839 15.6087 15.6082C15.4845 15.7325 15.337 15.8311 15.1746 15.8983C15.0123 15.9655 14.8383 16.0001 14.6625 16H1.33673C1.16112 16 0.987243 15.9654 0.825016 15.8982C0.662789 15.831 0.515397 15.7324 0.391261 15.6082C0.267125 15.484 0.168678 15.3366 0.101544 15.1743C0.0344096 15.012 -9.53422e-05 14.8381 1.97862e-07 14.6625V1.33673ZM6.33309 6.10037H8.49964V7.18836C8.81236 6.56291 9.61236 6 10.8145 6C13.1193 6 13.6655 7.24582 13.6655 9.53164V13.7658H11.3331V10.0524C11.3331 8.75055 11.0204 8.016 10.2262 8.016C9.12436 8.016 8.66618 8.808 8.66618 10.0524V13.7658H6.33309V6.10037ZM2.33309 13.6662H4.66618V6H2.33309V13.6655V13.6662ZM5 3.49964C5.0044 3.6994 4.96885 3.89803 4.89545 4.08387C4.82204 4.2697 4.71226 4.43901 4.57253 4.58184C4.43281 4.72468 4.26596 4.83816 4.08179 4.91564C3.89761 4.99312 3.69981 5.03303 3.5 5.03303C3.30019 5.03303 3.10239 4.99312 2.91821 4.91564C2.73404 4.83816 2.56719 4.72468 2.42747 4.58184C2.28774 4.43901 2.17796 4.2697 2.10455 4.08387C2.03115 3.89803 1.9956 3.6994 2 3.49964C2.00863 3.10753 2.17046 2.7344 2.45083 2.46014C2.73119 2.18588 3.1078 2.03231 3.5 2.03231C3.8922 2.03231 4.26881 2.18588 4.54917 2.46014C4.82954 2.7344 4.99137 3.10753 5 3.49964Z" fill="white" />
						</svg>
					</a>
				</div>
				<div class="max-w-[253px]">
					<h5 class="font-bold">Santiago</h5>
					<p>Candelaria Goyenechea 4181, Vitacura.</p>
					<p class="flex gap-2 items-center my-2">
						<svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.05694 1.41844L4.22394 1.06668C5.54645 0.668038 6.9594 1.31227 7.5258 2.5721L8.4275 4.57782C8.9102 5.65165 8.6558 6.91366 7.7948 7.71661L6.3005 9.1101C6.2568 9.1508 6.2291 9.2058 6.2225 9.2652C6.1781 9.6623 6.4474 10.4357 7.0676 11.51C7.5187 12.2913 7.9269 12.8391 8.2744 13.1473C8.5165 13.362 8.6498 13.4084 8.7065 13.3915L10.7169 12.7769C11.8425 12.4328 13.0623 12.8431 13.751 13.7976L15.0317 15.5726C15.8378 16.6898 15.6928 18.2311 14.6926 19.1784L13.8062 20.0178C12.8498 20.9236 11.4882 21.2611 10.2195 20.907C7.4654 20.1383 4.99608 17.8141 2.78421 13.9831C0.569259 10.1467 -0.207931 6.84222 0.508519 4.07043C0.836389 2.80195 1.80252 1.79656 3.05694 1.41844ZM3.48984 2.85461C2.73719 3.08148 2.15751 3.68472 1.96079 4.44581C1.35814 6.77732 2.047 9.7062 4.08325 13.2331C6.1168 16.7552 8.3057 18.8155 10.6227 19.4622C11.384 19.6747 12.2009 19.4722 12.7748 18.9287L13.6611 18.0893C14.1158 17.6587 14.1817 16.9581 13.8153 16.4503L12.5346 14.6753C12.2215 14.2415 11.667 14.0549 11.1554 14.2114L9.1401 14.8275C7.9704 15.1762 6.9087 14.2347 5.7686 12.26C5.00029 10.9293 4.6422 9.9006 4.73177 9.0987C4.77817 8.68322 4.97174 8.29812 5.27746 8.01303L6.7718 6.61958C7.1632 6.2546 7.2788 5.68096 7.0594 5.19286L6.1577 3.18714C5.90026 2.61449 5.25798 2.32165 4.65684 2.50285L3.48984 2.85461Z" fill="#54C4D2" />
						</svg>
						+569 9820 1126
					</p>
					<p class="flex gap-2 items-center my-2">
						<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.25 0H16.75C18.483 0 19.8992 1.35645 19.9949 3.06558L20 3.25V12.75C20 14.483 18.6435 15.8992 16.9344 15.9949L16.75 16H3.25C1.51697 16 0.10075 14.6435 0.00514007 12.9344L0 12.75V3.25C0 1.51697 1.35645 0.10075 3.06558 0.00513983L3.25 0ZM18.5 5.373L10.3493 9.6637C10.1619 9.7623 9.9431 9.7764 9.7468 9.706L9.6507 9.6637L1.5 5.374V12.75C1.5 13.6682 2.20711 14.4212 3.10647 14.4942L3.25 14.5H16.75C17.6682 14.5 18.4212 13.7929 18.4942 12.8935L18.5 12.75V5.373ZM16.75 1.5H3.25C2.33183 1.5 1.57881 2.20711 1.5058 3.10647L1.5 3.25V3.679L10 8.1525L18.5 3.678V3.25C18.5 2.33183 17.7929 1.57881 16.8935 1.5058L16.75 1.5Z" fill="#4CAF4F" />
						</svg>
						info@albatrosspa.com
					</p>
				</div>
				<div class="w-fit">
					<a class="block mb-2" href="/">Home</a>
					<a class="block mb-2" href="#nosotros">Nosotros</a>
					<a class="block mb-2" href="#servicios">Productos y servicios</a>
					<a class="block" href="casosDeExito">Casos de Éxito</a>
				</div>
			</div>
		</div>
	</footer>

	<!-- Scripts Swiper -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		new Swiper('.swiper', {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			},
			// navigation: {
			// 	nextEl: '.swiper-button-next',
			// 	prevEl: '.swiper-button-prev'
			// }
		});

		new Swiper('.logo-swiper', {
			loop: true,
			slidesPerView: 2,
			spaceBetween: 20,
			breakpoints: {
				640: {
					slidesPerView: 3
				},
				768: {
					slidesPerView: 4
				},
				1024: {
					slidesPerView: 5
				},
			},
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
		});
		new Swiper('.casos-swiper', {
			loop: true,
			slidesPerView: 1,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			pagination: {
				el: '.swiper-pagination.--casos',
				clickable: true
			},
			speed: 1200,
		});
		new Swiper('.testimonios-swiper', {
			loop: true,
			slidesPerView: 2,
			spaceBetween: 20,
			breakpoints: {
				640: {
					slidesPerView: 3
				},
			},
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '.swiper-button-next.--clientes',
				prevEl: '.swiper-button-prev.--clientes',
			},
		});
	</script>

	<!-- Script menu -->
	<script>
		const menuBtn = document.getElementById("menu-btn");
		const menu = document.getElementById("menu");

		menuBtn.addEventListener("click", () => {
			menu.classList.toggle("hidden");
		});
	</script>

	<!-- Estilos -->
	<style>
		/* plus-jakarta-sans-latin-wght-normal */
		@font-face {
			font-family: 'Plus Jakarta Sans Variable';
			font-style: normal;
			font-display: swap;
			font-weight: 200 800;
			src: url(https://cdn.jsdelivr.net/fontsource/fonts/plus-jakarta-sans:vf@latest/latin-wght-normal.woff2) format('woff2-variations');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		body {
			font-family: 'Plus Jakarta Sans Variable' !important;
		}

		.tcp-container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 16px;
		}

		.al-btn {
			padding: 10px 23px;
			border-radius: 4px;
			color: white;
			background-color: #4CAF4F;
			display: block;
			width: fit-content;
		}

		.al-btn.--secondary {
			background-color: #54C4D2;
		}

		.al-title {
			text-align: center;
			font-size: 36px;
			font-weight: 700;
			color: #060082;
			position: relative;
			width: fit-content;
			margin-left: auto;
			margin-right: auto;
		}

		.al-title span {
			position: relative;
			z-index: 50;
		}

		.al-title::before {
			content: '';
			width: 80px;
			height: 80px;
			border-radius: 100%;
			background-color: #54C4D2;
			position: absolute;
			left: -15px;
			top: calc(50% - 40px);
		}

		.al-title.--double-line {
			max-width: 220px;
			text-align: start;
			line-height: 31px;
		}

		.al-title.--green::before {
			background-color: #4CAF4F;
		}

		/* Slider Casos */
		.swiper-pagination.--casos {
			bottom: -50px !important;
		}

		.swiper-pagination.--casos span.swiper-pagination-bullet-active {
			background-color: #4CAF4F !important;
		}

		/* Carrusel Testimonios */
		.swiper-button-next.--clientes,
		.swiper-button-prev.--clientes {
			position: relative;
			right: 0;
			left: 0;
			bottom: 0;
			top: 0;
			margin: 0;
			width: 44px;
			height: 50px;
		}

		.swiper-button-next.--clientes::after,
		.swiper-button-prev.--clientes::after {
			display: none;
		}

		/* Contact Form */
		/* Contenedor del formulario */
		.form-wrapper {
			background-color: rgba(255, 255, 255, 0.8);
			/* fondo blanco con opacidad */
			backdrop-filter: blur(10px);
			/* desenfoque */
			-webkit-backdrop-filter: blur(10px);
			/* compatibilidad Safari */
			padding: 2rem;
			border-radius: 1rem;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		}

		/* Campos de entrada, select y textarea */
		.wpcf7 input.input-field,
		.wpcf7 select.input-field,
		.wpcf7 textarea.input-field {
			width: 100%;
			padding: 12px;
			border: 2px solid #060082;
			border-radius: 6px;
			font-size: 14px;
			color: #060082;
			margin-bottom: 1rem;
			outline: none;
		}

		.wpcf7 input.input-field::placeholder,
		.wpcf7 textarea.input-field::placeholder {
			color: #888;
		}

		/* Botón de envío */

		.wpcf7 .al-btn {
			padding: 15px 70px;
		}
	</style>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<?php
endif;
