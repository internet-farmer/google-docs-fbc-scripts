<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

function is_unfilled_split($a) {
    if ($a[1] != $a[2] && is_numeric($a[1])){
        return true;
    }
    return false;
}
?> 
<html>
    <head>
        <title>Food Buying Club</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <a href="./">&laquo; back to main</a><p/>
        <?php

        if (!file_exists(Config::DATAFILE)) {
            echo 'ERROR: Data file does not exist';
            return;
        };

        $handle = fopen(Config::DATAFILE, "r");
        fgetcsv($handle, 1000, ","); // skip header
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] != ''){
                $unfilled = is_unfilled_split($data);
                
                if ($unfilled){
                    echo Helpers::scrubber($data[0])." (".$data[2]." of ".$data[1].")<br/>";
                }
            }
        }
        fclose($handle);
        ?>
    </body>
</html>
