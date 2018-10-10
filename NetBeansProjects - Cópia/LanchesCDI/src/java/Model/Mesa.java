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
public class Mesa {
    private int codigo;
    private String descricao;
    //private int inativo;    
    private int filial;
    private String documento;
    private String emissao;
    private float total;
    private int cliente;
    private String identificacao;
    private int condPagamento;
    private int cancelada;
    private int vendedor;

    private String razaoSocial;
    private String contato;

    private float desconto;
    private float troco;
    private float dinheiro;
    private float cartaoDebito;
    private float cartaoCredito;
    
    public int getCondPagamento() {
        return condPagamento;
    }

    public void setCondPagamento(int condPagamento) {
        this.condPagamento = condPagamento;
    }

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
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

    public String getRazaoSocial() {
        return razaoSocial;
    }

    public void setRazaoSocial(String razaoSocial) {
        this.razaoSocial = razaoSocial;
    }

    public int getVendedor() {
        return vendedor;
    }

    public void setVendedor(int vendedor) {
        this.vendedor = vendedor;
    }

    public int getCancelada() {
        return cancelada;
    }

    public void setCancelada(int cancelada) {
        this.cancelada = cancelada;
    }

    public float getDesconto() {
        return desconto;
    }

    public void setDesconto(float desconto) {
        this.desconto = desconto;
    }

    public float getTroco() {
        return troco;
    }

    public void setTroco(float troco) {
        this.troco = troco;
    }

    public float getDinheiro() {
        return dinheiro;
    }

    public void setDinheiro(float dinheiro) {
        this.dinheiro = dinheiro;
    }
    
    public String getContato() {
        return contato;
    }

    public void setContato(String contato) {
        this.contato = contato;
    }

    public float getCartaoDebito() {
        return cartaoDebito;
    }

    public void setCartaoDebito(float cartaoDebito) {
        this.cartaoDebito = cartaoDebito;
    }

    public float getCartaoCredito() {
        return cartaoCredito;
    }

    public void setCartaoCredito(float cartaoCredito) {
        this.cartaoCredito = cartaoCredito;
    }

    public Mesa() {
    }

    public Mesa(int codigo, String descricao, int filial, String documento, String emissao, float total, int cliente, String identificacao, int condPagamento, int cancelada, int vendedor, String razaoSocial, String contato, float desconto, float troco, float dinheiro, float cartaoDebito, float cartaoCredito) {
        this.codigo = codigo;
        this.descricao = descricao;
        this.filial = filial;
        this.documento = documento;
        this.emissao = emissao;
        this.total = total;
        this.cliente = cliente;
        this.identificacao = identificacao;
        this.condPagamento = condPagamento;
        this.cancelada = cancelada;
        this.vendedor = vendedor;
        this.razaoSocial = razaoSocial;
        this.contato = contato;
        this.desconto = desconto;
        this.troco = troco;
        this.dinheiro = dinheiro;
        this.cartaoDebito = cartaoDebito;
        this.cartaoCredito = cartaoCredito;
    }
    
    
}
