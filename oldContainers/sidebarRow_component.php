<?php
include "rowbar_element.php";
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
                <?php rowBox("150", "New Orders", "bg-info", "ion ion-bag"); ?>
                <?php rowBox("53<sup style=\"font-size: 20px\">%</sup>", "Bounce Rate", "bg-success", "ion ion-stats-bars"); ?>
                <?php rowBox("44", "Registrations", "bg-warning", "ion ion-person-add"); ?>
                <?php rowBox("65", "Unique Visitors", "bg-danger", "ion ion-pie-graph"); ?>
            </div>
        </div>
    </section>
<?php
}
