<?php
session_start();
   
    // IMPRIMIR COISAS DO DATABASE EM ORDEM
    function Imprimir()
    {
        
        require '../config/config.php';
        $sql = "SELECT p.id, p.textarea, p.img, p.gif, u.nome
        from posts p JOIN usuarios u
        ON p.usuario_id = u.id
        
        ";

        $stmt = $pdo-> prepare($sql);
        $stmt -> execute();
        $posts = $stmt ->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($posts as $post){
            echo $post['id'];
            echo htmlspecialchars($post['textarea']);
        }
        
        


        
    }
    function criar($textarea,$img,$gif){
        require '../config/config.php';
        
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $textarea = $_POST['textarea'];
            $img = $_POST['img'];
            $gif = $_POST['gif'];
            $usuario_id = $_SESSION['id'];
            $sql = "INSERT INTO posts (textarea,img,gif,usuario_id,tempodepostagem) VALUES (:textarea, :img, :gif, :usuario_id,NOW()) ";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindparam(':textarea', $textarea);
            $stmt -> bindparam(':img', $img);
            $stmt -> bindparam(':gif', $gif);
            $stmt -> bindparam(':usuario_id', $usuario_id);
            $stmt -> execute();
          
        
       
        }
    }
     if($_SERVER['REQUEST_METHOD'] === "POST"){
    $textarea1 = $_POST['textarea'];
    $img1 = $_POST['img'];
    $gif1 = $_POST['gif'];

    criar($textarea1,$img1,$gif1);
     }
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
            <input type="text" id="img" name="img">
            <input type="text" id="gif" name="gif">
            <button type="submit">Postar</button>
        </div>
    </form>

</body>
</html>
