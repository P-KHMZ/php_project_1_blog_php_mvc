<?php
    include_once "models/blog_entry_table_class.php";
    $blog_table = new Blog_Entry_Table($db_connection);
    // $search_data = $blog_table->search_Entry("post");
    // $first_result = $search_data->fetchObject();
    // $search_form = print_r($first_result, true);
    $search_output = "";
    // $search_data = "";
    if(isset($_POST['search-term']))
    {
        $search_term = $_POST['search-term'];
        $search_data = $blog_table->search_Entry($search_term);
        $search_output = include_once "views/search-form-results-html.php";
    }
    // $search_form .= include_once "views/search-form-html.php";
    return $search_output;
?>