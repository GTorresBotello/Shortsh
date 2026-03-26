<?php

require_once __DIR__ . '/../models/Database.php';

class HomeController {
    public function index() {
        $pdo = Database::getInstance();
        
        // Simulating current user (could be from session)
        // For now, let's assume guest if no session
        $userId = $_SESSION['user_id'] ?? null;

        if ($userId) {
            $stmt = $pdo->prepare("SELECT * FROM urls WHERE user_id = ?");
            $stmt->execute([$userId]);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM urls WHERE user_id IS NULL");
            $stmt->execute();
        }

        $urls = $stmt->fetchAll();

        // Render view
        ob_start();
        include __DIR__ . '/../views/home.php';
        $content = ob_get_clean();

        include __DIR__ . '/../views/base.php';
    }
}
