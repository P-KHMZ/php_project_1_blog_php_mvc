<?php
    return 
    "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>$page_data->title</title>
        $page_data->css
    </head>
    <body>
        $page_data->content
        $page_data->scriptElements
    </body>
    </html>"
?>
