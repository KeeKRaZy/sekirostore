// Позволяет показывать заранее записанные ответы, если нажать на вопрос в faq.html

const otvet7 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget enim vitae turpis lacinia accumsan. In hac habitasse platea dictumst.";
const otvet1 = `Pellentesque egestas tincidunt dolor, non sagittis urna blandit posuere. Duis vitae scelerisque ligula, scelerisque rutrum mauris. Donec suscipit ex ac urna ornare, eget pharetra elit ultrices. Ut venenatis ipsum in eleifend tempor.`;
const otvet2 = "Nulla fermentum quis risus eu suscipit. Nam commodo tempus purus, eu venenatis felis iaculis nec. Quisque consectetur at felis sed faucibus. Nam laoreet eget ex eget vehicula. Nulla facilisi. Nam tincidunt, nisl in malesuada mattis, diam mi ultrices nisl, et ultricies ex leo non augue.";
const otvet3 = `Fusce et odio eget mi volutpat vulputate porttitor vitae justo. In at dignissim felis, sit amet convallis augue. Etiam sodales urna non neque pretium gravida. Fusce et odio eget mi volutpat vulputate porttitor vitae justo. In at dignissim felis, sit amet convallis augue. Etiam sodales urna non neque pretium gravida.`;
const otvet4 = `Aenean volutpat purus lacus, vel feugiat dolor commodo id. Nam eget orci arcu. Morbi et tincidunt eros. Nam in aliquet libero. Etiam varius posuere mi, quis dictum ex.`;
const otvet5 = "Duis ipsum neque, ullamcorper varius dolor a, sollicitudin semper quam. Proin lacus leo, eleifend ac aliquam a, ultrices vel magna. Donec lorem diam, facilisis eu aliquam nec, consequat pharetra sem.";

var faq7 = document.getElementById('polosa7');
var faq1 = document.getElementById('polosa1');
var faq2 = document.getElementById('polosa2');
var faq3 = document.getElementById('polosa3');
var faq4 = document.getElementById('polosa4');
var faq5 = document.getElementById('polosa5');
var faq6 = document.getElementById('polosa6');

function Pokaz(x, y) {
    switch(x){
        case 1:
            if (window["faq"+y].getAttribute('id')=='polosa'+y){
                window["faq"+y].id='poloska'+y
                var otvetka = document.createElement("h5");
                otvetka.innerText = eval("otvet"+y); 
                setTimeout(function(){document.getElementById("poloska"+y).appendChild(otvetka);},200);
            } else {
                document.getElementById("poloska"+y).removeChild(document.getElementById("poloska"+y).lastChild);
                window["faq"+y].id='polosa'+y
            };
            break;
        case 0:
            if (faq6.getAttribute('id')=='polosa6'){
                faq6.id='poloska6'
                var otvetka = document.createElement("iframe");
                const videowidth = document.createAttribute("width");
                videowidth.value = "700";
                const videoheight = document.createAttribute("height");
                videoheight.value = "394";
                const videolink = document.createAttribute("src");
                videolink.value = "https://www.youtube.com/embed/SpSlwI1HckM";
                otvetka.setAttributeNode(videowidth);
                otvetka.setAttributeNode(videoheight);
                otvetka.setAttributeNode(videolink);
                setTimeout(function(){document.getElementById("poloska6").appendChild(otvetka);},200);
            } else {
                document.getElementById("poloska6").removeChild(document.getElementById("poloska6").lastChild);
                faq6.id='polosa6'
            };
            break;
    }
} 