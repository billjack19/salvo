/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author Jack Biller
 */
public class Envio_sms {
    private int id;
    private int filial;
    private String documento;
    private int cliente; // CODIGO
    private String razaoSocial; // RAZAOSOCIAL
    private String telefones;
    /*private String dt_email;
    private String email_para;
    private String email_cc;
    private String email_cco;
    private String assunto_email;
    private String mensagem_email;
    private String caminho_anexo;*/
    private int ck_enviado_sms;
    private String numero_origem;
    private String numero_destino;
    private String mensagem_sms;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getFilial() {
        return filial;
    }

    public void setFilial(int filial) {
        this.filial = filial;
    }

    public String getDocumento() {
        return documento;
    }

    public void setDocumento(String documento) {
        this.documento = documento;
    }

    public int getCk_enviado_sms() {
        return ck_enviado_sms;
    }

    public void setCk_enviado_sms(int ck_enviado_sms) {
        this.ck_enviado_sms = ck_enviado_sms;
    }

    public String getNumero_origem() {
        return numero_origem;
    }

    public void setNumero_origem(String numero_origem) {
        this.numero_origem = numero_origem;
    }

    public String getNumero_destino() {
        return numero_destino;
    }

    public void setNumero_destino(String numero_destino) {
        this.numero_destino = numero_destino;
    }

    public String getMensagem_sms() {
        return mensagem_sms;
    }

    public void setMensagem_sms(String mensagem_sms) {
        this.mensagem_sms = mensagem_sms;
    }

    public int getCliente() {
        return cliente;
    }

    public void setCliente(int cliente) {
        this.cliente = cliente;
    }

    public String getRazaoSocial() {
        return razaoSocial;
    }

    public void setRazaoSocial(String razaoSocial) {
        this.razaoSocial = razaoSocial;
    }

    public String getTelefones() {
        return telefones;
    }

    public void setTelefones(String telefones) {
        this.telefones = telefones;
    }
}