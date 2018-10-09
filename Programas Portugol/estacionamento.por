programa
{
	/*
	 * Programa de controle de vagas
	*/
	const inteiro vagas = 50
	inteiro vagasOcupadas = 0
	funcao inicio()
	{
		inteiro op = 0
		escreva("Bem vindo ao estacionamento!\n")
		faca{
			escreva("Para verificar o numero de vagas entre com valor   '1'\n")
			escreva("Para entrada de veiculo entre com valor            '2'\n")
			escreva("Para saida de veiculo entre com valor              '3'\n")
			escreva("Para sair do sistema entre com valor               '0'\n")
			leia(op)
			limpa()
			escolha(op){
				caso 1: mostrarDados() pare
				caso 2: movimentacaoCarros(1) pare
				caso 3: movimentacaoCarros(-1) pare
				caso 0: escreva("Volte Sempre ;)\n")
				caso contrario: escreva("\nOpção invalida\n\n")
			}
		} enquanto(op != 0)
	}

	funcao vazio mostrarDados(){
		escreva("\nO estacionamento esta com ", vagasOcupadas," vagas ocupadas e com ", vagas - vagasOcupadas, " vagas disponiveis\n\n")
	}

	funcao vazio movimentacaoCarros(inteiro op){
		se(vagasOcupadas + op <= vagas e vagasOcupadas + op >= 0){	vagasOcupadas += op mostrarDados() }
		senao se(op > 0) 									escreva("\nO estacionamento esta cheio\n\n")
		senao											escreva("\nNão tem mais carro no estacionamento\n\n")
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 1024; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */