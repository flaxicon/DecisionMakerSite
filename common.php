<?php

#*******************************************************************************
# program:    common.php
#
# written by:    Ryan Smalley on 2/15/2014
#
# description:    This script contains common functions.
#
#-----------------------------------------------------------------------------

# htmlStart is a function that prints the basic HTML code that goes at the 
# beginning of a standard web page.
function htmlStart($title, $stylesheet)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo $stylesheet ?>">
</head>
<body>
<?php
}

# htmlEnd is a function that outputs the basic HTML code that goes at 
# the end of a standard web page.
function htmlEnd()
{
  echo "</body></html>";
}

# pageFooter is a function that outputs the basic HTML copyright code
# that goes at the bottom of a typical web page.
function pageFooter()
{
  ?>
  <footer>
  <p id="copyright">Web Page copyright &copy;2014 by Ryan Smalley</p>
  </footer>
  <?php
}

#*******************************************************************************