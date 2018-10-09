Algoritmo "semnome"
// Disciplina  :  [Linguagem e Lógica de Programação]
// Professor   : Antonio Carlos Nicolodi
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 29/03/2018
Var
   // Seção de Declarações das variáveis
   destino, vantagem:caracter
   distancia:real
   valor_etanol, valor_gasolina:real
   media_etanol, media_gasolina:real
   consumo_etanol, consumo_gasolina:real
   preco_total_etanol, preco_total_gasolina:real
Inicio
   // Seção de Comandos, procedimento, funções, operadores, etc...
   repita
      escreval("Entre com o destino da viagem")
      leia(destino)
      escreval("Entre com a distância da viagem")
      leia(distancia)
      escreval("Entre com o valor do etanol")
      leia(valor_etanol)
      escreval("Entre com o valor da gasolina")
      leia(valor_gasolina)
      escreval("Entre com a media do etanol")
      leia(media_etanol)
      escreval("Entre com a media da gasolina")
      leia(media_gasolina)

      limpatela()

      consumo_etanol <- distancia / media_etanol
      consumo_gasolina <- distancia / media_gasolina
      preco_total_etanol <- consumo_etanol * valor_etanol
      preco_total_gasolina <- consumo_gasolina * valor_gasolina

      se preco_total_gasolina < preco_total_etanol entao
         vantagem <- "gasolina"
      senao
         vantagem <- "etanol"
      fimse
      
      destino <- "Você irá economizar indo até " + destino + " que fica á " + distancia + "Km" + " usando " + vantagem
      
      escreval(destino)
      escreval()
      escreval()
      escreval("RESUMO")
      escreval("Gasto Etanol: ", consumo_etanol,"l")
      escreval("Valor total: R$", preco_total_etanol)
      escreval()
      escreval("Gasto Gasolina: ",consumo_gasolina, "l")
      escreval("Valor total: R$",preco_total_gasolina)

      escreval("Deseja fazer outro calculo? (S/N)")
      leia(destino)
   
   ate destino == "N"
   fimrepita

Fimalgoritmo