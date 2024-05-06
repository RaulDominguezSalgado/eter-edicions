document.addEventListener("DOMContentLoaded", function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); // Enero es 0!
    var yyyy = today.getFullYear();

    today = yyyy + "-" + mm + "-" + dd;

    document.getElementById("date").value = today;
    document.getElementById("publication_date").value = today;

    //CKEditor
    ClassicEditor
    .create( document.querySelector( '#content' ), {
        ckfinder: {
            uploadUrl: '/ckeditor/upload', // Replace this with your actual upload URL
        },
        simpleUpload: {
            uploadUrl: '/ckeditor/upload', // Replace this with your actual upload URL
            headers: {
                'X-CSRF-TOKEN': '@csrf', // If you are using Laravel, you can use this line to include the CSRF token
            },
            allowedFileTypes: ['image/png'], // Only allow PNG files
            maxFileSize: 1000000, // Set the maximum file size to 1MB
        },
    } )
    .catch( error => {
        console.error( error );
    } );

    // DecoupledEditor
    //     .create( document.querySelector( '.editor' ) )
    //     .then( editor => {
    //         const toolbarContainer = document.querySelector( '#toolbar-container' );

    //         toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );

});
