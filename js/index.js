// Функция проверяет, окно фильтров в данный момент открыто или закрыто 

function sortGetId(id){
    $.ajax({
        async: false,
        type: "POST",
        url: "/Shop/index.php",
        dataType:"text",
        data: 'value='+id,
        error: function(){
            alert('gg no chance');
        },
    });
}

// Следующие 2 функции организуют открытие и закрытие окна фильтров

var firstArrowLine = document.getElementById("firstArrowLine");
var secondArrowLine = document.getElementById("secondArrowLine");
var arrowContainer = document.getElementById("arrowContainer");
var FilterArrow = document.getElementById("FilterArrow"); 

var categoriesContainer = document.getElementById("productCategories");
var randomLetter = 0;

function showCategories(){
    if(randomLetter == 1){
        categoriesContainer.style.transition = '.4s';
        firstArrowLine.style.transition = '.3s';
        secondArrowLine.style.transition = '.3s';
        closeCategories();
        sortGetId(randomLetter);
        return;
    }
    if(randomLetter < 0){
        firstArrowLine.style.transition = 'none';
        secondArrowLine.style.transition = 'none';
        categoriesContainer.style.transition = 'none';
    }
    FilterArrow.style.left = "85vw";

    firstArrowLine.style.transform = "rotate(45deg)";
    firstArrowLine.style.backgroundColor = "black"
    firstArrowLine.style.height = "4px";
    
    secondArrowLine.style.transform = "rotate(-45deg)";
    secondArrowLine.style.backgroundColor = "black"
    secondArrowLine.style.height = "4px";
    
    firstArrowLine.style.position = "fixed";
    secondArrowLine.style.position = "fixed";
    arrowContainer.style.position = "fixed";

    categoriesContainer.style.left = "84.2vw";
    firstArrowLine.style.left = "85vw";
    secondArrowLine.style.left = "85vw";
    arrowContainer.style.left = "85vw";

    firstArrowLine.style.top = "9vh";
    secondArrowLine.style.top = "9vh";
    arrowContainer.style.top = "9vh";
    if(randomLetter < 0){
        randomLetter++;
    } else if(randomLetter > -1){
        randomLetter++;
        sortGetId(randomLetter);
    }
}

function closeCategories(){
    FilterArrow.style.left = "80.5vw";

    firstArrowLine.style.transform = "rotate(-45deg)";
    firstArrowLine.style.backgroundColor = "rgb(238, 238, 238)"
    firstArrowLine.style.height = "6px"

    secondArrowLine.style.transform = "rotate(45deg)";
    secondArrowLine.style.backgroundColor = "rgb(238, 238, 238)"
    secondArrowLine.style.height = "6px"

    firstArrowLine.style.position = "absolute";
    secondArrowLine.style.position = "absolute";
    arrowContainer.style.position = "absolute";

    categoriesContainer.style.left = "100%";
    firstArrowLine.style.left = "78vw";
    secondArrowLine.style.left = "78vw";
    arrowContainer.style.left = "78vw";

    firstArrowLine.style.top = "19vh";
    secondArrowLine.style.top = "19vh";
    arrowContainer.style.top = "19vh";
    randomLetter--;
}

// Создает слайдер благодоря плагину nouislider.js

const slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [1, 100],
    connect: true,
    step: 1,
    range: {
        'min': 1,
        'max': 100
    }
});

// Если двигать слайдер - цифры в поллях ввода меняются на соответствующие

const input0 = document.getElementById('searchInput1');
const input1 = document.getElementById('searchInput2');
const inputs = [input0, input1];

slider.noUiSlider.on('update', function(values, handle){
    inputs[handle].value = Math.round(values[handle]);
});

// Если менять цифры в полях для ввода - слайдер сдвигается соответствующе

const setRangeSlider = (i, value) => {
    let arr = [null, null];
    arr[i] = value;
    slider.noUiSlider.set(arr);
};

inputs.forEach((el, index) => {
    el.addEventListener('change', (e) => {
        setRangeSlider(index, e.currentTarget.value);
    });
});

// Прячет возможность сортировки, если на страничке отображено 0 продуктов

var sortByOption = document.getElementById("sortByOption");

function hideSort(n){
    var sortByOption = document.getElementById("sortByOption");
    if(n == 1){
        sortByOption.style.display = "none";
        return;
    }
    sortByOption.style.display = "unset";
}
