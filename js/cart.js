// Загружает корзину из cartBack в cart.php

function showMyCart(){
    console.log('show');
    $.ajax({
        method: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=show',
        error: function(){
            alert('gg no chance');
        },
        success: function (response){
            $('#shoppingCart').html(response);
        }
    });
}

// Позволяет удалять объекты из корзины с помощью крестика 

function deleteFromCart(id){
    console.log('del' +id);
    $.ajax({
        async: false,
        type: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=del&id='+id,
        error: function(){
            alert('gg no chance');
        },
        success: function (response){
            showMyCart()
            cartLength()
            console.log(response);
        }
    });
}

// Позволяет уменьшить количество какого-либо продукта

function lessQty(id){
    console.log('less' +id);
    $.ajax({
        async: false,
        type: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=less&id='+id,
        error: function(){
            alert('gg no chance');
        },
        success: function (response){
            showMyCart()
            cartLength()
            if (response != ''){
                deleteFromCart(parseInt(response))
            }
        }
    });
}

// При выборе оплаты прячет или показывает поля ввода для банковской карты

var cardPayContainer = document.getElementById('cardPayContainer');
var checkoutDividingLine = document.getElementById('footer');

function showCardPay(n){
    if (n === 'yes'){
        cardPayContainer.innerHTML = `
        <li>Cardholder's name</li>
        <input id="cardHoldersName" class="longInput" type="text" minlength="5" name="cardName" required placeholder="Enter cardholder's name">
        <li>Card number (no spaces or dashes)</li>
        <input id="cardNumber" class="longInput" type="text" pattern="[0-9]+" minlength="16" maxlength="16" name="cardNumber" required placeholder="Enter card number">
        <div id="cardType">
            <label><input checked type="radio" name="cardType" value="visa"/>Visa</label>
            <label><input type="radio" name="cardType" value="masterCard"/>Master Card</label>
        </div>
        <ul id="doubleLi"><li>Expiry date</li><li>CCV</li></ul>
        <div class="cardDetails"> 
            <input type="text" pattern="[0-9]+" id="firstShortInput" name="month" minlength="2" maxlength="2" required placeholder="MM">
            /<input type="text" pattern="[0-9]+" id="secondShort" name="year" minlength="2" maxlength="2" required placeholder="YY">
            <input type="password" pattern="[0-9]+" id="thirdShortInput" name="ccv" minlength="3" maxlength="3" required placeholder="CCV">
        </div>`;
        checkoutDividingLine.innerHTML = `<div id="dividingLine"></div>`;}
        window.scrollTo(0, document.body.scrollHeight);
    if (n === 'no'){
        window.scrollTo(0, 0);
        setTimeout(function(){
            cardPayContainer.innerHTML = ``;
            checkoutDividingLine.innerHTML = ``;
        }, 300);}
}