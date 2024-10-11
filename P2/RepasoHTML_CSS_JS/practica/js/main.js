// este es un comentario de javaScript de una linea

/*este es un comentario
de varias lineas de
codigo */

//variables
var nombre = "Geovany Arenas";
var nombre2 = "Daniel";
let nombre3 = "Rodolfo flores";//se pueden cambiar los valores
let edad=20;
let estatura=1.80;
let logico=true;

//mostrar contenido de variables
console.log("Hola soy la consola y tu nombre es: " + nombre) //atravez de consola
document.write("<hr><h2>Hola soy la consola y tu nombre es: " + nombre + "</h2>")
alert("soy una alerta" + nombre);

//mostrar contenido con getElementByID

let datos = document.getElementById("informacion");
datos.innerHTML="hola soy un contenido de innerHTML <br>";
datos.innerHTML+="<hr><h2>hola soy otro contenido de innerHTML</h2></hr>";
datos.innerHTML+="<hr><h2>mi edad es "+ edad + "</h2></hr>";
datos.innerHTML+=`<hr><h2>
                    mi edad es ${edad}</h2>
                    <h2>
                    mi edad es ${nombre}
                </h2></hr>`;

//condiciones
if(edad>=18){
    datos.innerHTML+=`<hr><h2> soy mayor de edad </h2></hr>`;
}else{
    datos.innerHTML+=`<hr><h2> soy menor de edad </h2></hr>`;
};

//ciclos
for (let i = 1; i <= 5; i++) {
    datos.innerHTML+=`<hr><h2> for: soy el numero ${i} </h2></hr>`;
};

let i = 1;
while ( i<=5) {
    datos.innerHTML+=`<hr><h2> while: soy el numero ${i} </h2></hr>`;
    i++;
}

i =1 ;
do {
    datos.innerHTML+=`<hr><h2> doWile: soy el numero ${i} </h2></hr>`;
    i++;
}while ( i<=5)

//funciones

// funciones que no reciben parametros y no regresan valor

function suma() {
    let n1=2;
    let n2=3;
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h2>la suma es: ${suma}</h2></hr>`;
}
suma();

// funciones que no reciben parametros y no regresan valor
function suma1() {
    let n1=2;
    let n2=3;
    let suma=n1+n2;
    return suma;

}
let sum = suma1();
datos.innerHTML+=`<hr><h2>la suma 2 es: ${sum}</h2></hr>`;


//funciones que si reciben parametros y no recgresan valor
function suma2(n1,n2) {
    let suma=n1+n2;
    datos.innerHTML+=`<hr><h2>la suma 3 es: ${suma}</h2></hr>`;
}
suma2(3,4);


//funciones que si reciben parametros y si recgresan valor

function suma3(n1,n2) {
    let suma=n1+n2;
    return suma;
}

let sum2 = suma3(3,4);
datos.innerHTML+=`<hr><h2>la suma 4 es: ${sum2}</h2></hr>`;



//areglos

let animales= [];
animales[0]="perro";
animales[1]="gallina";
animales[2]="perico";

let animales2 = ["leon","tigre","Elefante"];

for (let i = 0; i < animales.length; i++) {
    datos.innerHTML+=`<hr><h2>el animal es es: ${animales[i]}</h2></hr>`;
    
}

animales2.forEach(element => {
    datos.innerHTML+=`<hr><h2>el animal es es: ${element}</h2></hr>`;
});