<?php
function newuploadusingcompress($filearray,$path)
{
    $temp = explode(".", $filearray['name']);
    $filename=rand(0000,9999).time().'.'.end($temp);
    $valid_ext = array('png','jpeg','jpg','pdf');
    $location = $path.$filename;
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    if(in_array($file_extension,$valid_ext))
    {  
        $upload=compressImage($filearray['tmp_name'],$location,60);
        if($upload==1)
        {
            return $filename;
        }
        else
        {
            return 0;
        }
    }
    else
    {
        return 0;
    }
}
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    return imagejpeg($image, $destination, $quality);

}
function get_random_string($length = 10, $sting = "")
{
    if (empty($sting) || $sting == '')
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    }
    else
    {
        $alphabet = $sting;
    }
    $token = "";
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++)
    {
        $n = rand(0, $alphaLength);
        $token .= $alphabet[$n];
    }
    return $token;
}
function file_upload($arr, $path)
{
    set_time_limit(0);
    if ($arr['error'] == 0)
    {
        $temp = explode(".", $arr["name"]);
        $file_name = uniqid() . time() . '.' . end($temp);
        $file_path = $path . $file_name;
        if (move_uploaded_file($arr["tmp_name"], $file_path) > 0)
        {
            $ret = $file_name;
        }
        else
        {
            $ret = "";
        }
    }
    return $ret;
}
?>