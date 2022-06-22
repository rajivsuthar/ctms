<?php
session_start();
include_once( 'includes/config.php' );
if ( strlen( $_SESSION['aid'] == 0 ) ) {
    header( 'location:adash.php' );
} else {

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
    <title>ADMIN DASHBOARD</title>

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

    <?php
    //Total tests
    $query = mysqli_query( $con, 'select id from testrecord' );
    $totaltest = mysqli_num_rows( $query );
    //Assigned tests
    $query1 = mysqli_query( $con, "select id from testrecord where ReportStatus='Assigned'" );
    $totalassigned = mysqli_num_rows( $query1 );
    //On the way for sample collection
    $query2 = mysqli_query( $con, "select id from testrecord where ReportStatus='On the Way for Collection'" );
    $totalontheway = mysqli_num_rows( $query2 );
    //Sample Collected
    $query3 = mysqli_query( $con, "select id from testrecord where ReportStatus='Sample Collected'" );
    $totalsamplecollected = mysqli_num_rows( $query3 );
    //Sent for lab
    $query4 = mysqli_query( $con, "select id from testrecord where ReportStatus='Sent to Lab'" );
    $totalsenttolab = mysqli_num_rows( $query4 );

    //Report Delivered
    $query5 = mysqli_query( $con, "select id from testrecord where ReportStatus='Delivered'" );
    $totaldelivered = mysqli_num_rows( $query5 );

    //Totall Registered Patients
    $query6 = mysqli_query( $con, 'select id from patients' );
    $totalpatients = mysqli_num_rows( $query6 );

    //Totall Registered Phlebotomist
    $query7 = mysqli_query( $con, 'select id from phlebotomist' );
    $totalphlebotomist = mysqli_num_rows( $query7 );
    ?>
    <!-- Begin Page Content -->
    <div class = 'container-fluid px-lg-4'>
    <div class = 'row'>
    <div class = 'col-md-12 mt-lg-4 mt-4'>
    <!-- Page Heading -->
    <div class = 'd-sm-flex align-items-center justify-content-between mb-4'>
    <h1 class = 'h3 mb-0 text-gray-800'>Dashboard</h1>
    <a href = 'search2.php' class = 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><i class = 'fas fa-download fa-sm text-white-50'></i>
    Generate Report</a>
    </div>
    </div>
    <div class = 'col-md-12'>
    <div class = 'row'>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #3b7ddd;'>
    <div class = 'card-body'>
    <a href = 'alltest.php' ><h5 class = 'card-title mb-4' style = 'color:#3b7ddd;'>TOTAL TESTS : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totaltest;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #1aff66;'>
    <div class = 'card-body'>
    <a href = 'assigned.php' ><h5 class = 'card-title mb-4' style = 'color:#1aff66;'>TOTAL ASSIGNED : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalassigned;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #4da6ff;'>
    <div class = 'card-body'>
    <a href = 'onway.php' ><h5 class = 'card-title mb-4' style = 'color:#4da6ff;'>ON THE WAY FOR SAMPLE COLLECTION : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalontheway;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #ffd633;'>
    <div class = 'card-body'>
    <a href = 'scollected.php' ><h5 class = 'card-title mb-4' style = 'color:#ffd633;'>SAMPLE COLLECTED : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalsamplecollected;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #ffd633;'>
    <div class = 'card-body'>
    <a href = 'sentlab.php' ><h5 class = 'card-title mb-4' style = 'color:#ffd633;'>SAMPLE SENT TO LAB : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalsenttolab;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = ' border-left:2px solid #4da6ff;'>
    <div class = 'card-body'>
    <a href = 'deleivered.php' ><h5 class = 'card-title mb-4' style = 'color: #4da6ff;'>REPORT DELIVERED : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totaldelivered;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = '  border-left:2px solid #1aff66;'>
    <div class = 'card-body'>
    <a href = ' ' ><h5 class = 'card-title mb-4' style = 'color:#1aff66;'>TOTAL REGISTERED PATIENTS : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalpatients;
    ?></h1></a>
    </div>
    </div>

    </div>
    <div class = 'col-sm-3'>
    <div class = 'card' style = 'border-left:4px solid #3b7ddd;'>
    <div class = 'card-body'>
    <a href = 'managep.php' ><h5 class = 'card-title mb-4' style = 'color:#3b7ddd;'>TOTAL REGISTERED PHLEBOTOMIST : </h5>
    <h1 class = 'display-5 mt-1 mb-3'><?php echo $totalphlebotomist;
    ?></h1></a>
    </div>
    </div>

    </div>

    </div>
    </div>

    </div>

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
<?php

?>
<?php }
?>