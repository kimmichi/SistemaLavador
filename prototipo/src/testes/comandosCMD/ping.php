<?php
/*$command = "ping -n 2  -w 10 10.3.3.69";
exec($command , $output , $return_var );
echo "retorno: ".$return_var."<br>";
echo "saida: ". $output[2]."<br>";
echo var_dump($output);*/

$command=['69','71','72','73','75','201','202','203','204','205','206','207','208','209','1','210','211','212','213'];
$n = count($command);
for ($i=0; $i<$n; $i++){
 exec("ping -n 2  -w 4 10.3.3.$command[$i]" , $output , $return_var );
 echo $return_var;
 //echo $output[2+$n];
 //echo "<br><br><br>";
 //$n+=10;
}

//print_r($output);

/*
function pingAddress($ip) {
    $pingresult = exec("ping  -n 3 $ip", $outcome, $status);
    if (0 == $status) {
        $status = "alive => ( ".print_r($outcome[10])." )";
    } else {
        $status = "fora";
    }
}
pingAddress("www.google.com");*/
?>
