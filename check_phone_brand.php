<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT phone_maker from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['phone_maker'] != ''){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where phone_maker = ";
    $sqli .= "'".$result['phone_maker']."'";
    $resi = $Database->add_query($sqli);
if($Database->num_rows($resi) > 0){
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Mobile-Phones-and-Tablets/phone_maker.php?id=".$result['phone_maker']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['phone_maker']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}
}

?>