<?php
    $entries_found = isset($entries);
    if($entries_found === false)
    {
        trigger_error('views/list-entries-html.php needs $entries');
    }
    $entries_html = "<div class='content'><ul id = 'blog-entries' class='list-index-comments'>";
    //remember each one row temporarily as $entry
    while($entry = $entries->fetchObject())
    {
        $href ="index.php?url_var=blog&amp;id=$entry->entry_id";//the &amper(ampersand symbol); 
        //helps to separate the url variables
        $entries_html .="<li>
            <h2>$entry->title</h2>
            <div>$entry->intro
                <a href='$href' class='button green'>Read more</a>
            </div>
        </li>";
    }
    $entries_html .="</ul></div>";
    return $entries_html;
?>