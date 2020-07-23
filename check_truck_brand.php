<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT truck_maker from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['truck_maker'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where truck_maker = ";
    $sqli .= "'".$result['truck_maker']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Vehicle/truck_maker.php?id=".$result['truck_maker']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['truck_maker']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>