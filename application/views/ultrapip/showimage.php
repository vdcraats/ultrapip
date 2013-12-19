<?php
    include ('../db_connect.php');
    $id = $_POST['id'];
    $file = $_POST['file'];
    $filepath = $_POST['filepath'];
    $ext = '.jpg';
    $newfile = uniqid() . $ext;
    $title = $_POST['title'];
    $link = $_POST['link'];
 
    //$newfile = sha1_file($filepath) . $ext;

    mysql_query("UPDATE widgets SET title = 'bla', logo = '$newfile' WHERE id = '$id'");

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $targ_w = $targ_h = 80;
        $jpeg_quality = 80;

        $src = $_POST['filepath'];
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
            $targ_w,$targ_h,$_POST['w'],$_POST['h']);

        imagejpeg($dst_r,"../images/icons/" . $newfile . "",$jpeg_quality);
        unlink($_POST['filepath']);
        
        extract($_REQUEST);
    ?>  
            <!--- Forms --->
        <link rel="stylesheet" media="screen" href="forms/style.css" />
        <!-- This is for mobile devices -->
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
        <!-- This makes HTML5 elements work in IE 6-8 -->
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
    <img src="../images/icons/<?php echo $newfile; ?>" /></br>   

    <form action="submitInfo.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        Titel: <input type="text" name="title" value="<?php echo $title; ?>"><br>
        Link: <input type="text" name="link" value="<?php echo $link; ?>">
        <input type="submit" name="submit" value="Widget toevoegen">
    </form>
    <?php     

    }  
?>