<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="js/dropzone/css/dropzone.css" />
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/StartBubbleMachine.js"></script>
	<script type="text/javascript" src="js/dropzone/dropzone.min.js"></script>
	<script type="text/javascript">
	 $(function() {
		
	       DropzoneOptions = {};
	   	   DropzoneOptions.url = ""+TheUploadURL+"";
		   DropzoneOptions.method = "post";
		   DropzoneOptions.paramName = "uploaded_files";
		   DropzoneOptions.uploadMultiple = "true";
		   DropzoneOptions.maxFilesize= 100; // MB
		   //DropzoneOptions.maxFiles= 100,
		   DropzoneOptions.acceptedFiles= ".wav,.mp3,.m4a,.mp4,.jpg,.png,.psd";
		   DropzoneOptions.autoProcessQueue= true;
	       DropzoneOptions.accept = function(uploaded_files, done) {
					done();
			 };
	
	      Dropzone.autoDiscover = false;
	
	      var myDropzone = new Dropzone("#ADropZone", DropzoneOptions);
	
		           	myDropzone.on("sending", function(uploaded_files, xhr, formData) {
	
			          formData.append("do-upload", 'yes');
			          formData.append("filename", uploaded_files.name); 
					  formData.append("filesize", uploaded_files.size); // Will send the filesize along with the file as POST data.
					  	
					});
					
					myDropzone.on('success',function(uploaded_files, xhr, formData){

		                $("#notice").html("File Uploaded: "+uploaded_files.name+" ");
		     
		                $.post("/gcsprocess",{"Require":"UploadURL"},function(uploadurl){

							DropzoneOptions.url = ""+uploadurl+"";

			            });
		
		             });

		            myDropzone.on("complete", function(file) {

					     //myDropzone.removeFile(file);

					});
	
        });
	</script>
</head>
<body>	
	<div id="notice" style="font-color:#000;font-size:40px"></div>
	<form id="ADropZone" class="dropzone" method="post" target="_self" enctype="multipart/form-data">
	  <div class="fallback">
		<input type="hidden" name="do-upload" value="yes">
	    	<input name="uploaded_files" type="file" />
	  </div>

	</form>

</body>
</html>	