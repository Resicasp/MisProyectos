var X = 0;
var Y = 0;
var p = 0;
var q = 0;
var r = 1;
var reloj = null;
function tableCreate() {		
		Y = parseInt(document.getElementById("filas").value);
		X = parseInt(document.getElementById("columnas").value);
		p = document.getElementById("proarbol").value;
		q = document.getElementById("profuego").value;
        var body = document.getElementsByTagName("body")[0];
        var tbl     = document.createElement("table");
		tbl.setAttribute("id", "Tabla");
        var tblBody = document.createElement("tbody");
		if(Y<8 && X<11 && p<1 && q<1){
			for (var j = 0; j < Y ; j++) {
            var row = document.createElement("tr");		
            for (var i = 0; i < X; i++) {	
				var cell = document.createElement("td");	
					cell.setAttribute("id","c"+j+"_"+i);
					cell.setAttribute("width","100");
					cell.setAttribute("height","100");
					cell.setAttribute("class","cesped");
				row.appendChild(cell);
				
            }
            tblBody.appendChild(row);
			}
		}
		else if(Y>=8){
			alert("El número de filas tiene que ser inferior o igual a 7, introduzca los datos otra vez!!");
			window.location='juegonuevo.html';	
		}
		else if(p>=1){
			alert("La probabilidad del arbol tiene que ser inferior a 1, introduzca los datos otra vez!!");
			window.location='juegonuevo.html';	
		}
		else if(q>=1){
			alert("La probabilidad del fuego tiene que ser inferior a 1, introduzca los datos otra vez!!");
			window.location='juegonuevo.html';	
		}
		else{
			alert("El número de columas tiene que ser inferior o igual a 10, introduzca los datos otra vez!!");
			window.location='juegonuevo.html';
		}
        
		
		var eleaborrar = document.getElementById("proyecto");
		body.removeChild(eleaborrar);
        tbl.appendChild(tblBody);
        body.appendChild(tbl);
		tbl.setAttribute("cellpadding", "0");
		tbl.setAttribute("cellspacing", "0");
		tbl.setAttribute("align","center");
		tbl.setAttribute("valign","center");
		
		var boton=document.createElement("button");
		boton.type = "button";
		boton.setAttribute("onclick","comenzarsimulacion()");
		boton.setAttribute('name',"Pause");
		boton.setAttribute("class","button1");
		boton.innerHTML="Iniciar";
		document.body.appendChild(boton);
				
		var boton2=document.createElement("button");
		boton2.type = "button";
		boton2.setAttribute("onclick","Reiniciar()");
		boton2.setAttribute("class","button2");
		boton2.innerHTML="Renaudar";
		document.body.appendChild(boton2);
		
		var boton3=document.createElement("button");
		boton3.type = "button";
		boton3.setAttribute("onclick","Salir()");
		boton3.setAttribute("class","button3");
		boton3.innerHTML="Salir";
		document.body.appendChild(boton3);
		
		var boton4=document.createElement("button");
		boton4.type = "button";
		boton4.setAttribute("onclick","Parar()");
		boton4.setAttribute("class","button4");
		boton4.innerHTML="Parar";
		document.body.appendChild(boton4);	
}

function comenzarsimulacion(){
		if(reloj == !null){
				clearInterval(reloj);
		}
	reloj = setInterval(Iniciar, 1000);	
}
		  
function Parar(){
	var h;
	if(reloj!= null)
			{
				clearInterval(reloj);
				reloj=null;	
			}
	else{
			reloj = setInterval(Iniciar, 1000);
	}	
}

function Reiniciar(){
	if(reloj==null){
		
		reloj = setInterval(Iniciar, 1000);
	}
	
}

function Iniciar() {
	  for (var j = 0; j < Y ; j++) {	
           for (var i = 0; i < X; i++) {
			   var celda=document.getElementById("c"+j+"_"+i);
			   if((Math.random()<parseFloat(p)) && (celda.getAttribute("class") =="cesped")){
				   celda.setAttribute("class","arbol");   
			   }  
				else if((Math.random()<parseFloat(q)) && (celda.getAttribute("class") =="arbol")){
				   celda.setAttribute("class","fuego");   
			   } 
			   else if((Math.random()<parseFloat(q)) && (celda.getAttribute("class") =="fuego")){
				   celda.setAttribute("class","cesped");   
			   } 
			  // else if((celda.getAttribute("class") =="fuego") && (next.celda.getAttribute("class") =="arbol")){
				//   next.celda.getAttribute("class") =="fuego";
			  // }
		   }
	  }
}

function Salir(){
	 window.location='juegonuevo.html';
}
function Salir2(){
	 window.location='../proyecto.html';
}
function Cerrar() {
	alert("Espero que te haya gustado!!!! Gracias por jugar!!!");
	window.close();
}

function cambiar(){
	if(r==1){
		document.getElementById('body').style.backgroundImage='url(../Img/bosque.jpg)';
		r=0;
	}		
}
