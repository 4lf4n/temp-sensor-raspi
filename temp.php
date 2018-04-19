<?php
//File to read
$file = '/sys/devices/w1_bus_master1/28-0516b0670bff/w1_slave';
//Read the file line by line
$lines = file($file);
//Get the temp from second line
$temp = explode('=', $lines[1]);
//Setup some nice formatting (i.e. 21,3)
$temp = number_format($temp[1] / 1000, 0, '.', '');
//And echo that temp

//upload/update your temp to server iot
$sh = file_get_contents('https://iot.umsida.ac.id/dev/api/key/YOUR API KEY/field/0/sts/'.$temp);
echo"<h1>TEMPERATUR<br><br>". $temp . " °C</h1>";
?>
