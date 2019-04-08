$(document).ready(function(){
    localStorage.setItem("attr,", "hide");
    $("#switch").change(function(){
        if($(this).is(":checked")){
            localStorage.setItem("attr","show");
        }
        else{
            localStorage.setItem("attr","hide");
        }
    })
});