<?php
class Account {
    public $account_id;
    public $user_name;
    public $phone;
    public $email;
    public $dob;
    public $type;

    function __construct($accId, $user_name, $phone, $email, $type) {
        $this->account_id = $accId;
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->type = $type;
    }
}
?>