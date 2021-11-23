<!DOCTYPE html>
<html>
    <head>
        <title>Receptionist Dashboard</title>
    </head>
    <body>
        <?php 
            ob_start();
            include 'dashboard.php';
            $contents = ob_get_clean();
            $doc = new DomDocument;
            echo $contents;
            libxml_use_internal_errors(true);
            $doc->loadHTML($contents);

            echo "The contents are ".$doc->getElementById('widget_row')->textContent;
        ?>
    </body>
</html>