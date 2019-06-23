<?php
/* Check if the user clicked the Register button */
if (isset($_POST['btnRegister'])) {
    /* Gets the database connection file */
    require 'dbh.inc.php';

    /* Creates variables from the text inputs in the registration form */
    $firstName = $_POST['registerName'];
    $lastName = $_POST['registerLastName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $passwordRepeat = $_POST['repeatPassword'];

    /* Check if one of the fields is empty */
    if(empty($firstName) || empty($lastName) || empty($email) ||  empty($password) || empty($passwordRepeat)) {
        header("Location: ../register.php?error=emptyfields&firstName=".$firstName."&lastName=".$lastName. "&mail=".$email);
        exit();
    }

    /* Restrict the type of characters that the user can input inside the name and last name fields  */
    else if (!preg_match("/^[a-zA-Z ]*$/", $firstName) || !preg_match("/^[a-zA-Z ]*$/", $lastName)) {
        header("Location: ../register.php?error=invalidName&mail=".$email);
        exit();
    }

    /* Check if the repeated passowrd match the passwrod */
    else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordMatch&firstName=".$firstName."&lastName=".$lastName. "&mail=".$email);
            exit();
    }

    /* Check if the email is a duplicate within the database */
    else {
        /* Creates the SQL query to select emails */
        $sql = "SELECT email FROM tbl_users WHERE email =?;";

        /* Creates a statement to use as prepared statement */
        $stmt = mysqli_stmt_init($conn);

        /* if the statement fails, return an error, and goeas back to register page */
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlError");
            exit();
        }
        else {
            /* assign the data type string to the statement */
            mysqli_stmt_bind_param($stmt, "s", $email);
            /* execute the statement */
            mysqli_stmt_execute($stmt);
            /* store the statement */
            mysqli_stmt_store_result($stmt);
            /* counts the rows that the statement returned */
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            /* check if the rows are greater than 0 */
            if($resultCheck > 0) {
                header("Location: ../register.php?error=emailTaken&firstName=".$firstName."&lastName=".$lastName);
                exit();
            }
            else {
                /* Query with prepared stament to register a new user */
                $sql = "INSERT INTO tbl_users (firstName, lastName, email, userPassword) VALUES (?, ?, ?, ?);";
                /* Initialise the satement */
                $stmt = mysqli_stmt_init($conn);

                /* Prepare the stament, and check if there are errors */
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    /* If there are errors, redirect to register page */
                    header("Location: ../register.php?error=sqlError");
                    exit();
                }
                /* If no errors */
                else {
                    /* Creates the hashed password to store in the database */
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    /* Substitute the question marks, with the variables. The fours s, stands for the 4 strings to send to the database */
                    mysqli_stmt_bind_param($stmt, "ssss", $firstName,$lastName,$email,$hashedPass);
                    /* Execute the statement */
                    mysqli_stmt_execute($stmt);
                    /* Redirect to the register page */
                    header("Location: ../register.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../register.php?");
    exit();
}