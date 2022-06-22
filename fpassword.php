<?php
session_start();
include( 'includes/config.php' );

if ( isset( $_POST['submit'] ) )
 {
    $contactno = $_POST['contactno'];
    $username = $_POST['username'];
    $password = $_POST['newpassword'];
    $query = mysqli_query( $con, "select ID from admin where  AdminUserName='$username' and MobileNumber='$contactno' " );

    $ret = mysqli_num_rows( $query );
    if ( $ret>0 ) {
        $query1 = mysqli_query( $con, "update admin set Password='$password'  where  AdminUserName='$username' && MobileNumber='$contactno' " );
        if ( $query1 )
 {
            echo "<script>alert('Password successfully changed');</script>";
            echo "<script>window.location.href='alogin.php'</script>";

        }

    } else {

        echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
}
?>

<!doctype html>
<html lang = 'en'>
<head>
<!-- Required meta tags -->
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1'>

<!-- Bootstrap CSS -->
<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel = 'stylesheet' integrity = 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin = 'anonymous'>

<title>ADMIN LOGIN</title>
<style>
* {

    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    background: lightblue;
    /* background: ;
    */
}
.row {
    background:white;
    border-radius: 30px;
}
.img {
    border-top-left-radius:30px;
    border-bottom-left-radius:30px;

}
.btn1 {
    border: none;
    outline: none;
    height:50px;
    width: 100%;
    background-color: lightblue;
    color:black;
    font-weight:normal;
    border-radius:4px;

}
.btn1:hover {
    background:white;
    border:1px solid skyblue;
    color:black;
}
a {
    padding-top:20px;
    padding-bottom:20px;
    text-decoration:none;
    font-weight:normal;
    color:black;
}

</style>
<script type = 'text/javascript'>

function checkpass()
 {
    if ( document.changepassword.newpassword.value != document.changepassword.confirmpassword.value )
 {
        alert( 'New Password and Confirm Password field does not match' );
        document.changepassword.confirmpassword.focus();
        return false;
    }
    return true;
}

</script>
</head>
<body>

<section class = 'Form my-4 mx-5'>
<div class = 'container'>
<div class = 'row no-gutters'>
<div class = 'col-lg-5'>
<img src = 'img.jpg' class = 'img-fluid' alt = '' style = 'padding-top:40px; padding-bottom:40px;'>
</div>
<div class = 'col-lg-7 px-5 pt-5'>
<h2 class = 'font-weight-bold py-3' style = 'padding-left:40px;color:#222e3c;font-weight:normal;'>Password Recovery :</h2>
<!-- <h4 style = 'color:gray;'> COVID Testing Management System</h4> -->
<form style = 'padding-left:40px;' name = 'login' method = 'post' name = 'changepassword'>
<div class = 'form-row'>
<div class = 'col-lg-7'>
<input type = 'text' name = 'username'  id = 'username' placeholder = 'Enter Username' class = 'form-control my-4 p-3' required = 'true'>

</div>
</div>
<div class = 'form-row'>
<div class = 'col-lg-7'>
<input type = 'text' name = 'contactno' placeholder = 'Enter Mobile Number' class = 'form-control my-4 p-3'>

</div>
</div>
<div class = 'form-row'>
<div class = 'col-lg-7'>
<input type = 'password' name = 'newpassword' placeholder = 'New Password' class = 'form-control my-4 p-3'>

</div>
</div>
<div class = 'form-row'>
<div class = 'col-lg-7'>
<input type = 'password' name = 'confirmpassword'  placeholder = 'Confirm Password' class = 'form-control my-4 p-3'>

</div>
</div>
<div class = 'form-row'>
<div class = 'col-lg-7'>
<input type = 'submit' name = 'submit' class = 'btn1 ' value = 'Submit'>
<br>
<a href = 'alogin.php' style = 'float:left;'>LOGIN !</a>
<a href = 'dashboard.php' style = 'float: right;'>HOME</a>
</div>

</div>

</form>

</div>
</div>
</div>

</section>

<!-- Optional JavaScript;
choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity = 'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin = 'anonymous'></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src = 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js' integrity = 'sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin = 'anonymous'></script>
<script src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js' integrity = 'sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin = 'anonymous'></script>
-->
</body>
</html>
