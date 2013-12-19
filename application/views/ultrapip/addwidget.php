<div id="mainWidgetOuter">     
    <div class="popup_mainWidget">
        <div id="mainWidgetInner">
            <br> <br>
            <?php if (!isset($icon)){ ?>
            <div id="defaultWidget"><div class='title'></div></div>
            <?php }
            else { ?>
            <div id="defaultWidget" style="background-image:url('<?php echo base_url();?>uploads/icons/<?php echo $icon; ?>');" ></div>   
            <?php    
            }
             ?>
               
            <table>
                <tr>
                    <td width="35" height="35"><div id="blue" style="border: solid 2px black;" ></div></td>
                    <td width="40" height="40"><div id="red"></div></td>
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
                 <tr>
                   
            
                </tr>
            </table>
            <?php
            
                 if (!isset($icon)){
                 $icon = "BlueWidget";   
                }
            
                $color_field = array(
                    'name'        => 'color',
                    'id'          => 'color',
                    'value'       => $icon,
                    'type'        => 'hidden',
                );

                $id_field = array(
                    'name'        => 'id',
                    'id'          => 'id',
                    'value'       => $id,
                    'type'        => 'hidden',
                );

                if (!isset($widgetresults[0]->link)){
                    $widgetresults[0]->link = "";
                    }
             
                    
                $link_field = array(
                    'name'        => 'link',
                    'id'          => 'link',
                    'value'       => $this->input->post('link'),
                    'type'        => 'input',
                    'class'       => 'rounded',
                    'placeholder' => 'http://',
                );
                
                 if (!isset($widgetresults[0]->title)){
                    $widgetresults[0]->title = "";
                    } 
           
                
                $title_field = array(
                    'name'        => 'title',
                    'id'          => 'title',
                    'value'       => $this->input->post('title'),
                    'type'        => 'input',
                    'class'       => 'rounded',
                    'placeholder' => 'kies een naam',
                );

                $attributes = array('id' => '');
                echo validation_errors(); 
                echo form_open('ultrapip/addwidget_validation', $attributes);
                echo form_input($color_field);
                echo form_input($id_field);
                //echo "<p><label for=\"name\">Wat is het webadres* " . form_input('link', $this->input->post('link'), 'id="link" class="rounded"', 'placeholder="webadres"', 'autofocus') . "</p>";
                //echo "<p><label for=\"name\">Naam van de widget* " . form_input('title', $this->input->post('title'), 'id="title" class="rounded"', 'placeholder="widgetname"') . "</p>";
                echo "<p><label for=\"name\">Wat is het webadres* " . form_input($link_field) . "</p>";
                echo "<p><label for=\"name\">Naam van de widget " . form_input($title_field) . "</p>";
                echo "";
                echo form_submit('login_submit', 'Upload afbeelding', 'id="submit" class="styled-button-8" ');
                echo  "<br><br>";
                echo form_submit('login_submit', 'Opslaan', 'id="submit" class="styled-button-8" ');
                echo form_close();
              ?> 
        </div>

    <div id="searchresults">Search results :</div>
<ul id="results" class="update"></ul>
    </div>
    

</div>

<script type="text/javascript">
$("#link").blur(function() {
 //alert($('#link').val());
 
         // getting the value that user typed
        var searchString    = $('#link').val();
        // forming the queryString
        var data            = 'search='+ searchString;
         
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "/ultrapip/ultrapip/searchIcon",
                data: data,
            //    beforeSend: function(html) { // this happens before actual call
            //        $("#results").html('');
            //        $("#searchresults").show();
            //        $(".word").html(searchString);
             //  },
               success: function(html){ // this happens after we get results
                    //$("#results").show();
                    $("#results").append(html);
              }
            });   
        }
        return false;
 
 
 });
 </script>