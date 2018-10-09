programa
{
	/*
	 * Jogo da Velha
	 * Autor: Jack Biller
	*/
	caracter jogo[3][3]
	inteiro vezJogador = 1, linhaVez = -1, colunaVez = -1
	logico velha = falso

	funcao inicio()
	{
		zerarJogo()
		enquanto(condicaoVitoria('X') ou condicaoVitoria('O')){
			limpa()
			imprimirJogo()
			fazerJogada()
		}
		se(velha){
			escreva("\nDeu velha")
		} senao se(condicaoVitoria('x')){
			escreva("\nO jogador 1 é o vencendedor")
		} senao{
			escreva("\nO jogador 2 é o vencendedor")
		}
	}

	funcao vazio fazerJogada(){
		logico continua = verdadeiro
		enquanto(continua){
			escreva("\nEntre com a linha: ")
			leia(linhaVez)
			se(linhaVez > 0 e linhaVez <= 3){
				continua = falso
			}
		}
		continua = verdadeiro
		escreva("\nLinha selecionada ", linhaVez)
		enquanto(continua){
			escreva("\nEntre com a coluna: ")
			leia(colunaVez)
			se(colunaVez > 0 ou colunaVez <= 3){
				continua = falso
			}
		}

		se(jogo[linhaVez - 1][colunaVez - 1] != 'X' e jogo[linhaVez - 1][colunaVez - 1] != 'O'){
			se(vezJogador == 1){
				vezJogador = 2
				jogo[linhaVez - 1][colunaVez - 1] = 'X'
			} senao {
				vezJogador = 1
				jogo[linhaVez - 1][colunaVez - 1] = 'O'
			}
		}
	}
	

	funcao vazio zerarJogo(){
		para(inteiro i = 0; i < 3; i++){
			para(inteiro j = 0;j < 3; j++){
				jogo[i][j] = ' '
			}
		}
	}

	funcao vazio imprimirJogo(){
		escreva("    1 | 2 | 3\n")
		para(inteiro i = 0; i < 3; i++){
			escreva(i+1, ": ")
			para(inteiro j = 0;j < 3; j++){
				se(j == 0)escreva(" ")
				se(j < 2){
					escreva(jogo[i][j]," | ")
				} senao {
					escreva(jogo[i][j])
				}
			}
			se(i != 2){
				escreva("\n   -----------")
			}
			escreva("\n")
		}
	}

	funcao logico condicaoVitoria(caracter verificador){
		logico continua = verdadeiro
		se(
			(jogo[0][0] == verificador e jogo[0][1] == verificador e jogo[0][2] == verificador) ou
			(jogo[0][0] == verificador e jogo[1][0] == verificador e jogo[2][0] == verificador) ou
			(jogo[0][0] == verificador e jogo[1][1] == verificador e jogo[2][2] == verificador) ou
			(jogo[0][2] == verificador e jogo[1][1] == verificador e jogo[2][0] == verificador) ou
			(jogo[1][0] == verificador e jogo[1][1] == verificador e jogo[1][2] == verificador) ou
			(jogo[0][1] == verificador e jogo[1][1] == verificador e jogo[2][1] == verificador) ou
			(jogo[2][0] == verificador e jogo[2][1] == verificador e jogo[2][2] == verificador) ou
			(jogo[0][2] == verificador e jogo[1][2] == verificador e jogo[2][2] == verificador)
		){
			continua = falso
		} senao se(
			jogo[0][0] == jogo[0][1] e 
			jogo[0][0] == jogo[0][2] e 
			jogo[0][0] == jogo[1][0] e 
			jogo[0][0] == jogo[1][1] e 
			jogo[0][0] == jogo[1][2] e 
			jogo[0][0] == jogo[2][0] e 
			jogo[0][0] == jogo[2][1] e 
			jogo[0][0] == jogo[2][2] e
			jogo[0][0] != ' '
		){
			continua = falso
			velha = verdadeiro
		}
		retorne continua
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 1165; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */