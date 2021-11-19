<?php
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
<?php } ?>