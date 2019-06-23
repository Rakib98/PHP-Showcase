<?php $page="log"; $activeLog=""; $activeReg=""; require_once("includes/header.php");require_once("includes/dbh.inc.php") ?>
<style>
  body {
  background-color: rgb(120, 165, 201);
  }
  .container .section {
  min-height: 635px;
  }
  table.striped > tbody > tr:nth-child(odd) {
 
 background-color: rgba(18, 79, 128, 0.116);

}
</style>
<div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h2 class="header center">Table with the login details</h2>
          <div class="card">
            <div class="card-stacked">
              <div class="card-content">
                <table class="striped highlight responsive-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>IP</th>
                      <th>Browser</th>
                      <th>OS</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $query = "SELECT * FROM tbl_login_info;";
                      $result = $conn -> query($query);

                      if (isset($_SESSION["userEmail"])) {
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                echo "<tr><td>" . $row["idInfo"] . "</td><td>" . $row["userEmail"]. "</td><td>" . $row["loginDate"] . "</td><td>" .$row["userIP"]. "</td><td>". $row["userBrowser"]. "</td><td>". $row["userOS"]. "</td></tr>";
                            }
                        }
                    }
                    else {
                      echo "</table>";
                      echo "<p class='red-text'>YOU NEED TO BE LOGGED IN, TO SEE THIS TABLE</p>";
                    }
                      ?>
                    <!-- <tr>
                      <td>Alvin</td>
                      <td>Eclair</td>
                      <td>$0.87</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var element = document.getElementById("activeLog");
    element.classList.add("active");
  </script>
<?php include_once("includes/footer.php");?>