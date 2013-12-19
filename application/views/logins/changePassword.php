<div id="mainWidgetOuter">     
    <div class="mainWidget">
        <div id="mainWidgetInner">
            <h1>Verander wachtwoord</h1>
            <?php
                if (!isset($token)){
                    //echo "geen token";
                    $id = $result[0]->id;
                    $token = $result[0]->token;  
                }
                echo form_open('login/changePassword_validation');
                echo form_hidden ("id", $id);
                echo form_hidden ("token", $token);
                echo validation_errors(); 
                echo "<table cellpadding='5'>";
                echo "<tr>";
                echo "<td><label for=\"\">Wachtwoord:* </td><td>" . form_password('password', '', 'id="password" class="rounded"') . "</td>";
                echo "</tr><tr>";
                echo "<td><label for=\"\">Wachtwoord bevestigen* </td><td>" . form_password('cpassword', '', 'id="password" class="rounded"') . "</td>";
                echo "</tr><tr><td>";
                echo form_submit('changePassword_submit', 'Verander wachtwoord', 'id="submit" class="styled-button-8" ');
                echo "<td></tr></table>";
                echo form_close(); 
            ?>
        </div> 
    </div> 
</div> 
