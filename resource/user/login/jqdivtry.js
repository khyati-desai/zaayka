$(document).ready(function(){
    $("#flipToMain2").click(function(){
        $("#main1").css("-webkit-animation-name","showSignUp"); 
        $("#main1").css("transform","translate(-50%,-50%) rotateY(180deg)");
        
        $("#main2").css("-webkit-animation-name","hideSignIn"); 
        $("#main2").css("transform","translate(-50%,-50%) rotateY(0deg)");
    });
    
    
    $("#flipToMain1").click(function(){
        $("#main1").css("-webkit-animation-name","hideSignUp"); 
        $("#main1").css("transform","translate(-50%,-50%) rotateY(0deg)");
        
        $("#main2").css("-webkit-animation-name","showSignIn"); 
        $("#main2").css("transform","translate(-50%,-50%) rotateY(180deg)");
    });
});







