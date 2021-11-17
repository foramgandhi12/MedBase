<?php 
    // Creates a sidebar element with name $name and (TODO: add $link param for href) link to $link
    function sidebar_element($name){ ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <p> <?php echo $name ?> </p>
            </a>
        </li>
    <?php } ?>