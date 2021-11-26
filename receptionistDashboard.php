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
            libxml_use_internal_errors(true);
            $doc->loadHTML($contents);

            // Add sidebar elements
            $sidebar_element = $doc->getElementById('sidebar_elements');
            $sidebar_fragment1 = $doc->createDocumentFragment();
            $sidebar_fragment1->appendXML(add_sidebar_element('Patient Regisration', 'patientRegistration.php'));
            $sidebar_fragment2 = $doc->createDocumentFragment();
            $sidebar_fragment2->appendXML(add_sidebar_element('Discharging Patients', 'dischargePatient.php'));
            $sidebar_fragment3 = $doc->createDocumentFragment();
            $sidebar_fragment3->appendXML(add_sidebar_element('Patient Medical Records', 'paitentMedicalRecords.php'));
            $sidebar_fragment4 = $doc->createDocumentFragment();
            $sidebar_fragment4->appendXML(add_sidebar_element('Bed Manager', 'bedManager.php'));

            $sidebar_element->appendChild($sidebar_fragment1);
            $sidebar_element->appendChild($sidebar_fragment2);
            $sidebar_element->appendChild($sidebar_fragment3);
            $sidebar_element->appendChild($sidebar_fragment4);

            // Add widgets
            $widgets_element = $doc->getElementById('widget_row');
            $widgets_fragment = $doc->createDocumentFragment();

            // Get total num of patients
            $totalPatientsQuery = "SELECT COUNT(*) FROM patients";
            $totalPatientsResult = mysqli_query($database, $totalPatientsQuery);
            $totalPatients = mysqli_fetch_row($totalPatientsResult)[0];

            // Get total num of available beds
            $availableBedsQuery = "SELECT SUM(num_beds) FROM room WHERE is_available = 1";
            $availableBedsResult = mysqli_query($database, $availableBedsQuery);
            $availableBeds = mysqli_fetch_row($availableBedsResult)[0];

            // Get total num of wards
            $totalWardsQuery = "SELECT COUNT(*) FROM ward";
            $totalWardsResult = mysqli_query($database, $totalWardsQuery);
            $totalWards = mysqli_fetch_row($totalWardsResult)[0];
            
            // Get total num of departments
            $totalDepartmentsQuery = "SELECT COUNT(*) FROM departments";
            $totalDepartmentsResult = mysqli_query($database, $totalDepartmentsQuery);
            $totalDepartments = mysqli_fetch_row($totalDepartmentsResult)[0];

            // TODO: get data values though SQL scripts
            $widgets_fragment->appendXML(add_widgets($totalPatients, 'patientRegistration.php', 'Available Beds', $availableBeds, 'bedManager.php', 'procedures', 'Total Wards', $totalWards, 'bedManager.php', 'h-square', 'Total Departments', $totalDepartments, 'bedManager.php', 'hospital'));
            $widgets_element->appendChild($widgets_fragment);

            echo $doc->saveHTML();
        ?>
    </body>
</html>