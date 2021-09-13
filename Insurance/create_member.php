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
<title>Insurance for Company A</title>
</head>

<body>
<?php
if(isset($_POST['btnsubmit']))
{
	//echo"zvaita";
	
	if(isset($_POST['txtfullname']) && isset($_POST['txtnational']) && isset($_POST['txtemployed']) && isset($_POST['txtinsurance']))
			{
				
				$txtfullname=$_POST['txtfullname'];
				$txtnational=$_POST['txtnational'];
				$txtemployed=$_POST['txtemployed'];
				$txtinsurance=$_POST['txtinsurance'];
				$date =date('Y-M-D');
					
							$reg_sel=mysqli_query($con,"SELECT * FROM tbl_members WHERE National_id='$txtnational'");
							$reg_sel_r=mysqli_num_rows($reg_sel);
							
							if($reg_sel_r<>0){
								echo"Sorry, user already registered.";
								}else{
									$cre=mysqli_query($con,"INSERT INTO `tbl_members`(`Member_name`, `Date_Created`, `National_id`, `Employed_by`, `Scheme`) VALUES ('$txtfullname','$date','$txtnational','$txtemployed','$txtinsurance')");
									if($cre)
									{
							echo"Member successfully registered";
										}else{
							echo"Member registration failed.";
					}
					
				}
				}
	}
								
								
								?>


<form id="addform" name="addform" method="post">
	
	<div>
		<label for="txtfullname">Member Name<small>*</small></label>
		<input type="text" id="txtfullname" name="txtfullname" value="" required="required"/>
	</div>
	<div>
		<label for="txtnational">National Id<small>*</small></label>
		<input type="text" id="txtnational" name="txtnational" value="" required="required"/>
	</div>
	
	<div>
		<label for="txtemployed">Employed by<small>*</small></label>
		<input type="text" id="txtemployed" name="txtemployed" value="" required="required"/>
	</div>
	<div>
		<label for="txtemployed">Scheme<small>*</small></label>
	<select id="txtinsurance" name="txtinsurance"><option>RiskManagement</option>
	<option>MotiorInsurance</option>
	<option>WeddingInsurance</option></select>
	</div>
	  <div >
		<button type="submit" id="btnsubmit" name="btnsubmit" value="submit">Create Member</button>
	</div>
	
</form>
</body>
</html>