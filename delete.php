<?php 

require_once 'template/header.php';

if (isset($_GET['id']) && $_GET['id'] !== '') {
	$user_id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
	$user = $db->deleteUser($user_id);
	header('Location: /');
}
