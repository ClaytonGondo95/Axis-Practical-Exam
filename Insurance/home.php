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
<title>Insurance for Company A</title>
</head>

<body>
<div><h1>Welcome <?php echo $_SESSION['Fullname'];?></h1></div>


	<div><a href="create_member.php">Create a member</a></div>
	<div><a href="create_claim.php">Create a claim</a></div>
	<div><a href="report.php">Claims Report</a></div>

</body>
</html>