import { callDomEle, setLoadStatus, showToast, BASE_URL } from "./utils.custom.js";

(() => {
	let editor = null;
	//write page functions
	const initSubmitBlogPost = () => {
		const parentBlogContainer = callDomEle(".v-text-editor-container");
		if (!parentBlogContainer) return;
		const publishBlogToggler = callDomEle(".v-publish-blog-toggler", parentBlogContainer);
		if (!publishBlogToggler) return;
		publishBlogToggler.addEventListener("click", async function () {
			const target = this;
			setLoadStatus(target, undefined, true);

			if (editor !== null) {
				const editorContent = editor.getHTMLCode();
				const blogTitle = callDomEle(".v-main-title", parentBlogContainer);
				const blogSubtitle = callDomEle(".v-subtext", parentBlogContainer);
				const bannerFile = callDomEle("[name=bannerImage]", parentBlogContainer);

				const blogElementEntity = {
					editorContent,
					blogTitle,
					blogSubtitle,
					bannerFile,
				};

				for (const data in blogElementEntity) {
					if (data === "blogSubtitle") continue;
					if (blogElementEntity[data] instanceof Node) {
						if (blogElementEntity[data].value.trim() === "") {
							const attr = blogElementEntity[data].getAttribute("name");
							let errorValue;
							if (!attr) return;
							if (attr.toLowerCase() === "blogtitle") {
								errorValue = "Blog title is empty!";
							}
							if (attr.toLowerCase() === "bannerimage") {
								errorValue = "Enter a banner image!";
							}
							setLoadStatus(target, "Publish");
							return showToast(errorValue, "failed");
						}
					} else if (typeof blogElementEntity[data] === "string") {
						if (blogElementEntity[data]?.trim() === "") {
							showToast("There is no data in your blog write-up", "error");
							return setLoadStatus(target, "Publish");
						}
					} else {
						alert("Error occurred");
					}
				}

				const blogDataValue = {
					blogTitle: blogTitle.value,
					blogSubtitle: blogSubtitle.value,
					blogContent: editorContent.value,
				};
				const baseUrl = `${BASE_URL}/dashboard/write`;

				const response = await fetch(baseUrl, {
					method: "POST",
					headers: {
						Accept: "application/json",
						"x-custom-update": "postBlog",
					},
					body: JSON.stringify(blogDataValue),
				});
				const result = await response.json();
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
