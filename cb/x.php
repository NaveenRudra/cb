<?php
/*
 * This working example of PHP code
*/
    $f = fopen( './logX.txt', "w" );
    fwrite( $f, "started X: HTTP_HOST  =" .  $_SERVER['HTTP_HOST'] ."\n" );
    fwrite( $f, "started X: HTTP_ORIGIN=" .  $_SERVER['HTTP_ORIGIN'] ."\n" );
//    fwrite( $f, print_r( parse_url($_SERVER['HTTP_ORIGIN'])));
    
    $urlp = parse_url($_SERVER['HTTP_ORIGIN']);
    
    fwrite( $f, "started X:  http= " .     $urlp[scheme] ."\n" );
    fwrite( $f, "started X:  hostname= " . $urlp[host] ."\n" );
    fwrite( $f, "started X:  username= " . $urlp[user] ."\n" );
    fwrite( $f, "started X:  password= " . $urlp[pass] ."\n" );
    fwrite( $f, "started X:  /path= " .    $urlp[path] ."\n" );
    fwrite( $f, "started X:  arg=value= " .$urlp[query] ."\n");
    
//    $http_origin = $_SERVER['HTTP_ORIGIN'];
//    $http_host   = $urlp[host];
//    list($host, $port) = split(":", $http_host);

    $http_origin = $_SERVER['HTTP_ORIGIN'];
    $urlp = parse_url($http_origin);
    $host = $urlp[host];
    fwrite( $f, "host==$host" . "\n" );

    $allowed_hosts = [              // from which  hosts  acces wil be allowed
        'romleon.rf.gd',
        'rombase.h1n.ru',
//      'rombase.kl.com.ua',        // PHP on this host is DISALLOWED for testing purpose
        'rombase.ihostfull.com',
        'rombase.byethost7.com',    
        'php1-leonrom.c9users.io',  
    ];

        fwrite( $f, "set headers"  . "\n");
        header("Access-Control-Allow-Origin: {$http_origin}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // cache for 1 day
        
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: 
                {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    if (in_array($host, $allowed_hosts))   // Decide if allow access
    {         
        $nam = "parms";
        $prm = "?";
        if (isset($_REQUEST[$nam])) 
            $prm = $_REQUEST[$nam];    
        fwrite( $f, "finish: prm=$prm" . "\n" );                
        
        echo ("CORS <b>$prm</b> !");
    }else{
        fwrite( $f, "your domain is NOT allowed" . "\n" );                
        echo ("Ваш домен не допущен");
    }
    fclose( $f)
?>
