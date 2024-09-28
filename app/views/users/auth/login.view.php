<?php

declare(strict_types=1);
?>

<?php require_once "layout/authHeader.php"; ?>
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card rounded-4 overflow-hidden">
          <div class="row col-12 overflow-hidden m-0">
            <div class="col-md-6 col-lg-5 d-none p-0 d-md-block">
              <figure class="overflow-hidden h-100">
                <img src="<?= requireAssets(filePath: "images/thumbs/masonry/beetle-1200.jpg"); ?>"
                  alt="login form" class="img-fluid" style="height: 100%; width: 100%; object-fit: cover" ; />
              </figure>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body rounded-0 p-4 px-2 p-lg-5 text-black">
                <form action="" method="post" class="v-form" enctype="multipart/form-data">
                  <div class="d-flex flex-column mb-3 pb-1">
                    <h1 class="h1 fw-bold mb-0">Logo</h1>
                    <h6 class="fw-normal mb-3">Sign into your account</h6>
                  </div>
                  <div class="d-flex flex-column row-gap-3">
                    <div class="form-outline">
                      <label class="form-label" for="email">Email address</label>
                      <input type="email" id="email" name="email" value="" placeholder="Enter your email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline v-password-container">
                      <label class="form-label" for="password">Password</label>
                      <div class="form-input">
                        <input type="password" id="password" value="" data-password="password" name="password" class="form-control form-control-lg" />
                        <button type="button" class="v-password-toggle" data-password="password">Show</button>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 mb-4">
                    <button class="btn btn-dark btn-block w-100 v-action-btn" id="login" type="submit">
                      <span class="v-btn-loader"></span>
                      <span class="v-text">Login</span>
                    </button>
                  </div>

                  <div class="mb-5 pb-lg-2 d-flex flex-column">
                    <div class="d-flex align-items-center gap-1">
                      <span> Don't have an account?</span>
                      <a href="<?= requireLink(link: 'register'); ?>">Register here</a>
                    </div>
                    <a class="small text-muted" href="#!">Forgot password?</a>
                  </div>
                  <div>
                    <span class="small text-muted">Terms of use.</span>
                    <span class="small text-muted">Privacy policy</span>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="module">
  import {
    createElement
  } from "./modules.js";

  const baseUrl = "http://localhost/project-blog/public";
  const submitBtn = document.getElementById("login");
  const url = `${baseUrl}/login.php`;

  submitBtn.addEventListener("click", async function(e) {
    e.preventDefault();
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    if (!email || !password) return;

    const data = {
      email: email.value,
      password: password.value
    }

    const options = {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    }

    try {
      const response = await fetch(url, options);
      if (!response.ok) throw new Error("Failed status");
      const result = await response.json();
      const responseData = await result;
      console.log(response.data)
      // if (responseData.status) {
      //   window.location.href = `${baseUrl}/dashboard/index.php`;
      // }
    } catch (error) {
      console.log(error)
    }
  })

  // createElement("div")
</script>
<?php require_once "layout/authFooter.php"; ?>