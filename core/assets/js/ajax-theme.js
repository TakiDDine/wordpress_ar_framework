jQuery( document ).on( 'click', '.btn-send', function() {

            var fullname =   $('#contact_full_name').val();    
            var email    =   $('#contact_email').val();    
            var subject  =   $('#contact_subject').val();    
            var message  =   $('#contact_message').val();    
    
            var formdata   = new FormData();
                formdata.append('action',"submit_dak_lmerd");
                formdata.append('fullname',fullname);
                formdata.append('email',email);
                formdata.append('subject',subject);
                formdata.append('message',message);
        
            
             jQuery.ajax({
                url: varjs.ajax_url,
        		type : 'post',
                contentType : false,
                processData : false,
                dataType : 'html',
        		data : formdata,
                beforeSend  : function() {
                    //alert('a hna kanjbdo lik resulta azbi');
                },
        		success : function( response ) {
        		
                         $('#form-messages').html(response);
                   
        		},
                complete  : function() {
                    //alert('salina');
                },
                error : function( response ){
                    alert('error azbi');
                }
        	});
  
            

});