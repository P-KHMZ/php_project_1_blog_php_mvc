<?php
    error_reporting(E_ALL);
    ini_set("dispaly_errors", 1);
    include_once "models/page_data_classe.php";
    $page_data = new Page_Data;
    $is_clicked = isset($_GET['url_var']);
    $page_data -> title ="Blog demo";
    $page_data ->addScripts("js/editor.js");
    
    $db_info = "mysql:host=localhost;dbname=simple_blog";
    $db_user = "root";
    $db_pass = "";
    $db_connection = new PDO($db_info, $db_user, $db_pass);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $page_data -> addCss("css/blog.css");
    $page_data -> addCss("css/layout.css");

    if($is_clicked)
    {
        $clicked_data = $_GET['url_var'];
    }
    else
    {
        $clicked_data = "entries";
    }
    $page_data -> content  = "<h1>Administrator portal</h1>";
    $page_data -> content .= include_once "views/admin/admin-navigation.php";
    $page_data -> content .= include_once "controllers/admin/$clicked_data.php";
    $page = include_once "views/template.php ";
    echo $page;
?>