<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="description" content="Ontwerp je eigen startpagina met je eigen kleuren, icoontjes, foto's. Altijd je eigen startpagina binnen handbereik op je pc, iphone, android of windows pone.">
    <meta name="keywords" content="startpagina, favorieten, bookmarks, ultrapip, iphone, android, app, custom, startpage, diplopoda">
    <meta name="Diplopoda" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <title>Maak je eigen startpagina, met je eigen icoontjes, kleuren en foto's.</title>
    <!-- startpagina, favorieten, bookmarks, diplopoda -->

    <title>Ultrapip</title>

    <!--- Main Jquery files --->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>theme/js/jquery.ui.touch-punch.min.js"></script>
    <!--- Core drag drop swap Jquery --->
    <script src="<?php echo base_url();?>theme/js/dragdropswap.js"></script>

    <!--- Core drag drop swap css --->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/dragdropswap.css" />

    <!--- Core website css --->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/mainstyle.css" />

    <!---Form css --->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/form.css" />

    <!---Color Widgets css --->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/colorWidgets.css" />

    <!--- Colorbox popup css js -->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/colorbox.css" />
    <script src="<?php echo base_url();?>theme/js/jquery.colorbox.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/menu.css" />


    <link rel="shortcut icon" href="favicon.ico">

</head>
<body background="<?php echo base_url();?>theme/images/backgrounds/<?php echo $tabsresults[0]->background; ?>">

<div id="header"> 
    <div id="logo"><img src="<?php echo base_url();?>theme/images/up40_logo.png" height="60" alt=""></div>
    <div id="logout">
        <a  href="<?php echo  base_url() ."login/logout"; ?>" class="button-logout">logout</a>

    </div>
    <div id="headerContent">  

        <script>
            function lightbox(){    
                $.colorbox({width:"80%", height:"80%", iframe:true, href:"<?php echo base_url();?>ultrapip/edittab/<?php echo $id; ?>"});
            }
        </script>

        <div onclick="lightbox();" style="cursor:pointer;"  id="edit" class="button-settings">Instellingen</div>

        <div id="trash" class="button-trash">Verwijder...</div>
    </div>
</div>
<ul id="nav">

    <li id="nav-1"><a href="#">Home</a></li>
    <!--- 
    <li id="nav-2"><a href="#">Tab3</a></li>
    <li id="nav-3"><a href="#">+</a></li>
    --->
</ul>