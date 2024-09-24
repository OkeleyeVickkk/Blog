<?php

declare(strict_types=1);
?>

<?php require_once "layout/authHeader.php"; ?>
<section class="h-100">
  <div class="container py-5 h-100">
    <div class="row justify-content-center col-12 m-0 h-100">
      <div class="card card-registration col-md-10 col-lg-8 col-xl-6 col-xxl-5 my-4 rounded-4">
        <div class="row col-12 g-0 justify-content-center">
          <div class="card-body text-black">
            <div class="mb-3">
              <h3 class="fw-semibold">Register</h3>
              <span class="text-muted">Create your account now</span>
            </div>
            <form action="" method="post" class="d-flex flex-column row-gap-3 mt-4">
              <div class="form-outline">
                <label class="form-label" for="fullname">Fullname</label>
                <input type="text" spellcheck="false" id="fullname" name="fullname" placeholder="Enter your fullname" class="form-control form-control-lg" />
              </div>
              <div class="form-outline">
                <label class="form-label" for="email">Email</label>
                <input type="email" spellcheck="false" id="email" name="email" placeholder="Enter your email address" class="form-control form-control-lg" />
              </div>
              <div class="form-outline v-password-container">
                <label class="form-label" for="password">Password</label>
                <div class="form-input">
                  <input type="password" id="password" name="password" data-password="password" class="form-control form-control-lg" />
                  <button type="button" class="v-password-toggle" data-password="password">Show</button>
                </div>
              </div>
              <div class="d-flex pt-3">
                <button type="submit" id="register" class="btn v-action-btn btn-dark w-100">Sign Up</button>
              </div>

              <div class="text-center ">
                <div class="mb-3 pb-lg-2 d-flex flex-column justify-content-center">
                  <div class="d-flex align-items-center justify-content-center gap-1">
                    <span> Have have an account?</span>
                    <a href="<?= requireLink(link: 'login'); ?>">Login</a>
                  </div>
                  <a class="small text-muted" href="#!">Forgot password?</a>
                </div>
                <div>
                  <span class="small text-muted">Terms of use.</span>
                  <span class="small text-muted">Privacy policy</span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
  const submitBtn = document.getElementById("register");
  const url = "http://localhost/project-blog/public/register.php";

  submitBtn.addEventListener("click", async function(e) {
    e.preventDefault();
    let email = document.getElementById('email');
    let fullname = document.getElementById("fullname");
    let password = document.getElementById('password');
    if (!email || !password) return;

    const data = {
      email: email.value,
      password: password.value,
      fullname: fullname.value
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
      if (!response.ok) return;
      const result = await response.json();
      const responseData = await result;
      if (responseData.status) {
        window.location.href = "http://localhost/project-blog/public/login.php";
      }
    } catch (error) {
      console.warn(error);
    }

  })
</script>
<?php require_once "layout/authFooter.php"; ?>