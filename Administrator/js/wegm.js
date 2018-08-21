$(document).ready(function (){
$(function (){
   $("#add-user").submit(function (e){
       e.preventDefault();
       
       $form = $(this);       
       $.post(document.location.url, $(this).serialize(),function (data){          
           $feedback =  $('#adduser_status').text('Add a User');           
           $form.prepend($feedback);
        
       });
       
    
   });
    



});
});