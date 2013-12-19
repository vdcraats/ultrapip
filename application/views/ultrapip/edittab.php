
<div id="mainWidgetOuter">     
    <div class="popup_mainWidget">
        <div id="mainWidgetInner">
            <br> <br>
            <img src="<?php echo base_url();?>theme/images/backgrounds/background3.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=background3.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/ab.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=ab.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/raindrops-purple-repeating-background.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=raindrops-purple-repeating-background.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/background1.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=background1.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/background2.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=background2.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/wallpaper1.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=wallpaper1.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/wallpaper2.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=wallpaper2.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/wallpaper3.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=wallpaper3.jpg')" />
            <img src="<?php echo base_url();?>theme/images/backgrounds/wallpaper4.jpg" height="100" alt="bottle" class="thumbnails" onclick="imageClick('<?php echo base_url();?>ultrapip/changeBackground/<?php echo $id; ?>?background=wallpaper4.jpg')" />
           
            
            <?php
               // echo  "<br><br>";
               //  echo form_open('upload');
               /// echo form_submit('upload_submit', 'Upload afbeelding', 'id="submit" class="styled-button-8" ');
              //  echo form_close();
            ?> 
        </div>
    </div>
</div>
<script>          
    function imageClick(url) {
        window.location = url;
    }
</script>

