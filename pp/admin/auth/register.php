<!doctype html>
<html
  lang="en"
  class="layout-wide customizer-hide"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register</title>

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/iconify-icons.css" />

      <link rel="stylesheet" href="/pp/template-dashboard/assets/vendor/css/core.css" />
  <link rel="stylesheet" href="/pp/template-dashboard/assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="/pp/template-dashboard/assets/css/demo.css" />
  <link rel="stylesheet" href="/pp/template-dashboard/assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card px-sm-6 px-0">
            <div class="card-body">

              <div class="app-brand justify-content-center mb-6">
                <a href="../index.php" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-heading fw-bold">Sneat</span>
                </a>
              </div>

              <h4 class="mb-1">Adventure starts here 🚀</h4>
              <p class="mb-6">Create your account to get started</p>

              <form
                id="formAuthentication"
                class="mb-6"
                action="login.php"
                method="POST">

                <div class="mb-4">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required />
                </div>

                <div class="mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required />
                </div>

                <div class="mb-4 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="********"
                      required />
                    <span class="input-group-text cursor-pointer">
                      <i class="icon-base bx bx-hide"></i>
                    </span>
                  </div>
                </div>

                <div class="my-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" required />
                    <label class="form-check-label">
                      I agree to the terms & conditions
                    </label>
                  </div>
                </div>

                <button class="btn btn-primary d-grid w-100">
                  Sign up
                </button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="login.php">
                  <span>Sign in instead</span>
                </a>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
