<?php               
    $f = fopen( './logJ.txt', "w" );
    fwrite( $f, "started" . "\n");
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        fwrite( $f, "http_origin=" . $_SERVER['HTTP_ORIGIN'] . "\n");
    }else{
        fwrite( $f, "http_origin is absent" . "\n" );
    }
    
    header('Content-type: application/json; charset=utf-8');

    header("Access-Control-Allow-Origin: {$http_origin}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400'); // cache for 1 day
        
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    $prms = $_REQUEST['prms'];
    $func = $_REQUEST['func'];

    $t = "$prms = " . time() ;
    fwrite( $f, "finish: t=$t" . "\n" );                
        
    echo($func.'({"result":"' . $t . '",' . '"typ":"addUser"})');  
    
    fclose( $f)
?>  