<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '../../upload/product'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

 function getFileType($filename) {
            //获取文件后缀名
            $fileArray = explode(".", $filename);
            $pos = count($fileArray) - 1;
            return $fileArray[$pos];
        }
		
function changeFileName($filename) {
            //更改文件名
            $name = "pro_" . time() . "." . getFileType($filename);
            return $name;
        }
		
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$old_name = $_FILES['Filedata']['name'];
	$new_name = changeFileName($old_name);
	$targetPath = $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' .$new_name;
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo $new_name;
	} else {
		echo 'Invalid file type.';
	}
}
?>