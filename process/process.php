<?php 
include 'conn.php';

if (isset($_POST['submit'])) {
	$full_name =$_POST['full_name'];
	$address =$_POST['address'];
	$age =$_POST['age'];
	$birthday =$_POST['birthday'];
	$contact_no =$_POST['contact_no'];

	$sql= "INSERT INTO student_master_list VALUES ('$full_name', '$'address, '$age','$birthday','$contact_no') ";
	$stmt = $conn->prepare($sql);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'failed';
	}
}

?>