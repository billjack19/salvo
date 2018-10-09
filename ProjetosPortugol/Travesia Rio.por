programa
{
	/*
	 * Programa de desafio de lógica (Travessia do rio).
	 * Feito por : Jack, Harrison e Douglas 
	*/
	cadeia lobo, padre, cabra, repolho

	funcao inicio()
	{
          logico naoEscolheu
          caracter opcao

     	escreva("O padre prescisa levar o lobo, a cabra e o repolho para o outro lado do rio\n")
     	escreva("Com isso o pastor só pode levar 1 de cada vez,Todos estão do lado esquerdo do rio\n")

		faca {
			lobo = "le" padre = "le" cabra = "le" repolho = "le" // inicio/reinicio de jogo
			faca {
				imprimirStatus()
				naoEscolheu = verdadeiro
				enquanto( naoEscolheu ) {
					imprimirComandos()
					leia(opcao)
					limpa()
					escolha(opcao){
						caso 'l': 
							naoEscolheu = falso
							decicaoTroca(podeTrocarLado(falso, lobo), "lobo", opcao)
							pare
						caso 'c': 
							naoEscolheu = falso
							decicaoTroca(podeTrocarLado(falso, cabra), "cabra", opcao)
							pare
						caso 'r': 
							naoEscolheu = falso
							decicaoTroca(podeTrocarLado(falso, repolho), "repolho", opcao)
							pare
						caso 'p': 
							naoEscolheu = falso
							moverPadre()
							escreva("Você alterou a posição do pastor para o ",padre) pare
					}
				}
				
			} enquanto(caondicaoFImJogo())

			faca{
				escreva("\nDeseja jogar novamente?(S/N)")
				leia(opcao)
				limpa()
			} enquanto(opcao != 's' e opcao != 'S' e opcao != 'n' e opcao != 'N')
		} enquanto(opcao == 's' ou opcao == 'S')
	}

	funcao vazio decicaoTroca(logico movimentou, cadeia elemento, caracter opcao){
		cadeia lado = ""
		se(movimentou){
			escolha(opcao){
				caso 'l':			lado = lobo 	  /*|*/	lobo 	= trocarLado(lobo)		pare
				caso 'c': 		lado = cabra 	  /*|*/	cabra 	= trocarLado(cabra)		pare
				caso 'r': 		lado = repolho	  /*|*/	repolho 	= trocarLado(repolho)	pare
				caso contrario: 	lado = padre	  /*|*/	padre 	= trocarLado(padre)		pare
			}
			escreva("Você mudou a posição do ",elemento," para o ",lado," junto com o pastor que está no ",padre)
		} senao {
			escreva("Você não pode movimentar o ",elemento," porque o pastor esta do lado oposto do rio")
		}
	}

	funcao logico caondicaoFImJogo(){ 
		logico continuarJogo = verdadeiro
		se(
			(lobo == "le" e cabra == "le" e repolho == "ld" e padre =="ld") ou
			(lobo == "ld" e cabra == "ld" e repolho == "le" e padre =="le")
		){
			imprimirStatus()
			escreva("\n\nO lobo comeu a cabra")
			continuarJogo = falso
		} senao se (
			(lobo == "le" e cabra == "ld" e repolho == "ld" e padre =="le") ou
			(lobo == "ld" e cabra == "le" e repolho == "le" e padre =="ld")
		){
			imprimirStatus()
			escreva("\n\nA cabra comeu o repolho")
			continuarJogo = falso
		} senao se (lobo == "ld" e cabra == "ld" e repolho == "ld" e padre =="ld") {
			imprimirStatus()
			escreva("\n\nVocê venceu! Todos estão do lado direito")
			continuarJogo = falso
		}
		retorne continuarJogo
	}

	funcao vazio imprimirStatus(){
		escreva("\n\n")
						escreva("    * Travessia do Rio *\n")
						escreva("***************************\n")
						escreva("* / LE \\ |~~~~~~~| / LD \\ *\n")
						escreva("*--------|~~~~~~~|--------*\n")
		se(lobo == "le") 	escreva("* L      |~~~~~~~|        *\n")
		senao  			escreva("*        |~~~~~~~|      L *\n")

		se(cabra == "le") 	escreva("* C      |~~~~~~~|        *\n")
		senao 			escreva("*        |~~~~~~~|      C *\n")

		se(repolho == "le") escreva("* R      |~~~~~~~|        *\n")
		senao 			escreva("*        |~~~~~~~|      R *\n")
		
		se(padre == "le") 	escreva("*        |P~~~~~~|        *\n")
		senao 			escreva("*        |~~~~~~P|        *\n")
						escreva("***************************\n")
	}

	funcao vazio imprimirComandos(){
		escreva("\n          ***** COMANDOS ****** \n")
		escreva("Para mover o lobo    (L) precione a tecla \"l\"\n")
		escreva("Para mover a cabra   (C) precione a tecla \"c\"\n")
		escreva("Para mover o repolho (R) precione a tecla \"r\"\n")
		escreva("Para mover o pastor  (P) precione a tecla \"p\"\n")
	}

	funcao logico podeTrocarLado(logico soPadre, cadeia personagemLado){ 
		se (
			(personagemLado == "le" e padre == "le") ou
			(personagemLado == "ld" e padre == "ld")
		){
			retorne verdadeiro
		}
		senao {
			retorne falso
		}
	}

	funcao cadeia trocarLado(cadeia posicao){
		se(posicao == "le"){
			posicao = "ld"
		}
		senao {
			posicao  = "le"
		}
		moverPadre()
		retorne posicao
	}

	funcao vazio moverPadre(){
		se(padre == "le"){
			padre = "ld"
		} senao {
			padre = "le"
		}
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 4438; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */