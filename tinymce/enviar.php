<?php
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$tags = array();
$tags = $_POST['tag'];

?>
Título: <?=$titulo;?> <br />
Texto: <?=$texto;?>
Tag:
<?php
  foreach ($tags as $tag) {
    echo "<a href='#' class='badge'>$tag</a>  ";
  }

 ?>
