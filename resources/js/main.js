window.addEventListener("load", function () {

    // Temporizador de los mensajes alerts
    const alert = document.getElementById('alert');
    if(alert){
        alert.style.display = "block";
        setTimeout(function(){ 
            alert.style.display = "none"
        }, 4000);
    }
    
});
