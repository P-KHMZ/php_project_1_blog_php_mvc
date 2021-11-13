<?php
    $entry_Data_Found = isset($entry_Data);
    if($entry_Data_Found === false)
    {
        trigger_error('views/entry-html.php needs an $entry_Data_Found');
    }
    return"<article>
            <h1>$entry_Data->title</h1>
            <div class='date'>$entry_Data->date_created</div>
            $entry_Data->entry_text
        </article>";

?>