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
public class ClieFornec {
    private int codigo;
    private String razaoSocial;

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getRazaoSocial() {
        return razaoSocial;
    }

    public void setRazaoSocial(String razaoSocial) {
        this.razaoSocial = razaoSocial;
    }

    public ClieFornec() {
    }

    public ClieFornec(int codigo, String razaoSocial) {
        this.codigo = codigo;
        this.razaoSocial = razaoSocial;
    }
}
