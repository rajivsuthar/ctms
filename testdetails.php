<?php session_start();
//DB conncetion
include_once('includes/config.php');
// error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:alogin.php');
  } else{


//Code for Assign to
if (isset($_POST['submit'])) {
$testid=intval($_GET['tid']);    
$ato=$_POST['assignto']; 
$assignto=explode("-",$ato);
$aname=$assignto[0];
$pid=$assignto[1];
$status='Assigned';
$assigntime = date( 'd-m-Y h:i:s A', time ());
$query=mysqli_query($con,"update testrecord set ReportStatus='$status',AssignedtoName='$aname',AssignedtoEmpId='$pid',AssignedTime='$assigntime' where id='$testid'");
echo '<script>alert("Assigned to Phlebotomist successfully.")</script>';
echo "<script>window.location.href='assigned.php'</script>";
    }

//Code for Take Action
if (isset($_POST['takeaction'])) {
$orderid=intval($_GET['oid']);    
$status=$_POST['status'];
$remark=$_POST['remark'];
$rby=$_SESSION['aid'];
//For delivered Status
if($status=='Delivered'):
$uploadtime = date( 'd-m-Y h:i:s A', time ());
//For checking the image type
$reportfile=$_FILES["report"]["name"];
// get the image extension
$extension = substr($reportfile,strlen($reportfile)-4,strlen($reportfile));
// allowed extensions
$allowed_extensions = array(".doc",".pdf",".PDF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only doc / pdf format allowed');</script>";
}
else
{
//rename the image file
$newreportfile=md5($reportfile).time().$extension;

// Code for move image into directory
move_uploaded_file($_FILES["report"]["tmp_name"],"reports/".$newreportfile);
$query=mysqli_query($con,"insert into reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update testrecord set ReportStatus='$status',FinalReport='$newreportfile',ReportUploadTime='$uploadtime' where OrderNumber='$orderid'");
echo '<script>alert("Status updated successfully")</script>';
echo "<script>window.location.href='alltest.php'</script>";
}

// For other status
else:
$query=mysqli_query($con,"insert into reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update testrecord set ReportStatus='$status' where OrderNumber='$orderid'");
echo '<script>alert("Status updated successfully")</script>';
echo "<script>window.location.href='alltest.php'</script>";
endif;  

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
            <h1 class="h3 mb-0 text-gray-800">Test Details :</h1>
          </div>
          
		  </div>
<div class="col-md-12">
       <div class="row">
									
									
								</div>
</div>


     
                   
                   

        </div>
        <?php 
$testid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from testrecord
join patients on patients.MobileNumber=testrecord.PatientMobileNumber
where  testrecord.id='$testid'");
while($row=mysqli_fetch_array($query)){ 
    ?>


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:#222e3c;">Personal Information</h6>
                                </div>
                                <div class="card-body">
   
 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Full Name</th> 
    <td><?php echo $row['FullName'];?></td>
    </tr>

     <tr>
    <th>Mobile Number</th> 
    <td><?php echo $row['MobileNumber'];?></td>
    </tr>

     <tr>
    <th>DOB (Date of Birth)</th> 
    <td><?php echo $row['DateOfBirth'];?></td>
    </tr>


     <tr>
    <th>Govt Issued Id</th> 
    <td><?php echo $row['GovtIssuedId'];?></td>
    </tr>


     <tr>
    <th>Govt Issued Id No</th> 
    <td><?php echo $row['GovtIssuedIdNo'];?></td>
    </tr>


     <tr>
    <th>Full Address</th> 
    <td><?php echo $row['FullAddress'];?></td>
    </tr>

    <tr>
    <th>State</th> 
    <td><?php echo $row['State'];?></td>
    </tr>

    <tr>
    <th>Profile Reg Date</th> 
    <td><?php echo $row['RegistrationDate'];?></td>
    </tr>
 </table>

        
                                    
                                </div>
                            </div>
                        </div>



<!-- Test Information --->
<div class="col-lg-12">

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#222e3c;">Test Information</h6>
    </div>
    <div class="card-body">

<table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
<th>Order Number</th> 
<td><?php echo $row['OrderNumber'];?></td>
</tr>

<tr>
<th>Test Type</th> 
<td><?php echo $row['TestType'];?></td>
</tr>


<tr>
<th>Time Slot</th> 
<td><?php echo $row['TestTimeSlot'];?></td>
</tr>

<tr>
<th>Report Status</th> 
<td><?php if($row['ReportStatus']==''):
echo "Not Processed yet";
else:
echo $row['ReportStatus'];
endif;

?></td>
</tr>


<?php if($row['AssignedtoEmpId']!=''):?>
<tr>
<th>Assign To</th> 
<td><?php echo $row['AssignedtoName'];?>-(<?php echo $row['AssignedtoEmpId'];?>)</td>
</tr>

<tr>
<th>Assigned Date</th> 
<td><?php echo $row['AssignedTime'];?></td>
</tr>
<?php endif;?>
<?php if($row['FinalReport']!=''):?>
<tr>
<th>Report</th> 
<td><a href="reports/<?php echo $row['FinalReport'];?>" target="_blank">Download</a></td>
</tr>

<tr>
<th>Report Delivered Time</th> 
<td><?php echo $row['ReportUploadTime'];?></td>
</tr>
<?php endif;?>

</table>


<?php if($row['AssignedtoEmpId']==''): 
?>
<div class="form-group">
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#assignto">Assign To</button>
</div>                                        
<?php else: 
$rstatus=$row['ReportStatus'];
if($rstatus=='Assigned' || $rstatus=='On the Way for Collection' || $rstatus=='Sample Collected' || $rstatus=='Sent to Lab'):?>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#takeaction">Take Action</button>
<?php 
endif;
endif;?>    
    </div>
</div>

</div>
</div>
<?php } ?>
<!-- Test Tracking History --->
<?php
$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select * from reporttracking
join admin on admin.ID=reporttracking.RemarkBy
where reporttracking.OrderNumber='$orderid'");
$num=mysqli_num_rows($ret);
?>
<!-- 
<div class="row"> -->
                         <div class="col-lg-12">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:#222e3c;" align="center">Test  Tracking History</h6>
                                </div>
                                <div class="card-body">
<?php if($num>0){
?>
 <table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
    <th>Remark</th>
    <th>Status</th>
    <th>Remark Date</th>
    <th>Remark By</th>
<?php while($result=mysqli_fetch_array($ret)){?>
</tr>
    <tr>
    <td><?php echo $result['Remark'];?></td> 
    <td><?php echo $result['Status'];?></td>
    <td><?php echo $result['PostingTime'];?></td>
    <td><?php echo $result['AdminName'];?></td>
    </tr>

<?php } // End while loop?>

</table>
         <?php
       //end if   
     } else { ?>    
<h4 align="center" style="color:red"> No Tracking history found </h4>
         <?php } ?>           


                                </div>
                            </div>

                        </div>
                    <!-- </div> -->

</form>



        
        </div>
        <!-- /.container-fluid -->
       
      </div>
        </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  
<!-- Assign Modal -->
<div id="assignto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Assign to</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
<form method="post">
          <p>  <select class="form-control" name="assignto" required="true">
            <option value="">Select Phlebotomist</option>
            <?php $sql=mysqli_query($con,"select FullName,EmpID from phlebotomist");
            while ($result=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo $result['FullName']."-".$result['EmpID'];?>"><?php echo $result['FullName'];?>-(<?php echo $result['EmpID'];?>)</option>
        <?php } ?>
            </select></p>
            <p>
     <input type="submit" class="btn btn-primary btn-user btn-block"  style="background:#2c3e52;" name="submit" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>



<!-- Take Action Modal -->
<div id="takeaction" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Take Action</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data" >
          <p>  <select class="form-control" name="status" id="status" required="true">
            <option value="">Select Action</option>
  <?php 

  $query1=mysqli_query($con,"select ReportStatus from testrecord where OrderNumber='$orderid'");
  while($result=mysqli_fetch_array($query1)):
$reportstatus=$result['ReportStatus'];
endwhile;
  ?>

            <?php if($reportstatus=='Assigned'):?>
            <option value="On the Way for Collection">On the Way for Collection</option>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='On the Way for Collection'):?>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='Sample Collected'):?>
             <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
             <?php elseif($reportstatus=='Sent to Lab'):?>
             <option value="Delivered">Delivered</option>
         <?php endif;?>

            </select></p>
       <p id='reportfile'> Report <span style="color:red; font-size:12px;">(Doc and PDF formate allowed)</span>    <input type="file" name="report" id="report"></p>
       <p>
<textarea name="remark" class="form-control" required="true" placeholder="Remark (Max 500 Characters)" maxlength="500" rows="5"></textarea>  </p> 
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" style="background:#2c3e52;"name="takeaction" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>
  



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
//For report file
$('#reportfile').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Delivered')
  {
  $('#reportfile').show();
  jQuery("#report").prop('required',true);  
  }
  else{
  $('#reportfile').hide();
  }
})}) 
  </script>

   
   
 
  
  
  </body>
</html>
<?php } ?>