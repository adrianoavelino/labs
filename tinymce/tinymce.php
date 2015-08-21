<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JS Bin</title>
  <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script src="http://localhost/github/labs/bower_components/jquery/dist/jquery.min.js" charset="utf-8"></script>
  <script type="text/javascript">
  tinymce.init({
  selector: '#my_editor',
  plugins: ["image"],
  file_browser_callback: teste,

  // file_browser_callback: function(field_name, url, type, win) {
  //     if(type=='image') $('#my_form input').click();
  //     name = './images/'+ $("input").val().split("\\")[2];
  //
  //     // $("#" + field_name).val(name);
  //     // console.log( win);
  //
  // },
  images_upload_url: "postAcceptor.php"
});


function teste(field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: 'teste.html',// use an absolute path!
    title: 'Upload de Arquivos',
    width: 900,
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}






  </script>
</head>
<body>
<textarea id="my_editor"></textarea>

<iframe id="form_target" name="form_target" style="display:none"></iframe>

<form id="my_form" action="./postAcceptor.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
  <input name="image" type="file" onchange="$('#my_form').submit();">
</form>


</body>
</html>
