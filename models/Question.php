<?php 
    class Question {
        public $qId;
        public $title;
        public $type;
        public $status;

        function __construct($question_id, $title, $type, $status) {
            $this->qId = $question_id;
            $this->title = $title;
            $this->type = $type;
            $this->status = $status;
        }
    }
?>