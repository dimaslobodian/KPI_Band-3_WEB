/* $(document).ready(function(){ 
    $.ajax({type: "GET", url: "data.xml", dataType: "xml",
        success: function(xml) { 
            $(xml).find('name').each(function(){
                document.writeln($(this).attr("id")) 
                $(this).find().each(function(){ 
                    document.writeln($(this).text())})
            })
            $(xml).find('email').each(function(){
                document.writeln($(this).attr("id")) 
                $(this).find().each(function(){ 
                    document.writeln($(this).text())})
            })
            $(xml).find('password').each(function(){
                document.writeln($(this).attr("id")) 
                $(this).find('length').each(function(){ 
                    document.writeln($(this).text())}) 
            })
        } 
    }) 
})  */

$(document).ready(function(){ 
    const form = document.getElementById('form');
    //ajaxGetXML();
    ipLookUp();

    $(function () {

        $('form').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
                type: "POST", // метод передачи данных
                url: "data.xml", // путь к xml файлу
                dataType: "xml", // тип данных
                // если получили данные из файла
                success: function(data) {
                    var html = "";
                    var phone_lenght;
                    var phone_mes="";
                    // перебираем все теги 
                    $(data).find('phone').each(function(){
                        phone_lenght = $(this).find('length').html();
                        phone_mes = $(this).find('message').html(); 
                    });
                    var email_mes="";
                    $(data).find('email').each(function(){
                        email_mes = $(this).find('message').html(); 
                    });
                    var psw_mes1="";
                    var psw_mes2="";
                    var psw_mes3="";
                    var psw_mes4="";
                    var psw_mes5=""; 
                    $(data).find('psw').each(function(){
                        psw_mes1 = $(this).find('message1').html();
                        psw_mes2 = $(this).find('message2').html();
                        psw_mes3 = $(this).find('message3').html();
                        psw_mes4 = $(this).find('message4').html();
                        psw_mes5 = $(this).find('message5').html();
                    });
                    var psw_repeat_mes="";
                    $(data).find('psw_repeat').each(function(){
                        psw_repeat_mes = $(this).find('message').html(); 
                    });
                    var success_mes="";
                    $(data).find('success').each(function(){
                        success_mes = $(this).find('message').html(); 
                    });
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var psw = $('#psw').val();
                    var psw_repeat = $('#psw-repeat').val();
                    var country = $('#country').val();
                    var city = $('#city').val();

                    if ( name == "" ) {
                        /*var data = 'user='+name;
                        $.ajax({
                            type: "POST",
                            url: "selectuser.php",
                            data: data,
                            beforeSend: function(html) { // перед отправкой
                                $("#results").html('asdasdas');
                            },
                            success: function(html){ // получаем результаты
                                $("#results").html('asdasdasd');
                                $("#results").show();
                                $("#results").append(html);
                                console.log(html)
                                //var email_mes= $(html).html(); // получаем значение тега first_name  
                                //alert(html);
                            }
                
                        });*/
                        /* alert('Please provide valid name');
                        $('#name').addClass('error'); */
                    }

                    else if(/^\d+$/.test(phone) === false || phone.length!=phone_lenght){ //not number
                        alert(phone_mes);
                        $('#phone').addClass('error');
                        $('#name').removeClass('error');
                    }

                    else if (/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)===false) {
                        alert(email_mes);
                        $('#email').addClass('error');
                        $('#phone').removeClass('error');
                    }
                    
                    else if( psw.length < 8 ) {
                        error = psw_mes1;
                        alert(psw_mes1);
                        $('#psw').addClass('error');
                        $('#email').removeClass('error');
                    }
                                
                    else if( psw.length > 20 ) {
                        error = psw_mes2;
                        alert(psw_mes2);
                        $('#psw').addClass('error');
                        $('#email').removeClass('error');
                    }                
                                
                    else if( /\d/.test(psw)  === false) {
                        error = psw_mes3;
                        alert(psw_mes3);
                        $('#psw').addClass('error');
                        $('#email').removeClass('error');                
                    }
                                
                    else if( /^.*[a-z]+.*$/.test(psw)  === false) {
                        error = psw_mes4;
                        alert(psw_mes4);
                        $('#psw').addClass('error');
                        $('#email').removeClass('error');
                    }
                                
                    else if( /^.*[A-Z]+.*$/.test(psw)  === false) {
                        error = psw_mes5;
                        alert(psw_mes5);
                        $('#psw').addClass('error');
                        $('#email').removeClass('error');
                    }

                    else if ( psw_repeat != psw ) {
                        alert(psw_repeat_mes);
                        $('#psw-repeat').addClass('error');
                        $('#psw').removeClass('error');
                    }

                    else {
                        $.ajax({
                            type: 'post',
                            url: 'index.php',
                            data: $('form').serialize(),
                            data: "name="+ name +"& phone="+ phone +"& email="+ email,
                            success: function () {
                            alert(success_mes);
                            //-------------------- add xml --------------------------
                            /* var xhr;  
                            if (window.XMLHttpRequest) 
                            {
                                xhr = new XMLHttpRequest();  
                            } 
                            else if (window.ActiveXObject) 
                            { 
                                xhr = new ActiveXObject("Microsoft.XMLHTTP");  
                            }
                            var xmlString = "<users>" + 
                                "<name>"  + escape(name) + "</name>" + 
                                "</users>";
                            var url = "teams.php";
                            xhr.open("POST", url, true);
                            xhr.setRequestHeader("Content-Type", "text/xml");
                            xhr.onreadystatechange = confirmUpdate;
                            xhr.send(xmlString); */
                            },
                            complete:function(){
                                    $('form').each(function(){
                                        this.reset();   //Here form fields will be cleared.
                                    });
                            }
                        });

                        $('#psw-repeat').removeClass('error');

                    }           
                    //$('#content_div').html(html); // выводим данные
                },
                // если произошла ошибка при получении файла
                error: function(){
                    alert('ERROR');
                }  
            });

            /* var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var psw = $('#psw').val();
            var psw_repeat = $('#psw-repeat').val();
            var country = $('#country').val();
            var city = $('#city').val();

            if ( name == "" ) {
                alert('Please provide valid name');
                $('#name').addClass('error');
            }

            else if(/^\d+$/.test(phone) === false || phone.length!=12){ //not number
                alert(phone_mes);
                $('#phone').addClass('error');
                $('#name').removeClass('error');
            }

            else if (/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)===false) {
                alert('Please provide a valid email');
                $('#email').addClass('error');
                $('#phone').removeClass('error');
            }

            else if (psw!=""){
                let message=checkPassword(psw);
                if (message!=""){
                    alert(message);
                    $('#psw').addClass('error');
                    $('#email').removeClass('error');
                }
            }

            else if ( psw_repeat != psw ) {
                alert('Passwords are not same');
                $('#psw-repeat').addClass('error');
                $('#psw').removeClass('error');
            }

            else {
                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: $('form').serialize(),
                    data: "name="+ name +"& phone="+ phone +"& email="+ email,
                    success: function () {
                      alert('Registration was successfull!');
                    },
                    complete:function(){
                            $('form').each(function(){
                                this.reset();   //Here form fields will be cleared.
                            });
                       }
                  });

                $('#psw-repeat').removeClass('error');

            } */

        });
    });

    /* function checkPassword(pwd, mes1, mes2, mes3, mes4, mes5) {
            let error="";
            if( pwd.length < 8 ) {
            error = mes1;
            }
                
            else if( pwd.length > 20 ) {
            error = mes2;
            }                
                
            else if( /\d/.test(pwd)  === false) {
            error = mes3;                
            }
                
            else if( /^.*[a-z]+.*$/.test(pwd)  === false) {
            error = mes4;
            }
                
            else if( /^.*[A-Z]+.*$/.test(pwd)  === false) {
            error = mes5;
            }
            return error;
    }    */                
});

function ipLookUp () {
    $.ajax('http://ip-api.com/json')
    .then(
        function success(response) {
            /*console.log('User\'s Location Data is ', response);
            console.log('User\'s Country', response.country);*/
            $( function() {
                var availableTags = [
                    response.country
                ];
                $( "#country" ).autocomplete({
                  source: availableTags
                });
              });
    
            $( function() {
                var availableTags = [
                    response.city
                ];
                $( "#city" ).autocomplete({
                  source: availableTags
                });
            });
        },
  
        function fail(data, status) {
            console.log('Request failed.  Returned status of',
                        status);
        }
    );
  }

//function ajaxGetXML(){
    /* $.ajax({
        type: "POST", // метод передачи данных
        url: "data.xml", // путь к xml файлу
        dataType: "xml", // тип данных
        // если получили данные из файла
        success: function(data) {
            var html = "";
            var phone_lenght="";
            var phone_mes="";
            // перебираем все теги person
            $(data).find('phone').each(function(){
                phone_lenght = $(this).find('length').html(); // получаем значение атрибута id_user
                phone_mes = $(this).find('message').html(); // получаем значение тега first_name  
            });
            var email_mes="";
            $(data).find('email').each(function(){
                email_mes = $(this).find('message').html(); // получаем значение тега first_name  
            });
            var psw_mes1="";
            var psw_mes2="";
            var psw_mes3="";
            var psw_mes4="";
            var psw_mes5="";
            $(data).find('psw').each(function(){
                psw_mes1 = $(this).find('message1').html();
                psw_mes2 = $(this).find('message2').html();
                psw_mes3 = $(this).find('message3').html();
                psw_mes4 = $(this).find('message4').html();
                psw_mes5 = $(this).find('message5').html();
            });
            var psw_repeat_mes="";
            $(data).find('psw_repeat').each(function(){
                psw_repeat_mes = $(this).find('message').html(); // получаем значение тега first_name  
            });
            var success_mes="";
            $(data).find('success').each(function(){
                success_mes = $(this).find('message').html(); // получаем значение тега first_name  
            });           
            //$('#content_div').html(html); // выводим данные
        },
        // если произошла ошибка при получении файла
        error: function(){
            alert('ERROR');
        }
         
    }); */
//}

