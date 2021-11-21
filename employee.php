<?php
    // Employee information variables accessable by other files easily
    ob_start(); 
    session_start();
    $emp = $_SESSION['emp_info'];
    $empID = $emp[0];
    $empName = $emp[1];
    $empSSN = $emp[2];
    $empPosition = $emp[3];
    $empDepartment = $emp[4];
    $empAddress = $emp[5];
    $empPhoneNo = $emp[6];
    $empRoleID = $emp[7];
?>