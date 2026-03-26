<?php

require_once __DIR__ . '/../models/Database.php';

class AuthController {
    public function login($method)
    {
        $pdo = Database::getInstance();
        if ($method === 'GET') {
            
            ob_start();
            include __DIR__ . '/../views/login.php';
            $content = ob_get_clean();
            include __DIR__ . '/../views/base.php';
            
        } elseif ($method === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            
            $query = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($query);
            var_dump(password_verify($password, $query['password']));
        }
    }
    
    public function register($method)
    {
        $pdo = Database::getInstance();
        if ($method === 'GET') {
            ob_start();
            include __DIR__ . '/../views/login.php';
            $content = ob_get_clean();
            include __DIR__ . '/../views/base.php';
            
        } elseif ($method === 'POST') {
            $username = $_POST['username'];
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password, user_type) VALUES (?, ?, 'user')");
            try {
                $stmt->execute([$username, $password_hash]);
            } catch (Throwable $e){
                var_dump($e->getCode());
                echo(PHP_EOL);
                var_dump($e->getMessage());
                echo(PHP_EOL);
                
            }
            var_dump($_POST);
            var_dump(password_hash($_POST['password'], PASSWORD_DEFAULT));
        }
    }
}
