(function () {
	// @ts-check
	"use-strict";

	const falsies = ["", null, undefined, 0, false, [], {}];
	const LOADING_STATUS = "isLoading";
	const ERROR = "error";
	const SUCCESS = "SUCCESS";

	const createElement = function (element) {
		if (!element) return;
		let eleToCreate = document.createElement(element);
		if (eleToCreate.nodeType !== Node.ELEMENT_NODE) return [null, ERROR];
		return [eleToCreate, null];
	};

	const addClass = (element, className) => {
		if (!element) return;
		element.classList.add(className);
	};
	const removeClass = (element, className) => {
		if (!element) return;
		element.classList.remove(className);
	};

	const showToast = function (toastMessage, toastStatus = "") {
		const [button, error] = createElement("button");
		if (error !== null || !button) return alert("Omo code don break somewhere");
		button.setAttribute("type", "button");
		button.setAttribute("id", "liveToastBtn");
		document.body.appendChild(button);
		const toast = document.getElementById("liveToast");
		const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
		toast.querySelector(".toast-body").innerHTML = `${toastMessage} `;
		switch (toastStatus.toLowerCase()) {
			case "success":
				toast.setAttribute("data-status", "success");
				break;
			case "failed":
			case "error":
				toast.setAttribute("data-status", "failed");
				break;
			default:
				toast.removeAttribute("data-status");
				break;
		}
		button.addEventListener("click", () => {
			toastBootstrap.show();
		});

		button.click();
		button.remove();
	};

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

	function authenticateRegistration() {
		const submitBtn = document.getElementById("register");
		if (!submitBtn) return;
		const url = "http://localhost/project-blog/public/register.php";

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
					throw new Error("Failed status");
				}
				const result = await response.json();
				if (result && result.status === true) {
					showToast(SUCCESS, result.message);
					window.location.href = "http://localhost/project-blog/public/login.php";
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
	})();
})();
