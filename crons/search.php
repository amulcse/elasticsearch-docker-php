<?php
include('../includes/sitefunctions.php');
$sql = mysqli_query($dbconnection, "select id,first_name,last_name,mobile from users where active='Y'");
$users = [];
while($row = mysqli_fetch_assoc($sql)){
    $users = $row;
}

$v = '';
$data = [];

foreach ($users as $key => $value) {
    $temp1 = [];
    $temp1['index']['_index'] = "namedirectory";
    $temp1['index']['_id'] = $i;

    $temp2 = [];
    $temp2['line_id'] = $i;
    $temp2['first_name'] =  $value['first_name'];
    $temp2['last_name'] =  $value['last_name'];
    $temp2['mobile'] =  $value['mobile'];

    $data[] = $temp1;
    $data[] = $temp2;
}

$json = json_encode($data, true);
$json = str_replace('[{','{',$json);
$json = str_replace('}]','}',$json);
$json = str_replace("},","}"."\n",$json);
$json = $json."\n";
$fp = fopen('search.json', 'w');
fwrite($fp, $json);
fclose($fp);
echo 'success';
die();
?>