import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

/* No és la millor manera de carregar tots els plugins però, si no, l'adreça és incorrecta */
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/charmap';
import 'tinymce/plugins/code';
import 'tinymce/plugins/codesample';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/media';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/table';

window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '.tinyMce', /* Aquest és el selector per aplicar l'editor */

        /* TinyMCE configuration options */
        skin: false,
        content_css: false,
        width: '100%', // Amplada de l'editor
        height: 400, // Alçada de l'editor

        // Estils

        // Plugins
        plugins: ["anchor", "charmap", "code", "codesample", "fullscreen", "link", "lists", "media", "image", "preview", "table",],

        image_caption: true,
        /* enable title field in the Image dialog*/
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                });
                reader.readAsDataURL(file);
            });

            input.click();
        },
        toolbar: "undo redo | fullscreen | anchor link image charmap  | blocks fontfamily fontsize | bold italic underline strikethrough | align | numlist bullist  | lineheight outdent indent| pagebreak ",

        style_formats: [
            { title: 'Encapçalament 1', format: 'h1' },
            { title: 'Encapçalament 2', format: 'h2' },
            { title: 'Encapçalament 3', format: 'h3' },
            { title: 'Paràgraf', format: 'p' }
        ],

        // Menú contextual
        contextmenu: 'link image table',

    }); /* tinymce.init */
});
