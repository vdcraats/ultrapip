<div id="mainWidgetOuter">     
    <div class="popup_mainWidget">
        <div id="mainWidgetInner">
            <?php 
            
                $id_field = array(
                    'name'        => 'id',
                    'id'          => 'id',
                    'value'       => $id,
                    'type'        => 'hidden',
                );
                $link_field = array(
                    'name'        => 'link',
                    'id'          => 'link',
                    'value'       => $link,
                    'type'        => 'hidden',
                );
                $title_field = array(
                    'name'        => 'title',
                    'id'          => 'title',
                    'value'       => $title,
                    'type'        => 'hidden',
                );
    
            ?>
            <br> <br>
            <?php
                if (isset($error)){
                   echo "<div class='error'>" . $error . "</div>"; 
                    
                }
                
            ?>
            <?php echo form_open_multipart('upload/do_upload');?>
            <?php  echo form_input($id_field); ?>
            <?php  echo form_input($link_field); ?>
            <?php  echo form_input($title_field); ?>
            <label for="file">Bestandsnaam: </label>

            <input type="file" name="userfile" size="20" />

            <br /><br />

            <input class="styled-button-8" type="submit" value="upload" />

            <?php echo form_close(); ?>
            <div id="wait" style="display: none;"><img src="<?php echo base_url();?>theme/images/loading.gif" alt="loadding"> </div>
        </div>
    </div>
</div>