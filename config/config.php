<?php
$host = 'ep-flat-pine-ahnzeu09-pooler.c-3.us-east-1.aws.neon.tech';

$user = 'neondb_owner';
$password = 'npg_EHhbSqnw75dx';
$dbname = 'TCC';

$dsn = "pgsql:host=$host;dbname=$dbname;sslmode=require";
$endpoint_id = 'ep-flat-pine-ahnzeu09';

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password;sslmode=require;options='endpoint=$endpoint_id'";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>