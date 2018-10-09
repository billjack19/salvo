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
public class ContatoCliente {
    private int cliente; // CODIGO
    private String telefone; // Telefone

    public int getCliente() {
        return cliente;
    }

    public void setCliente(int cliente) {
        this.cliente = cliente;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public ContatoCliente(int cliente, String telefone) {
        this.cliente = cliente;
        this.telefone = telefone;
    }

    public ContatoCliente() {
    }
}
