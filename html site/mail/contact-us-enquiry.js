jQuery(document).ready(function () 
{
	jQuery('.csubmit-btn1').click(function()
	{
		jQuery(document).find('div.mage-error').remove();
		  var validflag = true;
		  var email_format=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		//Name 
				if(jQuery('#enquirer-name').val().trim()=="" )
				{
					$('#enquirer-name').css({'border':'1px solid #ff0000'});
					 $("#error").show();
					 $("#result").hide();
					validflag = false;
				}
				else
				{
					if(jQuery('#enquirer-name').val())
					{
						var name=$("#enquirer-name").val();
						if(!(name.match( /^[a-zA-Z ]{2,30}$/)))
						{
							$('#enquirer-name').css({'border':'1px solid #ff0000'});

							validflag = false;
						}
						else
						{
							$('#enquirer-name').css({'border':'1px solid #cccccc'});
							$("#error").hide();
						}
					}
					
					
				}
		//Enquirer Last Name		
				if(jQuery('#enquirer-lastname').val().trim()=="" )
				{
					$('#enquirer-lastname').css({'border':'1px solid #ff0000'});
					 $("#error").show();
					 $("#result").hide();
					validflag = false;
				}
				else
				{
					if(jQuery('#enquirer-lastname').val())
					{
						var name=$("#enquirer-lastname").val();
						if(!(name.match( /^[a-zA-Z ]{2,30}$/)))
						{
							$('#enquirer-lastname').css({'border':'1px solid #ff0000'});

							validflag = false;
						}
						else
						{
							$('#enquirer-lastname').css({'border':'1px solid #cccccc'});
							$("#error").hide();
						}
					}
					
					
				}
				
		//Email
				if(jQuery('#enquirer-email').val().trim() == '')
				{
					$('#enquirer-email').css({'border':'1px solid #ff0000'});
					$("#error").show();
					$("#result").hide();
					validflag = false;
				}
				else
				{
					if(jQuery('#enquirer-email').val())
					{
						var email=$("#enquirer-email").val();
						if(!email_format.test(email))
						{
							$('#enquirer-email').css({'border':'1px solid #ff0000'});
							validflag = false;
						}
						else
						{
							$('#enquirer-email').css({'border':'1px solid #cccccc'});
							$("#error").hide();
							$(".mail-error").hide();
						}
					}
				}	
					
							
				//Phone 
			
				if(jQuery('#enquirer-phoneno').val().trim()=="" )
				{
					$('#enquirer-phoneno').css({'border':'1px solid #ff0000'});
					$("#error").show();
					$("#result").hide();
					validflag = false;
				}
				
				else
				{
					if(jQuery('#enquirer-phoneno').val())
					{
						var name=$("#enquirer-phoneno").val();
						if(!(name.match(/^[0-9-+]+$/)))
						{
							$('#enquirer-phoneno').css({'border':'1px solid #ff0000'});
							validflag = false;
						}
						else 
						{
							$('#enquirer-phoneno').css({'border':'1px solid #cccccc'});
							$("#error").hide();
							$(".ph-error").hide();
						}
					}
			
				}
				//recpacher
				// if($('.g-recaptcha-response').val().trim()=='')
				// {	
					
				// 	//$('.recaptcha-error').css({'border':'1px solid #ff0000'});
				// 	//$("#error").show();
				// 	$("#result").hide();
				// 	$(".g-recaptcha").addClass('recaptcha-error');
				// 	validflag = false;
				// }
				// else{
					
				// 	///$('.recaptcha-error').css({'border':'1px solid #cccccc'});
				// 	//$("#error").hide();
				// 	$(".g-recaptcha").removeClass('recaptcha-error');
				// }

				
				//Message
				if(jQuery('#enquirer-message').val().trim()== '')
				{
					$('#enquirer-message').css({'border':'1px solid #ff0000'});
					$("#error").show();
					$("#result").hide(); 
					validflag = false;
				}
				else
				{
					$('#enquirer-message').css({'border':'1px solid #cccccc'});
					$("#error").hide();
				}
				if(!validflag)
				{
					//setTimeout(function() { jQuery("#error").hide(); }, 100000000);
					return validflag;
					 
				}
				else
				{
					
					jQuery('#ajaxLoader').show();
					 sendquickMailFunc();
					setTimeout(function() { jQuery("#result").hide(); }, 100000000);
					return false;
				
				}

				
	});

});


function sendquickMailFunc()
{

	var data = $("#contact-enquiryform").serialize()+'&formcontact=submit';
	$.post('contact-us-enquiry.php', data).done(function(response) 
	{	
		
		if(response == 1) 
		{
			// $.ajax({
			// 	  url: 'https://yourwaylending.webmasterindia.net/enquiry_form_store.php',
			// 	  type: "POST",
			// 	  data:{
			// 			fname: jQuery('#name').val(),
			// 			namebusiness: jQuery('#enquirer-business-name').val(),
			// 			phone: jQuery('#phone').val(),
			// 			phoneb: jQuery('#phoneb').val(),
			// 			mail: jQuery('#mail').val(),
			// 			enquirermoneyneed: jQuery('#enquirer-money-need').val(),
			// 			enquirerbusinessgross: jQuery('#enquirer-business-gross').val(),
			// 			enquirerstartbusiness: jQuery('#enquirer-start-business').val(),
			// 			enquirerficoscore: jQuery('#enquirer-fico-score').val(),
			// 			message: jQuery('#message').val()
			// 		},
			// 	  success: function(data) {
			// 		//~ alert(data);
			// 	  }
			// });
			//~ alert(response);
			//~ alert('response1');
			$("#contact-enquiryform")[0].reset();
			var oldcolor = $("#quicksubmit").css('color');
			$("#result").css({'display':'block'});
			$("#result").addClass('success-msg');
			$("#result").text('Thank you for your message. It has been sent.' );
			//grecaptcha.reset();
			jQuery('#ajaxLoader').hide();
			$(".field").removeClass('value_focus');
                        $(".form-field").removeClass('value_focus');
			setTimeout(function(){ $("#quicksubmit").val('Submit');
			$("#quicksubmit").css('color',oldcolor);
			// $("#result").css('display','none');
			});
			jQuery('#ajaxLoader').hide();
		}
		else 
		{
			//~ alert(response);
			//~ alert('response0');
			//alert('response' );
			$("#contact-enquiryform")[0].reset();
			var oldcolor = $("#quicksubmit").css('color');
			$("#result").css({'display':'block'});
			$("#result").addClass('success-msg');
			// $("#result").text('Thank you for your message. It was sent.' );
			$("#result").text('error' );
			//grecaptcha.reset();
			jQuery('#ajaxLoader').hide();
			$(".field").removeClass('value_focus');
                        $(".form-field").removeClass('value_focus');
			setTimeout(function(){ $("#quicksubmit").val('Submit');
			$("#quicksubmit").css('color',oldcolor);
			// $("#result").css('display','none');
			});		
		}
		//$("#result").text("response");
	});
}
			
		
