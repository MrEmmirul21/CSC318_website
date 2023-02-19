<?php
include("dbconn.php");
if (isset($POST['submit']))
{
    $file = $_FILES['file'];
    /*print_r($file);*/
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf');

    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize < 1000000)
            {
                $fileNameNew = uniqid('', true).$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_upload_file($fileTmpName, $fileDestination);
                
                    $sbillno = $_POST['sbillno'];
    $sql = "UPDATE studentbill SET statusID=2, receipt='$file' WHERE studentBillNo=$sbillno";
    if (mysqli_query($dbconn, $sql)) {
        echo "Record updated successfully";
        header("Location: studentbill.php? uploadsuccess");
    }
    else {
        echo "Error updating record: " . mysqli_error($dbconn);
    }
                
            }
            else
            {
                echo "Your file is too big !";
            }
        }
        else
        {
            echo "There was an error uploading your file.";
        }
    }
    else
    {
        echo "You cannot upload files of this type !";
    }
    

}