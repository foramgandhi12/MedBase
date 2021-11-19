<?php
function sidebarCol()
{
?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- MedBase Logo -->
        <a href="index3.html" class="brand-link">
            <img src="public/img/MedBase.png" alt="MedBase Logo" class="brand-image img-circle elevation-3" style="float: revert; margin-left: 25%; max-height: 120px;">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel-->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!-- <div class="image"> -->
                    <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                <!-- </div> -->
                <div class="info">
                    <a href="#" class="d-block">Joshua Ramnaraine</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <?php sidebar_element("Paitent Details", "fas fa-user"); ?>
                        <?php sidebar_element("Paitent Records", "fas fa-notes-medical"); ?>
                        <?php sidebar_element("Book Surgery", "fas fa-procedures"); ?>
                        <?php sidebar_element("Select Doctor", "fas fa-stethoscope"); ?>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

<?php
}
// Creates a sidebar element with name $name and (TODO: add $link param for href) link to $link
function sidebar_element($name, $icon)
{ ?>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <?php if ($icon != "") {
            ?>
                <i class="nav-icon <?php echo $icon ?> "></i>
            <?php
            } ?>
            <p> <?php echo $name ?> </p>
        </a>
    </li>
<?php }

function rowContainer()
{
?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-hospital-symbol"></i> Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php rowBox("3", "Number Of Paitents", "bg-info", "fas fa-user-injured"); ?>
                <?php rowBox("10", "Upcoming Procedures", "bg-success", "fas fa-procedures"); ?>
                <?php rowBox("44", "Registrations", "bg-warning", "ion ion-person-add"); ?>
                <?php rowBox("65", "Unique Visitors", "bg-danger", "ion ion-pie-graph"); ?>
            </div>
        </div>
    </section>
<?php
}

function rowBox($number, $title, $bgColor, $icon)
{
?>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box <?php echo $bgColor; ?>">
            <div class="inner">
                <h3><?php echo $number; ?></h3>
                <p><?php echo $title; ?></p>
            </div>
            <div class="icon">
                <i class="<?php echo $icon; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
<?php
}


