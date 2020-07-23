<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT car_maker from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['car_maker'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where car_maker = ";
    $sqli .= "'".$result['car_maker']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Vehicle/maker.php?id=".$result['car_maker']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['car_maker']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>