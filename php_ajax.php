<?php

$a[] = "Android";
$a[] = "B programming language";
$a[] = "C programming language";
$a[] = "D programming language";
$a[] = "euphoria";
$a[] = "F#";
$a[] = "GWT";
$a[] = "HTML5";
$a[] = "ibatis";
$a[] = "Java";
$a[] = "Javascript";
$a[] = "K programming language";
$a[] = "Lisp";
$a[] = "Microsoft technologies";
$a[] = "Networking";
$a[] = "Open Source";
$a[] = "Prototype";
$a[] = "QC";
$a[] = "Restful web services";
$a[] = "Scrum";
$a[] = "Testing";
$a[] = "UML";
$a[] = "VB Script";
$a[] = "Web Technologies";
$a[] = "Xerox Technology";
$a[] = "YQL";
$a[] = "ZOPL";

$q = $_REQUEST["q"];
$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    
    foreach($a as $name) {
      
       if (stristr($q, substr($name, 0, $len))) {
          if ($hint === "") {
             $hint = $name;
          }else {
             $hint .= ", $name";
          }
       }
    }
 }
 echo $hint === "" ? "Por favor introduce un nombre valido" : $hint;

?>