<?php
    if(isset($uploadMessage) === false)
    {
        $uploadMessage = "Upload a new message";
    }
    $images_as_html  = "<h1>Images</h1>";
    $images_as_html .="<dl id='images'>";
    $folder = "img";
    $files_in_folder = new DirectoryIterator($folder);
    while($files_in_folder->valid())
    {
        $file = $files_in_folder->current();
        $file_name = $file->getFilename();
        $src = "$folder/$file_name";
        $file_info = new Finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($src);
        //if file is a jpg
        if($mime_type === 'image/jpeg')
        {
            //display image and its src
            $href = "admin.php?url_var=images&amp;delete-image=$src";
            $images_as_html .= "<dt class='lightbox'><img src='$src'></dt>
                                </dd>Source: $src <a href='$href'>Delete</a></dd>";
        }
        $files_in_folder->next();
    }
    $images_as_html .= "</dl>";
    return
    "
    <form action='admin.php?url_var=images' method='POST' enctype='multipart/form-data'>
        <p>$uploadMessage</p>
        <input type='file' name='image-data' accept='image/jpeg'>
        <input type='submit' name='new-image' value='upload'>
    </form>
    <div>
        $images_as_html
    </div>";
?>