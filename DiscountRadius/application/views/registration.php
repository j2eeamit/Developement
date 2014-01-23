<?php 
	 $uname=$_POST['username'];
	 $fname=$_POST['firstname'];
	 $lname=$_POST['lastname'];
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	 $pass=md5($password);


	 $con = mysql_connect("localhost","root","admin");
	 if (!$con){
	  die('Could not connect: ' . mysql_error());
	 }

	mysql_select_db("distance_radius", $con);
	
	/*mysql_query("INSERT INTO useraccount (Username,Password,FirstName,LastName,EmailId)
	// VALUES ('$uname','$pasword', '$fname','$lname',' $email')");*/

		$sql = "INSERT INTO useraccount ".
	       "(Username,Password,FirstName,LastName,EmailId) ".
	       "VALUES ".
	       "('$uname','$pass', '$fname','$lname',' $email')";

		$retval = mysql_query( $sql, $con );
	

	if(! $retval ){
	  die('Could not enter data: ' . mysql_error());
	}
	echo "User Registered successfully\n";



	mysql_close($con);

?>