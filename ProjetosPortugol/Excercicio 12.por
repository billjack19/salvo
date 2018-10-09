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
			//escreva("\nNúmero de Indice: "+k)
			//escreva("\nNúmero da Soma: "+soma)
		}
		escreva("\n\nSomatório: "+soma)
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 203; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */