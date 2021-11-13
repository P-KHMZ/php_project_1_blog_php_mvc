<?php
    class Page_Data
    {
        public $title          = "";
        public $content        = "";
        public $embeddedStyles = "";
        public $css            = "";
        public $scriptElements = "";
        

        public function addCss($href)
        {
            $this->css.="<link href='$href' rel='stylesheet'>";
        }
        public function addScripts($src)
        {
            $this ->scriptElements .="<script src='$src'></script>";
        }
    }
?>