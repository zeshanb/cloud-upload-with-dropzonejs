   var TheUploadURL = "#";

    $.post("/gcsprocess",'',function(uploadurl){
		
		 TheUploadURL = ""+uploadurl+"";
    });