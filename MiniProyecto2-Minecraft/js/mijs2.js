

function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==13){
		var value = document.getElementById('buscar').value;
		console.log(value);
		if(value=="minecraft" || value=="que es" || value=="¿qué es?"){
			this.window.open("index.html")
		}
		
		
		if(value=="modos" || value=="modo" || value=="modos de juego"){
			window.open("paginas/supervivencia.html")
		}
		if(value=="supervivencia" || value=="survival"){
			window.open("paginas/supervivencia.html")
		}
		if(value=="dificil" || value=="hardcore" || value=="extremo"){
			window.open("paginas/dificil.html")
		}	
		if(value=="aventura" || value=="adventure"){
			window.open("paginas/aventura.html")
		}	
		if(value=="creativo" || value=="creative" || value=="dios"||  value=="modo dios"){
			window.open("paginas/creativo.html");
		}
		
		
		if(value=="fabricacion" || value=="craftear" || value=="crafteo"||  value=="construir"){
			window.open("paginas/fabricacion.html")
		}
		
		if(value=="horno" || value=="fundicion" || value=="comida" || value=="carbon"||  value=="quemar"){
			window.open("paginas/fundicion.html")
		}
		
		if(value=="alquimia" || value=="pociones" || value=="pocion"||  value=="hechizos" ||  value=="hechizo"){
			window.open("paginas/alquimia.html")
		}
		
		if(value=="informacion" || value=="util" || value=="informacion util"){
			window.open("paginas/informacionutil.html")
		}
		
		if(value=="comprar" || value=="compra" || value=="pdf"||  value=="pdfs" ||  value=="contacto"){
			window.open("paginas/about.html")
		}
	}

	  
}

