<pre>
<?php
//file to procees the add tests form
print_r($_POST);

print_r($_FILES);

 print_r(getcwd());
//stablishes file paths
$musicFilePath = "../music/" . $_FILES["music"]["name"];
//stores files
move_uploaded_file($_FILES["music"]["tmp_name"], "../music/" . $_FILES["music"]["name"]);
$songduration = $_POST["songduration"];


//store the info in .json
$data = array(
    "title" => $_POST["title"],
    "artist" => $_POST["artist"],
    "music" => $musicFilePath,
    "duration" => $songduration

);

$jsonData = json_decode(file_get_contents("list.json"), true);
$jsonData["tests"][] = $data;
file_put_contents("list.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header("Location: list.php");
exit;

?>
</pre>