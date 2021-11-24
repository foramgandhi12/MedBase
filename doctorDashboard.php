<!DOCTYPE html>
<html>
    <head>
        <title>Doctor Dashboard</title>
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
            $sidebar_fragment2->appendXML(add_sidebar_element('Schedule', 'schedule.php'));
            $sidebar_fragment3 = $doc->createDocumentFragment();
            $sidebar_fragment3->appendXML(add_sidebar_element('View Nurses', 'viewNurses.php'));
            $sidebar_fragment4 = $doc->createDocumentFragment();
            $sidebar_fragment4->appendXML(add_sidebar_element('Post-Surgery Assessment', 'postSurgeryAssessment.php'));

            $sidebar_element->appendChild($sidebar_fragment1);
            $sidebar_element->appendChild($sidebar_fragment2);
            $sidebar_element->appendChild($sidebar_fragment3);
            $sidebar_element->appendChild($sidebar_fragment4);

            // Add widgets
            $widgets_element = $doc->getElementById('widget_row');
            $widgets_fragment = $doc->createDocumentFragment();

            // Retrieves data values from db to display on widgets
            $total_patients_query = "SELECT patientID FROM patients"; // Query 1
            $result1 = mysqli_query($database, $total_patients_query);
            $total_patients = mysqli_num_rows($result1);

            $unassigned_patients_query = "SELECT patientID FROM patients WHERE doctorID IS NULL"; // Query 2
            $result2 = mysqli_query($database, $unassigned_patients_query);
            $unassigned_patients = mysqli_num_rows($result2);

            $assigned_patients_query = "SELECT patientID FROM patients WHERE doctorID = $empID"; // Query 3
            $result3 = mysqli_query($database, $assigned_patients_query);
            $total_appointments = mysqli_num_rows($result3);

            $total_nurses_query = "SELECT nurseID FROM patients WHERE doctorID = $empID"; // Query 4
            $result4 = mysqli_query($database, $total_nurses_query);
            $total_nurses = mysqli_num_rows($result4);

            $widgets_fragment->appendXML(add_widgets($total_patients, 'patientDetails.php', 'Unassigned Patients', $unassigned_patients, 'patientDetails.php', 'user-plus', 'Appointments', $total_appointments, 'schedule.php', 'calendar-check', 'Nurses', $total_nurses, 'viewNurses.php', 'user-md'));
            $widgets_element->appendChild($widgets_fragment);
            
            echo $doc->saveHTML();
        ?>
    </body>
</html>