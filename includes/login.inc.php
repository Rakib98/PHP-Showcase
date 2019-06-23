<?php
include_once("userInfo.php");
/* Check if the user clicked the login button */
if(isset($_POST['btnLogin'])) {
    /* Require the database connection script */
    require 'dbh.inc.php';

    /* creates variables to store email and password */
    $LogEmail = $_POST['loginEmail'];
    $LogPass = $_POST['loginPassword'];

    /* Check if the fields are empty */
    if(empty($LogEmail) || empty($LogPass)) {
        /* SQL query to insert a new error record to the error table. This query inserts an Empty Field type of error. */
        $sqlErr = "INSERT INTO tbl_error_log (errorType, errorDate) VALUES ('Empty fields', NOW());";
        if (mysqli_query($conn, $sqlErr)) {
            //echo "New record created successfully";
            header("Location: ../login.php?error=emptyFields");
            exit();
        }
    }
    /* If the fields are not empty */
    else {
        /* SQL query */
        $sql = "SELECT * FROM tbl_users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);

        /* If the sql statement fails, return error inside URL and redirect to login page */
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlError");
            exit();
        }
        /* in case of no SQL errors */
        else {
            /* Creates a prepared stament */
            mysqli_stmt_bind_param($stmt, "s", $LogEmail);
            mysqli_stmt_execute($stmt);
            /* Store the statement */
            $result = mysqli_stmt_get_result($stmt);
            
            /* check if the password mathces the password in the database */
            if($row= mysqli_fetch_assoc($result)) {
                /* hashes the passowrd and then cheks if it matches with the password in the dabase */
                $passCheck = password_verify($LogPass, $row['userPassword']);

                /* If the passwords do not match */
                if ($passCheck == false) {
                    $sqlErr = "INSERT INTO tbl_error_log (errorType, errorDate) VALUES ('Incorrect password', NOW());";
                    if (mysqli_query($conn, $sqlErr)) {
                        header("Location: ../login.php?error=passwordError");
                        exit();
                    }
                }

                /* If passwords match */
                else if ($passCheck == true) {
                    /* Create a session */
                    session_start();
                    /* Sets the id and email */
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userEmail'] = $row['email'];
                    
                    /* Create variables for the log */
                    $userMail = $_SESSION['userEmail'];
                    $ip=getClientIPAddress();
                    $browser = getBrowser();
                    $os = getOperatingSystem();
                    
                    /* SQL query that inserts the information into the table */
                    $sqlLog = "INSERT INTO tbl_login_info (userEmail, loginDate, userIP, userBrowser, userOS) VALUES ('{$userMail}', NOW(), '{$ip}', '{$browser}', '{$os}');";
                   
                    /* Check if the query succeeded */
                    if ($conn->query($sqlLog) === TRUE) {
                        /* Redirects too the homepage */
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }

                /* Any other cases */
                else {
                    $sqlErr = "INSERT INTO tbl_error_log (errorType, errorDate) VALUES ('Incorrect password', NOW());";
                    if (mysqli_query($conn, $sqlErr)) {
                        header("Location: ../login.php?error=passwordError");
                        exit();
                    }
                }

            }

            else {
                $sqlErr = "INSERT INTO tbl_error_log (errorType, errorDate) VALUES ('Email does not exist', NOW());";
                    if (mysqli_query($conn, $sqlErr)) {
                        header("Location: ../login.php?error=noEmail");
                        exit();
                    }
            }
        }
    }
}

/* Redirect to the homepage, if the user tries to access this page manually. */
else {
    header("Location: ../index.php");
    exit();
}