
moveleft = false;
moveright = false;
document.onkeydown = function(e){
    if(e.key == "ArrowLeft"){
        moveleft = true;
        moveright = false;
    }
    if(e.key == "ArrowRight"){
        moveright = true;
        moveleft = false;
    }
}
document.onkeyup = function(e){
    if(e.key == "ArrowLeft"){
        moveleft = false;
        moveright = false;
    }
    if(e.key == "ArrowRight"){
        moveright = false;
        moveleft = false;
    }
}
window.onload = function(){
    velright = 0;
    dobozok = document.querySelectorAll(".like");
    dobozok2 = document.querySelectorAll(".like2");
    document.querySelector(".circle").style.left = "500px";
    document.querySelector(".circle").style.bottom = "55px";
    
    shadowbottom = 75;
    shadowleft = 75;
    skip = false
    const interval = setInterval(function() {   
        terect = document.querySelector(".circle").getBoundingClientRect();
        if(moveleft){
            if(velright < 10){
                velright = velright+0.5;
            }
        }
        else if(moveright){
            if(velright > -10){
                velright = velright-0.5;
            }
        }
        for(i = 0; i < dobozok.length; i++){
            
            rect = dobozok[i].getBoundingClientRect();
            
            horizontalTouch = terect.right >= rect.left && terect.left <= rect.right; 
            
            verticalTouch = terect.bottom >= rect.top && terect.top <= rect.bottom; 
            
            if (horizontalTouch && verticalTouch) { 
                skip = true;
                if(document.getElementById("liked").checked){
                    document.getElementById("liked").checked = false;
                    document.querySelector(".like").children[1].children[0].classList.add("liked");
                    document.getElementById("liked2").checked = false;
                    document.querySelector(".like2").children[1].children[0].classList.add("liked2");
                }else{
                    document.getElementById("liked").checked = true;
                    document.querySelector(".like").children[1].children[0].classList.remove("liked");
                    document.getElementById("liked2").checked = true;
                    document.querySelector(".like2").children[1].children[0].classList.remove("liked2");
                }
                
                if(toString(velright).charAt(0) == '-'){
                    velright = `${velright}`.replace('-', '').parseInt();
                    velright = velright + 1;
                }else{
                    velright = (velright - (velright*2)) - 1;
                }
            }
        }
        if(!skip){
            for(i = 0; i < dobozok2.length; i++){
                                    
                rect = dobozok2[i].getBoundingClientRect();
                horizontalTouch = terect.right >= rect.left && terect.left <= rect.right; 
                verticalTouch = terect.bottom >= rect.top && terect.top <= rect.bottom; 
                if (horizontalTouch && verticalTouch) { 
                    if(document.getElementById("liked2").checked){
                        document.getElementById("liked2").checked = false;
                        document.querySelector(".like2").children[1].children[0].classList.add("liked2");
                        document.getElementById("liked").checked = false;
                        document.querySelector(".like").children[1].children[0].classList.add("liked");
                    }else{
                        document.getElementById("liked2").checked = true;
                        document.querySelector(".like2").children[1].children[0].classList.remove("liked2");
                        document.getElementById("liked").checked = true;
                        document.querySelector(".like").children[1].children[0].classList.remove("liked");
                    }
                    
                    if(toString(velright).charAt(0) == '-'){
                        velright = `${velright}`.replace('-', '').parseInt();
                        velright = velright + 1;
                    }else{
                        velright = (velright - (velright*2)) - 1;
                    }
                }
            }
        }
        
        skip = false;
        
        if(Math.floor(velright) < 0){
            velright = velright+0.1;
            document.querySelector(".circle").style.left = (parseInt(document.getElementById("golyod").style.left) - velright) + "px";
            if(shadowleft + 5 > 100){
                shadowleft = 0;
            }else{
                shadowleft = shadowleft + 5;
            }
        }
        else if(Math.ceil(velright) > 0){
            velright = velright-0.1;
            document.querySelector(".circle").style.left = (parseInt(document.getElementById("golyod").style.left) - velright) + "px";
            if(shadowleft - 5 < 0){
                shadowleft = 100;
            }else{
                shadowleft = shadowleft - 5;
            }
        }
        
        document.querySelector(".circle").style.background = `radial-gradient(circle at ${shadowleft}px ${shadowbottom}px, #e4cce6, #d2bcd4)`;
        
        if(parseInt(document.querySelector(".circle").style.left) > 1920){
            document.querySelector(".circle").style.left = "-50px";
        }
        if(parseInt(document.querySelector(".circle").style.left) < -60){
            document.querySelector(".circle").style.left = "1920px";
        }
    }, 10);   
}