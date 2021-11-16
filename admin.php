<?php
    error_reporting(E_ALL);
    ini_set("dispaly_errors", 1);
    include_once "models/page_data_classe.php";
    $page_data = new Page_Data;
    $is_clicked = isset($_GET['url_var']);
    $page_data -> title ="Blog demo";
    $page_data -> addCss("css/blog.css");
    $page_data -> addCss("css/layout.css");
    $page_data ->addScripts("js/editor.js");

    
    $db_info = "mysql:host=localhost;dbname=simple_blog";
    $db_user = "root";
    $db_pass = "";
    $db_connection = new PDO($db_info, $db_user, $db_pass);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // if($is_clicked)
    // {
    //     $clicked_data = $_GET['url_var'];
    // }
    // else
    // {
    //     $clicked_data = "entries";
    // }
    // $page_data -> content  = "<h1>Administrator portal</h1>";
    // $page_data -> content .= include_once "views/admin/admin-navigation.php";
    include_once "models/Admin_user.class.php";
    $admin = new Admin_User();//this objects remembers the state of the user if yes or not he is logged in
    //load the login controller, which will show the login form
    $page_data ->content = include_once "controllers/admin/login.php";
    //if user is logged in
    if($admin->is_Logged_in())
    {
        $page_data ->content .=include_once "views/admin/admin-navigation.php";
        $is_clicked = isset($_GET['url_var']);
        if($is_clicked)
        {
            $controller = $_GET['url_var'];
        }
        else
        {
            $controller = "entries";
        }
        $path_to_controller = "controllers/admin/$controller.php";
        $page_data ->content .= include_once $path_to_controller;
    }
    // $page_data -> content .= include_once "controllers/admin/$controller.php";
    $page = include_once "views/template.php ";
    echo $page;
?>