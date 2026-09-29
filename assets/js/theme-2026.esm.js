/**
 * ==============================================================================
 * PATRONUSEC THEME 2026 - ECMAScript Interaction Engine
 * ==============================================================================
 * File: assets/js/theme-2026.esm.js
 * Standard: ES6+ Module (Vanilla ECMAScript, Zero jQuery)
 * Performance: 60FPS Hardware Accelerated (GPU), INP & CLS Optimized, WAI-ARIA
 *
 * Modules:
 *  1. initFaqAccordion()           - Accessible WAI-ARIA accordion with keyboard navigation
 *  2. initTestimonialsSlider()     - 60FPS GPU touch & dot-navigated testimonials slider
 *  3. initStartingPointInteraction()- Smooth scroll with visual target highlight
 *  4. initCtaUiFeedback()          - Real-time input validation & Lime focus ring UI
 *  5. initTheme2026()              - Master bootstrap loader
 * ==============================================================================
 */

'use strict';

/**
 * ------------------------------------------------------------------------------
 * Helper Utilities (Performance & DOM Scheduling)
 * ------------------------------------------------------------------------------
 */

/**
 * Batches DOM writes inside a requestAnimationFrame tick to prevent Layout Thrashing.
 * @param {Function} fn - Function executing DOM writes
 */
const batchWrite = (fn) => {
  if (typeof window !== 'undefined' && 'requestAnimationFrame' in window) {
    window.requestAnimationFrame(fn);
  } else {
    fn();
  }
};

/**
 * Debounce utility for non-blocking event handling.
 * @param {Function} fn
 * @param {number} delay
 * @returns {Function}
 */
const debounce = (fn, delay = 250) => {
  let timer = null;
  return (...args) => {
    if (timer) clearTimeout(timer);
    timer = setTimeout(() => fn(...args), delay);
  };
};

/**
 * Injects dynamic fallback CSS rules for animations (e.g. highlight pulse)
 * so interactions work flawlessly even before custom SCSS compiles.
 */
const ensureDynamicInteractionStyles = () => {
  if (typeof document === 'undefined') return;
  const styleId = 'theme-2026-interaction-styles';
  if (document.getElementById(styleId)) return;

  const styleEl = document.createElement('style');
  styleEl.id = styleId;
  styleEl.textContent = `
    @keyframes t26HighlightPulse {
      0% {
        outline: 2px solid rgba(212, 248, 44, 0.95);
        box-shadow: 0 0 28px rgba(212, 248, 44, 0.65), inset 0 0 12px rgba(212, 248, 44, 0.15);
        transform: translateZ(0) scale(1.008);
      }
      50% {
        outline: 2px solid rgba(212, 248, 44, 0.7);
        box-shadow: 0 0 20px rgba(212, 248, 44, 0.45);
        transform: translateZ(0) scale(1.004);
      }
      100% {
        outline: 2px solid transparent;
        box-shadow: 0 0 0 rgba(212, 248, 44, 0);
        transform: translateZ(0) scale(1);
      }
    }
    .t26-highlight-pulse,
    .is-highlighted {
      animation: t26HighlightPulse 2s cubic-bezier(0.16, 1, 0.3, 1) forwards !important;
      will-change: transform, box-shadow, outline;
    }
    .c-testimonials__track {
      display: flex;
      width: 100%;
      will-change: transform;
      transition: transform 450ms cubic-bezier(0.16, 1, 0.3, 1);
    }
    .c-testimonials__slide {
      flex: 0 0 100%;
      width: 100%;
      box-sizing: border-box;
    }
    .c-cta-form__field.is-focused .c-cta-form__input,
    .c-cta-form__field.is-focused .c-cta-form__textarea,
    .c-cta-form__input:focus-visible,
    .c-cta-form__textarea:focus-visible {
      outline: 2px solid var(--t26-color-accent-lime, #D4F82C) !important;
      outline-offset: 1px !important;
      border-color: var(--t26-color-accent-lime, #D4F82C) !important;
      box-shadow: 0 0 0 4px rgba(212, 248, 44, 0.25) !important;
    }
  `;
  document.head.appendChild(styleEl);
};

/**
 * ------------------------------------------------------------------------------
 * 1. FAQ ACCORDION ENGINE (WAI-ARIA & Keyboard Accessible)
 * ------------------------------------------------------------------------------
 * Handles accessible collapsible FAQ accordions:
 * - WAI-ARIA expanded/controls relationships
 * - Click & Keyboard navigation (Enter, Space, Arrow Up/Down, Home, End)
 * - 60FPS CSS Grid/Height expansion without layout thrashing
 */
export function initFaqAccordion() {
  const faqContainers = document.querySelectorAll('.c-faq, [data-accordion="faq"]');
  const standaloneTriggers = document.querySelectorAll('.c-faq__trigger');

  if (!faqContainers.length && !standaloneTriggers.length) return;

  // Process accordions by container for localized focus trapping & sibling coordination
  const containers = faqContainers.length
    ? Array.from(faqContainers)
    : [document.body];

  containers.forEach((container) => {
    const triggers = Array.from(container.querySelectorAll('.c-faq__trigger'));
    if (!triggers.length) return;

    triggers.forEach((trigger, index) => {
      // Ensure trigger has standard button behavior and accessible attributes
      if (trigger.tagName.toLowerCase() !== 'button') {
        trigger.setAttribute('role', 'button');
        trigger.setAttribute('tabindex', '0');
      }

      if (!trigger.hasAttribute('aria-expanded')) {
        const isInitiallyOpen = trigger.classList.contains('is-open');
        trigger.setAttribute('aria-expanded', isInitiallyOpen ? 'true' : 'false');
      }

      // Locate associated panel
      const controlsId = trigger.getAttribute('aria-controls');
      let panel = controlsId ? document.getElementById(controlsId) : null;

      if (!panel) {
        const item = trigger.closest('.c-faq__item') || trigger.parentElement;
        panel = item ? item.querySelector('.c-faq__panel, .c-faq__answer, .c-faq__content') : null;
        if (panel && !panel.id) {
          const generatedId = `faq-panel-${Math.random().toString(36).substr(2, 9)}`;
          panel.id = generatedId;
          trigger.setAttribute('aria-controls', generatedId);
        }
      }

      if (panel) {
        panel.setAttribute('role', 'region');
        if (!panel.hasAttribute('aria-labelledby') && trigger.id) {
          panel.setAttribute('aria-labelledby', trigger.id);
        }
        const isOpen = trigger.getAttribute('aria-expanded') === 'true';
        panel.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
        if (isOpen) {
          panel.classList.add('is-open');
        } else {
          panel.classList.remove('is-open');
        }
      }

      /**
       * Toggles the accordion item state.
       * @param {boolean} [forceState]
       */
      const toggleItem = (forceState) => {
        const isCurrentlyOpen = trigger.getAttribute('aria-expanded') === 'true';
        const willOpen = typeof forceState === 'boolean' ? forceState : !isCurrentlyOpen;

        // If single accordion mode (default within a container), close siblings
        const isSingleMode = container.dataset.allowMultiple !== 'true';
        if (willOpen && isSingleMode) {
          triggers.forEach((siblingTrigger) => {
            if (siblingTrigger !== trigger && siblingTrigger.getAttribute('aria-expanded') === 'true') {
              const siblingControlsId = siblingTrigger.getAttribute('aria-controls');
              const siblingPanel = siblingControlsId
                ? document.getElementById(siblingControlsId)
                : siblingTrigger.closest('.c-faq__item')?.querySelector('.c-faq__panel, .c-faq__answer');

              batchWrite(() => {
                siblingTrigger.setAttribute('aria-expanded', 'false');
                siblingTrigger.classList.remove('is-open');
                siblingTrigger.closest('.c-faq__item')?.classList.remove('is-open');
                if (siblingPanel) {
                  siblingPanel.classList.remove('is-open');
                  siblingPanel.setAttribute('aria-hidden', 'true');
                }
              });
            }
          });
        }

        // Toggle target item
        batchWrite(() => {
          trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
          trigger.classList.toggle('is-open', willOpen);

          const item = trigger.closest('.c-faq__item');
          if (item) {
            item.classList.toggle('is-open', willOpen);
          }

          if (panel) {
            panel.classList.toggle('is-open', willOpen);
            panel.setAttribute('aria-hidden', willOpen ? 'false' : 'true');
          }
        });
      };

      // Click interaction
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        toggleItem();
      });

      // Accessible Keyboard Navigation
      trigger.addEventListener('keydown', (e) => {
        const key = e.key;
        let targetIndex = -1;

        switch (key) {
          case 'Enter':
          case ' ':
            e.preventDefault();
            toggleItem();
            break;

          case 'ArrowDown':
            e.preventDefault();
            targetIndex = (index + 1) % triggers.length;
            triggers[targetIndex].focus();
            break;

          case 'ArrowUp':
            e.preventDefault();
            targetIndex = (index - 1 + triggers.length) % triggers.length;
            triggers[targetIndex].focus();
            break;

          case 'Home':
            e.preventDefault();
            triggers[0].focus();
            break;

          case 'End':
            e.preventDefault();
            triggers[triggers.length - 1].focus();
            break;

          default:
            break;
        }
      });
    });
  });
}

/**
 * ------------------------------------------------------------------------------
 * 2. SWIPER ROTATOR CAROUSELS (Specialists & Testimonials)
 * ------------------------------------------------------------------------------
 * Full 60FPS Swiper.js carousels with:
 * - Mouse drag & touch gesture navigation (grabCursor & simulateTouch)
 * - Dot pagination indicator (.c-specialists__rotator, .c-testimonials__dots)
 * - Zero navigation arrows (clean 1:1 Figma aesthetic)
 */

/**
 * Safely runs a function once Swiper is available.
 * @param {Function} initFn
 */
const runWithSwiper = (initFn) => {
  if (typeof window !== 'undefined' && typeof window.Swiper === 'function') {
    initFn();
  } else if (typeof window !== 'undefined') {
    window.addEventListener('load', () => {
      if (typeof window.Swiper === 'function') {
        initFn();
      }
    }, { once: true });
  }
};

export function initSpecialistsSlider() {
  runWithSwiper(() => {
    const containers = document.querySelectorAll('.c-specialists__quote-container');
    if (!containers.length) return;

    containers.forEach((container) => {
      if (container.dataset.swiperInitialized === 'true') return;
      const sliderEl = container.querySelector('.c-specialists__quote-slider');
      const paginationEl = container.querySelector('.c-specialists__rotator');
      if (!sliderEl) return;

      container.dataset.swiperInitialized = 'true';
      new window.Swiper(sliderEl, {
        speed: 400,
        grabCursor: true,
        simulateTouch: true,
        touchRatio: 1,
        threshold: 5,
        resistance: true,
        resistanceRatio: 0.85,
        navigation: false,
        pagination: {
          el: paginationEl,
          clickable: true,
          bulletClass: 'c-specialists__rotator-dot',
          bulletActiveClass: 'c-specialists__rotator-dot--active',
          renderBullet: (index, className) => {
            return `<button type="button" class="${className}" aria-label="Przejdź do cytatu ${index + 1}"></button>`;
          },
        },
      });
    });
  });
}

export function initTestimonialsSlider() {
  runWithSwiper(() => {
    const containers = document.querySelectorAll('.c-testimonials');
    if (!containers.length) return;

    containers.forEach((container) => {
      if (container.dataset.swiperInitialized === 'true') return;
      const sliderEl = container.querySelector('.c-testimonials__slider');
      const paginationEl = container.querySelector('.c-testimonials__dots');
      if (!sliderEl) return;

      container.dataset.swiperInitialized = 'true';
      new window.Swiper(sliderEl, {
        speed: 400,
        grabCursor: true,
        simulateTouch: true,
        touchRatio: 1,
        threshold: 5,
        resistance: true,
        resistanceRatio: 0.85,
        navigation: false,
        pagination: {
          el: paginationEl,
          clickable: true,
          bulletClass: 'c-testimonials__dot',
          bulletActiveClass: 'c-testimonials__dot--active',
          renderBullet: (index, className) => {
            return `<button type="button" class="${className}" aria-label="Przejdź do opinii ${index + 1}"></button>`;
          },
        },
      });
    });
  });
}

/**
 * ------------------------------------------------------------------------------
 * 3. STARTING POINT INTERACTION ENGINE (Smooth Scroll & Pulse Highlight)
 * ------------------------------------------------------------------------------
 * Handles clicks on interactive tiles in `.c-starting-point`:
 * - Extracts `data-target` selector
 * - Calculates sticky header offset dynamically
 * - Triggers native `window.scrollTo({ behavior: 'smooth' })`
 * - Applies a glowing Lime highlight animation on the target element
 */
export function initStartingPointInteraction() {
  const cards = document.querySelectorAll('.c-starting-point__card[data-target], [data-starting-target]');
  if (!cards.length) return;

  ensureDynamicInteractionStyles();

  /**
   * Calculates top offset accounting for sticky headers
   * @returns {number}
   */
  const getHeaderOffset = () => {
    const header = document.querySelector('header.site-header, .site-header, header.header, #masthead, .navbar');
    if (header) {
      const rect = header.getBoundingClientRect();
      return rect.height > 0 ? rect.height : 80;
    }
    return 80;
  };

  cards.forEach((card) => {
    // Ensure keyboard focusability
    if (!card.hasAttribute('tabindex') && card.tagName.toLowerCase() !== 'a' && card.tagName.toLowerCase() !== 'button') {
      card.setAttribute('tabindex', '0');
      card.setAttribute('role', 'button');
    }

    const handleClickOrKey = (e) => {
      const targetSelector = card.getAttribute('data-target') || card.getAttribute('data-starting-target');
      if (!targetSelector) return;

      let targetEl = null;
      try {
        targetEl = document.querySelector(targetSelector);
      } catch (err) {
        // Fallback if targetSelector is plain ID without '#'
        targetEl = document.getElementById(targetSelector);
      }

      if (!targetEl) return;

      e.preventDefault();

      // Read phase: measure positions
      const headerOffset = getHeaderOffset();
      const elementPosition = targetEl.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = Math.max(0, elementPosition - headerOffset - 24);

      // Smooth scroll
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });

      // Write phase: visual feedback pulse
      batchWrite(() => {
        // Clean any active highlights
        document.querySelectorAll('.t26-highlight-pulse, .is-highlighted').forEach((el) => {
          el.classList.remove('t26-highlight-pulse', 'is-highlighted');
        });

        targetEl.classList.add('t26-highlight-pulse', 'is-highlighted');

        // Accessibility focus
        targetEl.setAttribute('tabindex', '-1');
        targetEl.focus({ preventScroll: true });

        // Clean highlight class after animation duration
        setTimeout(() => {
          targetEl.classList.remove('t26-highlight-pulse', 'is-highlighted');
        }, 2200);
      });
    };

    card.addEventListener('click', handleClickOrKey);

    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        handleClickOrKey(e);
      }
    });
  });
}

/**
 * ------------------------------------------------------------------------------
 * 4. CTA FORM UI FEEDBACK (Live Validation & Lime Focus Ring)
 * ------------------------------------------------------------------------------
 * Handles presentation and real-time validation feedback in CTA section:
 * - Focus & blur ring styling in Lime (#D4F82C)
 * - Real-time client-side validation (Email format, required fields, RODO consent)
 * - Inline feedback messages and accessible ARIA states
 *
 * NOTE: DOES NOT intercept form submission with AJAX or custom backend handler!
 * Only validates UI state and provides interactive user feedback.
 */
export function initCtaUiFeedback() {
  const ctaForms = document.querySelectorAll('.c-cta-form, .c-cta__form, [data-t26-cta-form]');
  if (!ctaForms.length) return;

  ensureDynamicInteractionStyles();

  /**
   * RFC 5322 compliant email validator
   * @param {string} email
   * @returns {boolean}
   */
  const isValidEmail = (email) => {
    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/;
    return emailRegex.test(String(email).trim());
  };

  ctaForms.forEach((form) => {
    // Gather form inputs
    const inputs = Array.from(form.querySelectorAll('input:not([type="hidden"]), textarea, select'));

    inputs.forEach((input) => {
      const fieldWrapper = input.closest('.c-cta-form__field, .c-cta-form__group, .form-group') || input.parentElement;

      // 1. Focus / Blur Lime Accent Ring Handling
      input.addEventListener('focus', () => {
        batchWrite(() => {
          input.classList.add('is-focused');
          if (fieldWrapper) fieldWrapper.classList.add('is-focused');
        });
      });

      input.addEventListener('blur', () => {
        batchWrite(() => {
          input.classList.remove('is-focused');
          if (fieldWrapper) fieldWrapper.classList.remove('is-focused');
        });
        validateField(input, true);
      });

      // 2. Real-time Live Validation on input / change
      const handleInputDebounced = debounce(() => {
        validateField(input, false);
      }, 250);

      input.addEventListener('input', handleInputDebounced);
      input.addEventListener('change', () => validateField(input, true));
    });

    /**
     * Validates a single field and updates UI feedback
     * @param {HTMLElement} field
     * @param {boolean} showImmediateError
     * @returns {boolean}
     */
    const validateField = (field, showImmediateError = true) => {
      const wrapper = field.closest('.c-cta-form__field, .c-cta-form__group, .form-group') || field.parentElement;
      let errorEl = wrapper ? wrapper.querySelector('.c-cta-form__error, .form__error, [data-field-error]') : null;

      let isValid = true;
      let errorMessage = '';

      const isRequired = field.hasAttribute('required') || field.classList.contains('is-required');
      const val = field.value ? field.value.trim() : '';
      const type = field.getAttribute('type') || field.tagName.toLowerCase();
      const name = (field.getAttribute('name') || '').toLowerCase();

      // Checkbox (RODO / Terms Consent)
      if (type === 'checkbox') {
        if (isRequired && !field.checked) {
          isValid = false;
          errorMessage = field.getAttribute('data-error-message') || 'Zgoda jest wymagana do przesłania zapytania.';
        }
      }
      // Email Field
      else if (type === 'email' || name.includes('email')) {
        if (isRequired && !val) {
          isValid = false;
          errorMessage = field.getAttribute('data-error-message') || 'Adres e-mail jest wymagany.';
        } else if (val && !isValidEmail(val)) {
          isValid = false;
          errorMessage = 'Wprowadź poprawny adres e-mail (np. imie@firma.pl).';
        }
      }
      // Required Text or Textarea
      else if (isRequired && !val) {
        isValid = false;
        errorMessage = field.getAttribute('data-error-message') || 'To pole jest wymagane.';
      }
      // Phone Number (optional format check)
      else if (type === 'tel' || name.includes('phone')) {
        if (isRequired && !val) {
          isValid = false;
          errorMessage = 'Numer telefonu jest wymagany.';
        } else if (val && val.replace(/[^\d+]/g, '').length < 7) {
          isValid = false;
          errorMessage = 'Wprowadź prawidłowy numer telefonu.';
        }
      }

      // Update DOM states in requestAnimationFrame
      batchWrite(() => {
        if (isValid) {
          field.classList.remove('is-invalid');
          field.classList.add('is-valid');
          field.setAttribute('aria-invalid', 'false');
          if (wrapper) {
            wrapper.classList.remove('is-invalid');
            wrapper.classList.add('is-valid');
          }
          if (errorEl) {
            errorEl.textContent = '';
            errorEl.style.display = 'none';
          }
        } else if (showImmediateError) {
          field.classList.remove('is-valid');
          field.classList.add('is-invalid');
          field.setAttribute('aria-invalid', 'true');
          if (wrapper) {
            wrapper.classList.remove('is-valid');
            wrapper.classList.add('is-invalid');
          }

          if (!errorEl && wrapper) {
            errorEl = document.createElement('span');
            errorEl.className = 'c-cta-form__error';
            errorEl.setAttribute('role', 'alert');
            errorEl.setAttribute('aria-live', 'polite');
            wrapper.appendChild(errorEl);
          }

          if (errorEl) {
            errorEl.textContent = errorMessage;
            errorEl.style.display = 'block';
          }
        }
      });

      return isValid;
    };

    // Client-side Validation Check on Submit
    // Note: NEVER send AJAX or replace backend submission here!
    form.addEventListener('submit', (e) => {
      let isFormValid = true;
      let firstInvalidField = null;

      inputs.forEach((input) => {
        const isFieldValid = validateField(input, true);
        if (!isFieldValid) {
          isFormValid = false;
          if (!firstInvalidField) firstInvalidField = input;
        }
      });

      if (!isFormValid) {
        // Prevent form submission only if validation failed
        e.preventDefault();
        if (firstInvalidField) {
          firstInvalidField.focus();
        }

        const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
        if (submitBtn) {
          batchWrite(() => {
            submitBtn.classList.add('is-shake');
            setTimeout(() => submitBtn.classList.remove('is-shake'), 600);
          });
        }
      }
      // If valid, native form submission proceeds untouched without AJAX intercept
    });
  });
}

/**
 * ------------------------------------------------------------------------------
 * 5. MASTER BOOTSTRAP: initTheme2026()
 * ------------------------------------------------------------------------------
 * Initializes all Theme 2026 ECMAScript modules safely with error boundaries.
 */
export function initTheme2026() {
  ensureDynamicInteractionStyles();

  const modules = [
    { name: 'FaqAccordion', fn: initFaqAccordion },
    { name: 'SpecialistsSlider', fn: initSpecialistsSlider },
    { name: 'TestimonialsSlider', fn: initTestimonialsSlider },
    { name: 'StartingPointInteraction', fn: initStartingPointInteraction },
    { name: 'CtaUiFeedback', fn: initCtaUiFeedback },
  ];

  modules.forEach(({ name, fn }) => {
    try {
      fn();
    } catch (err) {
      console.warn(`[Theme 2026] Warning initializing ${name}:`, err);
    }
  });
}

// Auto-run when DOM is ready
if (typeof document !== 'undefined') {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => initTheme2026(), { once: true });
  } else {
    initTheme2026();
  }
}

export default initTheme2026;
