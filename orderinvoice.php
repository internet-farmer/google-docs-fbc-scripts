<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

function get_amt_unit($a) {
    $prod_str = '';
    if (($a[1] == $a[2]) || !is_numeric($a[1])) {
        $prod_str .= $a[2]." ".$a[3];
    }
    return $prod_str;
}
?>
<html>
    <head>
        <title>Food Buying Club</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />  
    </head>
    <body>
        <a href="./">&laquo; back to main</a><p/>
        <table>
            <tr><th>Amount</td><th>Product</td></tr>
            <?
            $cnt = 0;
            $klass = '';

            if (!file_exists(Config::DATAFILE)) {
                echo 'ERROR: Data file does not exist';
                return;
            };

            $handle = fopen(Config::DATAFILE, "r");
            fgetcsv($handle, 1000, ","); // skip the header
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($data[0] != ''){
                    $name = Helpers::scrubber($data[0]);
                    $the_amt_unit = get_amt_unit($data);
                    
                    if ($the_amt_unit != ''){
                        if ($cnt % 2 == 0) $klass = 'even';
                        else $klass = 'odd';
                        $cnt++;
                        echo "<tr class='$klass'><td>".$the_amt_unit."</td><td>".$name."</td></tr>\n";
                    }
                }
            }
            
            fclose($handle);
            ?>
        </table>
        <p/>
    </body>
</html>
