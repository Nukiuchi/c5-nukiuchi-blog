<?php 

// Includes everything from doctype to start of main container div
$view->inc('elements/header.php');

print $innerContent;

// Includes everything from end of main container div to end of html
$view->inc('elements/footer.php');