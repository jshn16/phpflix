<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Saving Genre....</title>
</head>

<body>
<?php
$name=$_POST['name'];

//declare database
$db=new PDO('mysql:host=172.31.22.43;dbname=Jashan200484319','Jashan200484319','AZ4ipZV_8a');
// $db=new PDO('mysql:host=127.0.0.1;dbname=jashan200484319','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//declaring parameters
$sql='INSERT INTO genres(name) VALUES(:name)';

//preparing database;
$cmd=$db->PREPARE($sql);

//injecting values

$cmd->bindParam(':name',$name,PDO::PARAM_STR, 100);

//execute
$cmd->execute();

echo 'Genre Saved!';
$db=null;


?>
</body>
</html>