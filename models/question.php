<?php
class Question {
    private $question_id;
    private $question_title;
    private $exam_id;

    function __construct($question_id, $question_title, $exam_id) {
        $this->account_id = $question_id;
        $this->user_name = $question_title;
        $this->password = $exam_id;
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

    function set_account_id() {
        $this->account_id;
    }

    function set_user_name() {
        $this->user_name;
    }

    function set_password() {
        $this->password;
    }

}
?>