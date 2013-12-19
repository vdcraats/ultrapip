          $(function(){

                        $('#cropbox').Jcrop({
                           // aspectRatio: 1,
                           // onSelect: updateCoords,
                           //  setSelect:   [ 100, 100, 50, 50 ],
                             
                             
                              onSelect:    updateCoords,
            bgColor:     'black',
            bgOpacity:   .4,
            setSelect:   [ 100, 100, 50, 50 ],
            aspectRatio: 16 / 9
                             
                        });

                       
                        
                    });

                    function updateCoords(c)
                    {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    };

                    function checkCoords()
                    {
                        if (parseInt($('#w').val())) return true;
                        alert('Please select a crop region then press submit.');
                        return false;
                    };
                    
                

