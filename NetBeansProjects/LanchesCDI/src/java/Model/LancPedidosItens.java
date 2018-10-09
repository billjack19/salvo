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
public class LancPedidosItens {
    private int idLancPedido;
    //private int lancPedidoId;
    private int filial;
    private String documento;
    private int sequencia;
    private int item;
    private float quantidade;
    private float valorUnitario;
    private float valorTotal;
    private String itemNome;
    private int grupoItem;
    private int subGrupoItem;
    private String unidadeMedida;
    private String adicionalProduto;
    private String horaComplemento;
    private int flagImpressao;
    
    private String composicao;
    private String composicaoFiscal;
    private String preparo;
    private String preparoFiscal;
    private String adicional;
    private String adicionalSPreco;

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

    public int getSequencia() {
        return sequencia;
    }

    public void setSequencia(int sequencia) {
        this.sequencia = sequencia;
    }

    public int getItem() {
        return item;
    }

    public void setItem(int item) {
        this.item = item;
    }

    public float getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(float quantidade) {
        this.quantidade = quantidade;
    }

    public float getValorUnitario() {
        return valorUnitario;
    }

    public void setValorUnitario(float valorUnitario) {
        this.valorUnitario = valorUnitario;
    }

    public float getValorTotal() {
        return valorTotal;
    }

    public void setValorTotal(float valorTotal) {
        this.valorTotal = valorTotal;
    }

    public String getItemNome() {
        return itemNome;
    }

    public void setItemNome(String itemNome) {
        this.itemNome = itemNome;
    }

    public int getGrupoItem() {
        return grupoItem;
    }

    public void setGrupoItem(int grupoItem) {
        this.grupoItem = grupoItem;
    }

    public int getSubGrupoItem() {
        return subGrupoItem;
    }

    public void setSubGrupoItem(int subGrupoItem) {
        this.subGrupoItem = subGrupoItem;
    }

    public String getUnidadeMedida() {
        return unidadeMedida;
    }

    public void setUnidadeMedida(String unidadeMedida) {
        this.unidadeMedida = unidadeMedida;
    }

    public String getAdicionalProduto() {
        return adicionalProduto;
    }

    public void setAdicionalProduto(String adicionalProduto) {
        this.adicionalProduto = adicionalProduto;
    }

    public String getHoraComplemento() {
        return horaComplemento;
    }

    public void setHoraComplemento(String horaComplemento) {
        this.horaComplemento = horaComplemento;
    }

    public int getFlagImpressao() {
        return flagImpressao;
    }

    public void setFlagImpressao(int flagImpressao) {
        this.flagImpressao = flagImpressao;
    }

    public String getComposicao() {
        return composicao;
    }

    public void setComposicao(String composicao) {
        this.composicao = composicao;
    }

    public String getPreparo() {
        return preparo;
    }

    public void setPreparo(String preparo) {
        this.preparo = preparo;
    }

    public String getAdicional() {
        return adicional;
    }

    public void setAdicional(String adicional) {
        this.adicional = adicional;
    }

    public String getAdicionalSPreco() {
        return adicionalSPreco;
    }

    public void setAdicionalSPreco(String adicionalSPreco) {
        this.adicionalSPreco = adicionalSPreco;
    }

    public String getComposicaoFiscal() {
        return composicaoFiscal;
    }

    public void setComposicaoFiscal(String composicaoFiscal) {
        this.composicaoFiscal = composicaoFiscal;
    }

    public String getPreparoFiscal() {
        return preparoFiscal;
    }

    public void setPreparoFiscal(String preparoFiscal) {
        this.preparoFiscal = preparoFiscal;
    }
}
