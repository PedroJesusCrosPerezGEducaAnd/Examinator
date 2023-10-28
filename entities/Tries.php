<?php

class Tries 
{
    // Properties
    private $id;
    private $date;
    private $try;
    private $user_id;
    private $exam_id;

    // Constructor
    public function __construct($id, $date, $try, $user_id, $exam_id) {
        $this->setId($id);
        $this->setDate($date);
        $this->setTry($try);
        $this->setUserId($user_id);
        $this->setExamId($exam_id);
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    
    private function setId($id) {
        $this->id = $id;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    private function setDate($date) {
        $this->date = $date;
    }

    public function getTry() {
        return $this->try;
    }
    
    private function setTry($try) {
        $this->try = $try;
    }
    
    public function getUserId() {
        return $this->user_id;
    }
    
    private function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getExamId() {
        return $this->exam_id;
    }
    
    private function setExamId($exam_id) {
        $this->exam_id = $exam_id;
    }
}


?>