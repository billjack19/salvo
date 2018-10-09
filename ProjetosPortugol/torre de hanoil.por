programa
{
	/*
	 * Torre de Hanoi
	 * Autor: Jack Biller
	*/

	const inteiro pesos = 3
	const inteiro colunas = 3
	inteiro torres[colunas][pesos]
	inteiro valorSelecionado = 0
	inteiro colunaSelecionada, linhaSelecionada
	cadeia jogar
	funcao inicio() {
		faca{
			limpa()
			escreva("\n****** Start Game ******\n")
			reinicioJogo()
			enquanto(condicaoFim()){
				faca {
					colunaSelecionada = 0
					linhaSelecionada = 0
					valorSelecionado = 0
					limpa()
					imprimirJogo()
					escreva("\nEntre com as coordenadas para selecionar um valor")
					comandosColuna()
					comandosLinha()	
				} enquanto(podeMover() ou valorSelecionado == 0)
		
				faca {
					limpa()
					imprimirJogo()
					escreva("Valor Selecionado: ",valorSelecionado,"\n")
					escreva("\nEntre com as coordenadas para deixar o valor na torre")
					comandosColuna()
					comandosLinha()
				} enquanto(podeDecer() ou valorSelecionado != 0)
			}
			limpa()
			imprimirJogo()
			escreva("\nFim de Jogo\nVocê venceu ;)\n")
			jogar = jogarNovamente()			
		} enquanto(jogar == "s" ou jogar == "S")
		
		escreva("Obrigado por Jogar!")
	}

	funcao cadeia jogarNovamente(){
		cadeia opcao
		faca{
			escreva("Deseja jogar novamente?(S/N)")
			leia(opcao)
			limpa()
		} enquanto(
			opcao != "s" e
			opcao != "S" e
			opcao != "n" e
			opcao != "N"
		)
		retorne opcao
	}
	

	funcao logico podeDecer(){
		colunaSelecionada-- 
		linhaSelecionada-- 
		logico resultado = falso
		se(
			colunaSelecionada <= colunas e 
			colunaSelecionada >= 0 e 
			linhaSelecionada <= pesos e
			linhaSelecionada >= 0
		){
			se(torres[colunaSelecionada][linhaSelecionada] == 0){
				se(colunaSelecionada == colunas - 1 ou torres[colunaSelecionada + 1][linhaSelecionada] > valorSelecionado){
					torres[colunaSelecionada][linhaSelecionada] = valorSelecionado
					valorSelecionado = 0
				} senao {
					escreva("\nVocê não pode deixar este peso nesta posição!\n\n")
					resultado = verdadeiro
				}
			}
		} senao{
			escreva("\nColuna ou linha incorretos\n")
			resultado = verdadeiro
		}
		retorne resultado
	}


	

	funcao vazio comandosColuna(){
		faca{
			escreva("\nSelecione Linha:")
			leia(colunaSelecionada)
		} enquanto(validarColuna(colunaSelecionada))
	}

	funcao vazio comandosLinha(){
		faca{
			escreva("\nSelecione Coluna:")
			leia(linhaSelecionada)
		} enquanto(validarLinha(linhaSelecionada))
	}
	


	funcao logico validarLinha(inteiro linha){
		logico resultado = verdadeiro
		para(inteiro i = 1; i < pesos +1; i++){
			se(linha == i){
				resultado = falso
				i = colunas
			}
		}
		retorne resultado
	}
	


	funcao logico validarColuna(inteiro coluna){
		logico resultado = verdadeiro
		para(inteiro i = 1; i < colunas +1; i++){
			se(coluna == i){
				resultado = falso
				i = colunas
			}
		}
		retorne resultado
	}

	
	funcao logico podeMover(){
		colunaSelecionada-- linhaSelecionada-- 
		logico resultado = falso
		se(
			colunaSelecionada <= colunas e 
			colunaSelecionada >= 0 e 
			linhaSelecionada <= pesos e
			linhaSelecionada >= 0
		){
			se(torres[colunaSelecionada][linhaSelecionada] > 0){
				se(colunaSelecionada ==  0 ou torres[colunaSelecionada - 1][linhaSelecionada] == 0){
					valorSelecionado = torres[colunaSelecionada][linhaSelecionada]
					torres[colunaSelecionada][linhaSelecionada] = 0
				} senao se(valorSelecionado == 0){
					escreva("\nVocê não pode mover este peso porque há outro mais pesado em cima!\n\n")
					resultado = verdadeiro
				}
			}
		} senao {
			escreva("\nColuna ou linha incorretos\n")
			resultado = verdadeiro
		}
		retorne resultado
	}
	
	
	
	funcao logico condicaoFim(){
		logico fimJogo = falso
		para(inteiro i = 0; i < pesos; i++){
			se(torres[i][colunas-1] == 0){
				fimJogo = verdadeiro
			}
		}
		retorne fimJogo
	}




	funcao vazio reinicioJogo(){
		para(inteiro i = 0; i < colunas; i++) {
			para(inteiro j = 0; j < pesos; j++) {
				se(j == 0) {
					se(i > 0){
						torres[i][j] = torres[i-1][j] + j+1
					} senao {
						torres[i][j] = j+1
					}
				} senao {
					torres[i][j] = 0
				}
			}
		}
	}

	funcao vazio imprimirJogo(){
		//caracter palavraLinha[] = {"   L   "}
		//para(inteiro i = 0; i < 5; i++){
			//escreva("         ")
		para (inteiro j = 1; j < pesos+1; j++) {
			escreva("   T",j,"   ")
			/*se(j < pesos){
				escreva(" - ")
			}*/
		}escreva("\n")
		//}
		//escreva("         ")
		/*para (inteiro j = 1; j < pesos+1; j++) {
			escreva(j)
			se(j < pesos){
				escreva(" - ")
			}
		} escreva("\n")*/
		
		para(inteiro i = 0; i < colunas; i++) {
			//escreva("LINHA ",i+1,": ")
			para(inteiro j = 0; j < pesos; j++) {
				escreva(desenharPeso(torres[i][j]))
				//se(j < pesos - 1){ escreva(" - ") }
			}
			escreva("\n")
		}
	}

	funcao cadeia desenharPeso(inteiro valor){
		cadeia desenho
		escolha(valor){
			caso 0: 
				desenho = "   ||   "
				pare
			caso 1:
				desenho = "  (P1)  "
				pare
			caso 2:
				desenho = " ( P2 ) "
				pare
			caso 3:
				desenho = "(  P3  )"
				pare
			caso contrario:
				desenho = "   ||   "
		}
		retorne desenho
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 4959; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */