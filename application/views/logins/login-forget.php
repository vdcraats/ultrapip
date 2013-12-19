<div id="mainWidgetOuter">     
    <div class="mainWidget">
        <div id="mainWidgetInner">
            <h1>Wachtwoord vergeten ?</h1>
            Hier kun je je wachtwoord resetten. Vul hieronder je e-mailadres in en we sturen je een link om je wachtwoord te veranderen. Lukt er nog steeds iets niet zoals bv automatisch inloggen? Stuur ons een mail naar admin@ultrapip.nl

            <?php if(isset($error)){ echo($error); } ?>

            <div class="container">
                <form class="form-horizontal well" method="post" id="form" action="doforget">
                    <div class="control-group">
                        <p> <label for="email"> E-mailadres</label>
                            <input class="rounded" type="text" id="email" name="email" /></p>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary styled-button-8" value="Wachtwoord versturen" />
                    </div>

                </form>
            </div> 
        </div> 
    </div> 
        </div> 
