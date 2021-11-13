<?php
    $comments_found = isset($all_comments);
    if($comments_found === false)
    {
        trigger_error('views/display-comments-html.php needs $all_comments');
    }
    $all_comments_html = "<ul id = 'comments'>";
        while($comments_data = $all_comments->fetchObject())
        {
            $all_comments_html .="<li>
                                <h3>$comments_data->author</h3> comments:
                                <p><i>$comments_data->txt</i></p>
                                </li>";
        }
    $all_comments_html.= "</ul>";
    return $all_comments_html;
?>