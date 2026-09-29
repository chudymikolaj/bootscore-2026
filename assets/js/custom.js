document.addEventListener("DOMContentLoaded", function () {
	var swiper = new Swiper(".opinionCarouselModule-swiper", {
		slidesPerView: 1,
		spaceBetween: 30,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});

	/** ---------------------------------------------------------------------------------------------
	 * Contact Form
	 * --------------------------------------------------------------------------------------------- */
	let contactForm = {
		sendForm(fields) {
			let result = "";

			fetch(localData.ajaxURL, {
				method: "POST",
				credentials: "same-origin",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
					"Cache-Control": "no-cache",
					"Access-Control-Allow-Origin": "*",
				},
				body: new URLSearchParams({
					action: "contact_form_send_email",
					email: fields.email,
					phone: fields.phone,
					message: fields.message,
				}),
			})
				.then((response) => {
					this.showThankYou();
					this.removeForm();
				})
				.catch((err) => {
					console.log(err);
				});

			return result;
		},
		getForm() {
			return document.querySelector("#contact-form");
		},
		removeForm() {
			document.querySelector("#contact-form").remove();
		},
		showThankYou() {
			document.querySelector("#contact .form__thank-you").style.display = "block";
		},
	};

	if (contactForm.getForm()) {
		contactForm.getForm().addEventListener("submit", (e) => onSubmitContactForm(e));
	}

	function onSubmitContactForm(e) {
		e.preventDefault();
		let validationSuccess = true;

		let fields = {
			email: document.querySelector("#contact-form #contact-form-email"),
			phone: document.querySelector("#contact-form #contact-form-phone"),
			message: document.querySelector("#contact-form #contact-form-message"),
		};

		// let rodoCheckbox = document.querySelector("#contact-form #all-approval");
		// let rodoFormApprovalError = document.querySelector("#contact-form .form_approval__error");

		for (let key in fields) {
			if (fields[key].value === "") {
				fields[key].parentElement.classList.add("form__field--required");
				if (fields[key].parentElement.querySelector(".form__error") === null) {
					fields[key].parentElement.innerHTML +=
						'<span class="form__error">' + fields[key].getAttribute("data-error-message") + "</span>";
				}
				validationSuccess = false;
			} else {
				if (fields[key].parentElement.classList.contains("form__field--required")) {
					fields[key].parentElement.classList.remove("form__field--required");
				}

				if (fields[key].parentElement.querySelector(".form__error")) {
					fields[key].parentElement.querySelector(".form__error").remove();
				}
			}
		}

		// if (!rodoCheckbox.checked) {
		// 	rodoCheckbox.parentElement.classList.add("form__checkbox--required");
		// 	rodoFormApprovalError.classList.add("form_approval__error--required");
		// 	validationSuccess = false;
		// } else {
		// 	rodoCheckbox.parentElement.classList.remove("form__checkbox--required");
		// 	rodoFormApprovalError.classList.remove("form_approval__error--required");
		// }

		if (!window.lintrk) {
			validationSuccess = false;
		}

		if (validationSuccess) {
			let fieldsValue = {
				email: fields.email.value,
				phone: fields.phone.value,
				message: fields.message.value,
			};

			window.lintrk("track", { conversion_id: 21138161 });
			contactForm.sendForm(fieldsValue);
		}
	}

	/** ---------------------------------------------------------------------------------------------
	 * Newsletter Form
	 * --------------------------------------------------------------------------------------------- */
	let newsletterForm = {
		sendForm(fields) {
			let result = "";

			fetch(localData.ajaxURL, {
				method: "POST",
				credentials: "same-origin",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
					"Cache-Control": "no-cache",
					"Access-Control-Allow-Origin": "*",
				},
				body: new URLSearchParams({
					action: "sign_up_newsletter",
					name: fields.name,
					email: fields.email,
				}),
			})
				.then((response) => {
					this.showThankYou();
					this.removeForm();
				})
				.catch((err) => {
					console.log(err);
				});

			return result;
		},
		getForm() {
			return document.querySelector("#newsletter-form");
		},
		removeForm() {
			document.querySelector("#newsletter-form").remove();
		},
		showThankYou() {
			document.querySelector("#newsletter .form__thank-you").style.display = "block";
		},
	};

	if (newsletterForm.getForm()) {
		newsletterForm.getForm().addEventListener("submit", (e) => onSubmitNewsletterForm(e));
	}

	function onSubmitNewsletterForm(e) {
		e.preventDefault();
		let validationSuccess = true;

		let fields = {
			name: document.querySelector("#newsletter-form #newsletter-form-name"),
			email: document.querySelector("#newsletter-form #newsletter-form-email"),
		};

		let rodoCheckbox = document.querySelector("#newsletter-form #all-approval");

		for (let key in fields) {
			if (fields[key].value === "") {
				fields[key].parentElement.classList.add("form__field--required");
				if (fields[key].parentElement.querySelector(".form__error") === null) {
					fields[key].parentElement.innerHTML +=
						'<span class="form__error">' + fields[key].getAttribute("data-error-message") + "</span>";
				}
				validationSuccess = false;
			} else {
				if (fields[key].parentElement.classList.contains("form__field--required")) {
					fields[key].parentElement.classList.remove("form__field--required");
				}

				if (fields[key].parentElement.querySelector(".form__error")) {
					fields[key].parentElement.querySelector(".form__error").remove();
				}
			}
		}

		if (!rodoCheckbox.checked) {
			rodoCheckbox.parentElement.classList.add("form__checkbox--required");
			validationSuccess = false;
		} else {
			rodoCheckbox.parentElement.classList.remove("form__checkbox--required");
		}

		if (validationSuccess) {
			let fieldsValue = {
				name: fields.name.value,
				email: fields.email.value,
			};

			newsletterForm.sendForm(fieldsValue);
		}
	}
});
