<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Genres</title>
</head>

<body>
<?php


$db=new PDO('mysql:host=172.31.22.43;dbname=Jashan200484319','Jashan200484319','AZ4ipZV_8a');
// $db=new PDO('mysql:host=127.0.0.1;dbname=jashan200484319','root','');

$sql='SELECT*FROM genres';


$cmd=$db->PREPARE($sql);
$cmd->execute();

$genres=$cmd->fetchAll();


foreach($genres as $genre){
    echo ('<ul><li>'.$genre['name'].'</li></ul>');
}
$db=null;
?>
</body>
</html>