

<div class="wrap">
    <h1>All In One Plugin</h1>
    <?php settings_errors(); ?>



   <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About Me</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
                <?php
                settings_fields( 'questionarie_settings' );  //setSettings optiongroup need to same here
                do_settings_sections( 'questionarie_based_filter' );  //same as setSection page
                submit_button();
                ?>
            </form>

        </div>
        <div id="tab-2" class="tab-pane">
            <h3>Updates</h3>
        </div>

        <div id="tab-3" class="tab-pane">
            <h3>About WPPOOL</h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Pmso8MJRpBM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </div>
</div>



