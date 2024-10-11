
// funciones
function operacion() {
    let n1,n2,tipo,resultado,resul;
    n1 = parseFloat(document.getElementById("n1").value);
    n2 = parseFloat(document.getElementById("n2").value);
    tipo = document.getElementById("tipo").value;
    resultado = 0;
    
    
    if (isNumber(n1) && isNumber(n2)) {
        switch (tipo) {
            case "+":
                resultado = n1 + n2;
                
                break;
            case "-":
                resultado = n1 - n2;
                break;
            case "*":
                resultado = n1 * n2;
                break;
            case "/":
                resultado = n1 / n2;
                break;
            default:
                resul.innerHTML = "Operación no válida.";
                break;
        }
        resul = document.getElementById("resul").innerHTML =`<h2> ${n1} ${tipo} ${n2} = ${resultado}</h2>` ;
    }else {
        alert("ingrese solo números por favor ...");
    }
    
    }
    
function isNumber(n) {
    
    return !isNaN(n) && isFinite(n); // Verifica que n es un número y finito
}
