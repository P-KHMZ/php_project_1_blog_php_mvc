<?php
    class Uploader
    {
        private $filename;
        private $fileData;
        private $destination;
        private $errorMessage;
        private $errorCode;

        public function __construct($key)
        {
            $this->filename = $_FILES[$key]['name'];
            $this ->fileData = $_FILES[$key]['tmp_name'];
            $this ->errorCode = ($_FILES[$key]['error']);
        }

        public function saveIn($folder)
        {
            $this->destination = $folder;
        }
        public function save()
        {
            //call the new method to look for update errors
            //if it returns TRUE, save the uploaded file
            if($this->ready_To_Upload())
            {
                //this native function moves the uploaded data to the new destination
                move_uploaded_file($this->fileData,
                                  "$this->destination/$this->filename");
            }
            else
            {
                // if not create an exception - pass error message as argument
                $exc = new Exception($this->errorMessage);
                throw $exc;
            }
            
        }
        private function ready_To_Upload()
        {
            $folder_is_writeable = is_writeable($this->destination);
            if($folder_is_writeable === false)
            {
                $this->errorMessage = "Error: destination folder is:";
                $this->errorMessage .="Not writeable, change permissions";
                $can_upload = false;
            }
            else if($this->errorCode === 1)
            {
                $maxSize = ini_get('upload_max_filesize');
                $this->errorMessage = "Error:The file size is too big";
                $this->errorMessage.="Max file size is $maxSize";
            }
            else if($this->errorCode>1)
            {
                $this->errorMessage  = "Something went worng!";
                $this->errorMessage .= "Error code:$this->errorCode";
            }
            else
            {
                $can_upload = true;
            }
            return $can_upload;
        }
    }
?>