cloud-upload-with-dropzonejs
============================
Upload files to Google Cloud Storage via this simple App Engine PHP Application.

1. Create a project in google cloud console. https://cloud.google.com/
2. Download this repo.
3. Edit app.yaml and enter your project id.
    <pre>
        application: your-project-id
    </pre>
4. In Google cloud console browse to your project from left menu and in storage section create bucket named “upload-app”
            <b>NOTE: in main.php DropzoneOptions.paramName = "unique-bucket-name-required-here"</b>
5. Setup App Engine PHP SDK: https://developers.google.com/appengine/downloads#Google_App_Engine_SDK_for_PHP
6. From Google App Engine Launcer click File -> Add Existing Application
7. Browse to the directory where this repo was unziped.
8. Select PHP as runtime.
9. Press deploy or press Run to try it out on your local system
