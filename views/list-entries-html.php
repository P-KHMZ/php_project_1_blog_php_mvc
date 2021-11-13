<?php
    $entries_found = isset($entries);
    if($entries_found === false)
    {
        trigger_error('views/list-entries-html.php needs $entries');
    }
    $entries_html = "<ul id = 'blog-entries'>";
    //remember each one row temporarily as $entry
    while($entry = $entries->fetchObject())
    {
        $href ="index.php?url_var=blog&amp;id=$entry->entry_id";//the &amper(ampersand symbol); 
        //helps to separate the url variables
        $entries_html .="<li>
            <h2>$entry->title</h2>
            <div>$entry->intro
                <a href='$href'>Read more</a>
            </div>
        </li>";
    }
    $entries_html .="</ul>";
    return $entries_html;
?>