programa
{
	/* 
	 *  Este programa serve para calcular o cosumo de combustivel e compara qual compensa mais 
	 *  Autores: Jack Biller, Harrison, Douglas
	*/
	funcao inicio()
	{
		/* Esta são as variaveis */
		cadeia destino, vantagem
		real distancia, valor_diesel, valor_gasolina, media_diesel, media_gasolina, consumo_diesel, consumo_gasolina
		real litro_diesel, litro_gasolina


		/*
		Aqui nos puxamos as variaveis no SetValor semre sobre escrevendo as variaveis.
		*/
		faca{
			escreva("Qual é o destino?\n")
			leia(destino)
			distancia = setarValor("distancia")
			valor_diesel = setarValor("valor do disel")
			valor_gasolina = setarValor("valor da gasolina")
			media_diesel = setarValor("média do diesel")
			media_gasolina  = setarValor("média da gasolina")
		/*
		Aqui nos limpamos a tela.
		*/
			limpa()
		/*
		Aqui é feito o calculo da distancia, media e etc.
		*/
			litro_diesel = distancia / media_diesel
			litro_gasolina = distancia / media_gasolina
	
			consumo_diesel = litro_diesel * valor_diesel
			consumo_gasolina = litro_gasolina * valor_gasolina
		/*
		Aqui nos fazemos a comparação de qual compensa mais.
		*/
			se (consumo_gasolina < consumo_diesel){
				vantagem = "gasolina"
			} senao {
				vantagem = "diesel"
			}
		/*
		Aqui nos retornamos na tela os resultados.
		*/
			escreva("Para esta viagem usará se for diesel ", litro_diesel, " L há R$", consumo_diesel, "\n")
			escreva("Para esta viagem usará se for gasolina ", litro_gasolina, " L há R$", consumo_gasolina, "\n")
			escreva("Para o destino " , destino, " que fica a ", distancia, "Km compença usar ", vantagem, "\n\n")
		/*
		Aqui nos retornamos novamente o calculo se o usuario desejar.
		*/

			destino = validaOpcao()
		} enquanto(destino != "N" e destino != "n")
	}

	funcao  real setarValor(cadeia referencia){
		real valor 
		escreva("Entre com ", referencia, ":\n")
		leia(valor)
		retorne valor
	}

	funcao cadeia validaOpcao(){
		cadeia destino
		faca {
			escreva("Deseja fazer outro calculo? (S/N)\n")
			leia(destino)
		} enquanto(destino != "s" e destino != "n")
		/*
		Aqui nos finalizamos o calculo.
		*/
		retorne destino
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 1817; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */