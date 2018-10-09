programa
{
    	funcao inicio() {
		inteiro numOperador
		numOperador = mudarValorOperador()
		menu(numOperador)
	}

	funcao vazio menu(inteiro numOperador){
		inteiro opcao = 0
		opcao = cabecalho()
		escolha(opcao){
			caso 1: 
				imprimirTaboada(numOperador) 
				menu(numOperador)
				pare
			caso 2: 
				numOperador = mudarValorOperador() 
				imprimirTaboada(numOperador)
				menu(numOperador)
				pare
			caso 0: 
				escreva("\nVoc� saiu do programa!\n") /*rodar = falso*/ 
				pare
			caso contrario: 
				escreva("\nOp��o �nvalida!\n")
				menu(numOperador)
		}
	}

	funcao vazio imprimirTaboada(inteiro valor){
		inteiro tab
		para ( inteiro c = 1; c <= 10; c++ ){
			tab = c * valor
			escreva ("\n", valor, " x ", c, " = ", tab)
		}
		escreverLinha()
	}

	funcao inteiro cabecalho(){
		inteiro opcao
		escreverLinha()
		escreva("\n* -------------- TABOADA ----------------- *")
		escreva("\n* -- Menu:")
		escreverLinha()
		escreva("\nPara Imprimir taboada:   1")
		escreva("\nTrocar n�mero:           2")
		escreva("\nSair do programa:        0")
		escreverLinha()
		escreva("\nEntre com a op��o:\n")
		leia(opcao)
		retorne opcao
	}

	funcao inteiro mudarValorOperador(){
		inteiro operador
		faca {
			escreva("\nEntre com o valor do Operador\n")
			leia(operador)
		} enquanto(operador <= 0)
		retorne operador
	}

	funcao vazio escreverLinha(){ escreva("\n--------------------------------------------") }
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta se��o do arquivo guarda informa��es do Portugol Studio.
 * Voc� pode apag�-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 1112; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */