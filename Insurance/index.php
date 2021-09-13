 <?php
 error_reporting(0);
 session_start();
		$db_host='localhost';
		$db_user='root';
		$db_pass='';
		$db_name='insurance';						
								
		$con= new mysqli($db_host,$db_user,$db_pass,$db_name);
		if(!$con){
			echo "database connection failed";
			}else{}			
								
?>
<html>
<head>
<title>UInsurance for Company A</title>
</head>

<body>
<?php
if(isset($_POST['btnsubmit']))
{
	//echo"zvaita";
	
	if( isset($_POST['txtusername']) && isset($_POST['txtpassword']) )
			{
				
				$txtfullname=$_POST['txtfullname'];
				$txtusername=$_POST['txtusername'];
				$txtpassword=$_POST['txtpassword'];
				$txtcpassword=$_POST['txtconpassword'];
				$p_h=md5($txtpassword);
				$p_l=strlen($txtpassword);
				$date=date('Y-m-d');
				
				
					
							$reg_sel=mysqli_query($con,"SELECT * FROM `tbl_users` WHERE Username='$txtusername' and Password='$p_h'");
							$reg_sel_f=mysqli_num_rows($reg_sel);
							
							if($reg_sel_f==0){
								echo"Sorry, user needs to be registered.";
								}else{
									$_SESSION['Fullname']=$reg_sel_f['Fullname'];
									$_SESSION['Username']=$reg_sel_f['Username'];
										echo"<script>window.location='home.php'</script>";
										
				
					}
					
				}

	}
								
								
								?>


<form id="addform" name="addform" method="post">
	
	<div>Login</div><br>
	<div>
		<label for="txtusername">User Name<small>*</small></label>
		<input type="text" id="txtusername" name="txtusername" value="" required="required"/>
	</div>
	
	<div>
		<label for="txtpassword">Password<small>*</small></label>
		<input type="password" id="txtpassword" name="txtpassword" value="" required="required"/>
	</div>
	  <div class="col_full nobottommargin">
		<button type="submit" id="btnsubmit" name="btnsubmit" value="submit">Login</button>
	</div>
	<div><a href="create_user.php">Create a user account</a></div>
	
</form>
</body>
</html>