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
            if (password_verify($password, $query['password'] ?? '')){
                $_SESSION['username'] = $query['username'];
                $_SESSION['user_id'] = $query['id'];
                header('location: /');
                exit;
            } else{
                $_SESSION['error_msg'] = 'Invalid credentials';
                header('location: /login');
                exit;
            }
        }
    }
    
    public function register($method)
    {
        $pdo = Database::getInstance();
        if ($method === 'GET') {
            ob_start();
            include __DIR__ . '/../views/register.php';
            $content = ob_get_clean();
            include __DIR__ . '/../views/base.php';
            
        } elseif ($method === 'POST') {
            $username = $_POST['username'];
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            try{
                $stmt = $pdo->prepare("INSERT INTO users (username, password, user_type) VALUES (?, ?, 'user')");
                $stmt->execute([$username, $password_hash]);
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $pdo->lastInsertId();
                header("location: /");
                exit;
            }catch (PDOException $e){
                if ($e->getCode() == 23000) {
                    $_SESSION['error_msg'] = 'This user already exist';
                    header("location: /register");
                    exit;
                }
            }
        }
    }
}
