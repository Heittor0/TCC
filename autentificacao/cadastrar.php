<?php
require '../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            //Qual codigo faz oq
            // Esse daqui Cria uma string para contar quantos registros tem na tabela
            $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
            //Prepara uma consulta no SQL(neon) usando o pdo
            $stmt = $pdo -> prepare($sql);
            //Prepara a consulta SQL para ser executada no banco de dados
            $stmt->bindParam(':email', $email);
            //Associa a variavel email ao parametro no SQL
            $stmt->execute();
            //Executa a consulta preparada no Banco de dados
            $existe = $stmt->fetchColumn();
            if($existe > 0 ){
                echo "<div style='color:#776472;'>Este email já existe.</div>";
            } else {
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);
                if ($stmt->execute()) {
                    echo "<div style='color:#558B6E;'>Cadastro realizado com sucesso!</div>";
                } else {
                    echo "<div style='color:#776472;'>Erro ao cadastrar.</div>";
                }
            }
            
        }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    body {
      background: black; 
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh; 
    }

    .container {
      background: white; 
      padding: 40px;
      border: 1px solid #dbdbdb;
      border-radius: 8px;
      width: 350px;
      text-align: center;
    }

    .container h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: black; 
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #dbdbdb;
      border-radius: 6px;
      font-size: 14px;
      background: #D9D9D9;
    }

    .form-group input:focus {
      outline: none;
      border-color: #0095f6;
      background: white;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: blue;
      border: none;
      border-radius: 6px;
      color: BLACK;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 8px;
    }

    .btn:hover {
      background: #0095f6; 
    }

    .footer {
      margin-top: 20px;
      font-size: 14px;
      color: black;
    }

    .footer a {
      color: #0095f6;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastrar-se</h1>
    <form method="POST">
      <div class="form-group">
        <input type="email" placeholder="E-mail" name="email" id="email"required>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Nome de usuário"name="nome" id="nome" required>
      </div>
      <div class="form-group">
        <input type="password" placeholder="Senha"name="senha" id="senha" required>
      </div>
      <button type="submit" class="btn">Cadastrar</button>
    </form>

    <div class="footer">
      Já tem uma conta? <a href="login.php">login</a>
    </div>
  </div>
</body>
</html>



