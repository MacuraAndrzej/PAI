<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="../ordinner/Public/js/app.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../ordinner/Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../ordinner/Public/css/board.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>picmash</title>
</head>
<body onload="printMenu(1)">

    <div class = types>
    <?php foreach($types as $type): ?>
            
            <div class = wraper>
            <p id="demo" onclick="printMenu('<?php echo "{$type->getId()}";  ?>')"><img src="<?= '../ordinner/Public/img/uploads/'.$type->getImage() ?>"></p>
            <div class="actions-bar">
            <?php echo $type->getFoodName();?>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <div class="menu">

        
    </div>
    <div class = order>
        <div class = ordered id =ordered>
            zamówione
        </div>
        </div>
</body>
</html>
