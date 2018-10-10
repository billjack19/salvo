/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Jack Biller
 */
public class Viagem_item {
    private ArrayList<Integer> codigo;
    private String endEntrega;
    private String latitude;
    private String longitude;
    private String descEndEndrega;
    private String item;
    private String pedido;
    private float quantidade;
    private int bool_entrega;
    private int bool_cancelado;
    private Cliente cliente;
    private List<Item> itens;
    private String cep;

    public ArrayList<Integer> getCodigo() {
        return codigo;
    }

    public void setCodigo(ArrayList<Integer> codigo) {
        this.codigo = codigo;
    }

    public String getEndEntrega() {
        return endEntrega;
    }

    public void setEndEntrega(String endEntrega) {
        this.endEntrega = endEntrega;
    }

    public String getLatitude() {
        return latitude;
    }

    public void setLatitude(String latitude) {
        this.latitude = latitude;
    }

    public String getLongitude() {
        return longitude;
    }

    public void setLongitude(String longitude) {
        this.longitude = longitude;
    }

    public String getDescEndEndrega() {
        return descEndEndrega;
    }

    public void setDescEndEndrega(String descEndEndrega) {
        this.descEndEndrega = descEndEndrega;
    }

    public String getItem() {
        return item;
    }

    public void setItem(String item) {
        this.item = item;
    }

    public String getPedido() {
        return pedido;
    }

    public void setPedido(String pedido) {
        this.pedido = pedido;
    }

    public float getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(float quantidade) {
        this.quantidade = quantidade;
    }

    public int getBool_entrega() {
        return bool_entrega;
    }

    public void setBool_entrega(int bool_entrega) {
        this.bool_entrega = bool_entrega;
    }

    public int getBool_cancelado() {
        return bool_cancelado;
    }

    public void setBool_cancelado(int bool_cancelado) {
        this.bool_cancelado = bool_cancelado;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public List<Item> getItens() {
        return itens;
    }

    public void setItens(List<Item> itens) {
        this.itens = itens;
    }

    public String getCep() {
        return cep;
    }

    public void setCep(String cep) {
        this.cep = cep;
    }
}
