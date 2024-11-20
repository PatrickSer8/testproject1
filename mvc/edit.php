<pre>
<?php

print_r($_POST);

print_r($_FILES);

 print_r(getcwd());

$ogimg = $_POST["ogimg"];

$imageFilePath = "../img/" . $_FILES["img"]["name"];


//checks if there was a new file added and that its not the same then uploads the new one or keeps the old one
if (!empty($_FILES["img"]["name"]) && $imageFilePath !== $ogimg) {
    unlink($ogimg);
    move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);
    } else {
    $imageFilePath = $ogimg;
}

$data = array(
    "title" => $_POST["title"],
    "field1" => $_POST["field1"],
    "field2" => $_POST["field2"],
    "img" => $imageFilePath
);

$jsonData = json_decode(file_get_contents("list.json"), true);
//deletes the old data
foreach ($jsonData['tests'] as $index => $entry) {
    if (
        $entry['img'] === $ogimg
    ) {
        unset($jsonData['tests'][$index]);
        break; 
    }
}

$jsonData["tests"][] = $data;
file_put_contents("list.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header("Location: list.php");
exit;

?>
</pre>