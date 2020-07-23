<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT clothing from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['clothing'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where clothing = ";
    $sqli .= "'".$result['watches']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Fashion-and-Beauty/clothing_maker.php?id=".$result['clothing']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['clothing']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>