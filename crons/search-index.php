<?php
include('../includes/sitefunctions.php');
exec("curl -XDELETE 192.168.1.6:9200/namedirectory");
exec("curl -X PUT 192.168.1.6:9200/namedirectory");

$putCommand = file_get_contents("../searchapi/putdata");
$putCommand = str_replace("REQUESTFILE", "search.json", $putCommand);
    
exec($putCommand, $output);
echo implode('\n', $output)."\n\n";
?>