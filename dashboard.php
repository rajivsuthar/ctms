<?php 
session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');
//error_reporting(0);

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
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="dashboard.php">
          <span class="align-middle">CTMS</span>
        </a>

				 <ul class="navbar-nav align-self-stretch">
	 
	<li class=""> 
		  <a class="nav-link text-left"  href="dashboard.php" role="button" 
		  aria-haspopup="true" aria-expanded="false">
       <i class="flaticon-bar-chart-1"></i>  Dashboard 
         </a>
		  </li>
	 
       <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>  COVID Testing
         </a>
		  <div class="collapse menu mega-dropdown" id="collapseExample2">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="newuser.php">New User</a></li>
											<li><a href="registereduser.php">Already Registered User</a></li>
										    
										    <!-- <li><a href="">Asp.net</a></li> -->
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
          <li class=""> 
		  <a class="nav-link text-left"  href="psearchreport.php" role="button" 
		  aria-haspopup="true" aria-expanded="false">
       <i class="flaticon-bar-chart-1"></i>  Test Report
         </a>
		  </li>
          <li class=""> 
		  <a class="nav-link text-left"  href="alogin.php" role="button" 
		  aria-haspopup="true" aria-expanded="false">
       <i class="flaticon-bar-chart-1"></i>  Admin
         </a>
		  </li>
		  
		  </ul>

				
			</div>
	   
	   
    </nav>
        <!-- /#sidebar-wrapper -->










        <!-- Page Content -->
        <div id="page-content-wrapper">
         
			
			<div id="content">

       <div class="container-fluid p-0 px-lg-0 px-md-0">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light my-navbar" style="height:64px;text-align:center;">
         
          <!-- Sidebar Toggle (Topbar) -->
            <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
               <span></span>
			    <span></span>
				 <span></span>
            </div>
            <!-- <p style="color:#222e3c;padding-left:60px;text-align:center;">Welcome To CTMS(COVID Test Management System)!!</p> -->
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
<div class="row">
<div class="col-md-12 mt-lg-4 mt-4">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="padding-left:20px;">Welcome To CTMS(COVID Test Management System):</h1>
          
          </div>
		  </div>
<div class="col-md-12">
       <div class="row">
									
									
		</div>
</div>


     
                   
                   

        </div>

        </div><br>
        <div class="card shadow mb-4" style="margin-left:40px; margin-right:40px;">
                        <div class="card-header py-3" >
                            <h6 class="m-0 font-weight-bold " style="color:#222e3c;">Statewise Testing Dashboard :</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="assignto" method="post">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Tests Done</th>
                                        </tr>
                                    </thead>
                                      <tfoot>
                                            <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Tests Done</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $query=mysqli_query($con,"select patients.State as state,count(testrecord.id) as totaltest from testrecord
join patients on patients.MobileNumber=testrecord.PatientMobileNumber
group by patients.State
    ");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['state'];?></td>
                                            <td><?php echo $row['totaltest'];?></td>
                                        </tr>
<?php $cnt++;} ?>

                                    </tbody>
                                </table>
                                     </form>
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