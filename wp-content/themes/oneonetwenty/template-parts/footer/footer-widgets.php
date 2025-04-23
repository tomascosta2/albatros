<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

if (is_active_sidebar('sidebar-1')) : ?>

	<!-- Scripts Swiper -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		new Swiper('.swiper', {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
			},
			speed: 800
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
			slidesPerView: 1,
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

	<!-- Contador -->
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const counters = document.querySelectorAll(".numero-animado");

			const options = {
				threshold: 0.5
			};

			const animateCount = (el, target) => {
				let start = 0;
				const duration = 2000;
				const stepTime = Math.abs(Math.floor(duration / target));
				const increment = target / (duration / stepTime);

				const timer = setInterval(() => {
					start += increment;
					if (start >= target) {
						el.textContent = target.toLocaleString();
						clearInterval(timer);
					} else {
						el.textContent = Math.floor(start).toLocaleString();
					}
				}, stepTime);
			};

			const observer = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						const el = entry.target;
						const final = parseInt(el.getAttribute("data-final"));
						animateCount(el, final);
						observer.unobserve(el); // Solo lo anima una vez
					}
				});
			}, options);

			counters.forEach(counter => {
				observer.observe(counter);
			});
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
			cursor: pointer;
		}
		.al-btn:hover {
			scale: 105%;
			transition: all 0.2s ease;
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
			line-height: 110%;
		}

		.al-title span {
			position: relative;
			z-index: 50;
			line-height: 110%;
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
			transition: all 0.3s ease;
		}

		.al-title.--double-line {
			max-width: 220px;
			text-align: start;
			line-height: 31px;
		}

		.al-title.--green::before {
			background-color: #4CAF4F;
		}
		section:hover .al-title::before {
			width: 100px;
			height: 100px;
			top: calc(50% - 50px);
			left: -25px;
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

		/* Listas */
		.RichTextList-bulleted {
			list-style: disc;
			list-style-position: inside;
		}
		.RichTextList-bulleted li {
			display: flex;
			gap: 8px;
			margin-bottom: 16px;
		}
	</style>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<?php
endif;
