// Следующие 2 функции организуют открытие и закрытие менюшки

var firstLine = document.getElementById("firstMenuLine");
var secondLine = document.getElementById("secondMenuLine");

var menuContainer = document.getElementById("menu");
var menuBlackout = document.querySelector('.blackout');

function showMenu(){
    if(menuBlackout.classList.length > 1){
        closeMenu();
        return;
    }
    firstLine.style.marginTop = "0px";
    firstLine.style.transform = "rotate(-45deg)";
    firstLine.style.backgroundColor = "black";
    firstLine.style.height = "4px";
    
    secondLine.style.marginTop = "0px";
    secondLine.style.transform = "rotate(45deg)";
    secondLine.style.backgroundColor = "black"
    secondLine.style.height = "4px"
    
    menuContainer.style.right = "84.3vw";
    firstLine.style.position = "fixed";
    secondLine.style.position = "fixed";
    menuBlackout.classList.add('is-visible');
    
}

function closeMenu(){
    firstLine.style.marginTop = "-10px";
    firstLine.style.transform = "rotate(0deg)";
    firstLine.style.backgroundColor = "rgb(238, 238, 238)"
    firstLine.style.height = "6px"

    secondLine.style.marginTop = "10px";
    secondLine.style.transform = "rotate(0deg)";
    secondLine.style.backgroundColor = "rgb(238, 238, 238)"
    secondLine.style.height = "6px"

    menuContainer.style.right = "100%";
    firstLine.style.position = "absolute";
    secondLine.style.position = "absolute";
    menuBlackout.classList.remove('is-visible');
}

// Позволяет добавлять продукты в корзину

function addToCart(id){
    console.log('add' +id);
    $.ajax({
        method: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=add&id='+id,
        error: function(){
            alert('gg no chance');
        }
    });
}

// Измеряет количество продуктов в корзине на данный момент

function cartLength(){
    $.ajax({
        method: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=cartLength',
        error: function(){
            alert('gg no chance');
        },
        success: function (response){
            $('#cartLength').html(response);
        }
    });
}

// Позволяет увеличить количество какого-либо продукта

function moreQty(id){
    console.log('more' +id);
    $.ajax({
        async: false,
        type: "POST",
        url: "/Shop/cartBack.php",
        dataType:"text",
        data: 'action=more&id='+id,
        error: function(){
            alert('gg no chance');
        },
        success: function (){
            showMyCart()
            cartLength()
        }
    });
}

