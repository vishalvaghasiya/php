function login( login , password){
    const email = $('#'+login).val();
    const _password = $('#'+password).val();

    /**
     * Validate the email and password for
     * null values
     * invalid values
     * password length
     * escape sequence and speciall character detection and removal*/

    /**
     * if(valid){
     *     request
     * }else{
     *     notify user about the error
     * }*/

    $.ajax({
        type : "POST",
        url : "./controller/ajax/login-controller.php",
        data: "email="+email+"&password="+_password,
        success : function(data){
            const response = JSON.parse(data);
            if(response.status == true){
                $('#alert-box').addClass('alert-success').removeClass('hidden').fadeIn().fadeOut(50000);
                    $('#message-box').html(response.res);

                    setTimeout(function () {
                        window.location.reload(1);
                    }, 5000);

                // location.reload();
                // location.href = "./index.php";
                // window.location.href ="./index.php";
            }else{
                $('#alert-box').addClass('alert-danger').removeClass('hidden').fadeIn().fadeOut(5000);
                $('#message-box').html(response.res);
            }
            // window.location.reload();
        },
        error(e){
            console.log(e.message);
        }
    });
}

function register( name , email , password , confPassword){
    const _name = $('#'+name).val();
    const _email = $('#'+email).val();
    const _password = $('#'+password).val();
    const _confpassword = $('#'+confPassword).val();


    $.ajax({
        type : "POST",
        url : "./controller/ajax/register-controller.php",
        data: "name="+_name+"&email="+_email+"&password="+_password+"&conf_password="+_confpassword,
        success : function(data){
                $('#alert-box').removeClass('hidden').fadeIn().fadeOut(5000);
            $('#message-box').html(data);
            // window.location.reload();
        },
        error(e){
            console.log(e.message);
        }
    });
}

function logout(){
    window.location = './controller/logout-controller.php';
}


function loadResetPasswordLink( emailElement ){
    const email = $('#'+emailElement).val();
    if(!(email.toString()) == ''){
        $('#forget-email').val(email);
        console.log(email);
    }
}

function resetPasswordRequest( forgetEmail ){
    const email = $('#'+forgetEmail).val();
    /* validation */
    $.ajax({
        type : 'post',
        url : './controller/ajax/forget-password-controller.php',
        data : 'email='+email,
        success : function(data){
            let jsonData = JSON.parse(data);
            if(jsonData.status = true){
                $('#alert-box').addClass('alert-success').removeClass('hidden').fadeIn().fadeOut(5000);
                $('#message-box').html(data.res);
                $('#Code-Field-Hidden').removeClass('hidden').fadeIn();
                $('#Submit-Code-Btn').removeClass('hidden').fadeIn();

            }else{
                $('#alert-box').addClass('alert-warning').removeClass('hidden').fadeIn().fadeOut(5000);
                $('#message-box').html(data.res);
            }
        },
        error : function(e){
            $('#alert-box').addClass('alert-danger').removeClass('hidden').fadeIn().fadeOut(5000);
            $('#message-box').html('Request Error found in Middleware');
        }
    });
}

function matchResetCode( codeElement , emailElement ){
    const email = $('#'+forgetEmail).val();
    const code = $('#'+codeElement).val();
}

