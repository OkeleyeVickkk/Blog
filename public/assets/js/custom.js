(function () {
	"use-strict";

	const falsies = ["", null, undefined, 0, false, [], {}];
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

	(function () {
		initPasswordToggler();
	})();
})();
