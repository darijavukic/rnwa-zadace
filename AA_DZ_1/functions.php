<?php

function get_employees($id=0)
{
	global $connection;
	
	$query="SELECT * FROM employees";

	if ($id != 0) {
		$query.= " WHERE emp_no=:emp_no LIMIT 100";
	}
	$stmt = $connection->prepare($query);
	if ($id != 0) {
		$connection->bindParam(':emp_no', $id);
	}
	$stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	header('Content-Type: application/json');
	echo json_encode($result);
}

function require_auth() {
	$AUTH_USER = 'test123';
	$AUTH_PASS = 'test12345!';
	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$is_not_authenticated = (
		!$has_supplied_credentials ||
		$_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
		$_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
	);
	if ($is_not_authenticated) {
		header('HTTP/1.1 401 Authorization Required');
		header('WWW-Authenticate: Basic realm="Access denied"');
		exit;
	}
}

function insert_employee()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$employee_bdate		=$data["employee_bdate"];
		$employee_fname		=$data["employee_fname"];
		$employee_lname		=$data["employee_lname"];
		//$employee_salary	=$data["employee_salary"];
		$employee_gender	=$data["employee_gender"];
		try {
			$stmt = $connection->prepare("INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date) VALUES (:birthdate, :firstname, :lastname, :gender, :hiredate)");
			$stmt->bindParam(":birthdate", $employee_bdate);
			$stmt->bindParam(":firstname", $employee_fname);
			$stmt->bindParam(":lastname", $employee_lname);
			$stmt->bindParam(":gender", $employee_gender);
			$stmt->bindParam(":hiredate", date());
			$stmt->execute();
			$broj_redaka = $stmt->rowCount();
			$response=array(
				'status' => 200,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Added Successfully.'
			);
		} catch(PDOException $e) {
			$response=array(
				'status' => 500,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee addition failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_employee($id) {
	global $connection;
	$post_vars = json_decode(file_get_contents("php://input"),true);
	$employee_fname		=$post_vars["employee_fname"];
	$employee_lname		=$post_vars["employee_lname"];
	$employee_gender	=$post_vars["employee_gender"];
	$employee_bdate		=$post_vars["employee_bdate"];
	$employee_hdate		=$post_vars["employee_hdate"];
	try {

		$stmt = $connection->prepare("UPDATE employees SET first_name=:firstname, last_name=:lastname, gender=:gender, birth_date=:birthdate, hire_date=:hiredate WHERE emp_no=:id");
		$stmt->bindParam(":firstname", $employee_fname);
		$stmt->bindParam(":lastname", $employee_lname);
		$stmt->bindParam(":gender", $employee_gender);
		$stmt->bindParam(":birthdate", $employee_bdate);
		$stmt->bindParam(":hiredate", $employee_hdate);
		
		$stmt->exeucte();
		$broj_redaka = $stmt->rowCount();
		$response=array(
			'status' => 200,
			'broj_redaka' => $broj_redaka,
			'status_message' =>'Employee Updated Successfully.'
		);
	} catch(PDOException $e) {
		$response=array(
			'status' => 500,
			'broj_redaka' => $broj_redaka,
			'status_message' =>'Employee Update Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function delete_employee($id)
{
	global $connection;
	
	if ($id != 0) {
		try {
			$stmt = $connection->prepare("DELETE FROM employees WHERE emp_no=:id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$response = array(
				'status' => 200,
				'status_message' => 'Employee deleted successfully.'
			);
		} catch(PDOException $e) {
			$response = array(
				'status' => 500,
				'status_message' => 'Employee deletion failed.'
			);
		}
	} else {
		$response = array(
			'status' => 400,
			'status_message' => 'Invalid ID'
		);
	};
	header('Content-Type: application/json');
	echo json_encode($response);
}

?>
