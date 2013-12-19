$(document).ready(function () {
    
    // colorbox Popup
    $(".inline").colorbox({inline:true,  width:"500px", height:"350px"});
    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
    $(".register").colorbox({iframe:true, width:"500px", height:"350px"});
    
    //Start of the drag and drop
    window.startPos = window.endPos = {};

    makeDraggable();

    $('.droppable').droppable({
        hoverClass: 'hoverClass',
        drop: function(event, ui) {

            var $from = $(ui.draggable),
            $fromParent = $from.parent(),
            $to = $(this).children(),
            $toParent = $(this);


            window.endPos = $to.offset();

            swap($from, $from.offset(), window.endPos, 200);
            swap($to, window.endPos, window.startPos, 200, function() {
                $toParent.html($from.css({position: 'relative', left: '', top: '', 'z-index': ''}));
                $fromParent.html($to.css({position: 'relative', left: '', top: '', 'z-index': ''}));
                makeDraggable();
            });
            //alert(ui.draggable.attr('id') + ' dragged to ' + $(this).children().attr('id'));
   
            $.ajax({   
                type: "POST",
                url: "ultrapip/updatepositionwidget",
                data: { 'widgetFrom': ui.draggable.attr('id'), 'widgetTo': $(this).children().attr('id') },
                cache: false,
                success: function()
                {
                    //alert ('db updated');   
                }

            });
        },
    });

    function makeDraggable() {

        $('.draggable').draggable({
            zIndex: 99999,
            revert: 'invalid',
            start: function(event, ui) {
                window.startPos = $(this).offset();
            }
        });

        $("#trash").droppable({

            hoverClass: "ui-state-hover",
            drop: function(ev, ui) {
                ui.draggable.remove();
                //alert(ui.draggable.attr('id'));
                
            $.ajax({   
                type: "POST",
                url: "ultrapip/deletewidget/" + ui.draggable.attr('id'),
                data: { 'id': ui.draggable.attr('id') },
                cache: false,
                success: function()
                {
                    //alert ('db updated');   
                }

            });
                
                setTimeout(function() {
                 window.location.href=window.location.href
}, 1000);
                
                
            } ,

            tolerance: "touch",
            over: function (event, ui) {
                var trash = $(this);
                var dragItem = $(ui.draggable);
                var valid = String(trash.data("id")).indexOf(dragItem.data("id")) > -1;
                if (valid) {
                    trash.removeClass("button-trash");
                    trash.addClass("DropTargetValid_trash");
                } else {
                    trash.addClass("DropTargetInvalid");
                }
            },
            out: function (event, ui) {
                var trash = $(this);
                trash.removeClass("DropTargetValid_trash");
                trash.removeClass("DropTargetInvalid");
                trash.addClass("button-trash");
            },
            deactivate: function (event, ui) {
                var trash = $(this);
                trash.removeClass("DropTargetValid_trash");
                trash.removeClass("DropTargetInvalid");
                trash.addClass("button-trash");
            }

        });

        $("#edit").droppable({

            hoverClass: "ui-state-hover",
            drop: function(ev, ui) {
                ui.draggable.remove();
               // alert(ui.draggable.attr('id'));
                //window.open ('editWidget.php?id=' + ui.draggable.attr('id'),'_self',false)
                $.colorbox({width:"80%", height:"80%", iframe:true, href:'ultrapip/editwidget/' + ui.draggable.attr('id')});
            } ,

            tolerance: "touch",
            over: function (event, ui) {
                var edit = $(this);
                var dragItem = $(ui.draggable);
                var valid = String(edit.data("id")).indexOf(dragItem.data("id")) > -1;
                if (valid) {
                    edit.removeClass("button-settings");
                    edit.addClass("DropTargetValid_edit");
                } else {
                    edit.addClass("DropTargetInvalid");
           ;
                }
            },
            out: function (event, ui) {
                var edit = $(this);
                edit.removeClass("DropTargetValid_edit");
                edit.removeClass("DropTargetInvalid");
                edit.addClass("button-settings");
            },
            deactivate: function (event, ui) {
                var edit = $(this);
                edit.removeClass("DropTargetValid_edit");
                edit.removeClass("DropTargetInvalid");
                edit.addClass("button-settings");
            }

        });
    }

    function swap($el, fromPos, toPos, duration, callback) {
        $el.css('position', 'absolute')
        .css(fromPos)
        .animate(toPos, duration, function() {
            if (callback) callback();
        });
    }
});
    
