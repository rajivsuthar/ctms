<?php session_start();
//DB conncetion
include_once( 'includes/config.php' );
//validating Session
if ( strlen( $_SESSION['aid'] == 0 ) ) {
    header( 'location:logout.php' );
} else {

    if ( isset( $_POST['update'] ) )
 {
        $adminid = $_SESSION['aid'];
        $aname = $_POST['adminname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];

        $query = mysqli_query( $con, "update admin set AdminName='$aname', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'" );
        if ( $query ) {

            echo '<script>alert("Profile has been updated")</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang = 'en'>
    <head>
    <meta charset = 'UTF-8'>
    <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel = 'stylesheet' href = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity = 'sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin = 'anonymous'>
    <link href = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap' rel = 'stylesheet'>
    <title>Hello, world!</title>

    <link href = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap' rel = 'stylesheet'>
    <!--fontawesome-->
    <link rel = 'stylesheet' href = 'https://use.fontawesome.com/releases/v5.7.2/css/all.css'
    integrity = 'sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin = 'anonymous'>

    <link rel = 'stylesheet' href = 'font/font/flaticon.css'>
    <link rel = 'stylesheet' href = 'dash.css'>

    </head>
    <div id = 'wrapper'>
    <div class = 'overlay'></div>

    <!-- Sidebar -->
    <?php include_once( 'includes/sidebar.php' );
    ?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id = 'page-content-wrapper'>

    <div id = 'content'>

    <div class = 'container-fluid p-0 px-lg-0 px-md-0'>
    <!-- Topbar -->
    <?php include_once( 'includes/topbar.php' );
    ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class = 'container-fluid px-lg-4'>
    <div class = 'row'>
    <div class = 'col-md-12 mt-lg-4 mt-4'>
    <!-- Page Heading -->
    <div class = 'd-sm-flex align-items-center justify-content-between mb-4'>
    <h1 class = 'h3 mb-0 text-gray-800'>Admin Profile :</h1>
    </div>
    </div>
    <div class = 'col-md-12'>
    <form method = 'post'  name = 'adminprofile' >
    <div class = 'row'>

    </div>
    </div>

    </div>
    <!-- Basic Card Example -->
    <div class = 'col-lg-8'>
    <div class = 'card shadow mb-4'>

    <?php
    $adminid = $_SESSION['aid'];
    $ret = mysqli_query( $con, "select * from admin where ID='$adminid'" );
    $cnt = 1;
    while ( $row = mysqli_fetch_array( $ret ) ) {

        ?>

        <div class = 'card-header py-3'>
        <h6 class = 'm-0 font-weight-bold ' style = 'color:#222e3c;'>YOUR PROFILE :</h6>
        </div>
        <div class = 'card-body'>
        <div class = 'form-group'>
        <label>Admin Name</label>
        <input type = 'text' class = 'form-control' name = 'adminname' value = "<?php  echo $row['AdminName'];?>" required = 'true'>
        </div>

        <div class = 'form-group'>
        <label>User Name</label>
        <input type = 'text' class = 'form-control' name = 'username' value = "<?php  echo $row['AdminUserName'];?>" readonly = 'true'>
        </div>

        <div class = 'form-group'>
        <label>Email Id</label>
        <input type = 'email' class = 'form-control' name = 'email' value = "<?php  echo $row['Email'];?>" required = 'true'>
        </div>

        <div class = 'form-group'>
        <label>Contact Number</label>
        <input type = 'text' class = 'form-control' name = 'mobilenumber' value = "<?php  echo $row['MobileNumber'];?>" required = 'true' maxlength = '10'>
        </div>

        <?php }
        ?>
        <div class = 'form-group'>
        <input type = 'submit' class = 'btn btn-primary btn-user btn-block' style = 'background:#2c3e52;' name = 'update' id = 'update' value = 'Update'>
        </div>

        </div>
        </div>

        </div>
        </div>

        </div>
        </form>

        </div>
        <!-- /.container-fluid -->

        </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src = 'https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity = 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin = 'anonymous'></script>
        <script src = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity = 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin = 'anonymous'></script>
        <script src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity = 'sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin = 'anonymous'></script>

        <script src = 'https://code.jquery.com/jquery-3.5.1.js' integrity = 'sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=' crossorigin = 'anonymous'></script>

        <script>

        $( '#bar' ).click( function() {
            $( this ).toggleClass( 'open' );
            $( '#page-content-wrapper ,#sidebar-wrapper' ).toggleClass( 'toggled' );

        }
    );
    </script>

    </body>
    </html>
    <?php }
    ?>