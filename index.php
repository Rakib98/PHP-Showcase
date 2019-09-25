<!-- Import the header -->
<?php $page="home"; $activeLog=""; $activeReg=""; require_once("includes/header.php") ?>
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center" style="text-transform: uppercase; font-size:60px;">PHP SHOWCASE</h1>
      <div class="row center">
        <h5 class="header col s12 light">A website created to showcase PHP skills, and the use of Materialize CSS</h5>
      </div>
      <br><br>
    </div>
  </div>
  <div class="parallax"><img src="img/01.jpg" alt="Unsplashed background img 1" style="filter:blur(2px)"></div>
</div>
<div class="z-depth-2">
  <div class="light-blue accent-3">
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col-md">
            <h4 class="header center">Introduction</h4>
            <p class="center black-text">On this website you will find some examples of PHP functions. The website is implementing a Login/Register system by using MySQL database; it has an image upload and view system. It also logs errors, and logins.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="parallax-container valign-wrapper">
  <!-- <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h3 class="header col s12">Quotes</h3>
        <h2 class="header col s12" id="greeting" style="font-weight:bold; font-style:italic; text-shadow: rgb(0, 0, 0) 1px 1px"></h2>
      </div>
    </div>
    </div> -->
  <div class="parallax"><img src="img/02.jpg" alt="Unsplashed background img 2" style="filter:blur(2px)"></div>
</div>
<div class="z-depth-2">
  <div class="light-blue accent-3">
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col s12 center">
            <h3><i class="mdi-content-send brown-text"></i></h3>
            <h4>More info</h4>
            <p>The login logs, will record user's IP, browser, OS, date and time of the login. These data might be used for analytics</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="parallax-container valign-wrapper">
  <!-- <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
    </div>
    </div> -->
  <div class="parallax"><img src="img/04.jpg" alt="Unsplashed background img 3" style="filter:blur(2px)"></div>
</div>
<!-- Import footer -->
<?php require("includes/footer.php") ?>