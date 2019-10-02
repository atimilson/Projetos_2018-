$(document).ready(function() {
    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        width: '100%',
   

        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | caption",
        image_caption: true,
       image_advtab: true ,
       
       external_filemanager_path:"/Teste_tinymce/filemanager/",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "/Teste_tinymce/filemanager/plugin.min.js"},
      visualblocks_default_state: true ,

      style_formats_autohide: true,
      style_formats_merge: true,
    });
});