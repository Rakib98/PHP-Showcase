<!-- Import header -->
<?php $page = "register";$activeReg="active";$activeLog = ""; require_once("includes/header.php")?>
<style>
  body {
  background-color: rgb(120, 165, 201);
  }
  .card {
  /* min-height: 500px; */
  }
  /* label color */
  .input-field label {
  color: black;
  }
</style>
<div class="container">
  <div class="section">
    <div class="row">
      <h3 class="center">REGISTER</h3>
      <div class="col s12 l6 offset-l3">
        <div class="card grey lighten-3">
          <div class="card-content">
            <h4 class="card-title center-align">Create an account</h4>
            <?php
              /* check if there are any errors in signup process */
                  if(isset($_GET['error'])) {
                      if ($_GET['error'] == "emptyfields") {
                          echo "<p class='red-text center'>FIELDS CAN NOT BE EMPTY</p>";
                      }
                      else if ($_GET['error'] == "invalidName") {
                          echo "<p class='red-text center'>INVALID CHARACTER/S IN NAME FIELDS</p>";
                      }
                      else if ($_GET['error'] == "passwordMatch") {
                        echo "<p class='red-text center'>PASSWORDS DO NOT MATCH</p>";
                    }
                  }
                  /* if there are no errors, a success message is displayed */
                  else if (isset($_GET['signup'])) {
                      if($_GET['signup']== "success") {
                          echo "<p class='green-text center'>SIGNUP SUCCESSFUL</p>";
                      }
                  }
              ?>
            <!-- START FORM -->
            <form action="includes/signup.inc.php" method="POST">
              <!-- NAME FIELDS-->
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input type="text" id="name" class="validate" name="registerName"/>
                  <label for="name">First Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input type="text" id="last_name" class="validate" name="registerLastName"/>
                  <label for="last_name">Last Name</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input type="email" id="email" class="validate" name="registerEmail"/>
                  <label for="email">Email</label>
                </div>
              </div>
              <!-- PASSWORD FIELDS -->
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input type="password" id="password" class="validate" name="registerPassword"/>
                  <label for="password">Password</label>
                </div>
              </div>
              <!-- Repeat password -->
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input type="password" id="passwordRepeat" class="validate" name="repeatPassword"/>
                  <label for="passwordRepeat">Repeat Password</label>
                </div>
              </div>
              <!-- Button -->
              <div class="row">
                <button class="col s12 light-blue accent-3 btn waves-effect waves-light" type="submit" name="btnRegister">REGISTER</button>
              </div>
              <div class="row">
                <br>
                <a href="login.php">Already have an account??</a>
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