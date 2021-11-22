<?php 
    // Creates a sidebar element with name $name and link to $link
    function sidebar_element($name, $link){ ?>
        <li class="nav-item">
            <a href=<?php echo $link ?> class="nav-link">
                <p> <?php echo $name ?> </p>
            </a>
        </li>
    <?php } ?>

<?php 
    // creates widgets with names and values for name, data, link and icon as specified by the params 
    function add_widgets($widget1Data, $widget1Link, $widget2Name, $widget2Data, $widget2Link, $widget2Icon, $widget3Name, $widget3Data, $widget3Link, $widget3Icon, $widget4Name, $widget4Data, $widget4Link, $widget4Icon){ ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $widget1Data ?></h3>
                    <p>Total Patients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-injured"></i>
                </div>
                <a href=<?php echo $widget1Link ?> class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $widget2Data ?></h3>
                    <p><?php echo $widget2Name ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-<?php echo $widget2Icon ?>"></i>
                </div>
                <a href=<?php echo $widget2Link ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $widget3Data ?></h3>
                    <p><?php echo $widget3Name ?></p>
                </div>
            <div class="icon">
                <i class="fas fa-<?php echo $widget3Icon ?>"></i>
            </div>
            <a href=<?php echo $widget3Link ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $widget4Data ?></h3>
                    <p><?php echo $widget4Name ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-<?php echo $widget4Icon ?>"></i>
            </div>
            <a href=<?php echo $widget4Link ?> class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php } ?>