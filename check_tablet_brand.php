<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT tablet_maker from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['tablet_maker'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where tablet_maker = ";
    $sqli .= "'".$result['tablet_maker']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Mobile-Phones-and-Tablets/tablet_maker.php?id=".$result['tablet_maker']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['tablet_maker']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>