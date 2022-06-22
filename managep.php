<?php session_start();
//DB conncetion
include_once( 'includes/config.php' );
error_reporting( 0 );

//Code for record deletion
if ( $_GET['action'] == 'delete' ) {

    $pid = intval( $_GET['pid'] );

    $query = mysqli_query( $con, "delete from phlebotomist where id='$pid'" );
    echo '<script>alert("Record deleted")</script>';
    echo "<script>window.location.href='managep.php'</script>";
}
// }
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
<h1 class = 'h3 mb-0 text-gray-800'>Manage Phlebotomist :</h1>
</div>
</div>
<div class = 'col-md-12'>
<div class = 'row'>

</div>
</div>

</div>

</div>

<div class = 'card shadow mb-4' style = 'margin-left:40px;margin-right:40px'>
<div class = 'card-header py-3'>
<h6 class = 'm-0 font-weight-bold'  style = 'color:#222e3c;'>Phlebotomist Information</h6>
</div>
<div class = 'card-body'>
<div class = 'table-responsive'>
<table class = 'table table-bordered' id = 'dataTable' width = '100%' cellspacing = '0'>
<thead>
<tr>
<th>Sno.</th>
<th>Emp Id</th>
<th>Name</th>
<th>Mobile No.</th>
<th>Reg. Date</th>
<th>Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th>Sno.</th>
<th>Emp Id</th>
<th>Name</th>
<th>Mobile No.</th>
<th>Reg. Date</th>
<th>Action</th>
</tr>
</tfoot>
<tbody>
<?php $query = mysqli_query( $con, 'select * from phlebotomist' );
$cnt = 1;
while( $row = mysqli_fetch_array( $query ) ) {
    ?>

    <tr>
    <td><?php echo $cnt;
    ?></td>
    <td><?php echo $row['EmpID'];
    ?></td>
    <td><?php echo $row['FullName'];
    ?></td>
    <td><?php echo $row['MobileNumber'];
    ?></td>
    <td><?php echo $row['RegDate'];
    ?></td>
    <td>

    <a href = "editp1.php?pid=<?php echo $row['id'];?>"><i class = 'fas fa-edit' style = 'color:blue'></i></a> |

    <a href = "managep.php?pid=<?php echo $row['id'];?>&&action=delete" onclick = "return confirm('Do you really want to delete this record?');"><i class = 'fa fa-trash' aria-hidden = 'true' style = 'color:red' title = 'Delete this record'></i></a></td>
    </tr>
    <?php }
    ?>
    </tbody>
    </table>
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