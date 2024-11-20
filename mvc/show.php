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

$test = json_decode($_POST['test'], true); 
    $title = $test['title'];
    $artist = $test['artist'];
    $music = $test['music'];
    $duration = $test['duration'];
    
$ord = json_decode($_POST['i'], true); 

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
  
  <!-- tried to implement the next song reproducin when the current one ends, after 5 versions and 3 hours i still dont know why the number sends properly but the values of the song doesnt -->
  <?php $i = 0; 
    foreach ($list['tests'] as $test): 
      $i++;
      $newsong =  $ord + 1;  
    if ($i == $newsong) {
    ?>
  <form id="songend" action="/mvc/show.php" method="POST">
                <input type="hidden" name="test" value="<?php echo json_encode($test); ?>">
                <input type="hidden" name="i" value="<?php echo $i; ?>">
  </form>
  <?php } endforeach; ?>

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
          <h3 class="mb-1"><?php echo $ord; ?></h3>
        </div>
        <div class="mx-md-5">
          <img src="../img/bg.png" alt="img" style="border: 2px solid black; width: 500px; height: 250px; border-radius: 10px;">       
        </div>
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
        <div class="list-group" style="max-height: 380px; overflow-y: auto; padding-right: 10px;">
  
        <!-- list Cycles components -->
        <?php $i = 0; foreach ($list['tests'] as $test): $i++?>
              
              <!-- Buton that redirects to form -->
              <a class="list-group-item list-group-item-action" style="border: 1px solid black; margin-bottom: 10px; border-radius: 10px;">
              
              <!-- Info of the tests, also on click on the name it sends to see the test -->
              <img src="../img/bg.png" alt="Img" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 10px;">
              <strong style="font-size:x-large; cursor: pointer;" onclick="event.preventDefault(); document.getElementById('Form<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>').submit();" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              ><?php echo $test['title']; ?></strong> por <?php echo $test['artist']; ?> <?php echo $test['duration']; ?>
              <!--edit and delete buttons -->
              <p style="cursor: pointer; color: blue; display: inline-block; margin-left: 10px;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              onclick="event.preventDefault(); document.getElementById('edit<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>').submit();">Editar</p>
              <p style="cursor: pointer; color: red; display: inline-block; margin-left: 10px;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'"
              onclick="event.preventDefault(); document.getElementById('delete<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>').submit();">Eliminar</p>
              </a>
              <!-- Form that sends the info to -->
              <form id="Form<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>" action="/mvc/show.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
                <input type="hidden" name="i" value='<?php echo $i; ?>'>
              </form>
              <!-- Form that deletes song -->
              <form id="delete<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>" action="/mvc/delete.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
              </form>
              <!-- Form that edits song -->
              <form id="edit<?php echo $test['title']; ?><?php echo $test['artist']; ?><?php echo $test['music']; ?><?php echo $test['duration']; ?>" action="/mvc/editForm.php" method="POST" style="display: none;">
                <input type="hidden" name="test" value='<?php echo json_encode($test); ?>'>
              </form>
            <?php endforeach; ?>        
        </div>
          </div>
      </div> 
      <h2 class="mb-1"><?php echo $artist; ?></h2>
      </div>
      <div>
                <span id="current-time">0:00</span> / <span id="cancion-duration"><?php echo $duration; ?></span>
            </div>
            <div style="width:80%; height: 6px; background-color: #a3e6ff; margin-left: 10%; border: 1px solid blue;" id="cancion-progress-conten">
                <div style="height: 100%; background-color: #0044ff; width: 0;" id="cancion-progress"></div>
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

<script>
  var audio = new Audio("<?php echo $music; ?>");
  var playrepeat = "yes";
  //function to play the song when the user clicks(browser dont allow for the song to start automatically)
  function playsong() {
    if(playrepeat == "yes") {
    audio.play();
    //tried to guess what the muting function is called, cant remember
    playrepeat = "no";} else {audio.mute();}}

    document.addEventListener('click',playsong)
  //determiningn wich song comes later
  
  //progress bar
  audio.addEventListener('timeupdate', () => {
    const currentTime = audio.currentTime;
    const duration = audio.duration;
    const progress = (currentTime / duration) * 100;

    const progressBar = document.getElementById('cancion-progress');
    progressBar.style.width = progress + '%';

    const currentTimeDisplay = document.getElementById('current-time');
    const durationDisplay = document.getElementById('cancion-duration');
    currentTimeDisplay.textContent = formatTime(currentTime);
    durationDisplay.textContent = formatTime(duration);
    //when the song ends it loads next song
    
    if (currentTime >= duration) {
     
        event.preventDefault(); 
        document.getElementById('songend').submit();
      
  }
});
//format the duration in minutes
function formatTime(timeInSeconds) {
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = Math.floor(timeInSeconds % 60);
    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}

</script>