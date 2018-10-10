/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import Model.Cliente;

/**
 *
 * @author Jack Biller
 */
public class ClienteDao {    
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<Cliente> listarCliente() {
        List<Cliente> Clientes = new ArrayList<>();
        Cliente _Cliente = null;
        try {
            sql = "SELECT CLIEFORNEC.CODIGO, CLIEFORNEC.RAZAOSOCIAL, CLIEFORNEC_TELEFONE.Telefone"
                    + " FROM CLIEFORNEC CLIEFORNEC"
                    + " INNER JOIN CLIEFORNEC_TELEFONE CLIEFORNEC_TELEFONE"
                        + " ON CLIEFORNEC.CODIGO = CLIEFORNEC_TELEFONE.Cliente"
                    + " ORDER BY CLIEFORNEC.RAZAOSOCIAL;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Cliente = new Cliente();
                _Cliente.setCodigo(rs.getInt("CODIGO"));
                _Cliente.setRazaoSocial(rs.getString("RAZAOSOCIAL"));//+" "+rs.getString("Telefone"));

                Clientes.add(_Cliente);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Clientes;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Clientes;
        }
    }
    
    public List<Cliente> pesquisaCliente (Cliente _Cliente){
        List<Cliente> Clientes = new ArrayList<>();
        try {
            sql = "SELECT CLIEFORNEC.CODIGO, CLIEFORNEC.RAZAOSOCIAL, CLIEFORNEC_TELEFONE.Telefone"
                    + " FROM CLIEFORNEC CLIEFORNEC"
                    + " INNER JOIN CLIEFORNEC_TELEFONE CLIEFORNEC_TELEFONE"
                        + " ON CLIEFORNEC.CODIGO = CLIEFORNEC_TELEFONE.Cliente"
                    + " WHERE CLIEFORNEC.CODIGO LIKE '%" + _Cliente.getRazaoSocial() + "%'"
                    + " OR CLIEFORNEC.RAZAOSOCIAL LIKE '%" + _Cliente.getRazaoSocial() + "%'"
                    + " OR CLIEFORNEC_TELEFONE.Telefone LIKE '%" + _Cliente.getRazaoSocial() + "%'"
                    + " ORDER BY CLIEFORNEC.RAZAOSOCIAL;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Cliente = new Cliente();
                _Cliente.setCodigo(rs.getInt("CODIGO"));
                _Cliente.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                _Cliente.setTelefone(rs.getString("Telefone"));

                Clientes.add(_Cliente);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Clientes;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Clientes;
        }
    }

    public List<Cliente> listarCliente(int codigo) {
        List<Cliente> Clientes = new ArrayList<>();
        Cliente _Cliente = null;
        try {
            sql = "SELECT CODIGO, RAZAOSOCIAL FROM CLIEFORNEC WHERE CODIGO = " + codigo + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Cliente = new Cliente();
                _Cliente.setCodigo(rs.getInt("CODIGO"));
                _Cliente.setRazaoSocial(rs.getString("RAZAOSOCIAL"));

                Clientes.add(_Cliente);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Clientes;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Clientes;
        }
    }
}
