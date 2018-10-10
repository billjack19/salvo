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
public class Item {
    private int item;
    private int grupoItem;
    private int subGrupoItem;
    private String unidade_medida;
    private String descricao;

    public int getSubGrupoItem() {
        return subGrupoItem;
    }

    public void setSubGrupoItem(int subGrupoItem) {
        this.subGrupoItem = subGrupoItem;
    }

    public String getUnidade_medida() {
        return unidade_medida;
    }

    public void setUnidade_medida(String unidade_medida) {
        this.unidade_medida = unidade_medida;
    }

    
    
    public int getItem() {
        return item;
    }

    public void setItem(int item) {
        this.item = item;
    }

    public int getGrupoItem() {
        return grupoItem;
    }

    public void setGrupoItem(int grupoItem) {
        this.grupoItem = grupoItem;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Item() {
    }

    public Item(int item, int grupoItem, String descricao) {
        this.item = item;
        this.grupoItem = grupoItem;
        this.descricao = descricao;
    }
}
