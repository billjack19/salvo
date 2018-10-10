/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

import java.util.ArrayList;

/**
 *
 * @author Jack Biller
 */
public class Resultado {
    private int resultado;
    private String query;
    private String erro;
    private ArrayList<Resultado> subResultado;

    public String getQuery() {
        return query;
    }

    public void setQuery(String query) {
        this.query = query;
    }

    public String getErro() {
        return erro;
    }

    public void setErro(String erro) {
        this.erro = erro;
    }

    public int getResultado() {
        return resultado;
    }

    public void setResultado(int resultado) {
        this.resultado = resultado;
    }

    public ArrayList<Resultado> getSubResultado() {
        return subResultado;
    }

    public void setSubResultado(ArrayList<Resultado> subResultado) {
        this.subResultado = subResultado;
    }
    
    public void setRQE(int resultado, String query, String erro){
        this.resultado = resultado;
        this.query = query;
        this.erro = erro;
    }
}
