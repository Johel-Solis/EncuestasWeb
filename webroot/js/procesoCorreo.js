
            function validateEmail  ()
            {  
                            regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if(!regex.test($("#correo").val())){
                                alert('email no es valido');
                            
                            }
                            else{
                                
                                
                                if(($('input[name="correos[]"]').length)===0){

                                    var txt = '<li><input name="correos[]" class="inpco" readonly="readonly" style="border:0px" value="'+ $("#correo").val() +'"></li>';
                            
                                    $("#lstCorreos").append(txt);
                                   
                        
                                   document.getElementById('correo').value='';

                                }
                                else
                                {
                                    ban=false;
                                    

                                    $('input[name="correos[]"]').each(function() {

                                        if(($(this).val())==$("#correo").val()){
                                            ban=true;

                                        }
                                        

                                    });

                                    if(ban){
                                        alert('email ya se encuentra en la lista');
                                        

                                    }else
                                    {
                                        var txt = '<li><input name="correos[]" class="inpco" readonly="readonly" style="border:0px" value="'+ $("#correo").val() +'"></li>';
                        
            
                                        $("#lstCorreos").append(txt);
                    
                                
                                        
                                        document.getElementById('correo').value='';

                                    }

                                }
                                
                                
                            }

                            

                            
                            
                                            

        }
    
    

    
        function aggPreguntas  ()
        {          
                            

                                var txt = '<li><input name="preguntas[]" class="inpco" readonly="readonly" style="border:0px" value="'+ $("#pregunta").val() +'"></li>';
                        
                                $("#lstPreguntas").append(txt);
                               
                    
                               document.getElementById('pregunta').value='';

                            
    

                        

                        
                        
                                        

        }