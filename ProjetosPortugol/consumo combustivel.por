programa
{
	funcao inicio ()
	{
		cadeia destino
		faca{
			destino 		= setDestino()
		real distancia 	= setValor("a Distância (Km)"), 
			preco_etanol 	= setValor("o Preço do Etanol (R$)"), 
			preco_gasolina = setValor("o Preço da Gasolina (R$)"), 
			media_etanol 	= setValor("a Média do Etanol (Km/L)"), 
			media_gasolina = setValor("a Média da Gasolina (Km/L)"),
			consumo, aux
		
		consumo = (distancia / media_etanol) * preco_etanol
		aux = (distancia / media_gasolina) * preco_gasolina

			 se (consumo < aux) 	imprimirResultado("Etanol",   destino, distancia)
		senao se (consumo > aux)		imprimirResultado("Gasolina", destino, distancia)
		senao escreva("\n\nTanto faz!")

		escreva("\n")
		imprimirConsumo(consumo, "Etanol", preco_etanol)
		imprimirConsumo(aux, "Gasolina", preco_gasolina)

		destino = escolaOperacao()
		
		} enquanto(destino != "n" ou destino != "N")
		
	}
	funcao cadeia setDestino(){
		cadeia destino
		escreva("\nEntre com o destino:\n")
		leia(destino)
		retorne destino
	}
	funcao real setValor(cadeia tipo){
		real valor
		escreva("Entre com ",tipo,":\n")
		leia(valor)
		retorne valor
	}
	funcao vazio imprimirResultado(cadeia combustivel, cadeia destino, real distancia){
		escreva("\n\nCom ",combustivel," você irá poupar mais para ir até ",destino," que fica a ",distancia," Km de distância")
	}
	funcao vazio imprimirConsumo(real consumo, cadeia combustivel, real preco){
		escreva("\nConsumo ",combustivel,":\n    ",consumo/preco,"L\n    R$ ",consumo)
	}

	funcao cadeia escolaOperacao(){
		cadeia opcao
		faca {
			escreva("\n\nDeseja fazer outro calculo? (S/N)\n")
			leia(opcao)
			escreva(opcao)
		} enquanto (opcao == "s" ou opcao == "S" ou opcao == "n" ou opcao == "N")
		retorne opcao
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 1600; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */