<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Please Log In, or <a href="https://ccboxing.esikolweni.co.za/register">Sign Up</a></h5>
            <form class="form-signin" action="https://ccboxing.esikolweni.co.za/login" method="POST">
              <div class="form-label-group">
                <p class="text-danger"><?php if(isset($error_message)){ echo $error_message;} ?></p>
              </div>
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" value="" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Sign in">
            </form>
            <a href="#">Forgot password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>