<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

function get_amt_per_member($a, $h) {
    $len = count($a) - 2;
    $prod_str = '';
    
    $unit = $a[3];
    for($y = 5; $y < $len; $y += 2) {
        if ($a[$y] != 0){
            $prod_str .= "".$a[$y]." ".$unit."&nbsp;-&nbsp;".$h[$y]." |\n";
        }
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
        <?
        $handle = fopen(Config::DATAFILE, "r");
        $headers = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] != '') {
                $name = Helpers::scrubber($data[0]);
                $the_table = get_amt_per_member($data, $headers);
                
                echo $name."&nbsp; &raquo; &nbsp;";
                echo $the_table;
                echo "\n<p/><hr align='left'><p/>";
            }
        }
        fclose($handle);
        ?>
    </body>
</html>
