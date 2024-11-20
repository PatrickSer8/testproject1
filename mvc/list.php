<?php

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];

$json_data = file_get_contents('list.json');
$list = json_decode($json_data, true);
//filters list alphabeically
usort($list['tests'], function($a, $b) {
  return strcasecmp($a['title'], $b['title']);
});

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Lista</title>
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
      <div class="col-10 text-center p-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px;">
        <h1 class="display-4 mb-4">Lista</h1>
  
          <div class="list-group" style="max-height: 344px; overflow-y: auto; padding-right: 10px;">
            
          <!-- list Cycles components -->
            <?php foreach ($list['tests'] as $test): ?>
              
              <!-- Buton that redirects to form -->
              <a class="list-group-item list-group-item-action" style="border: 1px solid black; margin-bottom: 10px; border-radius: 10px;">
              
              <!-- Info of the tests, also on click on the name it sends to see the test -->
              <img src="<?php echo $test['img']; ?>" alt="Img" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 10px;">
              <strong style="font-size:x-large; cursor: pointer;" onclick="event.preventDefault(); document.getElementById('Form<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>').submit();" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              ><?php echo $test['title']; ?></strong> | <?php echo $test['field1']; ?> <?php echo $test['field2']; ?>
              <!--edit and delete buttons -->
              <p style="cursor: pointer; color: blue; display: inline-block; margin-left: 10px;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              onclick="event.preventDefault(); document.getElementById('edit<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>').submit();">Editar</p>
              <p style="cursor: pointer; color: red; display: inline-block; margin-left: 10px;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              onclick="event.preventDefault(); document.getElementById('delete<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>').submit();">Eliminar</p>
              </a>
              <!-- Form that sends the info to -->
              <form id="Form<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>" action="/mvc/show.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
              </form>
              <!-- Form that deletes song -->
              <form id="delete<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>" action="/mvc/delete.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
              </form>
              <!-- Form that edits song -->
              <form id="edit<?php echo $test['title']; ?><?php echo $test['field1']; ?><?php echo $test['field2']; ?><?php echo $test['img']; ?>" action="/mvc/editForm.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
              </form>
            <?php endforeach; ?>
          </div>

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