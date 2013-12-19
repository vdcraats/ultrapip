<div id="mainWidgetOuter">     
    <div class="mainWidget">
        <div id="mainWidgetInner">
        <div class="reclame"><img src="<?php echo base_url();?>theme/images/Ultrapip_reclame.png" alt="Ultrapip" width="260"></div>
            <h1>Inloggen</h1>
            Welkom bij Ultrapip. Hier kun je inloggen op je eigen Ultrapip startpagina. Heb je nog geen account? <a href="<?php echo  base_url() ."login/signup"; ?>" class="wachtwoord">Klik hier om een account aan te maken</a>.
            en je Ultrapip overal ter wereld te kunnen gebruiken.
            <?php
                $attributes = array('id' => '');
                echo form_error('email');
                echo form_open('login/login_validation', $attributes);
                echo "<p><label for=\"name\">E-mailadres:* " . form_input('email', $this->input->post('email'), 'id="username" class="rounded"', 'placeholder="Username"', 'autofocus') . "</p>";
                echo "<p><label for=\"\">Wachtwoord:* " . form_password('password', '', 'id="password" class="rounded"') . "</p>";
                echo "<p>" . form_checkbox('remember_pass', 'remember_pass', FALSE) . " Onthoud mijn wachtwoord, en log automatisch in</p>";
                echo "";
                echo form_submit('login_submit', 'Inloggen', 'id="submit" class="styled-button-8" ');
            ?> 
            <a href="<?php echo  base_url() ."login/forget"; ?>" class="wachtwoord">Wachtwoord vergeten</a>
            <?php
                echo form_close();
            ?>
        </div> 
    </div>
</div>

                
