/**
 * Mobile slide-out navigation.
 */
const initMobileNavigation = () => {
	const navToggle = document.querySelector('.nav-toggle');
	const navigation = document.querySelector(
		'.primary-navigation'
	);
	const closeButton = navigation?.querySelector(
		'.primary-navigation__close'
	);
	const backdrop = document.querySelector('.nav-backdrop');

	if (
		!navToggle ||
		!navigation ||
		!closeButton ||
		!backdrop
	) {
		return;
	}

	const mobileBreakpoint = window.matchMedia(
		'(max-width: 56rem)'
	);

	const focusableSelector = [
		'a[href]',
		'button:not([disabled])',
		'[tabindex]:not([tabindex="-1"])',
	].join(',');

	const isNavigationOpen = () =>
		navigation.classList.contains('is-open');

	const openNavigation = () => {
		navigation.classList.add('is-open');
		backdrop.classList.add('is-visible');
		document.body.classList.add('nav-open');

		navToggle.setAttribute('aria-expanded', 'true');
		navToggle.setAttribute(
			'aria-label',
			'Close navigation'
		);

		navigation.setAttribute('aria-hidden', 'false');

		window.setTimeout(() => {
			closeButton.focus();
		}, 100);
	};

	const closeNavigation = (returnFocus = false) => {
		navigation.classList.remove('is-open');
		backdrop.classList.remove('is-visible');
		document.body.classList.remove('nav-open');

		navToggle.setAttribute('aria-expanded', 'false');
		navToggle.setAttribute(
			'aria-label',
			'Open navigation'
		);

		if (mobileBreakpoint.matches) {
			navigation.setAttribute('aria-hidden', 'true');
		} else {
			navigation.removeAttribute('aria-hidden');
		}

		if (returnFocus) {
			navToggle.focus();
		}
	};

	const toggleNavigation = () => {
		if (isNavigationOpen()) {
			closeNavigation();
			return;
		}

		openNavigation();
	};

	const trapFocus = (event) => {
		if (
			event.key !== 'Tab' ||
			!isNavigationOpen()
		) {
			return;
		}

		const focusableElements = Array.from(
			navigation.querySelectorAll(focusableSelector)
		).filter((element) => element.offsetParent !== null);

		if (!focusableElements.length) {
			return;
		}

		const firstElement = focusableElements[0];
		const lastElement =
			focusableElements[focusableElements.length - 1];

		if (
			event.shiftKey &&
			document.activeElement === firstElement
		) {
			event.preventDefault();
			lastElement.focus();
			return;
		}

		if (
			!event.shiftKey &&
			document.activeElement === lastElement
		) {
			event.preventDefault();
			firstElement.focus();
		}
	};

	const handleBreakpointChange = () => {
		closeNavigation();

		if (mobileBreakpoint.matches) {
			navigation.setAttribute('aria-hidden', 'true');
		} else {
			navigation.removeAttribute('aria-hidden');
		}
	};

	navToggle.addEventListener('click', toggleNavigation);

	closeButton.addEventListener('click', () => {
		closeNavigation(true);
	});

	backdrop.addEventListener('click', () => {
		closeNavigation(true);
	});

	navigation.addEventListener('click', (event) => {
		if (
			mobileBreakpoint.matches &&
			event.target.closest('a')
		) {
			closeNavigation();
		}
	});

	document.addEventListener('keydown', (event) => {
		if (
			event.key === 'Escape' &&
			isNavigationOpen()
		) {
			closeNavigation(true);
			return;
		}

		trapFocus(event);
	});

	mobileBreakpoint.addEventListener(
		'change',
		handleBreakpointChange
	);

	handleBreakpointChange();
};

/**
 * FAQ accordion.
 */
const initFaqAccordion = () => {
	const faqButtons = document.querySelectorAll(
		'.faq-question'
	);

	faqButtons.forEach((button) => {
		button.addEventListener('click', () => {
			const faqItem = button.closest('.faq-item');
			const answer = faqItem?.querySelector(
				'.faq-answer'
			);

			if (!answer) {
				return;
			}

			const isOpen =
				button.getAttribute('aria-expanded') === 'true';

			button.setAttribute(
				'aria-expanded',
				String(!isOpen)
			);

			answer.hidden = isOpen;
			faqItem?.classList.toggle('is-open', !isOpen);
		});
	});
};

/**
 * Testimonials sliders.
 */
const initTestimonialsSliders = () => {
	const sliders = document.querySelectorAll(
		'[data-testimonials-slider]'
	);

	sliders.forEach((slider) => {
		const section = slider.closest('.testimonials');

		const viewport = slider.querySelector(
			'[data-slider-viewport]'
		);

		const track = slider.querySelector(
			'[data-slider-track]'
		);

		const previousButton = slider.querySelector(
			'[data-slider-prev]'
		);

		const nextButton = slider.querySelector(
			'[data-slider-next]'
		);

		const dotsContainer = section?.querySelector(
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
			console.warn(
				'Testimonials slider markup is incomplete.',
				slider
			);

			return;
		}

		let currentIndex = 0;
		let slidesPerView = 1;
		let maximumIndex = 0;
		let resizeTimer;

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
			const trackStyles =
				window.getComputedStyle(track);

			const gap =
				Number.parseFloat(
					trackStyles.columnGap
				) ||
				Number.parseFloat(
					trackStyles.gap
				) ||
				0;

			return (
				slides[0].getBoundingClientRect().width +
				gap
			);
		};

		const updateDots = () => {
			const dots = dotsContainer.querySelectorAll(
				'.testimonials-slider__dot'
			);

			dots.forEach((dot, index) => {
				const isActive = index === currentIndex;

				dot.classList.toggle(
					'is-active',
					isActive
				);

				if (isActive) {
					dot.setAttribute(
						'aria-current',
						'true'
					);
				} else {
					dot.removeAttribute('aria-current');
				}
			});
		};

		const updateButtons = () => {
			previousButton.disabled =
				currentIndex === 0;

			nextButton.disabled =
				currentIndex === maximumIndex;
		};

		const updateSlider = () => {
			const offset =
				currentIndex * getSlideStep();

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
					document.createElement('button');

				dot.type = 'button';
				dot.className =
					'testimonials-slider__dot';

				dot.setAttribute(
					'aria-label',
					`Show testimonial group ${index + 1}`
				);

				dot.addEventListener('click', () => {
					currentIndex = index;
					updateSlider();
				});

				dotsContainer.appendChild(dot);
			}
		};

		const recalculateSlider = () => {
			slidesPerView = getSlidesPerView();

			maximumIndex = Math.max(
				0,
				slides.length - slidesPerView
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
				if (currentIndex === maximumIndex) {
					return;
				}

				currentIndex += 1;
				updateSlider();
			}
		);

		window.addEventListener('resize', () => {
			window.clearTimeout(resizeTimer);

			resizeTimer = window.setTimeout(
				recalculateSlider,
				150
			);
		});

		recalculateSlider();
	});
};

/**
 * Initialize theme scripts.
 */
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