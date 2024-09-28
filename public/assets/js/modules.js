// const setError = function () {};

const createElement = function (element) {
	if (!element) return;
	let eleToCreate = document.createElement(element);
	if (eleToCreate.nodeType === Node.ELEMENT_NODE) {
		console.log("Yes");
	} else {
		console.log("No");
	}
};

export { createElement };
