<?php

/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if (is_active_sidebar('sidebar-1')) : ?>

	<!-- <footer class="tcp-footer">
		<div class="max-w-[1140px] mx-auto px-4 xl:px-0">
			<div class="tcp-footer__wrapper">
				<?php // dynamic_sidebar( 'sidebar-1' ); 
				?>
			</div>
		</div>
	</footer> -->

	<footer class="bg-[#52525B] -mt-[35px] pt-[75px] pb-[40px]">
		<div class="max-w-[340px]">
			<img src="" alt="">
			<p>© 2025 Albatros SPA</p>
			<p>Sitio Web desarrollado por ABLA Factoría Creativa</p>
			<a href="https://www.linkedin.com/company/albatrosspa/">Linkedin</a>
		</div>
		<div class="max-w-[253px]">
			<h5 class="font-bold">Santiago</h5>
			<p>Candelaria Goyenechea 4181, Vitacura.</p>
			<p class="flex gap-2 items-center">
				<svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3.05694 1.41844L4.22394 1.06668C5.54645 0.668038 6.9594 1.31227 7.5258 2.5721L8.4275 4.57782C8.9102 5.65165 8.6558 6.91366 7.7948 7.71661L6.3005 9.1101C6.2568 9.1508 6.2291 9.2058 6.2225 9.2652C6.1781 9.6623 6.4474 10.4357 7.0676 11.51C7.5187 12.2913 7.9269 12.8391 8.2744 13.1473C8.5165 13.362 8.6498 13.4084 8.7065 13.3915L10.7169 12.7769C11.8425 12.4328 13.0623 12.8431 13.751 13.7976L15.0317 15.5726C15.8378 16.6898 15.6928 18.2311 14.6926 19.1784L13.8062 20.0178C12.8498 20.9236 11.4882 21.2611 10.2195 20.907C7.4654 20.1383 4.99608 17.8141 2.78421 13.9831C0.569259 10.1467 -0.207931 6.84222 0.508519 4.07043C0.836389 2.80195 1.80252 1.79656 3.05694 1.41844ZM3.48984 2.85461C2.73719 3.08148 2.15751 3.68472 1.96079 4.44581C1.35814 6.77732 2.047 9.7062 4.08325 13.2331C6.1168 16.7552 8.3057 18.8155 10.6227 19.4622C11.384 19.6747 12.2009 19.4722 12.7748 18.9287L13.6611 18.0893C14.1158 17.6587 14.1817 16.9581 13.8153 16.4503L12.5346 14.6753C12.2215 14.2415 11.667 14.0549 11.1554 14.2114L9.1401 14.8275C7.9704 15.1762 6.9087 14.2347 5.7686 12.26C5.00029 10.9293 4.6422 9.9006 4.73177 9.0987C4.77817 8.68322 4.97174 8.29812 5.27746 8.01303L6.7718 6.61958C7.1632 6.2546 7.2788 5.68096 7.0594 5.19286L6.1577 3.18714C5.90026 2.61449 5.25798 2.32165 4.65684 2.50285L3.48984 2.85461Z" fill="#54C4D2" />
				</svg>
				+569 9820 1126
			</p>
			<p class="flex gap-2 items-center">
				<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3.25 0H16.75C18.483 0 19.8992 1.35645 19.9949 3.06558L20 3.25V12.75C20 14.483 18.6435 15.8992 16.9344 15.9949L16.75 16H3.25C1.51697 16 0.10075 14.6435 0.00514007 12.9344L0 12.75V3.25C0 1.51697 1.35645 0.10075 3.06558 0.00513983L3.25 0ZM18.5 5.373L10.3493 9.6637C10.1619 9.7623 9.9431 9.7764 9.7468 9.706L9.6507 9.6637L1.5 5.374V12.75C1.5 13.6682 2.20711 14.4212 3.10647 14.4942L3.25 14.5H16.75C17.6682 14.5 18.4212 13.7929 18.4942 12.8935L18.5 12.75V5.373ZM16.75 1.5H3.25C2.33183 1.5 1.57881 2.20711 1.5058 3.10647L1.5 3.25V3.679L10 8.1525L18.5 3.678V3.25C18.5 2.33183 17.7929 1.57881 16.8935 1.5058L16.75 1.5Z" fill="#4CAF4F" />
				</svg>
				info@albatrosspa.com
			</p>
		</div>
		<div class="w-fit">
			<nav class="text-white text-[18px]">
				<a class="mb-2" href="/">Home</a>
				<a class="mb-2" href="#nosotros">Nosotros</a>
				<a class="mb-2" href="#servicios">Productos y servicios</a>
				<a href="casosDeExito">Casos de Éxito</a>
			</nav>
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
