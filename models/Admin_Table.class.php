<?php
    include_once "models/Table.class.php";
    class Admin_Table extends Table
    {
        public function create($email, $password)
        {
            $this->check_Email($email);
            $sql = "INSERT INTO admin(email, pssword) VALUES (?, MD5(?))";
            $data = array($email, $password);
            $this->make_Statement($sql, $data);
        }

        private function check_Email($email)
        {
            $sql = "SELECT email FROM admin WHERE email=?";
            $data = array($email);
            $statement = $this->make_Statement($sql, $data);

            if($statement->rowCount() === 1)
            {
                $e = new Exception("Error: '$email' already used!");
                throw $e;
            }
        }
        public function check_Credentials($email, $password)
        {
            $sql = "SELECT email FROM admin WHERE email = ? AND pssword=MD5(?)";
            $data = array($email, $password);
            $statement = $this->make_Statement($sql, $data);
            if($statement->rowCount() === 1)
            {
                $out = true;
            }
            else
            {
                $login_problem = new Exception("login failed!");
                throw $login_problem;
            }
            return $out;
        }
    }
?>