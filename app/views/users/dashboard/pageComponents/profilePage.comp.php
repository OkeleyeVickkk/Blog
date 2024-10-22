<?php

declare(strict_types=1);

?>

<!-- blog&Contacts @::start -->
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-backdrop="static" id="blogAndContacts" aria-labelledby="blogAndContactsLabel">
  <div class="offcanvas-header pb-0">
    <button type="button" class="v-back-to-prev" data-bs-dismiss="offcanvas" aria-label="Close">
      <span class="v-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
          <rect width="24" height="24" fill="none" />
          <path
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            d="M20 12H4m0 0l6-6m-6 6l6 6" />
        </svg>
      </span>
    </button>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <h5 class="offcanvas-title v-green-it" id="blogAndContactsLabel">
      <b>Saved Blogs</b>
    </h5>
    <div class="v-cornered-items-container mt-3">
      <div class="v-each-cornered-item">
        <span class="v-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <rect width="24" height="24" fill="none" />
            <path
              fill="currentColor"
              d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19q0-.15.024-.273c.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2m0 9l-2-1l-2 1V4h4z" />
          </svg>
        </span>
        <div class="v-each-cornered-detail">
          <h6 class="v-title fw-medium">Read Blog</h6>
          <span class="v-subtext">
            Stay updated with Cardify Blog! Read our newsletters, check out the latest events, and explore other exiciting content
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- blog&Contacts @::end -->

<!-- account settings @::start -->
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-backdrop="static" id="accountSettings" aria-labelledby="accountSettingsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title v-green-it" id="accountSettingsLabel">Account Settings</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="v-cornered-items-container flex-grow-1">
      <!-- v-each-button @::start -->
      <button type="button" class="v-each-cornered-item" data-bs-toggle="modal" data-bs-target="#basicProfileSetting">
        <span class="v-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <rect width="24" height="24" fill="none" />
            <path
              fill="currentColor"
              d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
          </svg>
        </span>
        <span class="v-text" role="text">Basic Profile Settings</span>
      </button>
      <!-- v-each-button @::end -->
      <!-- v-each-button @::start -->
      <button type="button" class="v-each-cornered-item" data-bs-toggle="modal" data-bs-target="#changePassword">
        <span class="v-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <rect width="24" height="24" fill="none" />
            <path
              fill="currentColor"
              d="m12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zm0 6a2 2 0 0 0-1 3.732V15h2l.001-4.268A2 2 0 0 0 12 7" />
          </svg>
        </span>
        <span class="v-text" role="text">Password Settings</span>
      </button>
      <!-- v-each-button @::end -->

      <!-- v-each-button @::start -->
      <button type="button" class="v-each-cornered-item v-red mt-auto" data-bs-toggle="offcanvas" data-bs-target="#">
        <span class="v-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <rect width="24" height="24" fill="none" />
            <path
              fill="currentColor"
              d="M3 6.524c0-.395.327-.714.73-.714h4.788c.006-.842.098-1.995.932-2.793A3.68 3.68 0 0 1 12 2a3.68 3.68 0 0 1 2.55 1.017c.834.798.926 1.951.932 2.793h4.788c.403 0 .73.32.73.714a.72.72 0 0 1-.73.714H3.73A.72.72 0 0 1 3 6.524" />
            <path
              fill="currentColor"
              fill-rule="evenodd"
              d="M11.596 22h.808c2.783 0 4.174 0 5.08-.886c.904-.886.996-2.34 1.181-5.246l.267-4.187c.1-1.577.15-2.366-.303-2.866c-.454-.5-1.22-.5-2.753-.5H8.124c-1.533 0-2.3 0-2.753.5s-.404 1.289-.303 2.866l.267 4.188c.185 2.906.277 4.36 1.182 5.245c.905.886 2.296.886 5.079.886m-1.35-9.811c-.04-.434-.408-.75-.82-.707c-.413.043-.713.43-.672.864l.5 5.263c.04.434.408.75.82.707c.413-.044.713-.43.672-.864zm4.329-.707c.412.043.713.43.671.864l-.5 5.263c-.04.434-.409.75-.82.707c-.413-.044-.713-.43-.672-.864l.5-5.264c.04-.433.409-.75.82-.707"
              clip-rule="evenodd" />
          </svg>
        </span>
        <span class="v-text" role="text">Delete Account</span>
      </button>
      <!-- v-each-button @::end -->
    </div>
  </div>

  <!-- profile details modal @::start  -->
  <div
    class="modal fade"
    id="basicProfileSetting"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    aria-labelledby="basicProfileSettingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 v-green-it" id="basicProfileSettingModalLabel">Basic Profile Settings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-column row-gap-3">
            <div class="v-profile-container d-flex align-items-center column-gap-4">
              <input type="file" hidden />
              <div class="v-profile border">
                <img src="<?= requireAssets('images/avatars/user-avatar.png') ?>" alt="" class="img-fluid" />
              </div>
              <button type="button" class="v-custom-input-trigger">Click/Tap to change</button>
            </div>
            <ul class="v-listed-details">
              <li class="v-each-item">
                <span class="v-text">Fullname</span>
                <span class="v-text">Okeke Victor</span>
              </li>
              <li class="v-each-item">
                <span class="v-text">Email</span>
                <span class="v-text">horlarmhedey200@gmail.com</span>
              </li>
              <li class="v-each-item">
                <span class="v-text">Username</span>
                <span class="v-text">justus</span>
              </li>
              <li class="v-each-item">
                <span class="v-text">Phone Number</span>
                <span class="v-text">09130586120</span>
              </li>
              <li class="v-each-item">
                <span class="v-text">Password</span>
                <span class="v-text">
                  <span class="v-hidden">****</span>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#changePassword" class="v-hidden">
                    <small class="v-inner-text" style="color: var(--primary-clr)">Change Password</small>
                  </button>
                </span>
              </li>
            </ul>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="v-modal-action v-choose" disabled>Update</button>
          <!-- <button type="button" data-bs-dismiss="modal" class="v-modal-action v-cancel">cancel</button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- profile details modal @::end  -->

  <!-- password change modal @::start  -->
  <div
    class="modal fade"
    id="changePassword"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 v-green-it" id="changePasswordModalLabel">Password Settings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" class="mt-3">
            <div class="v-form-group my-3 d-flex flex-column row-gap-3">
              <div class="v-form-input">
                <label for="old-password" class="form-label"> Old Password </label>
                <div class="position-relative v-icon-holder">
                  <input
                    type="password"
                    class="form-control"
                    id="old-password"
                    data-v-receive-toggle="old-password"
                    placeholder="Enter old password" />
                  <button type="button" class="v-password-toggler" data-v-toggle="old-password">
                    <span class="v-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                          <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                        </g>
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
              <div class="v-form-input">
                <label for="new-password" class="form-label"> New Password </label>
                <div class="position-relative v-icon-holder">
                  <input
                    type="password"
                    class="form-control"
                    id="new-password"
                    data-v-receive-toggle="new-password"
                    placeholder="Enter new password" />
                  <button type="button" class="v-password-toggler" data-v-toggle="new-password">
                    <span class="v-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                          <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                        </g>
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
              <div class="v-form-input">
                <label for="retype-password" class="form-label"> Retype new password</label>
                <div class="position-relative v-icon-holder">
                  <input
                    type="password"
                    class="form-control"
                    id="retype-password"
                    data-v-receive-toggle="retype-password"
                    placeholder="Retype new pin" />
                  <button type="button" class="v-password-toggler" data-v-toggle="retype-password">
                    <span class="v-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                          <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                        </g>
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="v-modal-action v-choose" disabled>Update Password</button>
        </div>
      </div>
    </div>
  </div>
  <!-- password change modal @::end  -->

  <!-- authAppVerification modal @::start -->
  <div
    class="modal fade"
    id="authAppVerification"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    aria-labelledby="authAppVerificationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title v-green-it fs-5" id="authAppVerificationLabel">Auth 2FA Verification</h1>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3 pb-0 d-flex flex-column row-gap-0 v-82fn9922d3">
          <div class="d-flex flex-column align-items-center text-center mt-3 mb-3">
            <div class="d-flex align-items-center justify-content-center" style="color: var(--primary-clr)">
              <svg style="--size: 6rem" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48">
                <rect width="48" height="48" fill="none" />
                <defs>
                  <mask id="ipSCheckOne0">
                    <g fill="none" stroke-linejoin="round" stroke-width="4">
                      <path
                        fill="#fff"
                        stroke="#fff"
                        d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z" />
                      <path stroke="#000" stroke-linecap="round" d="m16 24l6 6l12-12" />
                    </g>
                  </mask>
                </defs>
                <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSCheckOne0)" />
              </svg>
            </div>
            <div class="text-center d-flex flex-column row-gap-2 mt-3">
              <h4 class="v-title">2FA Auth App Synced</h4>
              <span class="v-subtext-faint opacity-50">You have successfully synced your authentication app.</span>
            </div>
          </div>
        </div>
        <footer class="v-offcanvas-footer">
          <button type="button" class="v-action v-carry-on" data-bs-dismiss="modal">Proceed</button>
        </footer>
      </div>
    </div>
  </div>
  <!-- authAppVerification modal @::end -->
</div>
<!-- account settings @::end -->