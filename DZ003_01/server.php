<?php

if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");

$server = new SoapServer("convert.wsdl");

function convert($num,$cur1,$cur2){
  if($num == ""){
    return "You must enter amount!";
  }
    if($cur1=="EUR" AND $cur2=="BAM"){
      
      return $num*1.94 . " BAM";
    }else if($cur1=="BAM" AND $cur2=="EUR"){
      return $num/1.94 . " EUR";
    }else if($cur1=="EUR" AND $cur2=="EUR"){
      return $num . " EUR";
    }else if($cur1=="BAM" AND $cur2=="BAM"){
      return $num . " BAM";
    }

}

$server->AddFunction("convert");
$server->handle();
?>