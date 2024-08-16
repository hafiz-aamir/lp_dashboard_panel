
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    @include('layouts.front_layout.css')

    <title>Login</title>
  </head>
  <body>
    <section class="login-section">
      <div class="login-content-parent">
        <div class="login-box">
          <div class="login-box-inner">
            <div class="login-head-para text-center">
              <h3 class="fw-bold">Login to Account</h3>
              <p class="fw-semibold">Please enter your email and password to continue</p>
            </div>
            <div class="input-and-rem-parent">
              <div class="input-login position-relative">
                <label class="fw-semibold" for="email">Email address: </label>
                <input type="email" id="email" placeholder="Email Address" value="" />
              </div>
              <div class="input-login position-relative">
              <div class="d-flex align-items-center justify-content-between">
              <label class="fw-semibold" for="password">Password </label>
              <a class="forget-pass-login text-black" href="">Forget Password?</a>
              </div>
                <input type="password" id="password" placeholder="Password" value="" />
              </div>
              <div class="remem-me">
                <input type="checkbox" /><span>Remember Me</span>
              </div>
            </div>
            <div class="login-btn">
              <a href="index.php" class="LoginButton">Login</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
