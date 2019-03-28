<?php 

require_once 'db/Database.php';
$db = new Database();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $PAGE_TITLE; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow navbar-light bg-light">
        <a href='/' class="navbar-brand my-0 mr-md-auto font-weight-normal">Back-end developer</a>
        <?php if($CURRENT_PAGE !== 'Register'): ?>
            <a href='/register.php' class="btn btn-outline-primary">Register</a>
        <?php endif; ?>
    </div>
    <div class="container">