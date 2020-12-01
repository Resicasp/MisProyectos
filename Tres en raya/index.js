var img='x.PNG';
	 var turno=1;
	 var celda = new Array();
	 var jug1=0;
	 var jug2=0;
	 for(i=0; i<=8; i++){
	  celda[i]=-1;
	}
	 function box(pos){
		if(celda[pos]==-1){
			if(turno==1){
				if(img=='x.PNG'){
					document.getElementById('c'+pos).src=img;
					celda[pos]=1;
					turno=2;
					img='bola.PNG';
				} 
			}
			else if(turno==2){ 
				if(img=='bola.PNG'){
					document.getElementById('c'+pos).src=img;
					celda[pos]=0;
					turno=1;
					img='x.PNG';
				}
			}
		}
		else{ 
			alert('Posicion ocupada!');
		}
		if(celda[0]==1 && celda[1]==1 && celda[2]==1){
			alert('Ha ganado el jugador X');
				jug1=jug1+1;
			limpiar();
		}
		if(celda[0]==0 && celda[1]==0 && celda[2]==0){
			alert('Ha ganado el jugador  O');
			jug2=jug2+1;
			limpiar();
		}
		if(celda[3]==1 && celda[4]==1 && celda[5]==1){
			alert('Ha ganado el jugador  X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[3]==0 && celda[4]==0 && celda[5]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
		if(celda[6]==1 && celda[7]==1 && celda[8]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[6]==0 && celda[7]==0 && celda[8]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
		if(celda[0]==1 && celda[3]==1 && celda[6]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[0]==0 && celda[3]==0 && celda[6]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
		 if(celda[1]==1 && celda[4]==1 && celda[7]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[1]==0 && celda[4]==0 && celda[7]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		} 
		if(celda[2]==1 && celda[5]==1 && celda[8]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[2]==0 && celda[5]==0 && celda[8]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
		if(celda[0]==1 && celda[4]==1 && celda[8]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[0]==0 && celda[4]==0 && celda[8]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
		if(celda[2]==1 && celda[4]==1 && celda[6]==1){
			alert('Ha ganado el jugador X');
			jug1=jug1+1;
			limpiar();
		}
		if(celda[2]==0 && celda[4]==0 && celda[6]==0){
			alert('Ha ganado el jugador O');
			jug2=jug2+1;
			limpiar();
		}
	 document.getElementById('ptsjug1').innerHTML=jug1;
	 document.getElementById('ptsjug2').innerHTML=jug2;
	 }
	
	function limpiar(){
		document.getElementById('reset').src="limpiar_pre.png";
		for(i=0; i<=8; i++){
			document.getElementById('c'+i).src="fondo.PNG";
		}
		for(i=0; i<=8; i++){
			celda[i]=-1;
		}
	}
	function soltar(){
		document.getElementById('reset').src="limpiar.png";
	}
	function reiniciar(){
		jug1=0;
		jug2=0;
		document.getElementById('ptsjug1').innerHTML=jug1;
		document.getElementById('ptsjug2').innerHTML=jug2;
	}
