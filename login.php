<?php include 'components/session-check-index.php' ?>
<?php include 'controllers/base/head.php' ?>
<div class="container">
    <div class="row">
      <div class="main">
          <!-- <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <button class="btn btn-lg btn-primary btn-block ladda-button" data-style="zoom-in" >Facebook</button>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <button class="btn btn-lg btn-info btn-block ladda-button" data-style="zoom-in" >Google</button>
              </div>
          </div>
          <div class="login-or">
              <hr class="hr-or">
              <span class="span-or">or</span>
          </div> -->
          <a class="navbar-brand" href="home.php" style="width: 100%;"><img src="https://www.shareconnected.com/community/image/logo.png" alt="" style="width: 80% !important;height: auto !important;margin: 0 10%;"></a>
          <form role="form" action="components/login-process.php" method="post" name="login">
              <div class="form-group">
                  <br><label for="inputUsernameEmail">Username o email</label>
                  <input type="text" class="form-control" id="inputUsernameEmail" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
              </div>
              <p>Effettua il Login o <a href="index.php">Registrati</a></p><br>
              <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  Log In
              </button>
          </form>
        </div>
    </div>
</div>
