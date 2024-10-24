export const falsies = ["", null, undefined, 0, false, [], {}];
export const BASE_URL = "http://localhost/project-blog/public";

export const createElement = function (element) {
	if (!element) return;
	let eleToCreate = document.createElement(element);
	if (eleToCreate.nodeType !== Node.ELEMENT_NODE) return [null, ERROR];
	return [eleToCreate, null];
};

export function setLoadStatus(target, textToSet, isLoading = false) {
	const SPINNER = `<span class="v-btn-loader d-flex align-items-center justify-content-center mx-auto"></span>`;
	if (!target) return;
	isLoading
		? ((target.innerHTML = SPINNER), target.setAttribute("disabled", true))
		: ((target.innerHTML = textToSet), target.removeAttribute("disabled"));
}

export const showToast = function (toastMessage, toastStatus = "") {
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

export function removeClass(element, state = "active") {
	if (!element) return;
	element.classList.remove(state);
}

export function addClass(element, state = "active") {
	if (element) {
		element.classList.add(state);
	}
}

export function checkLength(elementArray) {
	if (elementArray && elementArray.length) return true;
}

export function callDomEle(target, parentElem, isTargetMoreThanOne = false) {
	if (!target) return null;
	parentElem = parentElem || document;
	const queryMethod = isTargetMoreThanOne ? "querySelectorAll" : "querySelector";
	const elem = parentElem[queryMethod](target);

	return elem || null;
}
