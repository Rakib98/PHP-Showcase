<?php require_once("userInfo.php");?>
<style>
  ul i {
  font-size: 2em;
  margin-right: 5px;
  }
  ul i:hover {
  transform: scale(1.1);
  cursor: pointer;
  color: rgb(116, 171, 207);
  }
  .page-footer ul li a:hover {
  text-decoration: underline;
  }
</style>
<script>
  document.cookie = 'res=' + screen.width + 'px X ' + screen.height + 'px;'
</script>
<footer class="page-footer light-blue darken-4">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">PHP SHOWCASE</h5>
        <p class="grey-text text-lighten-4">Browser used:
          <?php 
            echo getBrowser();
            ?>
        </p>
        <p class="grey-text text-lighten-4" id="screenRes">Screen resolution: 
          <?php
            if (isset($_COOKIE['res'])) {
              echo $_COOKIE['res'];
            }
            else {
              header("Refresh:0");
            }
            ?>
        </p>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Sitemap</h5>
        <ul>
          <li><a class="white-text" href="index.php">Home</a></li>
          <li><a class="white-text" href="gallery.php">Gallery</a></li>
          <li><a class="white-text" href="login.php">Login</a></li>
          <li><a class="white-text" href="register.php">Register</a></li>
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Social</h5>
        <ul>
          <i class="fab fa-facebook-square" class="waves-effect waves-light btn-small" data-toggle="tooltip" data-placement="bottom"
            title="Facebook"></i>
          <i class="fab fa-twitter-square" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Twitter"></i>
          <i class="fab fa-instagram" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Instagram"></i>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      &copy; Rakib Abdur
    </div>
  </div>
</footer>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<script src='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js'></script>
<script src="js/script.js"></script>
<script>
  M.AutoInit();
</script>
</body>
</html>