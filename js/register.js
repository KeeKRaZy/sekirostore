// Организует работу кнопки "Show Password"

var parole = document.getElementById('parole');
var passconfirm = document.getElementById('confirm');

function ShowAllPasswords() {
    if (parole.getAttribute('type')=='password') {
        parole.type='text'
        if(typeof passconfirm !== 'undefined'){
            passconfirm.type='text'
        }
    } else {
        parole.type='password'
        if(typeof passconfirm !== 'undefined'){
            passconfirm.type='password'};
        }
}

// Проверяет одинаковые ли пароли в полях Password и Confirm Password

var errorMessage = document.getElementById('errorMessage');

function validationCheck(){
    
    if(parole.value == passconfirm.value){
        errorMessage.innerHTML = "";
        return true;
    }
    errorMessage.innerHTML = "Passwords do not much";
    return false;
};

// Функция сообщает, если пользователя с введеными логином еще не существует, или просто не правильно введен пароль 

var Message = document.getElementById('Message');

function dbError() {
    Message.innerHTML = "Login or Pass is Wrong";
}