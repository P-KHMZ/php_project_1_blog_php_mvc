<?php
   include_once "models/blog_entry_table_class.php";
   $entry_table = new Blog_Entry_Table($db_connection);
   $all_entries = $entry_table->get_All_Entries();

   $entries_as_html = include_once "views/admin/entries-html.php";
   return $entries_as_html;
?>