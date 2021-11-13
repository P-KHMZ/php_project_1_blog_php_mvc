<?php
    if($all_entries === false)
    {
        trigger_error('views/admin/entries-html.php needs $all_entries');
    }
    $entries_as_html = "<ul>";
    while($entry=$all_entries->fetchObject())
    {
        $href="admin.php?url_var=editor&amp;id=$entry->entry_id)";
        $entries_as_html .="<li><a href='$href'>$entry->title</a></li>";
    }
    $entries_as_html .="</ul>";
    return $entries_as_html;
?>