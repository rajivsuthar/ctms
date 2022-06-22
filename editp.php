<?php session_start();
//DB conncetion
include_once('includes/config.php');


//Code for updation
if(isset($_POST['update'])){
$pid=intval($_GET['pid']);    
//getting post values
$empid=$_POST['empid'];
$fname=$_POST['fullname'];
$mnumber=$_POST['mobilenumber'];
$query="update phlebotomist set FullName='$fname',MobileNumber='$mnumber' where id='$pid'";
$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Phlebotomist record updated successfully.")</script>';
  echo "<script>window.location.href='managep.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='managep.php'</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	    <!--fontawesome-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		 <link rel="stylesheet" href="font/font/flaticon.css">
         <link rel="stylesheet" href="dash.css">

</head>
<div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
        <?php include_once( 'includes/sidebar.php' );
    ?>

        <!-- /#sidebar-wrapper -->










        <!-- Page Content -->
        <div id="page-content-wrapper">
         
			
			<div id="content">

       <div class="container-fluid p-0 px-lg-0 px-md-0">
        <!-- Topbar -->
        <?php include_once( 'includes/topbar.php' );
    ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
<div class="row">
<div class="col-md-12 mt-lg-4 mt-4">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Phlebotomist Info :</h1>
          </div>
		  </div>
<div class="col-md-12">
       <div class="row">
									
									
		</div>
</div>


     
                   
                   

        </div>
        <?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select * from phlebotomist where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>                 
<!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $row['FullName'];?>'s Profile</h1> -->
<form name="editphlebotomist" method="post">
  <div class="row">

                        <div class="col-lg-8">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold"  style="color:#222e3c;">Personal Information</h6>
                                </div>
                                <div class="card-body">

 <div class="form-group">
                            <label>Registration Date: </label>

                                     <?php echo $row['RegDate'];?>        
                                        </div>

                  <div class="form-group">
                            <label>Employee Id</label>
                             <input type="text" class="form-control" id="empid" name="empid"  value="<?php echo $row['EmpID'];?>"  readonly="true" >
                                             
                                        </div>

                        <div class="form-group">
                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" value="<?php echo $row['FullName'];?>" required="true">
                                        </div>
                                        <div class="form-group">
                                             <label>Mobile Number</label>
                                  <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo $row['MobileNumber'];?>" required="true" >
                                          
                                        </div>
                        


        <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" style="background:#2c3e52;" name="update" id="update" value="Update">                           
                             </div>                                        

                                </div>
                            </div>

                        </div>
                    </div>
</form>
<?php } ?>


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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
  
 <script>
 
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

});
  </script>

   
   
 
  
  
  </body>
</html>