$(window).load(function(){

    $(function() {
     $('#file-input').change(function(e) {
         addImage(e); 
        });
   
        function addImage(e){
         var file = e.target.files[0],
         imageType = /image.*/;
       
         if (!file.type.match(imageType))
          return;
     
         var reader = new FileReader();
     
         reader.onload = function(e){
            var result=e.target.result;
           $('#imgSalida').attr("src",result);
         }
          
         reader.readAsDataURL(file);
        }
       });
     });
   