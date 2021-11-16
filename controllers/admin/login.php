<?php
    include_once "models/Admin_Table.class.php";
    $login_form_submitted = isset($_POST['log-in']);
    if($login_form_submitted)
    {
        // $admin->login();
        $email = $_POST['email'];
        $password = $_POST['password'];
        //create an object for communicating with the DBtable
        $admin_table = new Admin_Table($db_connection);
        try
        {
            //try to login user
            $admin_table->check_Credentials($email, $password);
            $admin->login();
        }
        catch(Exception $e)
        {
            
        }
    }
    $logging_out = isset($_POST['logout']);
    if($logging_out)
    {
        $admin->logout();
    }
    if($admin->is_Logged_in())
    {
        $view = include_once "views/admin/logout-form-html.php";
    }
    else
    {
        $view = include_once "views/admin/login-form-html.php";
    }
    // $view = include_once "views/admin/login-form-html.php";
    
    return $view;
?>