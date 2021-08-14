<?php
	include 'conn.php';

	$method = $_POST['method'];
	if ($method == 'save') {
		$full_name = $_POST['full_name'];
		$address = $_POST['address'];
		$age = $_POST['age'];
		$birthday = $_POST['birthday'];
		$contact_no = $_POST['contact_no'];

		$insert = "INSERT INTO student_master_list (`full_name`, `address`, `age`, `birthday`, `contact_no`, `date_created`) VALUES ('$full_name', '$address', '$age', '$birthday', '$contact_no', '$server_date_only')";
		$stmt = $conn->prepare($insert);
		if($stmt->execute()){
			echo 'success';
		}else{
			echo 'failed';
		}
	}

	if($method == 'fetch_list'){
		$role = $_POST['role'];
		$c = 0;
		$fetch = "SELECT *FROM student_master_list";
		$stmt = $conn->prepare($fetch);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			foreach($stmt->fetchALL() as $x){
				$c++;
				

				if ($role == 'normal') {
					echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$x['full_name'].'</td>';
				echo '<td>'.$x['address'].'</td>';
				echo '<td>'.$x['age'].'</td>';
				echo '<td>'.$x['birthday'].'</td>';
				echo '<td>'.$x['contact_no'].'</td>';
				echo '<td><button class="btn teal modal-trigger" data-target="modal_view" onclick="get_id_view(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">view</button></td>';
				
				echo '<td><button class="btn blue modal-trigger" data-target="modal_edit" onclick="get_id_edit(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">edit</button></td>';
				echo '</tr>';
				}else{
				echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$x['full_name'].'</td>';
				echo '<td>'.$x['address'].'</td>';
				echo '<td>'.$x['age'].'</td>';
				echo '<td>'.$x['birthday'].'</td>';
				echo '<td>'.$x['contact_no'].'</td>';
				echo '<td><button class="btn teal modal-trigger" data-target="modal_view" onclick="get_id_view(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">view</button></td>';
				
				echo '<td><button class="btn blue modal-trigger" data-target="modal_edit" onclick="get_id_edit(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">edit</button></td>';
				echo '<td><button class="btn red" onclick="get_id('.$x['id'].')">delete</button></td>';
				echo '</tr>';
			}
			}
		}else{
			echo '<tr>';
			echo '<td colspan="3" style="text-align:center;">NO RESULT</td>';
			echo '</tr>';
		}
	}

	if($method == 'delete'){
		$id = $_POST['id'];
		// SQL
		$delete = "DELETE FROM student_master_list WHERE id = '$id'";
		$stmt = $conn->prepare($delete);
		if($stmt->execute()){
			echo 'deleted';
		}else{
			echo 'failed';
		}
	}

	if($method == 'update_student'){
		$idEdit = $_POST['id'];
		$newfull_name = $_POST['newfull_name'];
		$newaddress = $_POST['newaddress'];
		$newage = $_POST['newage'];
		$newbirthday = $_POST['newbirthday'];
		$newcontact_no = $_POST['newcontact_no'];
		// SQL
		$update = "UPDATE student_master_list SET full_name = '$newfull_name', address = '$newaddress', age = '$newage', birthday = '$newbirthday', contact_no = '$newcontact_no' WHERE id = '$idEdit'";
		$stmt = $conn->prepare($update);
		if($stmt->execute()){
			echo 'updated';
		}else{
			echo 'failed';
		}
	}


         


?>