<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body>
<header id="header">
    <nav class="navbar navbar-default navbar-modus">
        <div class="container">
            <div class="navbar-header navbar-header-modus">
                <button type="button" class="navbar-toggle collapsed btn-collapsed-modus" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="brand-modus" >
                    <a href="<?php echo home_url();?>"><?php echo get_theme_mod('logo'); ?></a>
                </h1>

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-right modus-search">
                    <div class="form-group" id="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="s">
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </div>
                </form>
                <?php wp_nav_menu( array('theme_location'=>'menu1', 'menu_class'=>'nav navbar-nav navbar-right nav-modus'));?>
            </div>
        </div>
    </nav>
</header>