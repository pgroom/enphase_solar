<?php


$url="http://10.0.0.158/production.json";

$page = $_SERVER['PHP_SELF'];
$sec = "15";
header("Refresh: $sec; url=$page");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

$data_arr = explode (",", $data);

$production=abs(round(substr($data_arr[9], strpos($data_arr[9], ":") +1)));
$consumption=abs(round(substr($data_arr[28], strpos($data_arr[28], ":") +1)));
$net=round(substr($data_arr[47], strpos($data_arr[47], ":") +1));

echo '<span style="font-size: 40px;"> ' . "Production: " . $production . '</span> <br>';
echo '<span style="font-size: 40px;"> ' . "Consumption: " . $consumption . '</span> <br>';

if ($net<=0)
{
echo '<span style="font-size: 40px;"> ' . "Feeding to grid: " . abs($net) . '</span> <br>';
}
else
{
echo '<span style="font-size: 40px;"> ' . "Drawing from grid: " . $net . '</span> <br>';
}

 ?>

