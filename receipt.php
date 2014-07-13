<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

function get_total($a, $x) {
    $len = count($a) - 1;
    $prod_str = '';

    $prod_str .= "<tr><td colspan='5' align='right'><b>Subtotal:</b> ".$a[$len-3][$x+1]."</td></tr>";
    $prod_str .= "<tr><td colspan='5' align='right'><b>10% Mark Up:</b> ".$a[$len-2][$x+1]."</td></tr>";
    $prod_str .= "<tr><td colspan='5' align='right'><b>Credits:</b> ".$a[$len-1][$x+1]."</td></tr>";
    $prod_str .= "<tr><td colspan='5' align='right'><b>Total:</b> ".$a[$len][$x+1]."</td></tr>";

    return $prod_str;
}

function get_products($a, $x) {
    $len = count($a) - 2;
    $prod_str = '';

    for($y = 1; $y < $len; $y += 1) {
        $klass = '';
        if ($a[$y][$x] != 0){
            if (($a[$y][1] != $a[$y][2]) && is_numeric($a[$y][1])){
                $klass = " class='unfilled'";
            }
            $prod_str .= "<tr$klass><td valign='top' style='width:10px;'>".$a[$y][$x]."</td><td valign='top'>".Helpers::scrubber($a[$y][3])."</td><td style='width:290px;'>".Helpers::scrubber($a[$y][0])."</td><td>".$a[$y][4]."</td><td align='right'>".$a[$y][$x+1]."</td></tr>\n";
        }
    }
    return $prod_str;
}

function receipt() {
    $order_array = array();
    $handle = fopen(Config::DATAFILE, "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        array_push($order_array, $data);
    }
    fclose($handle);

    $len = sizeof($order_array[0]) - 2;
    for ($x = 6; $x < $len; $x += 1) {
        if ($order_array[0][$x] != '') {
            $name = Helpers::scrubber($order_array[0][$x]);
            $products = get_products($order_array, $x);
            
            if ($products != '') {
                echo "<a name='".$name."'/>";
                echo $name."<br/>";
                echo "<table>";
                echo "<tr><th colspan='3' style='width:300px;'>Amount of Product</th><th>Price</th><th>Order Price</th></tr>\n";
                echo $products;
                echo get_total($order_array, $x);
                echo "</table>\n<p/><hr align='left' width='600'><p/>";
            }
        }
    }
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
            receipt();
        ?>
    </body>
</html>
