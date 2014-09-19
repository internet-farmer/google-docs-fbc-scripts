google-docs-fbc-scripts
=======================

Scripts for a Food Buying Club using Google Docs Spreadsheets to order.

## Installation

Get the script [files](https://github.com/internet-farmer/google-docs-fbc-scripts/archive/master.zip) and place them in a web accessible directory on a web server. Point your browser to that directory `http://mywebsite.com/<directory_name>`

There is no database needed, but the spreadsheet CSV is stored in a file on the server. This file name can be set in the Config.php file.

## Usage

*N.B.* These scripts are assuming that you are using Google Spreadsheet that is based off the template found [here](https://docs.google.com/spreadsheet/ccc?key=0AoJZypGjYGm3dFBLcDVVSU9pWVl2ZHJqMWlYYk00OHc&usp=sharing).

As noted on the index page:

```
Starting in the GoogleDocs Spreadsheet, click:

'File > Downlaod As > Comma-separated values (.csv, current sheet)'

This will save the sheet to your computer.  Open a new tab or window
in your broswer.

Locate the .csv file you downloaded, and drag it into the empty
browser window or tab.

Copy the entire contents of the window (ctrl-a), and paste it into the
textarea below (ctrl-v).

Select your function!
```

####Get Receipts
This function will provide you with receipts for each user including:

* Subtotal
* Markup
* Credits
* Total
* Products they ordered in cases that did not fill

####Sorting Splits
This function will display a "pick sheet" for when it's time to divvy up the products. Each product will be listed, followed by the user's name and the amount they've ordered.

####Unfilled Splits
This gives the admin a list of products that were started, but didn't fill. This can be useful to check right before the order is closing and you want to send an email to encourage members to help fill up the remaining cases.

####Order Invoice
This function provides a list of the products that either were not part of cases, or were part of cases that filled. This can be used to send to your farmer or distributor once the order closes.


## Troubleshooting

* The data file won't save.

  * This may be due a permission issue. Ensure that the directory is writable.