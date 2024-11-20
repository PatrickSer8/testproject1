<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];

$test = json_decode($_POST['test'], true); 
    $title = $test['title'];
    $field1 = $test['field1'];
    $field2 = $test['field2'];
    $img = $test['img'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Mostrar Test</title>
  </head>
  <body class="d-flex flex-column min-vh-100" style="background-image: url('/img/bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">  

  <nav class="navbar navbar-dark justify-content-md-center" style="background-color: #E6E6E6; border: 3px solid black; padding: 20px 0;">
    <div class="d-flex">
    <a href="/index.html" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Pagina Principal</a>
    <a href="form.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Añadir ??? algo</a>
    <a href="list.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Mostrar ??? Algo</a>
    </div>
  </nav>

  <div class="container mt-4 flex-grow-1">
    <div class="row justify-content-center">
      <div class="mb-1 col-12 text-center p-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px; max-height: 590px;">
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-center text-md-start">
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1"><?php echo $title; ?></h1>
          <h3 class="mb-1"><?php echo $field1; ?></h3>
        </div>
        <div class="mx-md-5">
          <img src="<?php echo $img; ?>" alt="img" style="border: 2px solid black; width: 500px; height: 250px; border-radius: 10px;">       
        </div>
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1">Campo 2: <span id="points-display"> <?php echo $field2; ?></span></h1>
        </div>
      </div> 
      <h2 class="mb-1">Patata!</h2>
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
