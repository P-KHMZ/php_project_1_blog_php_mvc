<?php
    include_once "models/Admin_Table.class.php";
    //is the form submitted?
    $create_new_admin = isset($_POST['new-admin']);
    if($create_new_admin)
    {
        $new_email = $_POST['email'];
        $new_pass_word = $_POST['password'];
        $confirm_new_password = $_POST['password2'];
        $admin_table = new Admin_Table($db_connection);
        
        if($new_pass_word === $confirm_new_password)
        {
            try
            {
                $admin_table->create($new_email, $new_pass_word);
                $admin_form_message = "New user created for $new_email";
            }
            catch(Exception $e)
            {
                //if operation failed, tell user what went wrong
                $admin_form_message = $e->getMessage();
            }
        }
        else
        {
            $admin_form_message = "Fatal: Your new password and the confirmed password do not match";
        }
        
    }
    $new_admin_form = include_once "views/admin/new-admin-form-html.php";
    return $new_admin_form;
?>