<?php
include("dbconn.php");

if(isset($_POST['validate']))
{
    $sbillno = $_POST['sbillno'];
    $sql = "UPDATE studentbill SET statusID=3 WHERE studentBillNo=$sbillno";
    if (mysqli_query($dbconn, $sql)) {
        echo "The payment has verified successfully";
        header("Location: adminbill.php? uploadsuccess");
    }
    else {
        echo "Error updating record: " . mysqli_error($dbconn);
    }

}

?>

