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
            $sidebar_fragment1->appendXML(add_sidebar_element('Patient Details', 'patientDetailsNurse.php'));
            $sidebar_fragment2 = $doc->createDocumentFragment();
            $sidebar_fragment2->appendXML(add_sidebar_element('Paitent Medical Records', 'paitentMedicalRecords.php'));
            $sidebar_fragment3 = $doc->createDocumentFragment();
            $sidebar_fragment3->appendXML(add_sidebar_element('Reserve Room', 'reserveRoom.php'));
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

            $sql1 = "SELECT patientID FROM patients";
            $res = mysqli_query($database,$sql1);
            $numPai = mysqli_num_rows($res);

            $sql2 = "SELECT nurseID FROM assigneddoctors WHERE nurseID='$empID'";
            $res2 = mysqli_query($database,$sql2);
            $numDoc = mysqli_num_rows($res2);

            $sql3 = "SELECT is_available FROM room WHERE is_available=1";
            $res3 = mysqli_query($database,$sql3);
            $numRoom = mysqli_num_rows($res3);

            $sql4 = "SELECT roomID FROM reserveroom WHERE roomID=2";
            $res4 = mysqli_query($database,$sql4);
            $numSurgery = mysqli_num_rows($res4);

            $widgets_fragment->appendXML(add_widgets($numPai, 'patientDetailsNurse.php', 'Assigned Doctors', $numDoc, 'assignDoctor.php', 'procedures', 'Available Rooms', $numRoom, 'reserveRoom.php', 'procedures', 'Upcoming Surgeries', $numSurgery, 'assignDoctor.php', 'heartbeat'));
            $widgets_element->appendChild($widgets_fragment);

            echo $doc->saveHTML();
        ?>
    </body>
</html>