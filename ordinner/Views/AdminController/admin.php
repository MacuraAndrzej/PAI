<?php
    require_once 'Controllers//AdminController.php';
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
    if (isset($_POST['email']))
    {
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cont = new AdminController;
    $cont->createUser($_POST['email'],$pass_hash,$_POST['role']);
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <script src="../ordinner/Public/js/admin.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>picmash</title>
</head>
<body>
<div class="container">
<div class="col-6">
    <table class="table mt-4 text-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row"><?= $user->getId(); ?></th>
            <td><?= $user->getEmail(); ?></td>
            </tr>
        </tbody>
        <tbody class="users-list">
        </tbody>
        <tr>
        <form action="?page=admin" method="POST">
        <td><button type="submit">+</button>  <td><input name="email" type="text" placeholder="email@email.com"> </td>
        <td><input name="password" type="password" placeholder="password"></td>
        <td>  <select id="role" name="role">
    <option value="user">User</option>
    <option value="kitchen">Kitchen</option>
  </select></td>
        <form action="/action_page.php">

</form>
        </form>
    </table>
    <button class="btn-primary btn-lg ml-0" type="button" onclick="getUsers()">
        Get all users    
    </button>
</div>
</div>
</body>
</html>