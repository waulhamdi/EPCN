<?php
// echo "Loading";
// $command = escapeshellcmd('test.py');
// $output = shell_exec($command);
// escapeshellcmd('/python');
$output = shell_exec('python test.py');
// echo dirname(__FILE__);
echo $output;
// echo ("wwk");

// for ($i=0; $i<10; $i++){
//     echo $i;
//     sleep(2);
// }
?>