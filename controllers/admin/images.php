<?php
include_once "models/uploader.class.php";
    $image_submitted = isset($_POST['new-image']);
    if($image_submitted)
    {
        $uploader = new Uploader('image-data');
        $uploader->saveIn("img");
        try
        {
            $uploader->save();
            $uploadMessage = "File uploaded";
        }
        catch(Exception $e)
        {
            $uploadMessage = $e->getMessage();
        }
        //$uploadMessage = "File probably uploaded";
    }
    $delete_image = isset($_GET['delete-image']);
    if($delete_image)
    {
        //grab the src of the image to delete
        $which_image = $_GET['delete-image'];
        unlink($which_image);//native PHP function to delete a file. to delete a file we pass the path with the file name
    }
    $image_manager_html = include_once "views/admin/images-html.php";
    return $image_manager_html;
?>