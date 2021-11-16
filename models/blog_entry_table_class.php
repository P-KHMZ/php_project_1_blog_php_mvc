<?php
    include_once "models/Table.class.php";
    class Blog_Entry_Table extends Table
    {
        
        public function save_Entry($title, $entry)
        {
            $entry_SQL = "INSERT INTO blog_entry (title, entry_text)
                          VALUES (?, ?)";
            $form_Data = array($title, $entry); 
            $entry_Statement = $this->make_Statement($entry_SQL, $form_Data);
            return $this->db_connection->lastInsertId();
        }

        public function get_All_Entries()
        {
            $sql = "SELECT entry_id, title, SUBSTRING(entry_text, 1, 10) AS intro FROM blog_entry";
            $statement = $this -> make_Statement($sql);
            return $statement;
        }

        public function get_Entry($id)
        {
            $sql = "SELECT entry_id, title, entry_text, date_created FROM blog_entry WHERE entry_id=?";
            $data = array($id);
            $statement = $this->make_Statement($sql, $data);//make_Statement() method call
            $model = $statement ->fetchObject();
            return $model;
        }
// >>>New code
        public function delete_Entry($id)
        {
            $this->delete_Comment_By_Id($id);
            $sql  = "DELETE FROM blog_entry WHERE entry_id=?";
            $data = array($id);
            $statement = $this->make_Statement($sql, $data);
        }
        //the method deletes all the comments related to a certain $id
        private function delete_Comment_By_Id($id)
        {
            include_once "models/Comment_Table.class.php";
            //create a Comment_Table object
            $comments = new Comment_Table($this->db_connection);
            //delete any comments before deleting an entry
            $comments->delete_By_Id($id);
        }
// >>end
        public function update_Entry($id, $title, $entry)
        {
            $sql = "UPDATE blog_entry SET title=?,
                                           entry_text=?
                                            WHERE entry_id=?";
            $data = array($title, $entry, $id);
            $statement = $this->make_Statement($sql, $data);
            return $statement;
        }

        public function search_Entry($search_term)
        {
            $sql = "SELECT entry_id, title FROM blog_entry WHERE title LIKE ? OR entry_text LIKE ?";
            $data = array("%$search_term%", "%$search_term%");
            $statement = $this->make_Statement($sql, $data);
            return $statement;
        }

    }
   
?>