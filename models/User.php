<?php

class User {
    public $id;
    public $username;
    public $password;
    public $user_type; // guest, user, admin

    public function __construct($id = null, $username = '', $password = '', $user_type = 'guest') {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->user_type = $user_type;
    }
}
