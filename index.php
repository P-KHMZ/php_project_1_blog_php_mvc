<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once "models/page_data_classe.php";

    $page_data = new Page_Data;
    $page_data -> title = "Blog Demo Example";
    $page_data -> addCss('css/blog.css');
    
    $page_data ->content = "<h1>Guest portal</h1>";
    $page_data ->content.="<nav><a href='index.php'>Home</a></nav>";
    $db_info ="mysql:host=localhost;dbname=simple_blog";
    $db_user ="root";
    $db_pass = "";
    $db_connection = new PDO($db_info, $db_user, $db_pass);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //codes for the search form
    $page_requested = isset($_GET['url_var']);
    //default controller is blog
    $controller = "blog";
    if($page_requested)
    {
        //if user submitted the search form
        if($_GET['url_var'] === "search")
        {
            //load the search by overwriting default contoller
            $controller = "search";
        }
    }
    $page_data ->content .= include_once "views/search-form-html.php";
    // $page_data ->content .= include_once "controllers/blog.php";
    $page_data ->content .= include_once "controllers/$controller.php";
    
    $page = include_once "views/template.php";
    echo $page;
?>