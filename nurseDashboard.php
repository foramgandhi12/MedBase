<!DOCTYPE html>
<html>
    <head>
        <title>Nurse Dashboard</title>
    </head>
    <body>
        <?php 
            ob_start();
            include 'dashboard.php';
            $contents = ob_get_clean();
            $doc = new DomDocument;
            libxml_use_internal_errors(true);
            $doc->loadHTML($contents);

            // Add sidebar elements
            $sidebar_element = $doc->getElementById('sidebar_elements');
            $sidebar_fragment1 = $doc->createDocumentFragment();
            $sidebar_fragment1->appendXML(add_sidebar_element('Patient Details', 'patientDetails.php'));
            $sidebar_fragment2 = $doc->createDocumentFragment();
            $sidebar_fragment2->appendXML(add_sidebar_element('Paitent Medical Records', 'paitentMedicalRecords.php'));
            $sidebar_fragment3 = $doc->createDocumentFragment();
            $sidebar_fragment3->appendXML(add_sidebar_element('Book Surgey', 'bookSurgery.php'));
            $sidebar_fragment4 = $doc->createDocumentFragment();
            $sidebar_fragment4->appendXML(add_sidebar_element('Select Doctor', 'assignDoctor.php'));

            $sidebar_element->appendChild($sidebar_fragment1);
            $sidebar_element->appendChild($sidebar_fragment2);
            $sidebar_element->appendChild($sidebar_fragment3);
            $sidebar_element->appendChild($sidebar_fragment4);

            // Add widgets
            $widgets_element = $doc->getElementById('widget_row');
            $widgets_fragment = $doc->createDocumentFragment();
            // TODO: get data values though SQL scripts
            $widgets_fragment->appendXML(add_widgets('150', '#', 'Available Beds', '53%', '#', 'procedures', 'Total Wards', '44', '#', 'h-square', 'Total Departments', '65', '#', 'hospital'));
            $widgets_element->appendChild($widgets_fragment);

            echo $doc->saveHTML();
        ?>
    </body>
</html>