<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT watches from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['watches'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where watches = ";
    $sqli .= "'".$result['watches']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Fashion-and-Beauty/watches_maker.php?id=".$result['watches']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['watches']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>