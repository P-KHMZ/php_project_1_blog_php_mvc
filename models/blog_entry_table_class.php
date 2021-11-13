<?php
    class Blog_Entry_Table
    {
        private $db_connection;
        public function __construct($db)
        {
            $this->db_connection = $db;
        }

        public function save_Entry($title, $entry)
        {
            $entry_SQL = "INSERT INTO blog_entry (title, entry_text)
                          VALUES (?, ?)";
            $form_Data = array($title, $entry); 
            $entry_Statement = $this->make_Statement($entry_SQL, $form_Data);
            // try
            // {
            //     $entry_Statement->execute($form_Data);
            // }
            // catch(Exception $e)
            // {
            //     $msg = "<p>You tried to run this sql:$entry_SQL</p>
            //             <p>Exception:$e</p>";
            //     trigger_error($msg);
            // }
            // return $entry_Statement;
            return $this->db_connection->lastInsertId();
        }

        public function get_All_Entries()
        {
            $sql = "SELECT entry_id, title, SUBSTRING(entry_text, 1, 10) AS intro FROM blog_entry";
            $statement = $this -> make_Statement($sql);
            // try
            // {
            //     $statement -> execute();
            // }
            // catch(Exception $e)
            // {
            //     $exception_message = "<p>You tried to run $sql:<br>
            //                           Exception: $e</p>";
            //     trigger_error($exception_message);
            // }
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

        public function delete_Entry($id)
        {
            $sql  = "DELETE FROM blog_entry WHERE entry_id=?";
            $data = array($id);
            $statement = $this->make_Statement($sql, $data);
        }

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

        public function make_Statement($sql, $data = NULL)
        {
            $statement = $this ->db_connection ->prepare($sql);
            try
            {
                $statement ->execute($data);
            }
            catch(Exception $e)
            {
                $exception_Message = "<p>You tried to run this sql: $sql</p>
                                    <p>Exception:$e</p>";
                trigger_error($exception_Message);
            }
            return $statement;
        }

   
    }
   
?>