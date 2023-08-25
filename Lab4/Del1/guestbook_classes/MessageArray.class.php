<?php 
    class MessageArray {

        public $testArr = array();
        //dehär kommer bli en array som innehåller objekten Message, så $testArr[0] är första meddelandet osv

        function __construct() {
            global $file;
            if (file_exists($file) > 0 ) { $this->testArr = unserialize(file_get_contents($file)); }
        }

        function addPost($name, $message, $date ) {
            global $file;
            $this-> testArr[] = new Message($name, $message, $date );
            file_put_contents($file, serialize($this->testArr));
            //save and update the file        
        }
        
        function removePost($index) {
            global $file;
            unset($this->testArr[$index]);
            file_put_contents($file, serialize($this->testArr));
            //save and update the file
        }

        function getPosts () {
            return $this->testArr;
        }

        
        function getTestVar () {
            return $this->testArr;
        }
    }
?>