document.querySelector(".circle").addEventListener("click", function(){
    for (let i = 0; i <= 3; i++) {
      document
        .getElementsByClassName("nav-items")
        [i].classList.remove("show-menu");
      document
        .getElementsByClassName("box-line")
        [i].classList.remove("box-line-show");
    }
    document.querySelector(".box").classList.remove("box-show");
    document.querySelector(".add").classList.toggle("go");
    document.querySelector(".search").classList.toggle("search-focus");
    document.querySelector(".search").focus();
    document.querySelector(".circle").classList.toggle("color");
    document.querySelector(".line1").classList.toggle("move");
    document.querySelector(".line2").classList.toggle("mov");
    document.querySelector(".effect").classList.toggle("big");
  });
  /* menu */
  document.querySelector(".menu").addEventListener("click", () => {
    for (let i = 0; i <= 3; i++) {
      document.querySelector(".box").classList.remove("box-show");
      document
        .getElementsByClassName("nav-items")
        [i].classList.toggle("show-menu");
      document
        .getElementsByClassName("box-line")
        [i].classList.remove("box-line-show");
    }
  });
  /* box */
  document.querySelector(".gallery").addEventListener("click", () => {
    document.querySelector(".box").classList.toggle("box-show");
    for (let i = 0; i <= 3; i++) {
      document
        .getElementsByClassName("box-line")
        [i].classList.toggle("box-line-show");
      document
        .getElementsByClassName("nav-items")
        [i].classList.remove("show-menu");
    }
  });

function showSettings(){
  if(document.getElementById("Kartya_Settings").style.display != "block"){
    document.getElementById("Kartya_Settings").style.display = "block";
    document.getElementById("Kartya_Settings").style.animation = "showSettings 0.3s linear 1";
  }else{
    setTimeout(function(){document.getElementById("Kartya_Settings").style.display = "None"}, 300)
    document.getElementById("Kartya_Settings").style.animation = "hideSettings 0.3s linear 1";
  }
}

function showForYouSettings(){
  if(document.getElementById("ForYou_Settings").style.display != "block"){
    document.getElementById("ForYou_Settings").style.display = "block";
    document.getElementById("ForYou_Settings").style.animation = "showSettings 0.3s linear 1";
  }else{
    setTimeout(function(){document.getElementById("ForYou_Settings").style.display = "None"}, 300)
    document.getElementById("ForYou_Settings").style.animation = "hideSettings 0.3s linear 1";
  }
}
function showProfilSettings(){
  if(document.getElementById("Profil_Settings").style.display != "block"){
    document.getElementById("Profil_Settings").style.display = "block";
    document.getElementById("Profil_Settings").style.animation = "showSettings 0.3s linear 1";
  }else{
    setTimeout(function(){document.getElementById("Profil_Settings").style.display = "None"}, 300)
    document.getElementById("Profil_Settings").style.animation = "hideSettings 0.3s linear 1";
  }
}










