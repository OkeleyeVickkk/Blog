<?php

declare(strict_types=1);
?>

<?php require_once "components/header.view.php"; ?>
<div id="page" class="s-pagewrap ss-home">
  <?php require_once "components/nav.view.php"; ?>
  <section id="content" class="s-content">
    <!-- hero -->
    <div class="hero">
      <div class="hero__slider swiper-container">
        <div class="swiper-wrapper">
          <article class="hero__slide swiper-slide">
            <div
              class="hero__entry-image"
              style="background-image: url('<?= requireAssets('images/thumbs/featured/featured-01_2000.jpg'); ?>');">
            </div>
            <div class="hero__entry-text">
              <div class="hero__entry-text-inner">
                <div class="hero__entry-meta">
                  <span class="cat-links">
                    <a href="category.html">Inspiration</a>
                  </span>
                </div>
                <h2 class="hero__entry-title">
                  <a href="<?= requireLink('standard') ?>"> Understanding and Using Negative Space. </a>
                </h2>
                <p class="hero__entry-desc">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                  enim ad minim veniam, quis nostrud corporis est laudantium voluptatum consectetur adipiscing.
                </p>
                <a class="hero__more-link" href="<?= requireLink('standard') ?>">Read More</a>
              </div>
            </div>
          </article>
          <article class="hero__slide swiper-slide">
            <div class="hero__entry-image" style="background-image: url('<?= requireAssets('images/thumbs/featured/featured-02_2000.jpg'); ?>');"></div>
            <div class="hero__entry-text">
              <div class="hero__entry-text-inner">
                <div class="hero__entry-meta">
                  <span class="cat-links">
                    <a href="category.html">Health</a>
                  </span>
                </div>
                <h2 class="hero__entry-title">
                  <a href="<?= requireLink('standard') ?>"> 10 Reasons Why Being in Nature Is Good For You. </a>
                </h2>
                <p class="hero__entry-desc">
                  Voluptas harum sequi rerum quasi quisquam. Est tenetur ut doloribus in aliquid animi nostrum. Tempora quibusdam ad nulla. Quis
                  autem possimus dolores est est fugiat saepe vel aut. Earum consequatur.
                </p>
                <a class="hero__more-link" href="<?= requireLink('standard') ?>">Read More</a>
              </div>
            </div>
          </article>
          <article class="hero__slide swiper-slide">
            <div class="hero__entry-image" style="background-image: url('<?= requireAssets('images/thumbs/featured/featured-03_2000.jpg'); ?>');"></div>
            <div class="hero__entry-text">
              <div class="hero__entry-text-inner">
                <div class="hero__entry-meta">
                  <span class="cat-links">
                    <a href="category.html">Lifestyle</a>
                  </span>
                </div>
                <h2 class="hero__entry-title">
                  <a href="<?= requireLink('standard') ?>"> Six Relaxation Techniques to Reduce Stress. </a>
                </h2>
                <p class="hero__entry-desc">
                  Quasi consequatur quia excepturi ullam velit. Repellat velit vel occaecati neque perspiciatis quibusdam nulla. Unde et earum.
                  Nostrum nulla optio debitis odio modi. Quis autem possimus dolores est est fugiat saepe vel aut.
                </p>
                <a class="hero__more-link" href="<?= requireLink('standard') ?>">Read More</a>
              </div>
            </div>
          </article>
        </div>
        <!-- swiper-wrapper -->

        <div class="swiper-pagination"></div>
      </div>
      <!-- end hero slider -->

      <a href="#bricks" class="hero__scroll-down smoothscroll">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            d="M10.25 6.75L4.75 12L10.25 17.25"></path>
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
        </svg>
        <span>Scroll</span>
      </a>
    </div>
    <!-- end hero -->

    <!--  masonry -->
    <div id="bricks" class="bricks">
      <div class="masonry">
        <div class="bricks-wrapper" data-animate-block>
          <div class="grid-sizer"></div>

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/statue-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/statue-600.jpg'); ?> 1x, 
                  <?= requireAssets(filePath: 'images/thumbs/masonry/statue-600.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Design</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Naruto Uzumaki</a>
                  </span>
                </div>
                <h1 class="entry__title">
                  <a href="<?= requireLink('standard') ?>">Just a Normal Simple Blog Post.</a>
                </h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad
                  minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/beetle-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/beetle-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/beetle-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Lifestyle</a>
                  </span>
                  <span class="post-date">
                    By:
                    <a href="#0">Sasuke Uchiha</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">Throwback To The Good Old Days.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Ipsam odio corrupti et dolores odit aliquid quo. Dolore consectetur a sit modi quam debitis non omnis. Enim ullam voluptatem
                  ipsum soluta sed debitis nihil quasi. Et et et sit. Lorem ipsum Sed eiusmod esse aliqua sed incididunt.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/grayscale-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/grayscale-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/grayscale-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Design</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Naruto Uzumaki</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">5 Grayscale Coloring Techniques.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Quo saepe magni magnam expedita nobis. Rerum assumenda necessitatibus tempora dolorem. Harum animi tempora odio natus et et
                  perferendis possimus. Aut quo mollitia libero molestiae aut molestiae voluptate tempore. Eius voluptatem eligendi .
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/woodcraft-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/woodcraft-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/woodcraft-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Lifestyle</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Shikamaru Nara</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">What Minimalism Really Looks Like.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad
                  minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end entry -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/tulips-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/tulips-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/tulips-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Health</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Kakashi Hatake</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">10 Interesting Facts About Caffeine.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Consequatur amet voluptatem aliquid fuga. Consequatur tempora eos earum deleniti repellendus ducimus. Qui ipsum voluptas sed et
                  ad dignissimos explicabo maxime dolor. Rerum quia et. Suscipit similique et. Atque tenetur provident. Excepturi autem unde.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/red-and-blue-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/red-and-blue-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/red-and-blue-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Work</a>
                    <a href="#">Design</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Shikamaru Nara</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">Red and Blue Photo Effects.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad
                  minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/white-lamp-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/white-lamp-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/white-lamp-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Lifestyle</a>
                    <a href="#">Work</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Naruto Uzumaki</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">10 Practical Ways to Be Minimalist.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Ratione qui voluptas reprehenderit facilis soluta ut nam. Distinctio cum excepturi et. Aperiam blanditiis voluptatem. A esse
                  sunt nesciunt voluptate. Architecto voluptas id rerum placeat nostrum et optio. Placeat occaecati voluptas.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/books-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/books-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/books-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Health</a>
                    <a href="#">Lifestyle</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Sakura Haruno</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">What Does Reading Do to Your Brain?</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad
                  minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/lamp-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/lamp-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/lamp-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Design</a>
                    <a href="#">Photography</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Shikamaru Narra</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">Symmetry In Modern Design.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Praesentium vel similique laboriosam repudiandae mollitia error. Inventore numquam occaecati omnis beatae fugiat. Porro sed
                  numquam doloribus dolores exercitationem recusandae culpa. Sint vel vel quia quis. Non velit eum ea tempora quas sapiente.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/clock-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/clock-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/clock-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Lifestyle</a>
                    <a href="#">Work</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Sasuke Uchiha</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">10 Tips for Managing Time Effectively.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad
                  minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in anim.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/phone-and-keyboard-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/phone-and-keyboard-600.jpg'); ?>1x ,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/humbs/masonry/phone-and-keyboard-1200.jpg') ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="https://www.dreamhost.com/r.cgi?287326">Dreamhost</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">StyleShout</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="https://www.dreamhost.com/r.cgi?287326">Need Web Hosting for Your Websites?</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Need hosting? We would highly recommend DreamHost. Enjoy 100% in-house support, guaranteed performance and uptime, 1-click
                  installs, and a super-intuitive control panel to make managing your websites and projects easy.
                </p>
              </div>
              <a class="entry__more-link" href="https://www.dreamhost.com/r.cgi?287326">Learn More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->

          <article class="brick entry" data-animate-el>
            <div class="entry__thumb">
              <a href="<?= requireLink('standard') ?>" class="thumb-link">
                <img
                  src="<?= requireAssets(filePath: 'images/thumbs/masonry/wheel-600.jpg'); ?>"
                  srcset="<?= requireAssets(filePath: 'images/thumbs/masonry/wheel-600.jpg'); ?> 1x,
                  <?= requireAssets(filePath: 'images/thumbs/masonry/wheel-1200.jpg'); ?> 2x"
                  alt="" />
              </a>
            </div>
            <!-- end entry__thumb -->

            <div class="entry__text">
              <div class="entry__header">
                <div class="entry__meta">
                  <span class="cat-links">
                    <a href="#">Photography</a>
                  </span>
                  <span class="byline">
                    By:
                    <a href="#0">Naruto Uzumaki</a>
                  </span>
                </div>
                <h1 class="entry__title"><a href="<?= requireLink('standard') ?>">Black And White Photography Tips.</a></h1>
              </div>
              <div class="entry__excerpt">
                <p>
                  Voluptatem maiores aut delectus accusamus et explicabo et. Enim sunt quo odio sit. Hic consequatur et quia voluptas saepe. Vel
                  nostrum incidunt ab eum distinctio recusandae. Labore dolore consequatur occaecati iste ex consectetur et perferendis.
                </p>
              </div>
              <a class="entry__more-link" href="#0">Read More</a>
            </div>
            <!-- end entry__text -->
          </article>
          <!-- end article -->
        </div>
        <!-- end bricks-wrapper -->
      </div>
      <!-- end masonry-->

      <!-- pagination -->
      <div class="row pagination">
        <div class="column lg-12">
          <nav class="pgn">
            <ul>
              <li>
                <a class="pgn__prev" href="#0">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.5"
                      d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
                  </svg>
                </a>
              </li>
              <li><a class="pgn__num" href="#0">1</a></li>
              <li><span class="pgn__num current">2</span></li>
              <li><a class="pgn__num" href="#0">3</a></li>
              <li><a class="pgn__num" href="#0">4</a></li>
              <li><a class="pgn__num" href="#0">5</a></li>
              <li><span class="pgn__num dots">…</span></li>
              <li><a class="pgn__num" href="#0">8</a></li>
              <li>
                <a class="pgn__next" href="#0">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1.5"
                      d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
          <!-- end pgn -->
        </div>
        <!-- end column -->
      </div>
      <!-- end pagination -->
    </div>
    <!-- end bricks -->
  </section>
</div>
<?php require_once "components/footer.view.php"; ?>