/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.TabUsuarios;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;


/**
 *
 * @author jack
 */
public class TabUsuarioDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    
    public List<TabUsuarios> autenticaJogador(String identificador, String senha) throws SQLException {
        List<TabUsuarios> usuarios = new ArrayList<>();
        TabUsuarios _TabUsuarios = null;
        sql = "SELECT Identificacao, Senha, Nome, Vendedor, FILIAL FROM TabUsuarios "
                + "WHERE Identificacao = '"+identificador+"' "
                + "AND Senha = '"+senha+"';";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            _TabUsuarios = new TabUsuarios();
            _TabUsuarios.setIdentificador(rs.getString("Identificacao"));
            _TabUsuarios.setNome(rs.getString("Nome"));
            _TabUsuarios.setSenha(rs.getString("Senha"));
            _TabUsuarios.setVendedor(rs.getInt("Vendedor"));
            _TabUsuarios.setFilial(rs.getInt("FILIAL"));

            usuarios.add(_TabUsuarios);
        }
        Conexao.fecharConexao(con, pst, rs);
        return usuarios;
    }
}
