        </div>
        <?php 
            View::element('footer_required');
            
            $html = Core::make('helper/html');
            print $html->javascript($view->getThemePath() . '/js/bootstrap.js');
        ?>
    </body>
</html>