document.addEventListener("DOMContentLoaded", function(){

    /* ===== BOTÓN CITA ===== */

    const btnCita = document.getElementById("btnCita");

    if(btnCita){
        btnCita.addEventListener("click", function(){

            let nombre = document.getElementById("nombre").value;

            if(nombre === ""){
                alert("Por favor escribe tu nombre");
                return;
            }

            alert("Cita registrada para " + nombre);

            window.location.href = "pago.php";
        });
    }

    /* ===== PAGO ===== */
    const btnPago = document.getElementById("btnPago");

    if(btnPago){
        btnPago.addEventListener("click", function(){
            alert("Pago realizado correctamente ✅");
            window.location.href = "confirmacion.php";
        });
    }

});