<?php

// require_once __DIR__ . '/../models/Database.php';

class UrlController {
    public function add($method)
    {
        if ($method === 'POST'){
             $pdo = Database::getInstance();
             $original = $_POST['original'];
             $short = strtolower($_POST['short']);
             $short = str_replace(' ', '_', $short);
             $short = preg_replace('/[^a-z0-9_\-]/', '', $short);
             $short = rawurlencode($short);

             try {
                 $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_url, user_id) VALUES (?, ?, ?)");
                 $stmt->execute([$original, $short, $_SESSION['user_id'] ?? null]);
                 header("location: /");
                 exit;
             } catch (PDOException $e){
                 if ($e->getCode() == 23000){
                     $_SESSION['error_msg'] = 'This Url already exist';
                     header('location: /');
                     exit;
                 }
             }
         }
    }
}
