programa
{
	funcao inicio()
	{
		inteiro indice = 13, soma = 0, k = 0, oldSoma = 0
		enquanto (k < indice){
			k ++
			oldSoma = soma
			soma += k
			escreva("\nK:"+k+" + Soma:"+oldSoma+" = "+soma)
			//escreva("\nN�mero de Indice: "+k)
			//escreva("\nN�mero da Soma: "+soma)
		}
		escreva("\n\nSomat�rio: "+soma)
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta se��o do arquivo guarda informa��es do Portugol Studio.
 * Voc� pode apag�-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 203; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */