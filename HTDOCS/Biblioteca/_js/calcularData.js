//Função para calcular data
function calcDataAdiciona(valor , dataInicial){
	// alert("oi calc"+dataInicial);
	var valorC = parseInt(valor);
	// document.getElementById('prazoLivroCampo').value = valorC;
	var data = ' ';
	var ano = dataInicial.substring(0,4);
	var ano = parseInt(ano);
	var mes = dataInicial.substring(5,7);
	var mes = parseInt(mes);
	var dia = dataInicial.substring(8,10);
	var dia = parseInt(dia);

	dia += valorC;
	
	if ((ano % 4 == 0) && ((ano % 100 != 0) || (ano % 400 == 0))){
while(((dia > 31)&&((mes == 1)||(mes == 3)||(mes == 5)||(mes == 7)||(mes == 8)||(mes == 10)||(mes == 12)))||((dia > 30) && ((mes == 4)||(mes == 6)||(mes == 9)||(mes == 11)))||((dia > 29) && (mes == 2))){
		if ((dia > 31) &&((mes == 1)||(mes == 3)||(mes == 5)||(mes == 7)||(mes == 8)||(mes == 10)||(mes == 12))) {
			dia = dia - 31;
			mes = mes + 1;
			if (mes > 12) {
				mes = 1;
				ano = ano + 1;
			} 				
		}
		else if ((dia > 30) && ((mes == 4)||(mes == 6)||(mes == 9)||(mes == 11))) {
			dia = dia - 30;
			mes = mes + 1;
		}
		else if ((dia > 29) && (mes == 2)) {
			dia = dia - 29;
			mes = mes + 1;
		}
}
	}

	else {
while(((dia > 31)&&((mes == 1)||(mes == 3)||(mes == 5)||(mes == 7)||(mes == 8)||(mes == 10)||(mes == 12)))||((dia > 30) && ((mes == 4)||(mes == 6)||(mes == 9)||(mes == 11)))||((dia > 28) && (mes == 2))){
		// alert('n é bixesto');
		if ((dia > 31) &&((mes == 1)||(mes == 3)||(mes == 5)||(mes == 7)||(mes == 8)||(mes == 10)||(mes == 12))) {
			dia = dia - 31;
			mes = mes + 1;
			if (mes > 12) {
				mes = 1;
				ano = ano + 1;
			}				
		}
		else if ((dia > 30) && ((mes == 4)||(mes == 6)||(mes == 9)||(mes == 11))) {
			dia = dia - 30;
			mes = mes + 1;
		}
		else if ((dia > 28) && (mes == 2)) {
			dia = dia - 28;
			mes = mes + 1;
		}
}
	}
	// alert("dia: "dia+ "\nmes: " + mes+ "\nano: " + ano);
	if ( (mes < 10) && (dia < 10) ) {
    	data = ano+"-0"+mes+"-0"+dia;
    }else if ( (mes < 10) && (dia > 9) ) {
    	data = ano+"-0"+mes+"-"+dia;
    	// alert("data: "+data);
    }
    else if ( (dia < 10) && (mes > 9) ) {
    	data = ano+"-"+mes+"-0"+dia;
    }
    else{
    	data = ano+"-"+mes+"-"+dia;
    }
	return data;
}

function hoje() {
	now = new Date;
	var mes;
	for (var i = 0; i < 12; i++) {
		if (now.getMonth() == i) {
			mes = i+1;
		}
	}

	if ( (mes < 10) && (now.getDate() < 10) ) {
	    return now.getFullYear()+"-0"+mes+"-0"+now.getDate();
    }
    else if ( (mes < 10) && (now.getDate() > 9) ) {
    	return now.getFullYear()+"-0"+mes+"-"+now.getDate();
    }
    else if ( (now.getDate() < 10) && (mes > 9) ) {
    	return now.getFullYear()+"-"+mes+"-0"+now.getDate();
    }
    else{
    	return now.getFullYear()+"-"+mes+"-"+now.getDate();
    }
}