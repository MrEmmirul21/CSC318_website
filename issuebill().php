<?php
session_start();
include("dbconn.php");

function generateBillNo($dbconn)
{
    $sql = "SELECT * FROM bill WHERE billNo=(SELECT max(billNo) FROM bill)";
    $qry = mysqli_query($dbconn,$sql); //performs a query against a db
    $row = mysqli_num_rows($qry);
    
    if($row>0)
    {
        $r = mysqli_fetch_assoc($qry);
        //echo "Last inserted bill is: " . $r["billNo"];
        return $r["billNo"];
    } 
    else {
        return 0;
    }
}

$billNo = generateBillNo($dbconn) + 1;
$billName = $_POST['billName'];
$billDate = date("d M Y");
$amount = $_POST['amount'];
$deadline = $_POST['deadline'];
$adminid = $_SESSION["adminID"];

$sql = "INSERT INTO bill (billNo,billName,billDate,amount,deadline,adminID) VALUES (".$billNo.",'".$billName."','".$billDate."',".$amount.",'".$deadline."',".$adminid.")";

if (mysqli_query($dbconn, $sql)) {
  echo"<script language='javascript'>alert('Bill is success issued');</script>";
} 
else {
  echo "First error: " . $sql . " " . mysqli_error($dbconn) . "<br>";
}
//generate student bill
$semester = $_POST['semester'];

if ($semester > 0){
    $sql1 = "SELECT * FROM student WHERE $semester";
    $qry1 = mysqli_query($dbconn,$sql1);
    
    if (mysqli_num_rows($qry1) > 0) {
        $statusID = 1;
        $receipt = null;
        
        //generate bill for each student in semester >0
        while($row = mysqli_fetch_assoc($qry1)) {
            
            $studID = $row["studentID"];
            $studentBillNo = $studID.$billNo;
            
            $sql2 = "INSERT INTO studentbill (studentBillNo,studentID,statusID,billNo,receipt) VALUES (".$studentBillNo.",".$studID.",".$statusID.",".$billNo.",'".$receipt."')";
    
            if (mysqli_query($dbconn, $sql2)) {
                echo $studentBillNo . "is successful generated";
                header("Location: adminbill.php");
            } 
            else {
                echo "Second error: " . $sql2 . " ". mysqli_error($dbconn) . "<br>";
            }
        }
        echo"<script language='javascript'>alert('Student bill is success issued');</script>";
    }
    else {
        echo "There is no student in semester " . $semester;
    }
}
else {
    $sql3 = "SELECT * FROM student";
    $qry3 = mysqli_query($dbconn,$sql3);
    
    if (mysqli_num_rows($qry3) > 0) {
        $statusID = 1;
        $receipt = null;
        
        //generate bill for all student
        while($row = mysqli_fetch_assoc($qry3)) {
            
            $studID = $row["studentID"];
            $studentBillNo = $studID.$billNo;
            
            $sql3 = "INSERT INTO studentbill (studentBillNo,studentID,statusID,billNo,receipt) VALUES (".$studentBillNo.",".$studID.",".$statusID.",".$billNo.",'".$receipt."')";
    
            if (mysqli_query($dbconn, $sql3)) {
                echo $studentBillNo . "is successful generated";
                header("Location: adminbill.php");
            } 
            else {
                echo "Second error: " . $sql3 . " ". mysqli_error($dbconn) . "<br>";
            }
        }
        echo"<script language='javascript'>alert('Student bill is success issued');</script>";
    } 
    else {
        echo "There is no student in the record. ";
    }
}
    
?>