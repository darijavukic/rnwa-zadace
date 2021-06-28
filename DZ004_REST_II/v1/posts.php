<?php
// Connect to database
	include("../connection.php");
	$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "fsr-cms";
	$db = new dbObj($username, $password, $servername, $dbname);
	$connection =  $db->getConnstring();
	
	function get_posts($id=0)
	{
	 global $connection;

	 $query = "SELECT * FROM posts";

	 if ($id != 0) {
		 $query .= " WHERE id=:id LIMIT 1";
	 }

	 $stmt = $connection->prepare($query);
	 if ($id != 0) {
		 $stmt->bindParam(":id", $id);
	 }
	 $stmt->execute();

	 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 header('Content-Type: application/json');
	 echo json_encode($result);

	}
	function insert_posts()
	 {
	 global $connection;
	 $date = date('Y-m-d H:i:s');
	 
	 $data = json_decode(file_get_contents('php://input'), true);
	 //print_r($data);
	 
	 //$title=$body=$user_id=$post_thumbnail='';
	 
	 $title=$data["title"];
	 $body=$data["body"];
	 $user_id=$data["user_id"];
	 $post_thumbnail=$data["post_thumbnail"];


	$query = "INSERT INTO posts (title, body, user_id, post_thumbnail) VALUES (:title, :body, :uid, :pt)";
	try {

		$stmt = $connection->prepare($query);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":body", $body);
		$stmt->bindParam(":uid", $user_id);
		$stmt->bindParam(":pt", $post_thumbnail);
		
		$stmt->execute();
		
		$number_of_rows = $stmt->rowCount();
		$response=array(
			'status' => 200,
			'status_message' =>'Post Added Successfully.',
			'number_of_affected_rows' => $number_of_rows
		);
	} catch(PDOException $e) {
		$number_of_rows = $stmt->rowCount();
		$response = array(
			'status' => 500,
			'status_message' => 'Post addition failed.',
			'number_of_affected_rows' => $number_of_rows
		);
	}
	 echo json_encode($response);
	 }
	 function update_posts($id)
	{
		global $connection;
		$put_vars = json_decode(file_get_contents("php://input"),true);
		$title=$put_vars["title"];
		$body=$put_vars["body"];
		
		$query="UPDATE posts SET title=:title, body=:body WHERE id=:id";

		try {
			$stmt = $connection->prepare($query);
			$stmt->bindParam(":title", $title);
			$stmt->bindParam(":body", $body);
			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$number_of_rows = $stmt->rowCount();
			$response = array(
				'status' => 200,
				'status_message' => 'Post updated successfully.',
				'number_of_affected_rows' => $number_of_rows
			);
		} catch(PDOException $e) {
			$number_of_rows = $stmt->rowCount();
			$response = array(
				'status' => 500,
				'status_message' => 'Post update failed.',
				'number_of_affected_rows' => $number_of_rows
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	 
	 function delete_posts($id)
	{
		global $connection;

		$query = "DELETE FROM posts WHERE id=:id";

		try {
			$stmt = $connection->prepare($query);
			$stmt->bindParam(":id", $id);
			$stmt->execute();

			$number_of_rows = $stmt->rowCount();

			$response = array(
				'status' => 200,
				'status_message' => 'Post deleted successfully',
				'number_of_affected_rows' => $number_of_rows,
			);
		} catch (PDOException $e) {
			$number_of_rows = $stmt->rowCount();
			$response = array(
				'status' => 500,
				'status_message' => 'Post deletion failed.',
				'number_of_affected_rows '=> $number_of_rows
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	 /******************************************************/

	$request_method=$_SERVER["REQUEST_METHOD"];

	
	switch($request_method)
	 {
	 case 'GET':
	 // Retrive Products
	 if(!empty($_GET["id"]))
	 {
	 $id=intval($_GET["id"]);
	 get_posts($id);
	 }
	 else
	 {
	 get_posts();
	 }
	 break;
	 default:
	 // Invalid Request Method
	 header("HTTP/1.0 405 Method Not Allowed");
	 break;
	case 'POST':
	// Insert Product
	insert_posts();
	break;
	case 'PUT':
	// Update Product
	$id=intval($_GET["id"]);
	update_posts($id);
	break;
	case 'DELETE':
	// Delete Product
	$id=intval($_GET["id"]);
	delete_posts($id);
	break;


	 }
