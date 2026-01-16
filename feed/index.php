<?php
session_start();
require '../config/config.php';



   if($_SESSION['id'] == 0){
                echo "ta deslogado";

            }else{echo'ta logado';}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="posts">
            <textarea name="textarea" id="textarea">Digite algo</textarea>
            <index type="file" id="img" name="img">imagem</index>
            <index type="file" id="gif" name="gif">gif</index>
            <button type="submit">Postar</button>
        </div>
    </form>
    <a href="../func/func.php">TESTE</a>
</body>

</html>