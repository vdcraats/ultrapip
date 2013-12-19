<div id="content">
    <?php
        foreach($widgetresults as $row):
            if ($row->title == "") {
                echo "<div class='droppable'><div class='empty' style='cursor: pointer;' id='" . $row->id . "'><a class='iframe' href='ultrapip/addwidget/" . $row->id . "' ><div id='empty'></div></a></div></div>";
            }

            elseif  ($row->logo == "BlueWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='BlueWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>";        
            }
            elseif  ($row->logo == "RedWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='RedWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }  
            elseif  ($row->logo == "PinkWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='PinkWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }   
            elseif  ($row->logo == "OrangeWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='OrangeWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }  
            elseif  ($row->logo == "GreenWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='GreenWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }  
            elseif  ($row->logo == "BrownWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='BrownWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            } 
            elseif  ($row->logo == "CyaanWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='CyaanWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            } 
             elseif  ($row->logo == "PurpleWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='PurpleWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }
             elseif  ($row->logo == "GreyWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='GreyWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            }  
               elseif  ($row->logo == "YellowWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='YellowWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            } 
                 elseif  ($row->logo == "BlackWidget") {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div id='BlackWidget' class='inner_draggable_custom'><div class='title'>" . $row->title . "</div></div></a></div></div>"; 
            } 
            else {
                echo "<div class='droppable'><div style='cursor: pointer;' id='" . $row->id . "' class='draggable'><a href='" . $row->link . "' target='_blank'><div style=\"background: url('" . base_url() . "uploads/icons/" . $row->logo . "')\" class='inner_draggable_custom'></div></a></div></div>";        
            }
            endforeach; 
    ?>
</div>
