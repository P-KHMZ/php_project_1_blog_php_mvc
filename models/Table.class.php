<?php
    class Table
    {
        protected $db_connection;

        public function __construct($db)
        {
            $this->db_connection = $db;
        }

        protected function make_Statement($sql, $data = NULL)
        {
            $statement = $this->db_connection->prepare($sql);
            try
            {
                $statement->execute($data);
            }
            catch(Exception $e)
            {
                $exceptionMessage = "<p>You tried to run:$sql<br>
                                    <p>Exception $e</p>";
                trigger_error($exceptionMessage);
            }

            return $statement;
        }
    }
?>