<?php
    $search_data_found = isset($search_data);
    $search_row = $search_data->fetchObject();
    if($search_data_found === false)
    {
        trigger_error('views/search-results-html.php requires a $search_data_found');
    }
    $search_html = "<section id='search'><p>
                    You Searched for <em>$search_term</em></p><ul>";
                    if($search_row === false)
                        {
                            $search_html .="<p>No entries match your search </p>";
                        }
                    while($search_row = $search_data->fetchObject())
                    {
                        
                        $href = "index.php?url_var=blog&amp;id=$search_row->entry_id";
                        $search_html .= "<li><a href='$href'>$search_row->title</a>";
                    }
    $search_html .="</ul></section>";
    return $search_html;
?>