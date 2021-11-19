<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedBase</title>
    <link rel="shortcut icon" href="./public/img/hopsitalSymbol.png" type="image/x-icon">
    <?php
    include "sidebar_component.php";
    include "styles.php";
    callStyles();
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php sidebarCol(); ?>
    <div class="content-wrapper">
        <?php rowContainer(); ?>

        <!-- <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="list-group w-25">
                        <a href="#" class="list-group-item list-group-item-action">Kill</a>
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
                    </div>
                </div>
            </div>
        </section> -->
    </div>
</body>

</html>