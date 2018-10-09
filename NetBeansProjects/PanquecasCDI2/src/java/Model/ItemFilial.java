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
public class ItemFilial {
    private int FILIAL;
    private int ITEM;
    private float PRECO_BASE;
    private float VALOR_INCLUSAO;

    public int getFILIAL() {
        return FILIAL;
    }

    public void setFILIAL(int FILIAL) {
        this.FILIAL = FILIAL;
    }

    public int getITEM() {
        return ITEM;
    }

    public void setITEM(int ITEM) {
        this.ITEM = ITEM;
    }

    public float getPRECO_BASE() {
        return PRECO_BASE;
    }

    public void setPRECO_BASE(float PRECO_BASE) {
        this.PRECO_BASE = PRECO_BASE;
    }

    public float getVALOR_INCLUSAO() {
        return VALOR_INCLUSAO;
    }

    public void setVALOR_INCLUSAO(float VALOR_INCLUSAO) {
        this.VALOR_INCLUSAO = VALOR_INCLUSAO;
    }
    
    
}
