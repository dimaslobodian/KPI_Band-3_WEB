$(document).ready(function() {
	$('.profinfo').hide();

	//$('.containerform').style.display = 'none';
	//$('.profinfoform').style.display = 'none';
	//$('.containerform').hide();
	$('.prof').click(function() {
        $('.profinfo').show();
		//$('.containerform').show();
		//$('.profinfoform').show();
    });
	$('.closeinfobtn').click(function() {
        $('.profinfo').hide();
		//$('.containerform')[0].style.display = 'none';
		//$('.profinfoform')[0].style.display = 'none';
		//$('.containerform').hide();
    });

	//$(function () {
		form.onsubmit = async (e) => {
			e.preventDefault();
        /* $('form').on('submit', function (e) {

            e.preventDefault() */;

            $.ajax({
                type: "POST", // метод передачи данных
                url: "data.xml", // путь к xml файлу
                dataType: "xml", // тип данных
                // если получили данные из файла
                success: function(data) {
                    var email_mes="";
                    $(data).find('email').each(function(){
                        email_mes = $(this).find('message').html(); 
                    });
                    var success_mes="";
                    $(data).find('success').each(function(){
                        success_mes = $(this).find('message').html(); 
                    });
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var age = $('#result').val();
                    var quest = $('#quest').val();
					var message = $('#message').val();

                    if (/^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)===false) {
                        alert(email_mes);
                        $('#email').addClass('error');
                    }

                    else {
                        $.ajax({
                            type: 'post',
                            url: 'index.php',
                            data: $('form').serialize(),
                            data: "name="+ name +"& age="+ age +"& email="+ email,
                            success: function () {
                            alert(success_mes);
                            },
                            complete:function(){
                                    $('form').each(function(){
                                        this.reset();   //Here form fields will be cleared.
                                    });
                            }
                        });

                        $('#email').removeClass('error');

                    }           
                },
                // если произошла ошибка при получении файла
                error: function(){
                    alert('ERROR');
                }  
            });
	    };
    //});

	//$(function () {
		callback.onsubmit = async (n) => {
			n.preventDefault();
		/* $('callback').on('submit', function (n) {

			n.preventDefault(); */
		
			$.ajax({
				type: "POST", // метод передачи данных
				url: "data.xml", // путь к xml файлу
				dataType: "xml", // тип данных
				// если получили данные из файла
				success: function func(data) {
					var email_mes="";
					$(data).find('email').each(function(){
						email_mes = $(this).find('message').html(); 
					});
					var success_mes="";
					$(data).find('success1').each(function(){
						success_mes = $(this).find('message').html(); 
					});
					var email = $('#emailcall').val();
		
					if (/^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)===false) {
						alert(email_mes);
						$('#emailcall').addClass('error');
					}
		
					else {
						$.ajax({
							type: 'post',
							url: '../php/post.php',
							data: $('callback').serialize(),
							success: function() {
							alert(success_mes);
							},
							complete:function(){
								$("#callback")[0].reset();;   //Here form fields will be cleared.	
							}
						});
		
						$('#emailcall').removeClass('error');
		
					}           
				}, 
				// если произошла ошибка при получении файла
				 error: function(){
					alert('ERROR');
				}  
			}); 
		};
	//});
});

/* callback.onsubmit = async (n) => {
    n.preventDefault(); */


function showNumber()
{
	alert("+38 050 186 53 20 (WhatsApp, Viber, Telegram)");
}