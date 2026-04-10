<?php

require_once __DIR__ . "/../models/Database.php";

class UrlService {
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function addurl($short, $original)
    {
        try {
            $short = $this->sanitize($short);
            $stmt = $this->pdo->prepare("INSERT INTO urls (original_url, short_url, user_id)VALUES (?, ?, ?)");
            $stmt->execute([$original, $short, $_SESSION['user_id'] ?? null]);
            header('location: /');
        } catch (Exception $e) {
            if ($e->getCode() == 23000){
                $_SESSION['error_msg'] = 'This Url already exist';
            }else{
                $_SESSION['error_msg'] = $e->getMessage();
            }
            header('location: /');
            exit;
            
        }

        
    }
    
    private function sanitize($slug)
    {
        $slug = strtolower($slug);
        $slug = str_replace(' ', '_', $slug);
        $slug = preg_replace('/[^a-z0-9_\-]/', '', $slug);
        $slug = rawurlencode($slug);
        
        if ($slug == ''){
            throw(new Exception('invalid slug'));
        }
        return($slug);
    }       
} 
