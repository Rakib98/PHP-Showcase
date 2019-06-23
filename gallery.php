<!-- Import header -->
<?php $page = "gallery"; $activeLog=""; $activeReg=""; require_once("includes/header.php")?>
<style>
  body {
  background-color: rgb(120, 165, 201);
  }
  .input-field input{
  border-bottom: 1px solid #1565c0 !important;
  box-shadow: 0 1px 0 0 #1565c0 !important
  }
  .gallery-container {
  width:100%;
  display: flex;
  flex-wrap: wrap;
  }
  .gallery-container a {
  /* padding: 1em; */
  }
  .gallery-container img {
  margin: 4px;
  }
</style>

<div class="container">
  <div class="row">
    <h3 class="center">GALLERY</h3>
    <?php 
      if (isset($_SESSION['userEmail'])) {
        echo '<div class="row"><form action="includes/uploadImg.inc.php" method="post" enctype ="multipart/form-data">
        <div class="file-field input-field">
          <div class="btn blue darken-1">
            <span>File</span>
            <input type="file" name="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
          <button type="submit" name="submitImage" class="btn col s12 blue darken-1">Upload</button>
        </div>
      </form></div>';
      }
      ?>
    <div class="blue lighten-5" style="padding-left:2px;">
      <?php 
        if(isset($_GET["error"])) {
          if($_GET["error"]== "FileIsTooBig") {
            echo '<p>File is too big to be uploaded. Please try again.</p>';
          }
          else if($_GET["error"]== "NoFileUploaded") {
            echo '<p>No file has been selected. Please try again.</p>';
          }
          else if($_GET["error"]== "PartialUpload") {
            echo '<p>Only part of the file has been submitted. Please try again.</p>';
          }
          else if($_GET["error"]== "FailedToSave") {
            echo '<p>The servre failed to save the file. Please try again.</p>';
          }
          else if($_GET["error"]== "ExtensionNotAllowed") {
            echo '<p>The extension of the file is not allowed. Allowed: jpg, jpeg, png and gifs. Please try again.</p>';
          }
        }
        ?>
    </div>
  </div>
  <div class="gallery-container">
    <?php
      /* Includes the database file, so that a connection can be estabilished. */
        include_once "includes/dbh.inc.php";
        
        /* SQL Query to select the images, and order them by orderGallery */
        $sql = "SELECT * FROM tbl_gallery ORDER BY  orderGallery DESC;";
        $stmt = mysqli_stmt_init($conn);
        
        /* Check if the query fails */
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          /* Error in case the query fails */
          echo "SQL statemen failed on gallery page";
        }
        else {
          /* If the query is successful, execute the statement */
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
        
          /* Loop through all the rows of the gallery table, and output an image tag for each one of them */
          while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="card z-depth-1" style="margin-right:5px;"><img class="materialboxed z-depth-1" height="200" src="img/uploaded/' .$row["imgFullNameGallery"]. '">' . '</div>';
          }
        }
          ?>
  </div>
</div>
<!-- Import footer -->
<?php require("includes/footer.php")?>