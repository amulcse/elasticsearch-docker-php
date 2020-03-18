<?php

$searchCommand = file_get_contents("commands");

$keyword  = $_GET['q'];

$mainQuery = '{"first_name" :  "'.$keyword.'"}';

$searchCommand = str_replace("MAINQUERY", $mainQuery, $searchCommand);

$output = [];
exec($searchCommand, $output);

$output1 = implode("\n", $output);
$new = json_decode($output1, true);
echo json_encode($new['hits']['hits'],true);

 ?>