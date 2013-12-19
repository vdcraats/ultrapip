<div id="mainWidgetOuter">     
    <div class="mainWidget">
        <div id="mainWidgetInner">
            <?php if(!isset($message)){ ?>
                <h1>Maak een gratis account aan</h1>
                Om een eigen startpagina te maken met ultrapip kunt u hier gratis een account aanmaken.
                <?php
                    echo form_open('login/signup_validation');
                    echo form_error('email');
                    echo "<table cellpadding='5'>";
                    echo "<tr>";
                    echo "<td><label for=\"name\">E-mailadres:* </td><td>" . form_input('email', $this->input->post('email'), 'id="username" class="rounded"', 'placeholder="Username"', 'autofocus') . "</td>";
                    echo "</tr><tr>";
                    echo "<td><label for=\"\">Wachtwoord:* </td><td>" . form_password('password', '', 'id="password" class="rounded"') . "</td>";
                    echo "</tr><tr>";
                    echo "<td><label for=\"\">Wachtwoord bevestigen* </td><td>" . form_password('cpassword', '', 'id="password" class="rounded"') . "</td>";
                    echo "</tr><tr><td>";
                    echo form_submit('signup_submit', 'Registreer', 'class="styled-button-8"');
                    echo "<td></tr></table>";
                    echo form_close();
                }
                else {
                    echo $message;   
                } 
            ?>
        </div>
    </div>
</div>

