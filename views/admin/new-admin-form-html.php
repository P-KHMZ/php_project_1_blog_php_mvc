<?php
    if(isset($admin_form_message) === false)
    {
        $admin_form_message = "";
    }
    return
    "<form action='admin.php?url_var=users' method='post'>
        <fieldset>
            <legend>Create new Administrator User</legend>
            <label >Email</label>
            <input type='email' name='email' required>
            <label>Password</label>
            <input type='password' name='password' required>
            <label>Confirm password</label>
            <input type='password' name='password2' required>
            <input type='submit' value='Create User' name='new-admin'>
        </fieldset>
        <p id='admin-form-message'>$admin_form_message</p>
    </form>";
?>