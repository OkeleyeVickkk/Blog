import { showToast, addClass, removeClass, falsies } from "./utils.custom.js";
(function () {
	// @ts-check
	"use-strict";

	const LOADING_STATUS = "isLoading";
	const ERROR = "error";
	const SUCCESS = "success";
	const BASE_URL = "http://localhost/project-blog/public";

	function initPasswordToggler() {
		const allPasswordToggler = document.querySelectorAll("button[data-password]");
		if (!allPasswordToggler.length) return;
		allPasswordToggler.forEach((toggler) => {
			toggler.addEventListener("click", function () {
				const elem = this;
				const attr = elem.getAttribute("data-password");
				const inputFromAttr = document.querySelector(`input[data-password=${attr}]`);
				if (falsies.includes(inputFromAttr) || falsies.includes(attr?.trim())) {
					alert("What you toggled does not have a target input");
					return;
				}
				const input = document.querySelector(`input[data-password=${attr}]`);

				if (input.type === "text") {
					input.type = "password";
					elem.innerHTML = "Show";
				} else {
					elem.innerHTML = "Hide";
					input.type = "text";
				}
			});
		});
	}

	function authenticateLogin() {
		const submitBtn = document.getElementById("login");
		if (!submitBtn) return;

		submitBtn.addEventListener("click", async function (e) {
			e.preventDefault();
			const target = this;
			addClass(target, LOADING_STATUS);
			let email = document.getElementById("email");
			let password = document.getElementById("password");
			if (!email || !password) {
				removeClass(target, LOADING_STATUS);
				return;
			}
			const dataObj = {
				email: email.value.trim(),
				password: password.value.trim(),
			};
			for (item in dataObj) {
				if (dataObj[item] === "") {
					switch (item) {
						case "email":
							showToast("Enter email address", ERROR);
							break;
						case "password":
							showToast("You didn't enter a password", ERROR);
							break;
						default:
							showToast(`${item} required`, ERROR);
							break;
					}
					removeClass(target, LOADING_STATUS);
					return;
				}
			}

			const url = `${BASE_URL}/login`;
			const options = {
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify(dataObj),
			};
			try {
				addClass(target, LOADING_STATUS);
				const response = await fetch(url, options);
				if (!response.ok) {
					removeClass(target, LOADING_STATUS);
					throw new Error("Error occured, try again!");
				}
				const result = await response.json();
				if (result && result.status === true) {
					showToast(result.message, SUCCESS);
					setTimeout(() => window.location.replace(`${BASE_URL}/dashboard/`), 2000);
				} else {
					throw new Error(result.message);
				}
			} catch (error) {
				removeClass(target, LOADING_STATUS);
				showToast(error, ERROR);
			}
		});
	}

	function authenticateRegistration() {
		const submitBtn = document.getElementById("register");
		if (!submitBtn) return;

		submitBtn.addEventListener("click", async function (e) {
			e.preventDefault();
			const target = this;
			addClass(target, LOADING_STATUS);
			let email = document.getElementById("email");
			let fullname = document.getElementById("fullname");
			let password = document.getElementById("password");
			if (!email || !password || !fullname) {
				removeClass(target, LOADING_STATUS);
				return;
			}

			const dataObj = {
				fullname: fullname.value.trim(),
				email: email.value.trim(),
				password: password.value.trim(),
			};

			for (item in dataObj) {
				if (dataObj[item] === "") {
					switch (item) {
						case "fullname":
							showToast("Enter fullname", ERROR);
							break;
						case "email":
							showToast("Enter email address", ERROR);
							break;
						case "password":
							showToast("You didn't enter a password", ERROR);
							break;
						default:
							showToast(`Please enter ${item}`, ERROR);
							break;
					}
					removeClass(target, LOADING_STATUS);
					return;
				}
			}

			const url = `${BASE_URL}/register.php`;

			const options = {
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify(dataObj),
			};
			try {
				addClass(target, LOADING_STATUS);
				const response = await fetch(url, options);
				if (!response.ok) {
					removeClass(target, LOADING_STATUS);
					throw new Error("Error occured, try again!");
				}
				const result = await response.json();
				if (result && result.status === true) {
					showToast(result.message, SUCCESS);
					setTimeout(() => {
						window.location.replace(`${BASE_URL}/login`);
					}, 2000);
				} else {
					throw new Error(result.message);
				}
			} catch (error) {
				removeClass(target, LOADING_STATUS);
				showToast(error, ERROR);
			}
		});
	}

	(function () {
		initPasswordToggler();
		authenticateRegistration();
		authenticateLogin();
	})();
})();
