<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];

$song = json_decode($_POST['test'], true); 
    $ogtitle = $song['title'];
    $ogfield1 = $song['field1'];
    $ogfield2 = $song['field2'];
    $ogimg = $song['img'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Editar Test</title>
  </head>
  <body class="d-flex flex-column min-vh-100" style="background-image: url('/img/bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">  
  
  <nav class="navbar navbar-dark justify-content-md-center" style="background-color: #E6E6E6; border: 3px solid black; padding: 20px 0;">
    <div class="d-flex">
    <a href="/index.html" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Pagina Principal</a>
    <a href="form.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Añadir ??? algo</a>
    <a href="list.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Mostrar ??? Algo</a>
    </div>
  </nav>

  <div class="container mt-5 flex-grow-1">
    <div class="row justify-content-center">
      <div class="col-10 text-center p-5 mb-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px;">
        <h1 class="display-4 mb-4">Editar <?php echo $ogtitle; ?></h1>
          <?php if (isset($error)) {
                ?>
          <div class="alert alert-danger" role="alert">
            Error! Rellena los campos.
          </div>
                <?php
          }?>
          <form action="edit.php" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="inputtitulo">Titulo</label>
        <input value="<?php echo $ogtitle; ?>" name="title" type="text" class="form-control" id="inputtitol" placeholder="El titulo" required>
    </div>
    <div class="form-group">
        <label for="inputartista">Campo 1</label>
        <input value="<?php echo $ogfield1; ?>" name="field1" type="text" class="form-control" id="inputartista" placeholder="Campo 1" required>
    </div>
    <div class="form-group">
        <label for="inputartista">Campo 2</label>
        <input value="<?php echo $ogfield2; ?>" name="field2" type="text" class="form-control" id="inputartista" placeholder="Campo 2" required>
    </div>
    <div class="form-group">
        <label for="inputimage">Imagen</label>
        <input name="img" type="file" class="form-control" id="inputimage" placeholder="Imagen">
    </div>
    <input type="hidden" id="songduration" name="songduration" value="">
    <!--data before the edit -->
    <input type="hidden" id="ogimg" name="ogimg" value="<?php echo $ogimg; ?>">
    <button type="submit" class="btn btn-primary">Enviar</button>
          </form>

      </div>
    </div>
  </div>

  <footer class="p-3 text-center" style="border: 2px solid black; background-color: rgba(255, 255, 255, 0);">
    <p class="mb-0" style="color: rgb(255, 255, 255);"> 
      Test Project 1</p>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    function getAudioDuration(event) {
        const file = event.target.files[0];
        if (file) {
            const audio = new Audio(URL.createObjectURL(file));
            audio.onloadedmetadata = function() {
              const minutes = Math.floor(audio.duration / 60);
              const seconds = Math.floor(audio.duration % 60);
              const timef = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

              document.getElementById("songduration").value = timef;
            };
        }
    }
</script>
