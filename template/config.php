<?php
	switch ($_SERVER['SCRIPT_NAME']) {
		case '/register.php':
			$CURRENT_PAGE = 'Register'; 
			$PAGE_TITLE = 'User Registration';
			break;
		case '/edit.php':
			$CURRENT_PAGE = 'Edit'; 
			$PAGE_TITLE = 'Edit User';
			break;
		default:
			$CURRENT_PAGE = 'Main page';
			$PAGE_TITLE = 'Upqode Back-end Test Task';
	}
?>