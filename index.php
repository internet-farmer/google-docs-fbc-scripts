<?php
function __autoload($class_name) {
    include $class_name . '.php';
}

if (isset($_POST['Submit'])) {

    if ($_POST['csv-content'] != ''){
        $fp = fopen(Config::DATAFILE, 'w');
        if (get_magic_quotes_gpc()) { 
            fwrite($fp, stripslashes($_POST['csv-content'])); 
        }
        fclose($fp);
    }
    
    if ($_POST['Submit'] == "Get Receipts") {
        header("Location: ./receipt.php");
    } else if ($_POST['Submit'] == "Sorting Splits") {
        header("Location: ./sortsplits.php");
    } else if ($_POST['Submit'] == "Unfilled Splits") {
        header("Location: ./unfilledsplits.php");
    } else if ($_POST['Submit'] == "Order Invoice") {
        header("Location: ./orderinvoice.php");
    }
}
?>
<html>
    <head>
        <title>Food Buying Club</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div id="main">
            Starting in the GoogleDocs Spreadsheet, click:
            <p/>
            <i>'File > Downlaod As > Comma-separated values (.csv, current sheet)'</i>  
            <p/>
            This will save the sheet to your computer.  Open a new tab or window in your broswer.
            <p/>
            Locate the .csv file you downloaded, and drag it into the empty browser window or tab.
            <p/>
            Copy the entire contents of the window (ctrl-a), and paste it into the textarea below (ctrl-v).
            <p/>
            Select your function!
            <p/>
            <span class="red">**Note: If you want to use previous data entered, leave the textarea blank.**</span>
            <p/>
            <span class="small">The datafile was last modified: <?echo date ("F d Y h:i:sa", filemtime($fn)+10800);?></span><br/>
            <form method="POST" enctype="multipart/form-data">
                <textarea name="csv-content"></textarea>
                <br/>
                <input type="submit" value="Get Receipts" id="submit" name="Submit">
                <input type="submit" value="Sorting Splits" id="submit" name="Submit">
                <input type="submit" value="Unfilled Splits" id="submit" name="Submit">
                <input type="submit" value="Order Invoice" id="submit" name="Submit">
            </form>
        </div>
    </body>
</html>