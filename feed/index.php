<?php
session_start();
require '../config/config.php';
require '../func/func.php';

$post = Imprimir();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $textarea = $_POST['textarea'];
    $gif = $_POST['gif'];

    $imgPath = null;

    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {

    $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif', 'jpg', 'tiff'];
    $mimePermitidos = ['image/png', 'image/jpeg', 'image/jfif', 'image/jpg', 'image/tiff'];

    $extensao = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
    $mime = mime_content_type($_FILES['img']['tmp_name']);

    if (!in_array($extensao, $extensoesPermitidas)) {
        die('Formato de imagem não permitido.');
    }

    if (!in_array($mime, $mimePermitidos)) {
        die('Arquivo enviado não é uma imagem válida.');
    }

$pasta = '../fotos/';

$nomeArquivo = uniqid() . '.' . $extensao;
$destino = $pasta . $nomeArquivo;

if (move_uploaded_file($_FILES['img']['tmp_name'], $destino)) {
    // ⚠️ caminho WEB, não de servidor
    $imgPath = '../fotos/' . $nomeArquivo;
}
}


    criar($textarea, $imgPath, $gif);

    header("Location: index.php");
    exit;
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
    
<section class="criacao_post">

    <form action="" method="POST" enctype="multipart/form-data"> 
        <div class="posts_criar">
            <textarea name="textarea" id="textarea" required>Digite algo</textarea>
            <input type="file"  id="img" name="img" >
            <button id="gif_button" name="gif_button">Gif</button>
            <input type="hidden" placeholder="gif" id="gif" name="gif" >
            <button type="submit">Publicar</button>
        </div>
    </form>

</section>

<section class="posts">
    <?php foreach ($post as $p): ?>
    <div class="posts">
        <h1><?php echo htmlspecialchars($p['nome']); ?></h1>

        <p><?php echo htmlspecialchars($p['textarea']); ?></p>

        <?php if (!empty($p['img'])): ?>
            <img src="<?php echo htmlspecialchars($p['img']); ?>" width="300">
        <?php endif; ?>

        <?php if (!empty($p['gif'])): ?>
            <p><?php echo htmlspecialchars($p['gif']); ?></p>
        <?php endif; ?>

        <p><?php echo htmlspecialchars($p['tempodepostagem']); ?></p>
    </div>
<?php endforeach; ?>

    </section>
</body>

</html>