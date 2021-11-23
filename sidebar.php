<?php
    function add_sidebar($empRoleID, $empName){ ?>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- MedBase Logo -->
            <a href="#" class="brand-link">
                <img src="public/img/MedBase Logo.png" alt="MedBase Logo" class="brand-image img-circle elevation-3" style="float: revert; max-height: 120px; margin-left: 25%;">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel-->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?php
                        // user image changes depending on employee role (doctor, nurse, receptionist)
                        switch ($empRoleID){
                            case 1:
                                $imgLink = "public/img/doctor.png";
                                break;
                            case 2:
                                $imgLink = "public/img/nurse.png";
                                break;
                            case 3:
                                $imgLink = "public/img/receptionist.png";
                                break;
                        }
                    ?>
                    <img src= <?php echo $imgLink ?> class="img-circle elevation-2" alt="User Image" style="width: 2.5rem;">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $empName; ?></a>
                </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open" id="sidebar_elements">
                    </li>
                </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php return $imgLink; ?>
    <?php } ?>