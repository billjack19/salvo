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
public class ClienteContato {
    private int filial;
    private String documento;
    private String nome;
    private String telefone;
    private String desconto;
    private String pagamento;
    private String troco;
    private String entrega;
    private float valEntrega;
    private float valDesconto;

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

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public String getDesconto() {
        return desconto;
    }

    public void setDesconto(String desconto) {
        this.desconto = desconto;
    }

    public String getPagamento() {
        return pagamento;
    }

    public void setPagamento(String pagamento) {
        this.pagamento = pagamento;
    }

    public String getTroco() {
        return troco;
    }

    public void setTroco(String troco) {
        this.troco = troco;
    }

    public String getEntrega() {
        return entrega;
    }

    public void setEntrega(String entrega) {
        this.entrega = entrega;
    }

    public float getValEntrega() {
        return valEntrega;
    }

    public void setValEntrega(float valEntrega) {
        this.valEntrega = valEntrega;
    }

    public float getValDesconto() {
        return valDesconto;
    }

    public void setValDesconto(float valDesconto) {
        this.valDesconto = valDesconto;
    }

    public ClienteContato() {
    }
    
    public ClienteContato(int filial, String documento, String nome, String telefone, String desconto, String pagamento, String troco, String entrega, float valEntrega, float valDesconto) {
        this.filial = filial;
        this.documento = documento;
        this.nome = nome;
        this.telefone = telefone;
        this.desconto = desconto;
        this.pagamento = pagamento;
        this.troco = troco;
        this.entrega = entrega;
        this.valEntrega = valEntrega;
        this.valDesconto = valDesconto;
    }
    
    
}
