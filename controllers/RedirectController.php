<?php

require_once __DIR__ . '/../models/Database.php';

class RedirectController {
    public function redirection ($request_uri) {
        $pdo = Database::getInstance();
        $request_uri = str_replace('/', '', $request_uri);
        $stmt = $pdo->prepare("SELECT original_url FROM urls where short_url = ?");
        $stmt->execute([$request_uri]);
        $redirection = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$redirection) {
            $_SESSION['error_msg'] = 'URL not found';
            header('location: /');
            exit;
        }else {
            header('location: ' . $redirection['original_url'], true, 302);
            exit;
        }
    }
}
