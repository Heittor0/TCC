<?php
require '../config/config.php';
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
    <form>
      <div class="form-group">
        <input type="email" placeholder="E-mail" required>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Nome de usuário" required>
      </div>
      <div class="form-group">
        <input type="password" placeholder="Senha" required>
      </div>
      <button type="submit" class="btn">Cadastrar</button>
    </form>

    <div class="footer">
      Já tem uma conta? <a href="login.php">login</a>
    </div>
  </div>
</body>
</html>



