<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            //View::element('header_required');
            $view->element('header_required');
            
            /* @var html \Concrete\Core\Html\HtmlServiceProvider */
            $html = Core::make('helper/html');
            
            print $html->css($view->getStyleSheet('bootstrap.css'));
            print $html->css($view->getStyleSheet('bootstrap-theme.css'));
            print $html->css($view->getStyleSheet('main.less'));
        ?>
    </head>
    <body>
        <div class="<?php echo $c->getPageWrapperClass(); ?>">