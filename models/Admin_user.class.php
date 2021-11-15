<?php
    class Admin_User
    {
        public function __construct()
        {
            session_start();
        }
        // private $logged_in = false;
        public function is_Logged_in()
        {
            $session_is_set = isset($_SESSION['logged_in']);
            if($session_is_set)
            {
                $out = $_SESSION['logged_in'];
            }
            else
            {
                $out = false;
            }
            return $out;
        }
        public function login()
        {
            // $this->logged_in = true;
            $_SESSION['logged_in'] = true;
        }
        public function logout()
        {
            // $this->logged_in = false;
            $_SESSION['logged_in'] = false;
        }
    }
?>