/**
 * Australian Property Stars theme scripts.
 */

/* ==================================================
   MOBILE NAVIGATION
================================================== */

const initMobileNavigation = () => {
	const navToggle =
		document.querySelector('.nav-toggle');

	const navigation =
		document.querySelector(
			'.primary-navigation'
		);

	const closeButton =
		navigation?.querySelector(
			'.primary-navigation__close'
		);

	const backdrop =
		document.querySelector('.nav-backdrop');

	if (
		!navToggle ||
		!navigation ||
		!closeButton ||
		!backdrop
	) {
		return;
	}

	const mobileNavigation = window.matchMedia(
		'(max-width: 79.9375rem)'
	);

	const isOpen = () =>
		navigation.classList.contains('is-open');

	const setNavigationState = () => {
		if (mobileNavigation.matches) {
			if (!isOpen()) {
				navigation.setAttribute(
					'aria-hidden',
					'true'
				);
			}

			return;
		}

		navigation.removeAttribute('aria-hidden');
		navigation.classList.remove('is-open');
		backdrop.classList.remove('is-visible');
		document.body.classList.remove('nav-open');

		navToggle.setAttribute(
			'aria-expanded',
			'false'
		);

		navToggle.setAttribute(
			'aria-label',
			'Open navigation'
		);
	};

	const openNavigation = () => {
		if (!mobileNavigation.matches) {
			return;
		}

		navigation.classList.add('is-open');
		backdrop.classList.add('is-visible');
		document.body.classList.add('nav-open');

		navigation.setAttribute(
			'aria-hidden',
			'false'
		);

		navToggle.setAttribute(
			'aria-expanded',
			'true'
		);

		navToggle.setAttribute(
			'aria-label',
			'Close navigation'
		);

		window.setTimeout(() => {
			closeButton.focus();
		}, 100);
	};

	const closeNavigation = (
		returnFocus = false
	) => {
		navigation.classList.remove('is-open');
		backdrop.classList.remove('is-visible');
		document.body.classList.remove('nav-open');

		navToggle.setAttribute(
			'aria-expanded',
			'false'
		);

		navToggle.setAttribute(
			'aria-label',
			'Open navigation'
		);

		if (mobileNavigation.matches) {
			navigation.setAttribute(
				'aria-hidden',
				'true'
			);
		} else {
			navigation.removeAttribute(
				'aria-hidden'
			);
		}

		if (returnFocus) {
			navToggle.focus();
		}
	};

	const toggleNavigation = () => {
		if (isOpen()) {
			closeNavigation();
			return;
		}

		openNavigation();
	};

	navToggle.addEventListener(
		'click',
		toggleNavigation
	);

	closeButton.addEventListener(
		'click',
		() => {
			closeNavigation(true);
		}
	);

	backdrop.addEventListener(
		'click',
		() => {
			closeNavigation(true);
		}
	);

	navigation.addEventListener(
		'click',
		(event) => {
			if (
				mobileNavigation.matches &&
				event.target.closest('a')
			) {
				closeNavigation();
			}
		}
	);

	document.addEventListener(
		'keydown',
		(event) => {
			if (
				event.key === 'Escape' &&
				isOpen()
			) {
				closeNavigation(true);
			}
		}
	);

	mobileNavigation.addEventListener(
		'change',
		setNavigationState
	);

	setNavigationState();
};

/* ==================================================
   FAQ ACCORDION
================================================== */

const initFaqAccordion = () => {
	const faqButtons =
		document.querySelectorAll(
			'.faq-question'
		);

	faqButtons.forEach((button) => {
		button.addEventListener(
			'click',
			() => {
				const faqItem =
					button.closest('.faq-item');

				const answer =
					faqItem?.querySelector(
						'.faq-answer'
					);

				if (!answer) {
					return;
				}

				const isOpen =
					button.getAttribute(
						'aria-expanded'
					) === 'true';

				button.setAttribute(
					'aria-expanded',
					String(!isOpen)
				);

				answer.hidden = isOpen;

				faqItem?.classList.toggle(
					'is-open',
					!isOpen
				);
			}
		);
	});
};

/* ==================================================
   TESTIMONIALS SLIDER
================================================== */

const initTestimonialsSliders = () => {
	const sliders =
		document.querySelectorAll(
			'[data-testimonials-slider]'
		);

	sliders.forEach((slider) => {
		const section =
			slider.closest('.testimonials');

		const viewport =
			slider.querySelector(
				'[data-slider-viewport]'
			);

		const track =
			slider.querySelector(
				'[data-slider-track]'
			);

		const previousButton =
			slider.querySelector(
				'[data-slider-prev]'
			);

		const nextButton =
			slider.querySelector(
				'[data-slider-next]'
			);

		const dotsContainer =
			section?.querySelector(
				'[data-slider-dots]'
			);

		const slides = track
			? Array.from(track.children)
			: [];

		if (
			!viewport ||
			!track ||
			!previousButton ||
			!nextButton ||
			!dotsContainer ||
			!slides.length
		) {
			return;
		}

		let currentIndex = 0;
		let maximumIndex = 0;
		let resizeTimer;
		let pointerStartX = 0;
		let pointerStartY = 0;
		let activePointerId = null;

		const getSlidesPerView = () => {
			if (window.innerWidth <= 640) {
				return 1;
			}

			if (window.innerWidth <= 1024) {
				return 2;
			}

			return 3;
		};

		const getSlideStep = () => {
			const styles =
				window.getComputedStyle(track);

			const gap =
				Number.parseFloat(
					styles.columnGap
				) ||
				Number.parseFloat(
					styles.gap
				) ||
				0;

			return (
				slides[0]
					.getBoundingClientRect()
					.width +
				gap
			);
		};

		const updateDots = () => {
			const dots =
				dotsContainer.querySelectorAll(
					'.testimonials-slider__dot'
				);

			dots.forEach(
				(dot, index) => {
					const active =
						index === currentIndex;

					dot.classList.toggle(
						'is-active',
						active
					);

					if (active) {
						dot.setAttribute(
							'aria-current',
							'true'
						);
					} else {
						dot.removeAttribute(
							'aria-current'
						);
					}
				}
			);
		};

		const updateButtons = () => {
			previousButton.disabled =
				currentIndex === 0;

			nextButton.disabled =
				currentIndex === maximumIndex;
		};

		const updateSlider = () => {
			const offset =
				currentIndex *
				getSlideStep();

			track.style.transform =
				`translate3d(-${offset}px, 0, 0)`;

			updateDots();
			updateButtons();
		};

		const createDots = () => {
			dotsContainer.innerHTML = '';

			for (
				let index = 0;
				index <= maximumIndex;
				index += 1
			) {
				const dot =
					document.createElement(
						'button'
					);

				dot.type = 'button';

				dot.className =
					'testimonials-slider__dot';

				dot.setAttribute(
					'aria-label',
					`Show testimonial group ${index + 1}`
				);

				dot.addEventListener(
					'click',
					() => {
						currentIndex = index;
						updateSlider();
					}
				);

				dotsContainer.appendChild(
					dot
				);
			}
		};

		const recalculateSlider = () => {
			const slidesPerView =
				getSlidesPerView();

			maximumIndex = Math.max(
				0,
				slides.length -
					slidesPerView
			);

			currentIndex = Math.min(
				currentIndex,
				maximumIndex
			);

			createDots();

			window.requestAnimationFrame(
				updateSlider
			);
		};

		previousButton.addEventListener(
			'click',
			() => {
				if (currentIndex === 0) {
					return;
				}

				currentIndex -= 1;
				updateSlider();
			}
		);

		nextButton.addEventListener(
			'click',
			() => {
				if (
					currentIndex ===
					maximumIndex
				) {
					return;
				}

				currentIndex += 1;
				updateSlider();
			}
		);

		viewport.addEventListener(
	'pointerdown',
	(event) => {
		// Keep normal mouse behaviour on laptops/desktops.
		if (event.pointerType === 'mouse') {
			return;
		}

		activePointerId = event.pointerId;
		pointerStartX = event.clientX;
		pointerStartY = event.clientY;

		viewport.setPointerCapture(
			event.pointerId
		);
	}
);

	viewport.addEventListener(
		'pointerup',
		(event) => {
			if (
				event.pointerId !==
				activePointerId
			) {
				return;
			}

			const distanceX =
				event.clientX -
				pointerStartX;

			const distanceY =
				event.clientY -
				pointerStartY;

			const threshold = Math.min(
				60,
				viewport.clientWidth * 0.15
			);

			// Ignore taps and mostly vertical gestures.
			if (
				Math.abs(distanceX) <
					threshold ||
				Math.abs(distanceX) <=
					Math.abs(distanceY)
			) {
				activePointerId = null;
				return;
			}

			// Swipe left → next review.
			if (
				distanceX < 0 &&
				currentIndex < maximumIndex
			) {
				currentIndex += 1;
				updateSlider();
			}

			// Swipe right → previous review.
			if (
				distanceX > 0 &&
				currentIndex > 0
			) {
				currentIndex -= 1;
				updateSlider();
			}

			activePointerId = null;
		}
	);

	viewport.addEventListener(
		'pointercancel',
		() => {
			activePointerId = null;
		}
	);

			window.addEventListener(
				'resize',
				() => {
					window.clearTimeout(
						resizeTimer
					);

					resizeTimer =
						window.setTimeout(
							recalculateSlider,
							150
						);
				}
			);

			recalculateSlider();
		});
	};

/* ==================================================
   INITIALIZE
================================================== */

const initThemeScripts = () => {
	initMobileNavigation();
	initFaqAccordion();
	initTestimonialsSliders();
};

if (document.readyState === 'loading') {
	document.addEventListener(
		'DOMContentLoaded',
		initThemeScripts
	);
} else {
	initThemeScripts();
}