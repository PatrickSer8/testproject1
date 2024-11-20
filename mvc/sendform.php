<pre>
<?php
//file to procees the add tests form
print_r($_POST);

print_r($_FILES);

 print_r(getcwd());
//stablishes file paths
$imageFilePath = "../img/" . $_FILES["img"]["name"];
//stores files
move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);

//store the info in .json
$data = array(
    "title" => $_POST["title"],
    "field1" => $_POST["field1"],
    "field2" => $_POST["field2"],
    "img" => $imageFilePath
);

$jsonData = json_decode(file_get_contents("list.json"), true);
$jsonData["tests"][] = $data;
file_put_contents("list.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header("Location: list.php");
exit;

?>
</pre>