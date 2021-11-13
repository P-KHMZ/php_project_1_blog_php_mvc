<?php
    include_once "models/blog_entry_table_class.php";
    $entry_table = new Blog_Entry_Table($db_connection);
    $is_entry_clicked = isset($_GET['id']);//if the primary key is set
    if($is_entry_clicked)
    {
        $entryID = $_GET['id'];//this take the primary key from the id variable in &amp; 
                                //id=$entry->entry_id the list-entities-html
        $entry_Data = $entry_table ->get_Entry($entryID);
        $blog_output = include_once "views/entry-html.php";
        $blog_output.= include_once "controllers/comments.php";
    }
    else
    {
        $entries = $entry_table->get_All_Entries();
        $blog_output = include_once "views/list-entries-html.php";
    }
    
    return $blog_output;
?>