<?php
    $filepath = base_url() . "/uploads/" . $upload_data['file_name'];
    $file = $upload_data['file_name'];
   
?>    

<div id="mainWidgetOuter">     
    <div class="popup_mainWidget">
        <div id="mainWidgetInner">
            <br> <br>

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="jc-demo-box">

                            <!-- This is the image we're attaching Jcrop to -->
                            <img src="<?php echo $filepath; ?>"  id="cropbox" />

                            <!-- This is the form that our event handler fills -->

                            <?php echo form_open('upload/showimage'); ?>

                            <!--- <form action="upload/showimage" method="post" onsubmit="return checkCoords();"> --->
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                            <input type="hidden" id="file" name="file" value="<?php echo $file; ?>" />
                            <input type="hidden" id="filepath" name="filepath" value="<?php echo $filepath; ?>" />

                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                            <input type="hidden" id="title" name="title" value="<?php echo $title; ?>" />
                            <input type="hidden" id="link" name="link" value="<?php echo $link; ?>" />

                            <input type="submit" class="styled-button-8"  value="Gebruik selectie" class="btn btn-large btn-inverse" />
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>

    </body>
</html>