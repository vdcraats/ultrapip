<!DOCTYPE html>
<html>
<head>
    <title>Ultrapip</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/form.css">
    <!---Color Widgets css --->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/css/colorWidgets.css" />

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!--- Crop Image --->
    <script src="<?php echo base_url();?>theme/js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/jquery.Jcrop.css" type="text/css" />
    <!--- <script src="<?php echo base_url();?>theme/js/crop.js"></script> --->
    <link rel="stylesheet" href="<?php echo base_url();?>theme/css/crop.css" type="text/css" />

    <script type="">
        $(document).ready(function(){
            $("#blue").click(function(){
                $("#color").val("BlueWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #92BCF5 0%, #2C589C 100%)");
                $('#blue').css('border', 'solid 2px black');
                $('#red').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });

            $("#red").click(function(){
                $("#color").val("RedWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #F53C3C 0%, #AB3333 100%)");
                $('#red').css('border', 'solid 2px black');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
              $("#pink").click(function(){
                $("#color").val("PinkWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #F18ECA 0%, #C83B93 100%)");
                $('#pink').css('border', 'solid 2px black');
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
              $("#orange").click(function(){
                $("#color").val("OrangeWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #FBAD40 0%, #E44C06 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 2px black');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
            $("#green").click(function(){
                $("#color").val("GreenWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #88D689 0%, #24852D 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 2px black');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
            $("#brown").click(function(){
                $("#color").val("BrownWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #CE9877 0%, #864B28 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 2px black');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
            $("#cyaan").click(function(){
                $("#color").val("CyaanWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #3CD9D0 0%, #00746E 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 2px black');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
            $("#purple").click(function(){
                $("#color").val("PurpleWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #9946FE 0%, #42068D 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 2px black');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
              $("#grey").click(function(){
                $("#color").val("GreyWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #C4CBD1 0%, #88878B 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 2px black');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 0px');
            });
            
              $("#yellow").click(function(){
                $("#color").val("YellowWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #FFF046 0%, #BDAD00 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 2px black');
                $('#black').css('border', 'solid 0px');
            });
              $("#black").click(function(){
                $("#color").val("BlackWidget");
                $("#defaultWidget").css("background-image", "linear-gradient(to bottom, #8B8B8B 0%, #151515 100%)");
                $('#red').css('border', 'solid 0px');
                $('#blue').css('border', 'solid 0px');
                $('#pink').css('border', 'solid 0px');
                $('#orange').css('border', 'solid 0px');
                $('#green').css('border', 'solid 0px');
                $('#brown').css('border', 'solid 0px');
                $('#cyaan').css('border', 'solid 0px');
                $('#purple').css('border', 'solid 0px');
                $('#grey').css('border', 'solid 0px');
                $('#yellow').css('border', 'solid 0px');
                $('#black').css('border', 'solid 2px black');
            });

            $("input[type=submit]").click(function(){
                $("#wait").show();
            //alert ('show');
            });

            $('#title').on('keyup', function(){
    $('.title').html($(this).val());
});

         
              $('#cropbox').Jcrop({
            onSelect:    updateCoords,
            bgColor:     'black',
            bgOpacity:   .4,
            setSelect:   [ 0, 0, 100, 100 ],
            aspectRatio: 1
        });  
        
             function updateCoords(c)
                    {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    };
            
        });
    </script>


</head>
<body>
