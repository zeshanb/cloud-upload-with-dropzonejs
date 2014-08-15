<?php
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'upload-app' ];
$upload_url = CloudStorageTools::createUploadUrl('/gcsprocess', $options);

   $filename = $_FILES['uploaded_files']['name'];
   
   $gs_name = $_FILES['uploaded_files']['tmp_name'];
   move_uploaded_file($gs_name, 'gs://upload-app/'.$filename.'');

if(isset($_POST['Require']) && $_POST['Require'] === "UploadURL" ){
	
	echo $upload_url;	
	
}

?>