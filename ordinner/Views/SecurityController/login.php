<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>picmash</title>
</head>
<body>
<div class="container">
    <form action="?page=login" method="POST">
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <input name="email" type="text" placeholder="email@email.com">
        <input name="password" type="password" placeholder="password">
        <button type="submit">CONTINUE</button>
    </form>
</div>
</body>
</html>