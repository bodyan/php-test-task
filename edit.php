<?php 

require_once 'template/config.php';
require_once 'template/header.php';

if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['inputEmail']) && isset($_POST['inputCountry'])) { 
  if($_POST['username'] == '' || $_POST['inputEmail'] == '' || $_POST['inputCountry'] == '' ) { header('Location: /register.php'); }
  $data = [
    'username' => filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING),
    'email' => filter_input(INPUT_POST, "inputEmail", FILTER_VALIDATE_EMAIL),
    'country' => filter_input(INPUT_POST, "inputCountry", FILTER_VALIDATE_INT),
    'id' => filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT)
  ];
  
  $db->editUser($data);
  header('Location: /'); exit;
}

if (isset($_GET['id']) && $_GET['id'] !== '') {
	$user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$user = $db->getUserById($user_id);
    if(!$user) header('Location: /');
}

?>

<form class="form-register" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">User Edit</h1>
    <div class="form-group">
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username'] ?>">
    </div>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail"class="form-control" value="<?php echo $user['email'] ?>">
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="inputCountry">
            <option default>Select country</option>
            <?php foreach ($db->getCountries() as $key => $country) :?>
            <option value="<?php echo $country['id']; ?>" <?php if ($country['id'] == $user['country_id']) echo ' selected'; ?>>
                <?php echo $country['country']; ?>
            </option>
            <?php endforeach;?>  
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
    <a href="/" class="btn btn-lg btn-light btn-block">Cancel</a> 
</form>

<?php require_once 'template/footer.php'; ?>
