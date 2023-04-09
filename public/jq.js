$(document).ready(function () {
   
    $(".popups,.popups2").click(function (e) { 
        $(this).fadeOut()
        
    });
    

   $('.popup2').click(function (e) { 
    e.stopPropagation();
    
   });

   let showerrororsuccesmessage = setTimeout(() => {
    $("h4.error").fadeOut();
    clearTimeout(showerrororsuccesmessage);
   },5600);
});