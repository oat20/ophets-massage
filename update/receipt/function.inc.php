<?php
function page_navbar($title="services", $link="#"){
    $navbar = '<nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-uppercase" href="'.$link.'"><i class="fa fa-arrow-left fa-fw"></i> '.$title.'</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa-solid fa-calendar-days fa-fw"></i> '.date("d.m.Y").'</a></li>
                </ul>
            </div>
    
        </div><!-- /.container-fluid -->
    </nav>';
    return $navbar;
}
?>