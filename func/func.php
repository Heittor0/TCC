<?php

   
    // IMPRIMIR COISAS DO DATABASE EM ORDEM
    function Imprimir()
    {
        
        require '../config/config.php';
        $sql = "SELECT p.id, p.textarea, p.img,p.tempodepostagem, p.gif, u.nome
        from posts p JOIN usuarios u
        ON p.usuario_id = u.id
       ORDER BY tempodepostagem DESC
        
        ";

        $stmt = $pdo-> prepare($sql);
        $stmt -> execute();
        $posts = $stmt ->fetchALL(PDO::FETCH_ASSOC);
        
       
        return $posts ;


        
    }
    function criar($textarea,$img,$gif){
        require '../config/config.php';
        
       
            $usuario_id = $_SESSION['id'];
            $sql = "INSERT INTO posts (textarea,img,gif,usuario_id,tempodepostagem) VALUES (:textarea, :img, :gif, :usuario_id,NOW()) ";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindparam(':textarea', $textarea);
            $stmt -> bindparam(':img', $img);
            $stmt -> bindparam(':gif', $gif);
            $stmt -> bindparam(':usuario_id', $usuario_id);
            $stmt -> execute();
          
        
       
        
    }
 
?>
