<?php 
error_reporting(E_ALL);
	
// Include and initialize ZipArchive class
require_once 'ZipArchiver.class.php';
$zipper = new ZipArchiver;

$request_url = $_SERVER['REQUEST_URI'];
$folders_array = explode('/',$request_url);
$folder_name = $folders_array[0];
// $folder_name = "partylocator.dci.in";
echo $dirPath = $_SERVER['DOCUMENT_ROOT']."/".$folder_name."";
echo "<br>";
echo $zipPath = $_SERVER['DOCUMENT_ROOT']."/".$folder_name."code.zip";
echo "<br>";
echo "<br>";


// Create zip archive
$zip = $zipper->zipDir($dirPath, $zipPath);
if($zip){
    echo 'ZIP archive created successfully.';
} else {
    echo 'Failed to create ZIP.';
}

?>