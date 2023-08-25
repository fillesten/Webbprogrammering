<?php
    class Message {
        
        protected $name;
        protected $message; 
        protected $date;
        //date blir inte declaread på rätt sätt... måste fixa det 
        // public $name;
        // public $message; 
        // public $date;
        // dessa löser så det inte blir null i dat-filen
        
        function __construct($name, $message, $date){
            $this->name = $name;
            $this->message= $message;
            $this->date = $date;
        }
        function getName(){ return $this->name; }
        function getMessage(){ return $this->message; }
        function getDate(){ return $this->date; } 
    }
?>