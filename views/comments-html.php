<?php
    $id_is_found = isset($entryID);
    if($id_is_found === false)
    {
        trigger_error('views/comments-html.php needs an $entryID');
    }
    return "
    <form action='index.php?url_var=blog&amp; id=$entryID' method='post'>
        <input type='hidden' name='entry-id' value='$entryID'>
        <label>Your name</label>
        <input type='text' name = 'user-name'>
        <label>Your comment</label>
        <textarea name='new-comment' ></textarea>
        <input type='submit' value='post!'>
    </form>
    ";
?>