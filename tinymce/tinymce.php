<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JS Bin</title>
  <link rel="stylesheet" href="./../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../bower_components/select2/dist/css/select2.min.css">
  <script src="./../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="./../bower_components/tinymce/tinymce.min.js"></script>
  <script src="./../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


  <style>
    textarea {
      min-height: 20em;
    }
  </style>
  <script>
    tinymce.init({
      selector: "textarea",theme: "modern",
      // height: 300,
      // width: 700,height: 300,
      language: "pt_BR",
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen tabfocus",
        "responsivefilemanager insertdatetime media table contextmenu paste wordcount"
      ],
      toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code fullscreen  wordcount",
      image_advtab: true ,
      external_filemanager_path:"/github/labs/tinymce/filemanager/",
      filemanager_title:"Gerenciador de Arquivos" ,
      external_plugins: { "filemanager" : "/github/labs/tinymce/filemanager/plugin.min.js"}
    });

    $(function(){

      $("#form select").select2({
        language: "pt-BR",
        placeholder: 'Selecione uma tag'
      });

      $("#form").on('submit',function(event){
        event.preventDefault();

        var titulo = $("#titulo").val();
        var texto = tinyMCE.get('texto').getContent();
        var tag = $("#tag").val();

        $.post('enviar.php', {titulo:titulo, texto:texto, tag:tag}, function(data){
          $("#box").html(data);
        });
      });
    })

  </script>
</head>
<body>

  <div class="container">

    <div class="page-header" style="padding-left: 13em;">
      <h1>Teste com tinymce<small> <br />
      Um exemplo prático</small></h1>
    </div>

    <form class="form-horizontal" id="form">
      <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Título: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="titulo" placeholder="Título">
        </div>
      </div>
      <div class="form-group">
        <label for="texto" class="col-sm-2 control-label">Texto: </label>
        <div class="col-sm-10">
          <textarea class="form-control" id="texto"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="tag" class="col-sm-2 col-md-2 col-xs-2 control-label">TAG: </label>
        <div class="col-sm-8 col-md-9 col-xs-9">
          <select class="form-control" name="" id="tag" placeholder="testeee" multiple>
            <option value=""></option>
            <option value="Rede">Rede</option>
            <option value="Linux">Linux</option>
            <option value="Windows Seven">Windows Seven</option>
            <option value="VirtualBox">VirtualBox</option>
            <option value="Manual">Manual</option>
          </select>
        </div>
        <div class="sm-col-2">
          <a href="#" class="pull-rigth" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-plus" style="font-size: 20px; top: 0.4em;" alt="Clique aqui para adicionar uma TAG" title="Clique aqui para adicionar uma TAG" data-toggle="popover" data-content="And here's some amazing content. It's very engaging. Right?"></span>
          </a>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </form>
    <div id="box"></div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
  Popover on left
</button>


  <script src="./../bower_components/select2/dist/js/select2.min.js"></script>
  <script src="./../bower_components/select2/dist/js/i18n/pt-BR.js"></script>
</body>
</html>
