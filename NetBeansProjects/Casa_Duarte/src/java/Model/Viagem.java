/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

import java.util.List;

/**
 *
 * @author Jack Biller
 */
public class Viagem {
    private int codigo;
    private String endInicial;
    private String endFinal;
    private List<Viagem_item> endEntrega;
    private Caminhao caminhao;
    private Motorista motorista;
    private float distancia;
    private float duracao;
    private String pesoTotal;
    private String observacao;
    private int ck_inativo;
    private int ck_entregue;
    private String hora_saida;

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getEndInicial() {
        return endInicial;
    }

    public void setEndInicial(String endInicial) {
        this.endInicial = endInicial;
    }

    public String getEndFinal() {
        return endFinal;
    }

    public void setEndFinal(String endFinal) {
        this.endFinal = endFinal;
    }

    public List<Viagem_item> getEndEntrega() {
        return endEntrega;
    }

    public void setEndEntrega(List<Viagem_item> endEntrega) {
        this.endEntrega = endEntrega;
    }

    public Caminhao getCaminhao() {
        return caminhao;
    }

    public void setCaminhao(Caminhao caminhao) {
        this.caminhao = caminhao;
    }

    public Motorista getMotorista() {
        return motorista;
    }

    public void setMotorista(Motorista motorista) {
        this.motorista = motorista;
    }

    public float getDistancia() {
        return distancia;
    }

    public void setDistancia(float distancia) {
        this.distancia = distancia;
    }

    public float getDuracao() {
        return duracao;
    }

    public void setDuracao(float duracao) {
        this.duracao = duracao;
    }

    public String getPesoTotal() {
        return pesoTotal;
    }

    public void setPesoTotal(String pesoTotal) {
        this.pesoTotal = pesoTotal;
    }

    public String getObservacao() {
        return observacao;
    }

    public void setObservacao(String observacao) {
        this.observacao = observacao;
    }

    public int getCk_inativo() {
        return ck_inativo;
    }

    public void setCk_inativo(int ck_inativo) {
        this.ck_inativo = ck_inativo;
    }

    public int getCk_entregue() {
        return ck_entregue;
    }

    public void setCk_entregue(int ck_entregue) {
        this.ck_entregue = ck_entregue;
    }

    public String getHora_saida() {
        return hora_saida;
    }

    public void setHora_saida(String hora_saida) {
        this.hora_saida = hora_saida;
    }
}
