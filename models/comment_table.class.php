<?php
    include_once "models/Table.class.php";
    class Comment_Table extends Table
    {
        public function save_Comments($entry_id, $author, $txt)
        {
            $sql = "INSERT INTO comment (entry_id, author, txt) 
                    VALUES (?, ?, ?)";
            $data = array($entry_id, $author, $txt);
            $statement = $this->make_Statement($sql, $data);

            return $statement;
        }

        public function get_all_by_id($id)
        {
            $sql = "SELECT author, txt, dates FROM comment
                    WHERE entry_id = ?";
            $data = array($id);
            $statement = $this->make_Statement($sql, $data);
            return $statement;
        }
    }
?>