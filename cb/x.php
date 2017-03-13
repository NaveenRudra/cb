<?php
/*
 * This working example of PHP code
*/
    $f = fopen( './logX.txt', "w" );
    fwrite( $f, "started X" . "\n" );
    
    $http_origin = $_SERVER['HTTP_ORIGIN'];
    $http_host   = $_SERVER['HTTP_HOST'  ];
    list($host, $port) = split(":", $http_host);
    fwrite( $f, "host=$host" . "\n" );

    $allowed_hosts = [     // from which  hosts  acces wil be allowed
        'romleon.rf.gd',
        'rombase.kl.com.ua',        
        'rombase.byethost7.com',    
        'php1-leonrom.c9users.io',  
    ];

    if (in_array($host, $allowed_hosts))   // Decide if allow access
    {
        fwrite( $f, "set headers"  . "\n");
        header("Access-Control-Allow-Origin: {$http_origin}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // cache for 1 day
        
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: 
                {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
         
        $nam = "parms";
        $prm = "?";
        if (isset($_REQUEST[$nam])) 
            $prm = $_REQUEST[$nam];    
        fwrite( $f, "finish: prm=$prm" . "\n" );                
        
        echo ("CORS <b>$prm</b> !");
    }
    fclose( $f)
?>
