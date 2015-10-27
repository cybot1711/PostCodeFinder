<!DOCTYPE html>
<html>
    <head>
        <title>Weather</title> 
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
       
         <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

                <!-- Optional theme -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

          
         <style type="text/css">
             html, body  {
                 height: 100%;
             }
             .container{
                 background-image: url("http://wallpoper.com/images/00/30/35/01/cityscapes-urban_00303501.jpg");
                 background-size: cover;
                 width: 100%;
                 height: 100%;
                 background-position: center;
                 padding-top: 150px;
             }
             
             .center {
                 
                 text-align: center;
             }
             
             .white {
                 color: floralwhite;
                 font-weight: bolder;
             }
             
             p {
                 padding-top: 15px;
                 padding-bottom: 15px;
             
             }
             
             button {
                 margin-top: 14px;
                 margin-bottom: 20px;
             }
             
             .alert {
                 display: none;
                 font-weight: bold;
                 border-radius: 60px;
             }
             h1 {
                 
                 color: aliceblue;
                 font-size: 300%;
                 
             }
        </style> 
    </head>
    <body>
        
        <div class="container">
        
            <div class="row">
                
                 <div class="col-md-6 col-md-offset-3 center ">
                     
                    
                     
                    <h1><span class="glyphicon glyphicon-map-marker"></span></h1>
                     <h1 class="white">PostCode Finder</h1>
                     
                     <p class="lead white">Enter any address to find the postcode</p>
                     
                     <form>
                     
                         <div class="form-group">
                         
                             <input id="adrs" type="text" class="form-control" name="address" placeholder="Eg. 100 Fake street, Fake City" />
                             
                        <button id="findBtn" class="btn btn-success btn-md">Find My PostCode</button>
                         
                         
                         
                         
                         </div>
                     
                     </form>
                     
                      <div id="success" class="alert alert-success">Success!!</div>
                                           <div id="fail"  class="alert alert-danger">ERROR!! Could not find postal data for the address entered. Please try again!</div>
                                                             <div id="fail2"  class="alert alert-danger">ERROR!! Could not connect to location service. Please check your connection</div>
                
                 </div>
                
               
        
            </div>

        </div>
            
           

	

         <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>   
        <!-- Latest compiled and minified JavaScript -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <script>
        
            $("#findBtn").click(function( event ) {
                
                var result = 0;
                
                $(".alert").hide();
                
                event.preventDefault();
                 $.ajax({
        
        type: "GET",
         
        url: "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#adrs').val())+"&key=AIzaSyAqAfGIl2sYrpuTb-OEb5FsSH_drO-SUWI",
        
        dataType: "xml",
        
        success: processXML,
        error: error             
    });
                
        function error() {
            
           $("#fail2").fadeIn(); 
            
        }        
                
        function processXML(xml) {
            
            $(xml).find("address_component").each(function()  {
                
               if ($(this).find("type").text() == "postal_code") {
                   
                
                   $("#success").html("Your postcode is: "+$(this).find("long_name").text()).fadeIn();
                   
                //   alert($(this).find('long_name').text());
               } 
                
            });
            
            
            if (result == 0) {
                
                $("#fail").fadeIn();
            }
            
        }

                
                
            });
        
        
        
        
        </script>
        
    </body>
</html