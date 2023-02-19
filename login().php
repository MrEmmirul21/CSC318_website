<?php
session_start();
include("dbconn.php");

if(isset($_POST['Submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "2021" && $password == "111")
    {
        /* execute SQL command*/
        $sql = "SELECT * FROM admins WHERE adminID = '$username'
                AND adminPassword = '$password'";

        echo $sql;
        $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);
        if($row == 0)
        {
            echo "Invalid Username/Password. Click here to <a href='index.php'>login</a>. ";
        }
        else
        {
            $r = mysqli_fetch_assoc($query);
            $_SESSION['adminID'] = $r['adminID'];
            $_SESSION['adminName'] = $r['adminName'];
            header("Location: dashAdmin.php");
        }
    }
    else
    {
        /* execute SQL command*/
        $sql = "SELECT * FROM student WHERE studentID = '$username' AND studentPassword = '$password'";

        echo $sql;
        $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);
        if($row == 0)
        {
            echo "Invalid Username/Password. Click here to <a href='index.php'>login</a>. ";
        }
        else
        {
            $r = mysqli_fetch_assoc($query);
            $_SESSION['studentID'] = $r['studentID'];
            $_SESSION['studentName'] = $r['studentName'];
            header("Location: dashStudent.php");
        }
    }
}

?>