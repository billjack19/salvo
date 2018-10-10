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
public class Grupo{
    private int grupoItem;
    private String descricao;
    private String imagem;

    public int getGrupotItem() {
        return grupoItem;
    }

    public void setGrupotItem(int grupoItem) {
        this.grupoItem = grupoItem;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public String getImagem() {
        return imagem;
    }

    public void setImagem(String imagem) {
        this.imagem = imagem;
    }

    public Grupo() {
    }

    public Grupo(int grupoItem, String descricao, String imagem) {
        this.grupoItem = grupoItem;
        this.descricao = descricao;
        this.imagem = imagem;
    }
}