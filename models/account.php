<?php
class Account {
    private $account_id;
    private $user_name;
    private $password;
    private $email;
    private $dob;

    function __construct($account_id, $user_name, $password, $email, $dob) {
        $this->account_id = $account_id;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->email = $email;
        $this->dob = $dob;
    }

    function get_account_id() {
        return $this->account_id;
    }

    function get_user_name() {
        return $this->user_name;
    }

    function get_password() {
        return $this->password;
    }
    
    function get_email() {
        return $this->email;
    }

    function get_dob() {
        return $this->dob;
    }

    function set_account_id() {
        $this->account_id;
    }

    function set_user_name() {
        $this->user_name;
    }

    function set_password() {
        $this->password;
    }
    
    function set_email() {
        $this->email;
    }

    function set_dob() {
        $this->dob;
    }
}
?>