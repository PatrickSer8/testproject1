<pre>
<?php

$jsonData = json_decode(file_get_contents("list.json"), true);
$test = json_decode($_POST['test'], true); 
    $title = $test['title'];
    $artist = $test['artist'];
    $music = $test['music'];
    $duration = $test['duration'];
    //deletes the files
    unlink($music);
    //finds the data and deletes it from the json file
    foreach ($jsonData['tests'] as $index => $entry) {
        if (
            $entry['title'] === $title &&
            $entry['artist'] === $artist &&
            $entry['music'] === $music &&
            $entry['duration'] === $duration           
        ) {
            unset($jsonData['tests'][$index]);
            break; 
        }
    }
    file_put_contents("list.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
header("Location: list.php");
exit;

?>
</pre>