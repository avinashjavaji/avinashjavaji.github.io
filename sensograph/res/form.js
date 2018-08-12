var valid = 1;
var emailRE = '^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$';
function formChange(form){
	if(form != id('form_type').value*1)
	{
		$('#form_title_'+id('form_type').value).removeClass('buttonsSelected');
		$('#form_title_'+id('form_type').value).addClass('buttons');
		$('#form_title_'+form).removeClass('buttons');
		$('#form_title_'+form).addClass('buttonsSelected');
		id('form_type').value = form;
		$('#label_3').fadeOut(100,function(){
			switch(form)
			{
				case 0:
					id('label_3').innerHTML = 'What new features you would like to see';
				break;
				case 1:
					id('label_3').innerHTML = 'Details about the bug you found';
				break;
				case 2:
					id('label_3').innerHTML = 'Anything you have to say';
				break;
			}			
			$('#label_3').fadeIn(100);
		});
	}
}

function submitForm(){
	valid = 1;
	validateThis(checkBlank,'form_body');
	validateThis(checkBlank,'user_name');
	validateThis(checkEmail,'user_email');
	if(valid){
	var form_data = $('#feedback_form').serialize();
	$('#form_div').slideUp(800,function(){
		switch(parseInt(id('form_type').value)){
			case 0:
				id('form_specific_text').innerHTML = "We hear you. Thank you for taking the time to request a feature. We are working hard to incorporate all the popular requests into our future updates.";
			break;
			case 1:
				id('form_specific_text').innerHTML = "Oops, sorry about the bug you've reported. Thank you for taking the time to help us out. We will look into the bug as soon as we can and get back to you. If it's a common bug that we've noticed but are yet to fix, we might have posted a temporary solution on the <a style='color:#278BB0' onclick='navigate(3)'>Questions</a> section. Do take a look.";
			break;
			case 2:
				id('form_specific_text').innerHTML = "We love feedback. It's what keeps us going and helps us iron out issues. So thank you. We will try to get back to you as soon as possible. Meanwhile you might want to check out the <a style='color:#278BB0' onclick='navigate(3)'>Questions</a> section to see if a similar question has been answered there.";
			break;
		}
		id('continue_button').innerHTML = "submitting form ...";
		$('#continue_button').addClass('hyperlink');
		$('#continue_button').removeClass('continue_botton');
		$('#form_submitted_div').slideDown(800);
		$.get('feedback_form.php?'+form_data,function(data){
			$('#continue_button').fadeOut(300,function(){
				id('continue_button').innerHTML = "continue";
				$('#continue_button').attr('style','');
				$('#continue_button').addClass('continue_botton');
				$('#continue_button').fadeIn(300);
			});
		});
	});
	}
}

function finishSubmitForm(){
	resetForm();
	$('#form_submitted_div').slideUp(800,function(){
		$('#form_div').slideDown(800);
	});
}

function checkEmail(field,real){
	if(field.value.match(emailRE)&&(field.className == 'textalert')){
		$('#'+field.id+'s').fadeOut(400);
		field.className = 'text';
	}
	else if((field.value.replace(/^\s+|\s+$/, '').length == 0)&&(real==0))
		showS(field.id,"This can't be left blank.");
	else if(!field.value.match(emailRE)&&(real==0)) //if there is an error and it's not checking realtime
		showS(field.id,'Please enter a valid email address.');
}

function checkBlank(field,real){
	if((field.value.replace(/^\s+|\s+$/, '').length != 0)&&(field.className == 'textalert')){ //if not blank and showing error currently
		$('#'+field.id+'s').fadeOut(400);
		field.className = 'text';
	}
	else if((field.value.replace(/^\s+|\s+$/, '').length == 0)&&(real==0)) //if blank and it's not checking realtime
		showS(field.id,"This can't be left blank.");
}

function showS(idd,msg){
	id(idd+'s').style.color = '#FF3300';
	id(idd+'s').innerHTML = '<br />'+msg;
	id(idd).className = 'textalert';
	$('#'+idd+'s').fadeIn('slow');
}

function validateThis(fn,idstr){
	if(id(idstr).className=='textalert')
		valid=0;
	else{
		fn(id(idstr),0);
		if(id(idstr).className=='textalert')
			valid=0;
	}
}

function resetForm(){	
	id('feedback_form').reset();
	$(".fieldstatus").css('display','none');
	$(".textalert").removeClass('textalert').addClass('text');
}