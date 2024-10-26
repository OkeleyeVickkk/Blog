import { callDomEle, setLoadStatus } from "./utils.custom.js";

(() => {
	let editor = null;
	//write page functions
	const initSubmitBlogPost = () => {
		const parentBlogContainer = callDomEle(".v-text-editor-container");
		if (!parentBlogContainer) return;
		const publishBlogToggler = callDomEle(".v-publish-blog-toggler", parentBlogContainer);
		if (!publishBlogToggler) return;
		publishBlogToggler.addEventListener("click", function () {
			const target = this;
			setLoadStatus(target, undefined, true);

			if (editor !== null) {
				console.log(editor.getHTMLCode());
			}
		});
	};

	function initiateRichTextEditor() {
		editor = callDomEle("#v-editor");
		if (!editor) return alert("No editor captured");

		const opts = {
			editorResizeMode: "none",
			toolbar: "basic",
			skin: "gray",
		};
		editor = new RichTextEditor(editor, opts);
	}

	const init = () => {
		initiateRichTextEditor();
		initSubmitBlogPost();
	};
	window.addEventListener("DOMContentLoaded", init);
})();
