 <?php
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
	
	if(isset($_POST['txtfullname']) && isset($_POST['txtusername']) && isset($_POST['txtpassword']) && isset($_POST['txtconpassword']))
			{
				
				$txtfullname=$_POST['txtfullname'];
				$txtusername=$_POST['txtusername'];
				$txtpassword=$_POST['txtpassword'];
				$txtcpassword=$_POST['txtconpassword'];
				$p_h=md5($txtpassword);
				$p_l=strlen($txtpassword);
				$date=date('Y-m-d');
				
				if($p_l<8){
					echo"Passwords should contain more than 8 characters";
					}else{
				if($txtpassword<>$txtcpassword){
					echo"Please enter matching passwords";
					}else{
					
							$reg_sel=mysqli_query($con,"SELECT * FROM `tbl_users` WHERE Username='$txtusername'");
							$reg_sel_r=mysqli_num_rows($reg_sel);
							
							if($reg_sel_r<>0){
								echo"Sorry, user already registered.";
								}else{
									$cre=mysqli_query($con,"INSERT INTO `tbl_users`(`Fullname`, `Username`, `Password`) VALUES ('$txtfullname','$txtusername','$p_h')");
									if($cre)
									{
							echo"Account successfully registered";
										}else{
							echo"Account registration failed.";
										}// -  		
										}
				
					}
					
				}
				}
	}
								
								
								?>


<form id="addform" name="addform" method="post">
	
	<div>
		<label for="txtfullname">Full Name<small>*</small></label>
		<input type="text" id="txtfullname" name="txtfullname" value="" required="required"/>
	</div>
	<div>
		<label for="txtusername">User Name<small>*</small></label>
		<input type="text" id="txtusername" name="txtusername" value="" required="required"/>
	</div>
	
	<div>
		<label for="txtpassword">Password<small>*</small></label>
		<input type="password" id="txtpassword" name="txtpassword" value="" required="required"/>
	</div>
	<div>
		<label for="txtconpassword">Confirmation Password<small>*</small></label>
		<input type="password" id="txtconpassword" name="txtconpassword" value="" required="required"/>
	</div>
	  <div class="col_full nobottommargin">
		<button type="submit" id="btnsubmit" name="btnsubmit" value="submit">Create Account</button>
	</div>
	
</form>
</body>
</html>