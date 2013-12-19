<?php
    //print_r ($widgetresults);
    //echo $widgetresults[0]->id;     
?>

<div id="mainWidgetOuter">     
    <div class="popup_mainWidget">
        <div id="mainWidgetInner">
            <br> <br>

            <?php 

                if ($widgetresults[0]->logo == "RedWidget"){ ?>
                <div id="RedWidget"></div>
                <?php }
                elseif ($widgetresults[0]->logo == "BlueWidget"){ ?>
                <div id="BlueWidget"></div>
                <?php }

                else { ?>
                <div id="defaultWidget" style="background-image:url('<?php echo base_url();?>uploads/icons/<?php echo $widgetresults[0]->logo; ?>');" ></div>   
                <?php    
                }
            ?>

            <table>
                <tr>
                    <td width="35" height="35"><div id="blue" style="border: solid 2px black;" ></div></td><td width="40" height="40"><div id="red"></div></td>

                    <td width="40" height="40"><div id="pink"></div></td>
                    <td width="40" height="40"><div id="orange"></div></td>
                    <td width="40" height="40"><div id="green"></div></td>
                    <td width="40" height="40"><div id="brown"></div></td>
                    <td width="40" height="40"><div id="cyaan"></div></td>
                    <td width="40" height="40"><div id="purple"></div></td>
                    <td width="40" height="40"><div id="grey"></div></td>
                    <td width="40" height="40"><div id="yellow"></div></td>
                    <td width="40" height="40"><div id="black"></div></td>
                </tr>
            </table>
            <?php

                $color_field = array(
                    'name'        => 'color',
                    'id'          => 'color',
                    'value'       => $widgetresults[0]->logo,
                    'type'        => 'hidden',
                );

                $id_field = array(
                    'name'        => 'id',
                    'id'          => 'id',
                    'value'       => $id,
                    'type'        => 'hidden',
                );


                $link_field = array(
                    'name'        => 'link',
                    'id'          => 'link',
                    'value'       => $widgetresults[0]->link,
                    'type'        => 'input',
                    'class'       => 'rounded',
                    'placeholder' => 'webadres',
                );

                $title_field = array(
                    'name'        => 'title',
                    'id'          => 'title',
                    'value'       => $widgetresults[0]->title,
                    'type'        => 'input',
                    'class'       => 'rounded',
                    'placeholder' => 'widgetname',
                );

                $attributes = array('id' => '');
                echo validation_errors(); 
                echo form_open('ultrapip/editwidget_validation', $attributes);
                echo form_input($color_field);
                echo form_input($id_field);
                echo "<p><label for=\"name\">Wat is het webadres* " . form_input($link_field) . "</p>";
                echo "<p><label for=\"name\">Naam van de widget* " . form_input($title_field) . "</p>";
                echo "";
                echo form_submit('login_submit', 'Upload afbeelding', 'id="submit" class="styled-button-8" ');
                echo  "<br><br>";
                echo form_submit('login_submit', 'Opslaan', 'id="submit" class="styled-button-8" ');
                echo form_close();
            ?> 
        </div>
    </div>
</div>