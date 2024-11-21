import { callDomEle, setLoadStatus, showToast, BASE_URL, reloadPage } from "./utils.custom.js";

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
			const TOGGLER_TEXT = target.innerHTML;
			setLoadStatus(target, undefined, true);

			if (editor !== null) {
				const editorContent = editor.getHTMLCode();
				const authorId = callDomEle(".v-author-id", parentBlogContainer);
				const authorName = callDomEle(".v-author-name", parentBlogContainer);
				const blogTitle = callDomEle(".v-main-title", parentBlogContainer);
				const blogSubtitle = callDomEle(".v-subtext", parentBlogContainer);
				const bannerFile = callDomEle("#bannerImage", parentBlogContainer);

				const blogElementEntity = {
					editorContent,
					blogTitle,
					blogSubtitle,
					bannerFile,
					authorId,
					authorName,
				};

				const arrOfExclusions = ["blogSubtitle", "authorId", "authorName"];
				for (const data in blogElementEntity) {
					if (blogElementEntity[data] instanceof Node) {
						if (arrOfExclusions.includes(data)) continue;
						else if (blogElementEntity[data].value.trim() === "") {
							const attr = blogElementEntity[data].getAttribute("name");
							if (!attr) return;
							let errorValue;
							switch (attr.toLowerCase()) {
								case "blogtitle":
									errorValue = "Blog title is empty!";
									break;
								case "bannerimage":
									errorValue = "Enter a banner image!";
									break;
								default:
									errorValue = "Some input is empty";
									break;
							}
							setLoadStatus(target, TOGGLER_TEXT);
							return showToast(errorValue, "failed");
						}
					} else if (typeof blogElementEntity[data] === "string") {
						if (blogElementEntity[data]?.trim() === "") {
							showToast("There is no data in your blog write-up", "error");
							return setLoadStatus(target, TOGGLER_TEXT);
						}
					} else {
						alert("Error occurred");
					}
				}

				const blogDataValue = new FormData();
				blogDataValue.append("blogTitle", blogTitle.value);
				blogDataValue.append("blogSubtitle", blogSubtitle.value);
				blogDataValue.append("blogContent", editorContent);
				blogDataValue.append("authorId", authorId.value);
				blogDataValue.append("authorName", authorName.value);
				blogDataValue.append("bannerImage", bannerFile.files[0]);
				const baseUrl = `${BASE_URL}/dashboard/write`;

				try {
					const response = await fetch(baseUrl, {
						method: "POST",
						headers: {
							Accept: "application/json",
							"x-custom-update": "postBlog",
						},
						body: blogDataValue,
					});
					if (response.status !== 200 || !response.ok) throw new Error("Error occured, try again!");
					const result = await response.json();
					if (!result.status) {
						throw new Error(result.message ?? "Error occured");
					}
					showToast(result.message, "Success");
					reloadPage(3);
				} catch (error) {
					showToast(error, "Failed");
				} finally {
					setLoadStatus(target, TOGGLER_TEXT, false);
				}
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
