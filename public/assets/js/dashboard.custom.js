import {
	addClass,
	reloadPage,
	BASE_URL,
	removeClass,
	checkLength,
	callDomEle,
	falsies,
	showToast,
	setLoadStatus,
} from "./utils.custom.js?ver=0.000000000004";

const sidebarLinksWithDropdown = document.querySelectorAll(".v-main-link-container:has(.v-is-dropdown) .v-sidebar-link");
const backdrop = document.querySelector(".v-right-nav #v-backdrop");
const allTogglers = document.querySelectorAll("[data-target]");
const allToggleReceivers = document.querySelectorAll("[data-receiver]");
const allNotifTabs = document.querySelectorAll(".v-noti-dropdown [data-target]");
const mobileMenuToggler = document.querySelector(".v-right-nav .v-mobile-menu-toggler");
const sideBar = document.querySelector(".v-menu-sidebar");
const allTabsAndPillsButtonsTogglers = document.querySelectorAll(".v-menu-sidebar .nav-pills [data-bs-toggle='pill']");
const goBackToggler = document.querySelector("#v-main .v-go-back");
const dropdownTogglers = document.querySelectorAll("[data-v-target]");
const all4DigitsInputContainers = document.querySelectorAll(".v-grid-inputs-container .v-grid-inputs-wrapper");

const VISIBLE_EYE = `
	<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
		<rect width="24" height="24" fill="none" />
		<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
			<path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
			<path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
		</g>
	</svg>
`;

const INVISIBLE_EYE = `
<svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
	<rect width="24" height="24" fill="none" />
	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<path d="M6.873 17.129c-1.845-1.31-3.305-3.014-4.13-4.09a1.69 1.69 0 0 1 0-2.077C4.236 9.013 7.818 5 12 5c1.876 0 3.63.807 5.13 1.874" />
		<path d="M14.13 9.887a3 3 0 1 0-4.243 4.242M4 20L20 4M10 18.704A7.1 7.1 0 0 0 12 19c4.182 0 7.764-4.013 9.257-5.962a1.694 1.694 0 0 0-.001-2.078A23 23 0 0 0 19.57 9" />
	</g>
</svg>
`;

if (goBackToggler) {
	goBackToggler.addEventListener("click", () => window.history.back());
}

function handleDropdownToggle(e) {
	e.stopPropagation();
	const target = this.getAttribute("data-v-target");
	if (!target) return;
	const dropdowns = document.querySelectorAll(`[data-v-receiver]`);
	dropdowns.forEach((currentDropdown) => {
		const attr = currentDropdown.getAttribute("data-v-receiver");
		if (attr === target) {
			if (currentDropdown.classList.contains("active")) removeClass(currentDropdown, "active");
			else addClass(currentDropdown, "active");
		} else removeClass(currentDropdown, "active");
	});
}

function checkIfEleHasClassList(element) {
	if (element && element.classList.contains("active")) return true;
}

if (checkLength(document.querySelectorAll("[data-v-receiver]"))) {
	document.querySelectorAll("[data-v-receiver]").forEach((dropdown) => {
		const dropdownAttr = dropdown.getAttribute("data-v-receiver");
		const dropdownToggler = document.querySelector(`[data-v-target='${dropdownAttr}']`);
		const childrenButtons = dropdown.querySelectorAll("button");
		const childrenLiTags = dropdown.querySelectorAll("li");
		if (checkLength(childrenButtons) || checkLength(childrenLiTags)) {
			const arrayOfChildren = childrenButtons || childrenLiTags;
			arrayOfChildren.forEach((child) => {
				child.addEventListener("click", function () {
					(checkIfEleHasClassList(dropdown) || checkIfEleHasClassList(dropdownToggler)) && (removeClass(dropdown), removeClass(dropdownToggler));
				});
			});
		}
	});
}

if (checkLength(dropdownTogglers)) {
	dropdownTogglers.forEach((toggler) => toggler.addEventListener("click", handleDropdownToggle));
}

function closeSideBarIfOpen() {
	if (!sideBar?.classList.contains("active")) return;
	removeClass(mobileMenuToggler, "active");
	removeClass(sideBar, "active");
}

if (checkLength(allTabsAndPillsButtonsTogglers)) {
	allTabsAndPillsButtonsTogglers.forEach((pill) => pill.addEventListener("click", closeSideBarIfOpen));
}

if (mobileMenuToggler) {
	mobileMenuToggler.addEventListener("click", function (e) {
		let self = this;
		e.stopPropagation();
		sideBar && sideBar.classList.contains("active")
			? (removeClass(self, "active"), removeClass(sideBar, "active"))
			: (addClass(self, "active"), addClass(sideBar, "active"));
	});
}

const handleGeneralOutsideClick = () => {
	document.addEventListener("click", (e) => {
		e.stopPropagation();
		document.querySelectorAll("[data-v-receiver]").forEach((currentElement) => {
			if (!currentElement.contains(e.target) && currentElement.classList.contains("active")) {
				removeClass(currentElement);
			}
		});
	});
};

const handleDropdownOutsideClick = () => {
	document.addEventListener("click", (event) => {
		event.stopPropagation();
		allToggleReceivers.forEach((element) => {
			if (!element.contains(event.target) && element.getAttribute("data-v-expanded") === "true") {
				removeClass(backdrop, "show");
				element.setAttribute("data-v-expanded", "false");
			}
		});
	});
};

function handleNotificationToggle(event) {
	event.preventDefault();
	const self = this;
	const target = self.getAttribute("data-target");
	allNotifTabs.forEach((tabPill) => {
		target === tabPill.getAttribute("data-target")
			? (document.querySelectorAll(".v-noti-dropdown [data-receiver]").forEach((content) => {
					const contentAttr = content?.getAttribute("data-receiver");
					contentAttr === target ? content.classList.add("active") : content.classList.remove("active");
			  }),
			  tabPill.classList.add("active"))
			: tabPill.classList.remove("active");
	});
}

if (checkLength(allNotifTabs)) {
	allNotifTabs.forEach((toggleButton) => toggleButton.addEventListener("click", handleNotificationToggle));
}

function handleEachToggler(event) {
	event.stopPropagation();
	const target = this.getAttribute("data-target");
	const dropdown = document.querySelector(`.v-dropdown[data-receiver=${target}]`);
	const dataExpanded = dropdown?.getAttribute("data-v-expanded");
	if (dataExpanded === "true") return dropdown?.setAttribute("data-v-expanded", "false");
	backdrop.classList.add("show");
	dropdown?.setAttribute("data-v-expanded", "true");
}

if (checkLength(allTogglers)) {
	allTogglers.forEach((toggler) => toggler.addEventListener("click", handleEachToggler));
}

function toggleSideBarLinkDropdown(event) {
	event.stopPropagation();
	const self = event.target;
	if (self && self.classList.contains("active")) return removeClass(self, "active");
	addClass(self, "active");
}

if (checkLength(sidebarLinksWithDropdown)) {
	sidebarLinksWithDropdown.forEach((link) => link.addEventListener("click", toggleSideBarLinkDropdown));
}

if (checkLength(all4DigitsInputContainers)) {
	for (const array of all4DigitsInputContainers) {
		const codeInputs = array.querySelectorAll(".form-control");
		codeInputs.forEach((input, inputIndex, currentArray) => {
			input.addEventListener("keyup", function (e) {
				const keyBoardKey = e.key;
				if (keyBoardKey !== "Backspace" && keyBoardKey !== "Delete") {
					inputIndex + 1 < codeInputs.length ? currentArray[inputIndex + 1].focus() : null;
				} else if (keyBoardKey === "Backspace" || keyBoardKey === "Delete") {
					const prevItem = currentArray[inputIndex - 1];
					inputIndex - 1 >= 0 ? (prevItem.focus(), prevItem.setSelectionRange(0, -1)) : null;
				}
			});
			input.dispatchEvent(new Event("input"));
			input.dispatchEvent(new Event("change"));
		});
	}
}

const togglePasswords = () => {
	const allInputContainerWithPassToggles = callDomEle(".v-input:has(.v-toggler-password), .v-form-input:has(button)", undefined, true);
	if (!checkLength(allInputContainerWithPassToggles)) return;
	allInputContainerWithPassToggles.forEach((passWithToggle) => {
		if (passWithToggle.contains(callDomEle("svg", passWithToggle))) {
			const toggler = callDomEle("[data-v-toggle]", passWithToggle);
			toggler.addEventListener("click", function (event) {
				event.stopPropagation();
				const self = this;
				const attrValue = this.getAttribute("data-v-toggle");
				if (falsies.includes(attrValue)) return;
				const input = callDomEle(`input[data-v-receive-toggle=${attrValue}]`);
				const typeOfInput = input.type;
				typeOfInput === "password"
					? ((input.type = "text"), (self.innerHTML = INVISIBLE_EYE))
					: ((input.type = "password"), (self.innerHTML = VISIBLE_EYE));
			});
		} else {
			const hideShowButton = callDomEle(".v-toggler-password", passWithToggle);
			const passInput = callDomEle(".form-control", passWithToggle);

			hideShowButton &&
				passInput &&
				hideShowButton.addEventListener("click", function () {
					const typeOfInput = passInput.type;
					typeOfInput === "password"
						? ((passInput.type = "text"), (hideShowButton.textContent = "Hide"))
						: ((passInput.type = "password"), (hideShowButton.textContent = "Show"));
				});
		}
	});
};

const readFile = (passedFile) => {
	if (!passedFile) return;
	return new Promise((resolve, reject) => {
		const reader = new FileReader();
		reader.addEventListener("load", () => resolve(reader.result));
		reader.addEventListener("error", () => reject(new Error(reader.error)));

		reader.readAsDataURL(passedFile);
	});
};

const initProfileImageUpload = (element, displayContainer, toggler) => {
	if (!element) return;
	element.addEventListener("input", async function (event) {
		const acceptedFiles = ["image/png", "image/avif", "image/webp", "image/jpeg", "image/jpg"];
		const maxFileSize = 2 * 1024 * 1024;
		const files = event.target.files;
		if (!files.length) return;
		const file = files[0];
		if (!acceptedFiles.includes(file.type.toLowerCase())) {
			showToast("File has to be of type .png, .avif, .webp, .jpeg or jpg", "failed");
			return;
		}
		if (file.size > maxFileSize) {
			showToast("File is too large, ensure it is less that 2mb", "failed");
			return;
		}
		const result = await readFile(file);
		if (!result) {
			showToast("Error uploading file, try again!", "failed");
			return;
		}
		if (!displayContainer) return;
		toggler.innerHTML = "Re-upload";
		if (displayContainer.nodeType === Node.ELEMENT_NODE) {
			displayContainer.src = result;
		}
	});
};

const toggleInput = () => {
	const modal = callDomEle("#basicProfileSetting");
	const button = callDomEle(".v-custom-input-trigger", modal);
	if (!button) return;
	button.addEventListener("click", function () {
		const attr = this.dataset.toggle;
		if (!attr) return;
		const inputEle = callDomEle(`[data-receive=${attr}]`);
		const displayContainer = callDomEle(`[data-image-display=${attr}]`);
		if (!inputEle) return;
		inputEle.click();
		initProfileImageUpload(inputEle, displayContainer, this);
	});
};

const initUpdateUserProfileDetails = () => {
	const parentContainer = callDomEle("#editDetails");
	if (!parentContainer) return;
	const toggler = callDomEle(".updateUserDetailsToggler", parentContainer);
	if (!toggler) return;
	toggler.addEventListener("click", async function () {
		const target = this;
		const TOGGLER_TEXT = target.innerHTML;
		setLoadStatus(target, undefined, true);
		const allInputs = callDomEle("input", parentContainer, true);
		if (!allInputs.length) return;
		for (let input of allInputs) {
			if (input.value.trim() === "") {
				console.log(input.value);
				setLoadStatus(target, TOGGLER_TEXT, false);
				let errorMessage;
				switch (input.getAttribute("name").toLowerCase()) {
					case "phone":
						errorMessage = "Enter phone number";
						break;
					case "username":
						errorMessage = "Username is empty number";
						break;
					case "email":
						errorMessage = "Email address is empty";
						break;
					case "fullname":
						errorMessage = "Name cannot be empty";
						break;
					default:
						errorMessage = "Ensure to fill all input";
						break;
				}
				showToast(errorMessage, "failed");
				return;
			}
		}

		const URL = `${BASE_URL}/dashboard/profile`;
		try {
			const formData = new FormData(callDomEle("form", parentContainer));
			const response = await fetch(URL, {
				method: "POST",
				headers: {
					Accept: "application/json", //what the response should come back as
					"x-custom-update": "userDetails", //setting custom header
				},
				body: formData,
			});
			if (!response.ok || response.status !== 200) throw new Error(response.statusText);
			const data = await response.json();
			if (!data.status) {
				throw new Error(data.message);
			}
			if (data && data.status) {
				setLoadStatus(target, TOGGLER_TEXT, false);
				showToast(data.message, "success");
				reloadPage(3);
				return;
			}
		} catch (error) {
			showToast(error, "failed");
		} finally {
			setLoadStatus(target, TOGGLER_TEXT, false);
		}
	});
};

const initUpdateBasicProfile = () => {
	const parentContainer = callDomEle("#basicProfileSetting");
	const updateToggler = callDomEle(".v-modal-action", parentContainer);
	if (!updateToggler) return;
	updateToggler.addEventListener("click", async function () {
		const self = this;
		const TOGGLER_TEXT = self.innerHTML;
		const allInputs = callDomEle("#basicProfileSetting input", undefined, true);
		if (!allInputs.length) return;
		setLoadStatus(self, undefined, true);
		let parentForm = document.forms.userProfileData;
		parentForm = new FormData(parentForm);

		const url = `${BASE_URL}/dashboard/profile`;
		try {
			const response = await fetch(url, {
				method: "POST",
				headers: {
					Accept: "application/json", //what the response should come back as
					"x-custom-update": "profileImage",
				},
				body: parentForm,
			});

			if (!response.ok || response.status !== 200) throw new Error(response.statusText);
			const data = await response.json();
			if (!data.status) {
				throw new Error(data.message);
			}
			if (data && data.status) {
				const toggler = callDomEle(".v-custom-input-trigger", parentContainer);
				toggler.innerHTML = "Click/Tap to upload";
				showToast(data.message, "success");
				reloadPage(3);
			}
		} catch (error) {
			showToast(error, "failed");
			return;
		} finally {
			setLoadStatus(self, TOGGLER_TEXT, false);
		}
	});
};

// animations
function initAnimations() {
	const dropdownSplide = document.querySelector("#profile__dropdown__splide");
	if ((null || undefined) == dropdownSplide) return;
	new Splide(dropdownSplide, {
		rewind: true,
		gap: "1rem",
		autoplay: true,
		arrows: false,
	}).mount();
}

// offcanvas
function initiateOffcanvas() {
	const arrOfPath = window.location.pathname.split("/");
	const pathname = "profile";
	if (arrOfPath.includes(pathname)) {
		const btn = document.createElement("button");
		btn.type = "button";
		btn.setAttribute("data-bs-target", "#accountSettings");
		btn.setAttribute("data-bs-toggle", "offcanvas");
		btn.style.display = "none";
		document.body.appendChild(btn);
		btn.click();
		btn.remove();
	}
}

(() => {
	function init() {
		// general
		initAnimations();
		// initiateOffcanvas();
		toggleInput();
		togglePasswords();
		handleDropdownOutsideClick();
		handleGeneralOutsideClick();

		// profile page
		initUpdateBasicProfile();
		initUpdateUserProfileDetails();

		// write page
		// initSubmitBlogPost();
	}

	window.addEventListener("DOMContentLoaded", init);
})();
