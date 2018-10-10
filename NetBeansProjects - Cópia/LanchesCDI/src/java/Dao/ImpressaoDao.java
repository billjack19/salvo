/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.ClienteContato;
import Model.LancPedidosItens;
import java.awt.print.PrinterException;
import java.awt.print.PrinterJob;
import java.math.BigDecimal;
import java.math.RoundingMode;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.text.MessageFormat;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Locale;
import javax.print.PrintService;
import javax.print.attribute.HashPrintRequestAttributeSet;
import javax.print.attribute.PrintRequestAttributeSet;
import javax.print.attribute.standard.MediaSizeName;
import javax.swing.JEditorPane;

/**
 *
 * @author Jack Biller
 */
public class ImpressaoDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    
    private int cont;
    private String seguencia;
    
    private final String nomeImpressoraComanda = "\\\\cdi_info_64\\MP-4200 TH";
    private final String nomeImpressoraSenha = "\\\\cdi_info_64\\MP-4200 TH";
    //nomeImpressora = "MP-4200 TH";
    //nomeImpressora = "\\\\cdi_info_64\\MP-4200 TH";
    //nomeImpressora = "PDFCreator";

    private String tituloPagina;
    private String dataFormatada;
    private String listaItens;
    private String nome;
    private String telefone;


    public String imprimirComanda(int filial, String documento, List<LancPedidosItens> listaIntens, ClienteContato cliente) throws PrinterException{
        dataFormatada = dataAtual();
        
        if(cliente.getNome() != null && !"".equals(cliente.getNome().replaceAll(" ", ""))){
            nome = "<h4 style='padding: 0;margin: 0;margin-top: -15px;'>"
                    + "<b>Nome</b>: " + cliente.getNome()
                    + "</h4>";
        } else {
            nome = "";
        }
        
        if(cliente.getTelefone() != null && !"".equals(cliente.getTelefone().replaceAll(" ", ""))){
            telefone = "<h4 style='padding: 0;margin: 0;margin-top: -15px;'>"
                    + "<b>Telefone</b>: " + cliente.getTelefone()
                    + "</h4>";
        } else {
            telefone = "";
        }
        
        //List<LancPedidosItens> listaIntens = listarLancPedidosItensImpressaoDao(filial, documento);
        listaItens = "";
        BigDecimal qtd;
        for(Integer i = 0; i < listaIntens.size(); i++){
            qtd = ConvertStringValueToBigDecimal(Float.toString(listaIntens.get(i).getQuantidade()), 0);
            if(listaIntens.get(i).getItemNome() != null){
                //listaItens += "<tr>";
                listaItens += "<div style='border-bottom-style: solid;border-width: thin;font-family: calibri;'>"
                        + "<table style='width: 100%;font-size: 7px;'>"
                        + "<tr>"
                        + "<td align='center' style='font-size: 12px;width: 15%;'>"
                        + qtd
                        + "</td>"
                        + "<td style='width: 75%;'>";
                listaItens +=       listaIntens.get(i).getItemNome();
                if(listaIntens.get(i).getComposicao() != null){
                    listaItens +=       listaIntens.get(i).getComposicao();
                }
                if(listaIntens.get(i).getPreparo() != null) {
                    listaItens +=       listaIntens.get(i).getPreparo();
                }
                if(listaIntens.get(i).getAdicionalSPreco() != null){
                    listaItens +=       listaIntens.get(i).getAdicionalSPreco();
                }
                listaItens += "</td>"
                            + "<td style='width: 10%;'>"
                                + "<div style=\"border-style: solid;width: 10px;height: 10px;\"></div>"
                            + "</td>"
                        + "</tr>"
                        + "</table>"
                        + "</div>";
            }
        }
        
        String textHTML = ""
                + "<table width=\"100%\" style='font-family: calibri;margin-top: -25px;'>"
                    + "<tr>"
                        + "<td width=\"50%\">"
                            + "<span style='font-size: 5px;'><b>Emissão</b>: " + dataFormatada + "</span>"
                        + "</td>"
                        + "<td width=\"50%\">"
                            + "<span style='font-size: 5px;'><b>Pedido</b>: " + documento + "</span>"
                        + "</td>"
                    + "</tr>"
                + "</table>"
                + "<br>"
                + "<center>"+nome+telefone+"</center>"

                + "<div style='border-bottom-style: solid;border-width: thin;font-family: calibri;'>"
                    + "<table style='width: 100%;font-size: 7px;'>"
                        + "<tr>"
                            + "<td align='center' style='width: 15%;'>"
                                + "<b>QTDE</b>"
                            + "</td>"
                            + "<td style='width: 75%;'>"
                                + "<b>PRODUTO</b>"
                            + "</td>"
                            + "<td style='width: 10%;'>"
                                + "<b>OK</b>"
                            + "</td>"
                        + "</tr>"
                    + "</table>"
                + "</div>"
                +listaItens;
        JEditorPane conteudo = new JEditorPane("text/html", textHTML);
        tituloPagina = "Comanda (Cozinha)";
        
        return imprimirArquivo(conteudo, nomeImpressoraComanda, tituloPagina);
        //return textHTML;
        //return "1";
    }
    
    
    
    public String imprimirSenha(int filial, String documento,  List<LancPedidosItens> listaIntens, ClienteContato cliente) throws PrinterException{
        dataFormatada = dataAtual();
        listaItens = "";

        //ClienteContato cliente = retornaClienteContato(filial, documento);
        if(cliente.getNome() != null && !"".equals(cliente.getNome().replaceAll(" ", ""))){
            nome = "<h3 style='padding: 0;margin: 0;margin-top: -15px;'>"
                               + "<b>Nome</b>: " + cliente.getNome()
                            + "</h3>";
        } else {
            nome = "";
        }
        
        if(cliente.getTelefone() != null && !"".equals(cliente.getTelefone().replaceAll(" ", ""))){
            telefone = "<h3 style='padding: 0;margin: 0;margin-top: -15px;'>"
                               + "<b>Telefone</b>: " + cliente.getTelefone()
                            + "</h3>";
        } else {
            telefone = "";
        }

        String qtd;
        String vlrUni;
        String total;
        String codIten;
        int indice = 0;
        String posicaoAtual;
        float totalPedido = 0;
        DecimalFormat df = new DecimalFormat("#,###.00");
        DecimalFormat df2 = new DecimalFormat("#,####.000");

        for(Integer i = 0; i < listaIntens.size(); i++){
            indice++;

            posicaoAtual = "000"+Integer.toString(indice);
            posicaoAtual = posicaoAtual.substring(posicaoAtual.length()-3, posicaoAtual.length());

            codIten = "000000" + Integer.toString(listaIntens.get(i).getItem());
            codIten = codIten.substring(codIten.length() - 6, codIten.length());

            totalPedido += listaIntens.get(i).getValorTotal();
            qtd = df2.format(listaIntens.get(i).getQuantidade());
            vlrUni = df.format(listaIntens.get(i).getValorUnitario());
            total = df.format(listaIntens.get(i).getValorTotal());

            if(listaIntens.get(i).getItemNome() != null){
                listaItens += "<div style='border-bottom-style: solid;border-width: thin;font-family: calibri;margin-top: -15px;'>"
                        + "<table style='width: 100%;font-size: 5px;'>"
                        + "<tr>"
                            + "<td style='width: 90%;font-size: 5px;'>";

                listaItens +=           posicaoAtual + " " + codIten + " " + listaIntens.get(i).getItemNome();
                if(listaIntens.get(i).getComposicao() != null){
                    listaItens +=       listaIntens.get(i).getComposicaoFiscal();
                }
                if(listaIntens.get(i).getPreparo() != null) {
                    listaItens +=       listaIntens.get(i).getPreparoFiscal();
                }
                if(listaIntens.get(i).getAdicionalSPreco() != null){
                    listaItens +=       listaIntens.get(i).getAdicional();
                }
                listaItens +=           " " + qtd + " " + listaIntens.get(i).getUnidadeMedida() + " X " + vlrUni;
                listaItens += "</td>"
                            + "<td align='right' style='font-size: 5px;width: 10%;'>"
                                + total
                            + "</td>"
                        + "</tr>"
                        + "</table>"
                        + "</div>";
            }
        }
        String subTotalForm = df.format(totalPedido);
        String totalPedidoForm = df.format(totalPedido-cliente.getValDesconto());
        
        String textHTML = ""
                + "<table>"
                + "<tr>"
                    + "<td width='20%'>"
        + "<img src=\"file:///C:/xampp/htdocs/Lanches_CDI/lanche.png\" height='2cm' width='2cm'>"
                    + "</td>"
                    + "<td align='center' width='80%'>"
                        + "<h2>Magrão Lanches</h2>"
                    + "</td>"
                + "</tr>"
                + "</table>"
                + "<table width=\"100%\" style='margin-top: -25px;'>"
                + "<tr>"
                + "<td width=\"100%\">"
                    + "<span style='font-size: 5px;'><b>Emissão</b>: " + dataFormatada + "</span>"
                + "</td>"
                //+ "<td width=\"50%\"> </td>"
                + "</tr>"
                + "</table>"
                + "<center>"
                    + nome
                    + telefone
                    + "<h1 style='padding: 0;margin: 0;margin-top: -15px;margin-bottom: -25px;'>"
                        + "<b>Senha</b>: " + documento
                    + "</h1>"
                    + "<span style='font-size:5px'>NÃO É DOCUMENTO FISCAL</span>"
                + "</center>"
                + "<br>"                
                + "<div style='border-bottom-style: solid;border-width: thin;font-family: calibri;margin-top: -25px;'>"
                + "<table style='width: 100%;font-size: 5px;'>"
                    + "<tr>"
                        + "<td style='width: 100%;'>"
                            + " # | COD | DESC | QTDE | VL UN (R$) | VL ITEM R$"
                        + "</td>"
                    + "</tr>"
                + "</table>"
                + "</div>"
                + listaItens
                + " <div style='border-bottom-style: solid;border-width: thin;font-family: calibri;margin-top: -15px;'>"
                    + "<table style='width: 100%;font-size: 5px;'>";
        if(cliente.getValDesconto() > 0){
            textHTML += ""
                        + "<tr>"
                            + "<td align='right' style='width: 50%;'>"
                                + "SUB-TOTAL: R$"
                            + "</td>"
                            + "<td align='right' style='width: 50%;'>"
                                + subTotalForm
                            + "</td>"
                        + "</tr>"
                        + "<tr>"
                            + "<td align='right' style='width: 50%;'>"
                                + "DESCONTO: R$"
                            + "</td>"
                            + "<td align='right' style='width: 50%;'>"
                                + cliente.getDesconto()
                            + "</td>"
                        + "</tr>";
        }
        textHTML += ""
                        + "<tr>"
                            + "<td align='right' style='width: 50%;'>"
                                + "TOTAL: R$"
                            + "</td>"
                            + "<td align='right' style='width: 50%;'>"
                                + totalPedidoForm
                            + "</td>"
                        + "</tr>"
                    + "</table>"
                + "</div>"
                    + cliente.getPagamento()
                + " <div style='border-bottom-style: solid;border-width: thin;font-family: calibri;margin-top: -15px;'>"
                    + "<table style='width: 100%;font-size: 5px;'>"
                        + "<tr>"
                            + "<td align='right' style='width: 50%;'>"
                                + "TROCO: R$"
                            + "</td>"
                            + "<td align='right' style='width: 50%;'>"
                                + cliente.getTroco()
                            + "</td>"
                        + "</tr>"
                    + "</table>"
                + "</div>";
        JEditorPane conteudo = new JEditorPane("text/html", textHTML);
        tituloPagina = "";
        nome = "";
        return imprimirArquivo(conteudo, nomeImpressoraSenha, tituloPagina)+"\n\n"+cliente.getPagamento();//+"\n\n***** HTML *****\n\n"+textHTML;
        //return textHTML;
        //return "1";
    }
    
    
    
    
    
    

    public ClienteContato retornaClienteContato (int filial, String documento){
        ClienteContato cliente = new ClienteContato();
        DecimalFormat df = new DecimalFormat("#,###.00");

        try {
            sql = " SELECT CONTATO, Observacao, Desconto, ValorTroco"
                    + " FROM Lanc_Pedidos"
                    + " WHERE Filial = " + filial
                    + " AND Documento = '" + documento + "'";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                cliente.setFilial(filial);
                cliente.setDocumento(documento);
                cliente.setNome(rs.getString("CONTATO"));
                cliente.setTelefone(rs.getString("Observacao"));
                cliente.setValDesconto(rs.getFloat("Desconto"));
                if(rs.getFloat("Desconto") >= 1)        cliente.setDesconto(df.format(rs.getFloat("Desconto")));
                else if(rs.getFloat("Desconto") != 0)   cliente.setDesconto("0"+df.format(rs.getFloat("Desconto")));
                else                                    cliente.setDesconto("0,00");
                if(rs.getFloat("ValorTroco") >= 1)      cliente.setTroco(df.format(rs.getFloat("ValorTroco")));
                else if(rs.getFloat("ValorTroco") != 0) cliente.setTroco("0"+df.format(rs.getFloat("ValorTroco")));
                else                                    cliente.setTroco("0,00");
            }
            Conexao.fecharConexao(con, pst, rs);
            
            sql = " SELECT Lanc_Pedidos_Vencimento.Valor, CondPagamento.DESCRICAO"
                + " FROM Lanc_Pedidos_Vencimento Lanc_Pedidos_Vencimento"
                + " INNER JOIN CondPagamento CondPagamento ON Lanc_Pedidos_Vencimento.CondPagamento = CondPagamento.Codigo"
                + " WHERE Filial = " + filial
                + " AND Documento = '" + documento + "'";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            cliente.setPagamento(
                    "<div style='border-bottom-style: solid;border-width: thin;font-family: calibri;margin-top: -15px;'>"
                            + "<table style='width: 100%;font-size: 5px;'>"
            );
            while (rs.next()) {
                cliente.setPagamento(
                    cliente.getPagamento()
                    + "<tr>"
                        + "<td align='right' style='width: 50%;'>"
                            + rs.getString("DESCRICAO")+": R$"
                        + "</td>"
                        + "<td align='right' style='width: 50%;'>"
                            + df.format(rs.getFloat("Valor"))
                        + "</td>"
                    + "</tr>"
                );
            }
            cliente.setPagamento(
                    cliente.getPagamento()
                        + "</table>"
                    + "</div>"
            );

            return cliente;
        } catch (SQLException ex) {
            cliente.setDocumento(ex.getMessage());
            return cliente;
        }
    }
    
    
    
    
    

    
    
    
    
    public List<LancPedidosItens> listarLancPedidosItensImpressaoDao(int filial, String documento) {
        List<LancPedidosItens> LancPedidosItens = new ArrayList<>();
        LancPedidosItens _LancPedidosItens = null;
        try {
            sql = "SELECT la.ID_Lanc_Pedidos_Itens, "
                    + "la.Filial, "
                    + "la.Documento, "
                    + "la.Sequencia, "
                    + "la.ITEM, "
                    + "la.QUANTIDADE, "
                    + "la.VALOR_UNITARIO, "
                    + "la.VALOR_TOTAL, "
                    + "coalesce(la.FlagImpressao, 0) AS FlagImpressao"
                    + ", i.DESCRICAO, i.UNIDADE_MEDIDA "
                    + "FROM LANC_PEDIDOS_ITENS la "
                    + "INNER JOIN ITEM i ON la.ITEM = i.ITEM "
                    + "WHERE Filial = " + filial + " "
                    + "AND Documento = '" + documento + "';";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItens = new LancPedidosItens();
                _LancPedidosItens.setIdLancPedido(rs.getInt("ID_Lanc_Pedidos_Itens"));
                //_LancPedidosItens.setLancPedidoId(rs.getInt("lancPedidoId"));
                _LancPedidosItens.setFilial(rs.getInt("Filial"));
                _LancPedidosItens.setDocumento(rs.getString("Documento"));
                _LancPedidosItens.setSequencia(rs.getInt("Sequencia"));
                _LancPedidosItens.setItem(rs.getInt("ITEM"));
                _LancPedidosItens.setQuantidade(rs.getFloat("QUANTIDADE"));
                _LancPedidosItens.setValorUnitario(rs.getFloat("VALOR_UNITARIO"));
                _LancPedidosItens.setValorTotal(rs.getFloat("VALOR_TOTAL"));
                _LancPedidosItens.setItemNome(rs.getString("DESCRICAO"));
                _LancPedidosItens.setFlagImpressao(rs.getInt("FlagImpressao"));
                _LancPedidosItens.setUnidadeMedida(rs.getString("UNIDADE_MEDIDA"));

                LancPedidosItens.add(_LancPedidosItens);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for(Integer i = 0; i < LancPedidosItens.size(); i++){
                cont = 0;
                sql = "SELECT i.DESCRICAO"
                        + " FROM Lanc_pedidos_itens_Excessao iex"
                        + " INNER JOIN item i on iex.item = i.item"
                        + " WHERE iex.ID_Lanc_Pedidos_itens = " + LancPedidosItens.get(i).getIdLancPedido();
                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) {
                    if (cont == 0) {
                        LancPedidosItens.get(i).setComposicao("<br>******** EXCEÇÃO ********<br>"+rs.getString("DESCRICAO"));
                        LancPedidosItens.get(i).setComposicaoFiscal("** EXCEÇÃO: "+rs.getString("DESCRICAO"));
                    } else {
                        LancPedidosItens.get(i).setComposicao(
                            LancPedidosItens.get(i).getComposicao()+", "+rs.getString("DESCRICAO")
                        );
                        LancPedidosItens.get(i).setComposicaoFiscal(
                            LancPedidosItens.get(i).getComposicaoFiscal()+", "+rs.getString("DESCRICAO")
                        );
                    }
                    cont++;
                }
                Conexao.fecharConexao(con, pst, rs);
                
                cont = 0;
                sql = "SELECT DescricaoPreparo"
                        + " FROM Lanc_Pedidos_Itens_Preparo"
                        + " WHERE ID_TabPreparoProdutosItens = " + LancPedidosItens.get(i).getIdLancPedido();
                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) {
                    if (cont == 0) {
                        LancPedidosItens.get(i).setPreparo("<br>******** PREPARO ********<br>"+rs.getString("DescricaoPreparo"));
                        LancPedidosItens.get(i).setPreparoFiscal("** PREPARO: "+rs.getString("DescricaoPreparo"));
                    } else {
                        LancPedidosItens.get(i).setPreparo(
                            LancPedidosItens.get(i).getPreparo()+", "+rs.getString("DescricaoPreparo")
                        );
                        LancPedidosItens.get(i).setPreparoFiscal(
                            LancPedidosItens.get(i).getPreparoFiscal()+", "+rs.getString("DescricaoPreparo")
                        );
                    }
                    cont++;
                }
                Conexao.fecharConexao(con, pst, rs);
                
                cont = 0;
                sql = "SELECT i.DESCRICAO, iex.VALOR_UNITARIO"
                        + " FROM Lanc_Pedidos_Itens_Adicional iex"
                        + " INNER JOIN item i on iex.item = i.item"
                        + " WHERE iex.ID_TabAdicionalProdutosItens = " + LancPedidosItens.get(i).getIdLancPedido();
                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) {
                    seguencia = Float.toString(rs.getFloat("VALOR_UNITARIO"));
                    seguencia = " (R$ " + seguencia.replace(".", ",") + ")";
                    if (cont == 0) {
                        LancPedidosItens.get(i).setAdicional("** ADICIONAL: "+rs.getString("DESCRICAO") + seguencia);
                        LancPedidosItens.get(i).setAdicionalSPreco("<br>******** ADICIONAL ********<br>"+rs.getString("DESCRICAO"));
                    } else {
                        LancPedidosItens.get(i).setAdicional(
                            LancPedidosItens.get(i).getAdicional()+", "+rs.getString("DESCRICAO") + seguencia
                        );
                        LancPedidosItens.get(i).setAdicionalSPreco(
                            LancPedidosItens.get(i).getAdicionalSPreco()+", "+rs.getString("DESCRICAO")
                        );
                    }
                    cont++;
                }
                Conexao.fecharConexao(con, pst, rs);
            }

            return LancPedidosItens;
        } catch (SQLException ex) {
            return LancPedidosItens;
        }
    }
    
    
    
    
    
    

    public static String dataAtual(){
        Date d = new Date();

        String dia = Integer.toString(d.getDate());
        String mes = Integer.toString(d.getMonth() + 1);
        String ano = "20"+Integer.toString(d.getYear()).substring(1, Integer.toString(d.getYear()).length());//ano = ano;
        String hora = Integer.toString(d.getHours());
        String minuto = Integer.toString(d.getMinutes());
        String segundo = Integer.toString(d.getSeconds());

        if (Integer.parseInt(dia    ) < 10) dia     = "0" + dia;
        if (Integer.parseInt(mes    ) < 10) mes     = "0" + mes;
        if (Integer.parseInt(hora   ) < 10) hora    = "0" + hora;
        if (Integer.parseInt(minuto ) < 10) minuto  = "0" + minuto;
        if (Integer.parseInt(segundo) < 10) segundo = "0" + segundo;
        
        return dia+"/"+mes+"/"+ano+" "+hora+":"+minuto+":"+segundo;
    }
    
    public static BigDecimal ConvertStringValueToBigDecimal(String numero, Integer qtdeCasasDecimais) {
        String casasDecimais = "";
        String num = numero;
        DecimalFormat df = null;
        try {
            if (qtdeCasasDecimais > 0) {
                for (int i = 0; i < qtdeCasasDecimais; i++) {
                    casasDecimais = casasDecimais.concat("0");
                }
                if (num.equals("")) {
                    num = "0.".concat(casasDecimais);
                }
                df = new DecimalFormat("#,##0.".concat(casasDecimais), new DecimalFormatSymbols(new Locale("pt", "BR")));
                df.setParseBigDecimal(true); // aqui o pulo do gato
                df.setRoundingMode(RoundingMode.DOWN);
                return (BigDecimal) df.parse(num); // deve voltar o BigDecimal "1234.56"
            } else {
                if (num.equals("")) {
                    num = "0";
                }
                df = new DecimalFormat("###########");
                df.setParseBigDecimal(true);
                df.setRoundingMode(RoundingMode.DOWN);
                return new BigDecimal(((BigDecimal) df.parse(num)).intValue());
            }
        } catch (ParseException ex) {
            //Logger.getLogger(Utilitarios.class.getName()).log(Level.SEVERE, null, ex);
            return new BigDecimal("0");
        }
    }
    
    private static String imprimirArquivo(JEditorPane textHtml, String imp, String titulo) throws PrinterException{    
        //DocFlavor flavor = DocFlavor.INPUT_STREAM.TEXT_HTML_UTF_8; //POSTSCRIPT;
        PrintRequestAttributeSet aset = new HashPrintRequestAttributeSet();
        aset.add(MediaSizeName.ISO_A4);//ISO_A4
        //PrintService[] pservices = PrintServiceLookup.lookupPrintServices(flavor, aset);
        PrintService impressora = null;
        PrintService[] pservices = PrinterJob.lookupPrintServices();
        //PrintService[] pservices = PrinterJob.lookupPrintServices();
        String resultado = "";//"Imprimir >> ";
        resultado += pservices.length;
        if (pservices.length > 0) {
            for (PrintService ps : pservices) {
                resultado += "\nImpressora Encontrada: " + ps.getName();

                if (ps.getName().contains(imp)) {
                    resultado +=  "\nImpressora Selecionada: " + ps.getName();
                    impressora = ps;
                    break;
                }
            }
            //resultado += "tem mais de uma impressora >> ";
        } else {
            resultado += "não tem impressora >> ";
            // Não encontrou nenhuma impressora
            //System.out.println("Nenhuma impressora encontrada!");
        }
        resultado += "\n";
        if (impressora != null) {
            //DocPrintJob pj = impressora.createPrintJob();
            MessageFormat headerFormat = new MessageFormat(titulo);
            MessageFormat footerFormat = new MessageFormat("");
            //FileInputStream fis = new FileInputStream(filename);
            //Doc doc = new SimpleDoc(textHtml.getPo flavor, null);
            //pj.print(doc, aset);
            // print (cabecario, rodapé, caixa de dialogo, impressora selecionada, tipo impressao, interactive)
            textHtml.print(headerFormat, footerFormat, false, impressora, aset, true);
            //} catch (FileNotFoundException fe) {
            return resultado+"Imprimiu";
        } else {
            return resultado+"Não imprimiu";
            // Não selecionou nenhuma impressora
            //System.out.println("Falha ao imprimir: Nenhuma impressora selecionada!");
        }
        //return resultado;
    }
    
    
    /*public boolean gravarContato(ClienteContato cliente){
        //Observacao - Telefone
        //CONTATO - Nome
        try {
            sql = "UPDATE Lanc_Pedidos "
                    + " SET "
                        + " CONTATO = '" + cliente.getNome() + "',"
                        + " Observacao = '" + cliente.getTelefone() + "'"
                    + " WHERE "
                        + " Filial = " + cliente.getFilial()
                    + " AND"
                        + " Documento = '" + cliente.getDocumento() + "';";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst, rs);
            nome = cliente.getNome();
            //setarAdicionalProduto(idLancPedidoItem);

            return true;
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
            //return ex.toString();
        }
    }*/
    
    
    /*public Mesa dadosPedido(int filial, String documento) {
        //List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = new Mesa();
        try {
            sql = " SELECT"
                    + " Lanc_Pedidos.flagCancelada,"
                    + " Lanc_Pedidos.Condpagamento,"
                    + " CLIEFORNEC.RAZAOSOCIAL,"
                    + " Lanc_Pedidos.Emissao,"
                    + " Lanc_Pedidos.TOTAL,"
                    + " Lanc_Pedidos.USUARIOATUALIZACAO,"
                    + " Lanc_Pedidos.Vendedor,"
                    + " Lanc_Pedidos.Cliente"
                    + " FROM Lanc_Pedidos Lanc_Pedidos"
                    + " INNER JOIN CLIEFORNEC CLIEFORNEC ON Lanc_Pedidos.Cliente = CLIEFORNEC.CODIGO"
                    + " WHERE Filial = " + filial
                    + " AND Documento = '" + documento + "'";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa.setFilial(filial);
                _Mesa.setDocumento(documento);
                if (rs.getString("Emissao") == null) { _Mesa.setEmissao(""); }
                else { _Mesa.setEmissao(rs.getString("Emissao")); }
                _Mesa.setTotal(rs.getFloat("TOTAL"));
                _Mesa.setCliente(rs.getInt("Cliente"));
                _Mesa.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                _Mesa.setCondPagamento(rs.getInt("Condpagamento"));
                _Mesa.setCancelada(rs.getInt("flagCancelada"));
                _Mesa.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                _Mesa.setVendedor(rs.getInt("Vendedor"));
                //Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return _Mesa;
        } catch (SQLException ex) {
            _Mesa.setDescricao(ex.getMessage());
            return _Mesa;
        }
    }*/
}
