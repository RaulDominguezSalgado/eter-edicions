document.addEventListener("DOMContentLoaded", function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); // Enero es 0!
    var yyyy = today.getFullYear();

    today = yyyy + "-" + mm + "-" + dd;

    document.getElementById("date").value = today;
    document.getElementById("publication_date").value = today;

    //CKEditor
    ClassicEditor.create(document.querySelector("#content"))//select by id
    .catch((error) => {
        console.error(error);
    });

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
