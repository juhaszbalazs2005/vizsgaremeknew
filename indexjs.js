var labdak = 0;

function addball(){
    labdak = labdak + 1;
    if(labdak < 50){
        ball = document.createElement("div");
        ball.classList.add("animacio");
        document.body.appendChild(ball);
        ball.style.left = Math.floor(Math.random() * 99) + "%";
        setTimeout(addball, 300);
    }
    
}
addball();