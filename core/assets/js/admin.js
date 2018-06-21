

jQuery( document ).ready( function( $ ) {
    // $() will work as an alias for jQuery() inside of this function
    $('#header_bg').bind("change paste keyup",function(){

    $('body').hide();
        
        
        alert($(this).val());
        
        
        
//		        $('#my_image').attr('src','second.jpg');

		
});

    $('.btn-send').click(function(){
    
    
        $('body').hide();
         
         
         
    });
    
    
    
} );