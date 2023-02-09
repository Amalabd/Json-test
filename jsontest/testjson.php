<?php

// ====== to convert json element (array) to --> php elemetn =========  //
$json = '["HTML", "CSS"]';

var_dump($json);

echo '<br>';

$phparay = json_decode($json);
var_dump($phparay);


foreach($phparay as $tst)
{echo $tst . '<br>';}

// ====== to convert php elemetn to -->  json element (array)=========  //


$phparray = array('PHP' , 'Studio');
var_dump($phparray);

echo '<br>';

$jsoon = json_encode($phparray);
var_dump ($jsoon);









?>