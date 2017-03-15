<?php    
/*
 * Cople j.js+j.php of working example of JSONP code. Leon Rom, 2017
*/

    $prms = $_REQUEST['prms'];
    $func = $_REQUEST['func'];

    $t = "$prms = " . time() ;                
        
    echo($func.'({"result":"' . $t . '",' . '"typ":"addUser"})');  
    
?>  