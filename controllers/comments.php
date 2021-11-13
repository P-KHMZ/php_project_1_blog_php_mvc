<?php
    include_once "models/comment_table.class.php";
    $comment_Table = new Comment_Table($db_connection);
    //links the comment's input form with the DB to enable the insertion
    $new_comment_submitted = isset($_POST['new-comment']);
    if($new_comment_submitted)
    {
        $which_entry = $_POST['entry-id'];
        $user        = $_POST['user-name'];
        $comment     = $_POST['new-comment'];
        $comment_Table->save_Comments($which_entry, $user, $comment);
    }//end of insertion
    $comments = include_once "views/comments-html.php";
    $all_comments = $comment_Table->get_all_by_id($entryID);//all comments linked with the post id(the id in the DB)
    $comments .=include_once "views/display-comments-html.php";
    return $comments;
?>