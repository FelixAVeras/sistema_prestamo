<?php

function isNull($name, $email, $pass1, $pass2) {
	if(strlen(trim($name)) < 1 || strlen(trim($email)) < 1 || 
		strlen(trim($pass1)) < 1 || strlen(trim($pass1)) < 1) {
		return true;
	}
	else {
		return false;
	}
}

function isEmail($email) {
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		return true;
	}
	else {
		return false;
	}
}

function passwordValidate($var1, $var2) {
	if (strcmp($var1, $var2) !== 0) {
		return false;
	}
	else {
		return true;
	}
}

function emailExists($email) {
	global $connection;

	$stmt = $connection->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if($num > 0) {
		return true;
	}
	else {
		return false;
	}
}

function hashPassword($pass1) {
	$hash = password_hash($pass1, PASSWORD_DEFAULT);
	return $hash;
}

function generateToken() {
	$gen = md5(uniqid(mt_rand(), false));
	return $gen;
}

function emailRegister($name, $email, $pass_has, $activo, $tipo_usuario) {
	global $connection;

	$stmt = $connection->prepare("INSERT INTO users (name, email, pass) VALUES(?,?,?)");
	$stmt->bind_param("sss", $name, $email, $pass_has, $activo, $tipo_usuario);

	if($stmt->execute()) {
		return $connection->insert_id;
	}
	else {
		return 0;
	}
}

function messageBlock($errors) {
	if(count($errors) > 0) {
		echo "<div class='alert alert-danger' id='errors'><ul>";
		foreach ($errors as $error) {
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo"</div>";
	}
}


?>