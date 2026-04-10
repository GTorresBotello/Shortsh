<?php

require_once __DIR__ . '/../services/UrlService.php';

class UrlController {
    private $urlservice;
    public function __construct()
    {
        $this->urlservice = new UrlService;
    }
    public function add($method)
    {
        if ($method !== 'POST'){
            header('location: /');
            exit;
        }

        $this->urlservice->addurl($_POST['short'], $_POST['original']);
    }
}
