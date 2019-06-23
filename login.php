<!-- Import header -->
<?php $page = "login";$activeLog = "active";$activeReg = ""; require_once("includes/header.php")?>
<style>
  body {
  background-color: rgb(120, 165, 201);
  }
  .card {
  height: 500px;
  }
</style>
<div class="container">
  <div class="section">
    <div class="row">
      <h3 class="center">LOGIN</h3>
      <div class="col s12 l6 offset-l3">
        <div class="card grey lighten-3">
          <div class="card-content">
            <h4 class="card-title center-align">Login to your account</h4>
            <?php 
            /* If there is an error, a message will be displayed */
               if(isset($_GET['error'])) {
                    echo "<p class='red-text center'>An error has been logged</p>";
            }
            ?>
            <!-- START FORM -->
            <form action="includes/login.inc.php" method="POST">
              <div class="row">
                <div class="input-field col s12">
                <!-- Email fields -->
                  <i class="material-icons prefix">email</i>
                  <input type="email" id="email" class="validate" name="loginEmail"/>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                <!-- Password field -->
                  <i class="material-icons prefix">vpn_key</i>
                  <input type="password" id="password" class="validate" name="loginPassword"/>
                  <label for="email">Password</label>
                </div>
              </div>
              <div class="">
              <!-- Submit the form -->
                <button class="col s12 btn waves-effect waves-light" type="submit" name="btnLogin">SUBMIT</button>
              </div>
              <div class="left">
                <br>
                <a href="register.php"> Not Registered?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Import footer -->
<?php require("includes/footer.php")?>