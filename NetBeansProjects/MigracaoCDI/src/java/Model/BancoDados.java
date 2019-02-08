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
public class BancoDados {
    private int id_registro;
    private String ServerName;
    private int Port_Number;
    private String database;
    private String user;
    private String senha;

    public int getId_registro() {
        return id_registro;
    }

    public void setId_registro(int id_registro) {
        this.id_registro = id_registro;
    }

    public String getServerName() {
        return ServerName;
    }

    public void setServerName(String ServerName) {
        this.ServerName = ServerName;
    }

    public int getPort_Number() {
        return Port_Number;
    }

    public void setPort_Number(int Port_Number) {
        this.Port_Number = Port_Number;
    }

    public String getDatabase() {
        return database;
    }

    public void setDatabase(String database) {
        this.database = database;
    }

    public String getUser() {
        return user;
    }

    public void setUser(String user) {
        this.user = user;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public BancoDados(int id_registro, String ServerName, int Port_Number, String database) {
        this.id_registro = id_registro;
        this.ServerName = ServerName;
        this.Port_Number = Port_Number;
        this.database = database;
    }

    public BancoDados() {
    }
}
