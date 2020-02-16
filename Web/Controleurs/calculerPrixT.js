function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
};

function calcProdSubTotal() {//prix total pour chaque ligne
    
    var prodSubTotal = 0;

    $(".rowTotal-input").each(function(){
    
        var valString = $(this).val() || 0;
        
        prodSubTotal += parseFloat(valString);
                    
    });
        
    $("#product-subtotal").val(prodSubTotal);

};

 

$(function(){

    $('.nbCourse').blur(function(){
    
        var $this = $(this);
    
        var numPallets = $this.val();
        var multiplier = $this
                            .parent().parent()
                            .find("td.prixCourse span")
                            .text();
        
        if ( (IsNumeric(numPallets)) && (numPallets != '') ) {
            
            var rowTotal = numPallets * multiplier;
            
            $this
                .css("background-color", "white")
                .parent().parent()
                .find("td.rowTotal input")
                .val(rowTotal);                    
            
        } else {
        
            $this.css("background-color", "#ffdcdc"); 
                        
        };
        
        calcProdSubTotal();
    });

});