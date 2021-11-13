<?php
    include_once "models/blog_entry_table_class.php";
    $entry_Table = new Blog_Entry_Table($db_connection);
    $editor_Submitted = isset($_POST['action']);
    if($editor_Submitted)
    {
        $button_Clicked = $_POST['action'];
        //$save becomes TRUE if the button with the value 'save' is clicked
        $save = ($button_Clicked === 'save');

        // $insert_New_Entry = ($button_Clicked === 'save');
        // $delete_Entry = ($button_Clicked === 'Delete');
        $id = $_POST['id'];
        //$insert_New_Entry becomes true only if $save and $id ===0;
        $insert_New_Entry = ($save and $id === '0');
        $delete_Entry = ($button_Clicked === 'Delete');
        $update_Entry = ($save and $insert_New_Entry === false);
        $title = $_POST['title'];
        $entry = $_POST['entry'];
        if($insert_New_Entry)
        {
            // $title = $_POST['title'];
            // $entry = $_POST['entry'];
            //save new entry
            // $entry_Table -> save_Entry($title, $entry);
            $save_Entry_Id = $entry_Table->save_Entry($title, $entry);
        }
        else if($delete_Entry)
        {
            $entry_Table->delete_Entry($id);
        }
        else if($update_Entry)
        {
            $entry_Table->update_Entry($id, $title, $entry);
            $save_Entry_Id = $id;
        }
    }
    $entry_requested = isset($_GET['id']);//get the user_clicked id from db
    //create the new if statement
    if($entry_requested)
    {
        $id = $_GET['id'];
        $entry_data = $entry_Table->get_Entry($id);
        $entry_data->entry_id = $id;
        //show no message when entry is loaded initially;
        $entry_data->message = "";
        $form_data = "Edit an entry";
    }
    //new code:an entry was saved or updated
    $entry_save = isset($save_Entry_Id);
    if($entry_save)
    {
        $entry_data = $entry_Table->get_Entry($save_Entry_Id);
        //display the confirmation message
        $entry_data->message = "Entry was saved";
    }//end of new code
    $editor_output = include_once "views/admin/editor-html.php";
    return $editor_output;
?>