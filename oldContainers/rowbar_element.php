<?php
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
