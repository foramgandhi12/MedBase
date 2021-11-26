<?php 
    // Creates a sidebar element with name $name and link to $link
    function add_sidebar_element($name, $link){ 
        return "<li class='nav-item'>
                <a href='$link' class='nav-link'>
                    <p>$name</p>
                </a>
            </li>";
} ?>

<?php 
    // creates widgets with names and values for name, data, link and icon as specified by the params 
    function add_widgets($widget1Data, $widget1Link, $widget2Name, $widget2Data, $widget2Link, $widget2Icon, $widget3Name, $widget3Data, $widget3Link, $widget3Icon, $widget4Name, $widget4Data, $widget4Link, $widget4Icon){
        return "<div class='col-lg-3 col-6'>
            <div class='small-box bg-info'>
                <div class='inner'>
                    <h3>$widget1Data</h3>
                    <p>Total Patients</p>
                </div>
                <div class='icon'>
                    <i class='fas fa-user-injured'></i>
                </div>
                <a href='$widget1Link' class='small-box-footer'>
                    More info <i class='fas fa-arrow-circle-right'></i>
                </a>
            </div>
        </div>
        <div class='col-lg-3 col-'>
            <div class='small-box bg-success'>
                <div class='inner'>
                    <h3>$widget2Data</h3>
                    <p>$widget2Name</p>
                </div>
                <div class='icon'>
                    <i class='fas fa-$widget2Icon'></i>
                </div>
                <a href='$widget2Link' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
            </div>
        </div>
        <div class='col-lg-3 col-6'>
            <div class='small-box bg-warning'>
                <div class='inner'>
                    <h3>$widget3Data</h3>
                    <p>$widget3Name</p>
                </div>
            <div class='icon'>
                <i class='fas fa-$widget3Icon'></i>
            </div>
            <a href='$widget3Link' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
            </div>
        </div>
        <div class='col-lg-3 col-6'>
            <div class='small-box bg-danger'>
                <div class='inner'>
                    <h3>$widget4Data</h3>
                    <p>$widget4Name</p>
            </div>
            <div class='icon'>
                <i class='fas fa-$widget4Icon'></i>
            </div>
            <a href='$widget4Link' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
            </div>
        </div>";
    } ?>