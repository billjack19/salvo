/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author CDI
 */
public class Coluna {
    private String tabela;
    private String descricao;
    private String tipo;
    private String is_null;
    private int tamanho;

    public String getTabela() {
        return tabela;
    }

    public void setTabela(String tabela) {
        this.tabela = tabela;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getIs_null() {
        return is_null;
    }

    public void setIs_null(String is_null) {
        this.is_null = is_null;
    }

    public int getTamanho() {
        return tamanho;
    }

    public void setTamanho(int tamanho) {
        this.tamanho = tamanho;
    }

    public Coluna(String tabela, String descricao, String tipo, String is_null, int tamanho) {
        this.tabela = tabela;
        this.descricao = descricao;
        this.tipo = tipo;
        this.is_null = is_null;
        this.tamanho = tamanho;
    }

    public Coluna() {
    }
}
