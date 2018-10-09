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
public class Fechamento {
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
    
    
    public String imprimirFechamento(int filial, String documento,  List<LancPedidosItens> listaIntens, ClienteContato cliente) throws PrinterException{
        dataFormatada = dataAtual();

        String qtd;
        String vlrUni;
        DecimalFormat df = new DecimalFormat("#,###.00");
        DecimalFormat df2 = new DecimalFormat("#,####.000");

        qtd = df2.format("valor");
        vlrUni = df.format("valor");

        String textHTML = ""
                + "<table width=\"100%\" style='margin-top: -25px;'>"
                + "<tr>"
                + "<td width=\"100%\">"
                    + "<span style='font-size: 5px;'><b>Emissão</b>: " + dataFormatada + "</span>"
                + "</td>"
                //+ "<td width=\"50%\"> </td>"
                + "</tr>"
                + "</table>";

        JEditorPane conteudo = new JEditorPane("text/html", textHTML);
        tituloPagina = "";
        nome = "";
        return imprimirArquivo(conteudo, nomeImpressoraSenha, tituloPagina);//+"\n\n"+cliente.getPagamento();
    }
    
    
    

/**
*
* Metodos genericos 
* */
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
}
