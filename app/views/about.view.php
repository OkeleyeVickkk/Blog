<?php

declare(strict_types=1); ?>

<?php require_once "components/header.view.php"; ?>
<div id="page" class="s-pagewrap">

	<?php require_once "components/nav.view.php"; ?>

	<div id="content" class="s-content s-content--page">
		<div class="row entry-wrap">
			<div class="column lg-12">
				<article class="entry">
					<header class="entry__header entry__header--narrow">
						<h1 class="entry__title">Learn More About Us.</h1>
					</header>

					<div class="entry__media">
						<figure class="featured-image">
							<img
								src="<?= requireAssets(filePath: 'images/thumbs/about/about-1200.jpg'); ?>"
								srcset="<?= requireAssets(filePath: 'images/thumbs/about/about-2400.jpg'); ?> 2400w, 
								<?= requireAssets(filePath: 'images/thumbs/about/about-1200.jpg') ?> 1200w, 
								<?= requireAssets(filePath: 'images/thumbs/about/about-600.jpg') ?> 600w"
								sizes="(max-width: 2400px) 100vw, 2400px"
								alt="" />
						</figure>
					</div>

					<div class="content-primary">
						<div class="entry__content">
							<p class="lead">
								Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation
								incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco
								magna amet magna cupidatat qui labore cillum cillum cupidatat fugiat nostrud.
							</p>

							<div class="row block-lg-one-half block-tab-whole">
								<div class="column">
									<p class="drop-cap">
										Eligendi quam at quis. Sit vel neque quam consequuntur expedita quisquam. Incidunt quae qui error. Rerum non facere mollitia ut
										magnam laboriosam. Quisquam neque quia ex eligendi repellat illum quibusdam aut. Architecto quam consequuntur totam ratione
										reprehenderit est praesentium impedit maiores incididunt adipisicing veniam velit. Duis ex ad cupidatat tempor Excepteur cillum
										cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt.
									</p>
								</div>
								<div class="column">
									<p>
										Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation
										incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla
										ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut
										quis proident ullamco ut dolore culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat
										fugiat in adipisicing in amet.
									</p>
								</div>
							</div>
						</div>
						<!-- end content-primary -->
					</div>
				</article>
				<!-- end entry -->
			</div>
		</div>
		<!-- end entry-wrap -->
	</div>
	<!-- end s-content -->
</div>
<?php require_once "components/footer.view.php"; ?>