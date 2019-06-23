<?php

if(isset($_POST['submitImage'])) {
    /* Create an array that stores all the file information */
    $file = $_FILES['file'];

    //Create variables to store the different file information
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //Divide the file name, so that we can save the extension
    $fileExt = explode(".", $fileName);
    /* converts the extension into lowercase, as sometimes the file has extensions like PNG */
    $fileactualExt = strtolower(end($fileExt));

    /* Array with all the allowed extentions */
    $allowed = array("jpeg", "jpg", "png", "gif");

    if ($fileError == 4) {
        //echo "No file has been uploaded";
        header("Location:../gallery.php?error=NoFileUploaded");
        exit();
    }
    /* Check if iamge extension is in the array of allowed extensions */
    if(in_array($fileactualExt, $allowed)) {

        /* Check if any errors have been created */
        if ($fileError == 0) {
            /* Check if the file is lower than 2 megabytes*/
            if ($fileSize < 2000000) {
                //false for smaller ID, true for 16 digits ID
                $imageFullName = uniqid("uploadedImg", false) . "." .$fileactualExt;
                //Directory in which the file will be saved
                $fileDestination = "../img/uploaded/" . $imageFullName;
                //Saves the file
                move_uploaded_file($fileTempName, $fileDestination);

                // Includes the database file, so that a connection can be created
                include_once "dbh.inc.php";
                /* Query to select the iamges */
                $sql = "SELECT * FROM tbl_gallery;";
                $stmt = mysqli_stmt_init($conn);
                /* Error handler */
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL Statement failed";
                }
                else {
                    /* Runs the SQL statement */
                    mysqli_stmt_execute($stmt);
                    /* Saves the results */
                    $result = mysqli_stmt_get_result($stmt);
                    $rowCount = mysqli_num_rows($result);
                    $setImageOrder = $rowCount + 1;

                    /* Query to insert a new image */
                    $sql = "INSERT INTO tbl_gallery (imgFullNameGallery, orderGallery) VALUES (?, ?);";
                    /* Check if the query failed */
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        /* If the query failed, output an error */
                        echo "SQL Statement failed on upload image inc";
                    }
                    else {
                        /* If it did not fail, execute the query */
                        mysqli_stmt_bind_param($stmt, "ss", $imageFullName, $setImageOrder);
                        mysqli_stmt_execute($stmt);

                        /* Save the file */
                        move_uploaded_file($fileTempNam, $fileDestination);

                        /* Redirect to the gallery */
                        header("Location:../gallery.php?upload=success");
                    }
                }
            }
            else {
                //echo "The file is too big";
                header("Location:../gallery.php?error=FileIsTooBig");
                exit();
            }
        }
        else if ($fileError == 1 || $fileSize == 2){
            //echo "The file is too big";
            header("Location:../gallery.php?error=FileIsTooBig");
            exit();
        }
        else if ($fileError == 3) {
            //echo "The file has been uploaded only partially";
            header("Location:../gallery.php?error=PartialUpload");
            exit();
        }
        else if ($fileError == 7) {
            //echo "Failed to save the file";
            header("Location:../gallery.php?error=FailedToSave");
            exit();
        }
    }
    else {
        //echo "Check if the image has supported extension!";
        header("Location:../gallery.php?error=ExtensionNotAllowed");
        exit();
    }
}