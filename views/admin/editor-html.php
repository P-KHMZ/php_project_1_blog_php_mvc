<?php
    $entry_Data_Found = isset($entry_data);
    if($entry_Data_Found === false)
    {
        //Default values for an empty editor
        $entry_data = new stdClass();
        $entry_data ->entry_id   = 0;
        $entry_data ->title      = "";
        $entry_data ->entry_text ="";
        $entry_data ->message    = "";
        $entry_data ->form_title = "";
    }
    return
    "<form action='admin.php?url_var=editor' method='post' id='editor'>
        <input type='hidden' name='id' value='$entry_data->entry_id'>
        <fieldset>
            <legend name='form_title' id='form_title'>xxx(needs a dynamic title)</legend>
            <label for=''>Title</label>
            <input type='text' name='title' maxlength='150' value='$entry_data->title' required>
            <p id='title-warning'></p>
            <label for=''>Entry</label>
            <textarea name='entry'>$entry_data->entry_text</textarea>
            <fieldset id='editor-buttons'>
                <input type='submit' name='action' value ='Delete'>
                <input type='submit' name='action' value ='save'>
                <p id='editor-message'>$entry_data->message</p>
            </fieldset>
        </fieldset> 
    </form>";
?>