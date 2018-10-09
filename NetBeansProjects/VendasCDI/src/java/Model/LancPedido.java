/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author jack
 */
public class LancPedido {
    private int idLancPedido;
    private int filial;
    private String documento;
    private String emissao;
    private float total;
    private int cliente;
    private String identificacao;
    private int flagImpressao;
    private String razaoSocial;
    private int vendedor;
    private int ficha;
    private float desconto;

    public float getDesconto() {
        return desconto;
    }

    public void setDesconto(float desconto) {
        this.desconto = desconto;
    }
    
    

    public int getFicha() {
        return ficha;
    }

    public void setFicha(int ficha) {
        this.ficha = ficha;
    }

    public int getVendedor() {
        return vendedor;
    }

    public void setVendedor(int vendedor) {
        this.vendedor = vendedor;
    }

    public String getRazaoSocial() {
        return razaoSocial;
    }

    public void setRazaoSocial(String razaoSocial) {
        this.razaoSocial = razaoSocial;
    }

    public int getIdLancPedido() {
        return idLancPedido;
    }

    public void setIdLancPedido(int idLancPedido) {
        this.idLancPedido = idLancPedido;
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

    public String getEmissao() {
        return emissao;
    }

    public void setEmissao(String emissao) {
        this.emissao = emissao;
    }

    public float getTotal() {
        return total;
    }

    public void setTotal(float total) {
        this.total = total;
    }

    public int getCliente() {
        return cliente;
    }

    public void setCliente(int cliente) {
        this.cliente = cliente;
    }

    public String getIdentificacao() {
        return identificacao;
    }

    public void setIdentificacao(String identificacao) {
        this.identificacao = identificacao;
    }

    public int getFlagImpressao() {
        return flagImpressao;
    }

    public void setFlagImpressao(int flagImpressao) {
        this.flagImpressao = flagImpressao;
    }

    public LancPedido() {
    }

    public LancPedido(int idLancPedido, int filial, String documento, String emissao, float total, int cliente, String identificacao, int flagImpressao, String razaoSocial) {
        this.idLancPedido = idLancPedido;
        this.filial = filial;
        this.documento = documento;
        this.emissao = emissao;
        this.total = total;
        this.cliente = cliente;
        this.identificacao = identificacao;
        this.flagImpressao = flagImpressao;
        this.razaoSocial = razaoSocial;
    }
}

/*

{"filial":1,"documento":"00002","emissao":"2017-09-24","total":0,"cliente":3,"identificacao":"adm","flagImpressao":0}

*/