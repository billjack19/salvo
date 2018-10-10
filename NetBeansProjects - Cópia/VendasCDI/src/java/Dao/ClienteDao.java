/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.ClieFornec;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author jack
 */
public class ClienteDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<ClieFornec> listarCliente() {
        List<ClieFornec> ClieFornecs = new ArrayList<>();
        ClieFornec _ClieFornec = null;
        try {
            sql = "SELECT CODIGO, RAZAOSOCIAL FROM CLIEFORNEC ORDER BY RAZAOSOCIAL;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _ClieFornec = new ClieFornec();
                _ClieFornec.setCodigo(rs.getInt("CODIGO"));
                _ClieFornec.setRazaoSocial(rs.getString("RAZAOSOCIAL"));

                ClieFornecs.add(_ClieFornec);
            }
            Conexao.fecharConexao(con, pst, rs);
            return ClieFornecs;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return ClieFornecs;
        }
    }

    public List<ClieFornec> listarCliente(int codigo) {
        List<ClieFornec> ClieFornecs = new ArrayList<>();
        ClieFornec _ClieFornec = null;
        try {
            sql = "SELECT CODIGO, RAZAOSOCIAL FROM CLIEFORNEC WHERE CODIGO = " + codigo + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _ClieFornec = new ClieFornec();
                _ClieFornec.setCodigo(rs.getInt("CODIGO"));
                _ClieFornec.setRazaoSocial(rs.getString("RAZAOSOCIAL"));

                ClieFornecs.add(_ClieFornec);
            }
            Conexao.fecharConexao(con, pst, rs);
            return ClieFornecs;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return ClieFornecs;
        }
    }
}
