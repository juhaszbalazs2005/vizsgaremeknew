<?php


    if(isset($_COOKIE["error"])){
        if($_COOKIE["error"][0] != "!"){
            if(isset($_COOKIE["error"])){
                print("<div id=\"error\" onclick=\"hideerror()\"><center><h1>".$_COOKIE["error"]."</h1></center></div>");
                setcookie("error", "asd", time() - 3600, "/");
            }
            print("
            
            <style>
            
            #error{
                background-color: rgba(255, 0, 0, 0.514);
                color: black;
                border-radius: 8px;
                width: 30%;
                cursor: pointer;
                animation: errorpopup 10s linear 0s 1 forwards;
                position: absolute;
                top: 0%;
                left: 35%;
                height: fit-content;
                z-index: 9999;
            }
            
            #error h1{
                color: black;
                opacity: 1;
                text-align: center;
                z-index: 9999;
                font-size: 32px;
            }
            
            @keyframes errorpopup {
                0%{opacity: 0.0; top: 0%}
                5%{opacity: 0.8; top: 25%}
                75%{opacity: 0.8;}
                100%{opacity: 0.0; display: none;}
            }
    
            </style>
    
            <script>
                function hideerror(){
                    document.getElementById(\"error\").style.display = \"none\";
                }
            </script>
            
            ");
    
            
        }
        else{
            if(isset($_COOKIE["error"])){
                print("<div id=\"error\" onclick=\"hideerror()\"><center><h1>".ltrim($_COOKIE["error"], $_COOKIE["error"][0])."</h1></center></div>");
                setcookie("error", "asd", time() - 3600, "/");
            }

            print("
            
            <style>
            
            #error{
                background-color: rgba(0, 255, 0, 0.514);
                color: black;
                border-radius: 8px;
                width: 30%;
                cursor: pointer;
                animation: errorpopup 10s linear 0s 1 forwards;
                position: absolute;
                top: 0%;
                left: 35%;
                height: fit-content;
                z-index: 9999;
            }
            
            #error h1{
                color: black;
                opacity: 1;
                text-align: center;
                font-size: 32px;
                z-index: 9999;
            }
            
            @keyframes errorpopup {
                0%{opacity: 0.0; top: 0%}
                5%{opacity: 0.8; top: 25%}
                75%{opacity: 0.8;}
                100%{opacity: 0.0; display: none;}
            }
    
            </style>
    
            <script>
                function hideerror(){
                    document.getElementById(\"error\").style.display = \"none\";
                }
            </script>
            
            ");
    
            
        }
    }
    

    
?>