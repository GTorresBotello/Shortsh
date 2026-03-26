<?php

require_once __DIR__ . '/../models/Database.php';

class UrlController {
    public function add($method)
    {
        if ($method === 'GET'){            
            ob_start();
            include __DIR__ . '/../views/add_url.php';
            $content = ob_get_clean();
            include __DIR__ . '/../views/base.php';
            
         }elseif ($method === 'POST'){
             
             $pdo = Database::getInstance();
             $original = $_POST['original'];
             $short = $_POST['short'];
             
             $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_url, user_id) VALUES (?, ?, ?)");
             $stmt->execute([$original, $short, $_SESSION['user_id'] ?? null]);
             header("location: /");
             exit;
         }
    }
}
