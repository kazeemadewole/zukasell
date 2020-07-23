<?php
require_once('database.php');
require_once('session.php');
$sql = "select motorcycle from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['motorcycle'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where motorcycle = ";
    $sqli .= "'".$result['motorcycle']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Vehicle/motorcycle_maker.php?id=".$result['motorcycle']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['motorcycle']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>