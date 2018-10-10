/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Cliente;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jack Biller
 */
public class ClienteDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;


    public Cliente listarClientesPorRegiao(String codigoPedido) {
        Cliente _Cliente = new Cliente();
        ArrayList<String> telefones = new ArrayList<>();
        try {
            sql = "SELECT"
                        + " CLIEFORNEC.CODIGO AS codigo,"
                        + " CLIEFORNEC.RAZAOSOCIAL AS nome,"
                        + " CLIEFORNEC_TELEFONE.Telefone AS telefone"
                    + " FROM CLIEFORNEC_TELEFONE CLIEFORNEC_TELEFONE"
                    + " INNER JOIN CLIEFORNEC CLIEFORNEC"
                        + " ON CLIEFORNEC_TELEFONE.Cliente = CLIEFORNEC.CODIGO"
                    + " INNER JOIN LANC_ENTREGA_ITENS LANC_ENTREGA_ITENS"
                        + " ON CLIEFORNEC.CODIGO = LANC_ENTREGA_ITENS.CLIENTE"
                    + " WHERE LANC_ENTREGA_ITENS.NOTAFISCAL = '"+codigoPedido+"'"
                    + " GROUP BY CLIEFORNEC.CODIGO, CLIEFORNEC.RAZAOSOCIAL, CLIEFORNEC_TELEFONE.Telefone;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Cliente.setCodigo(rs.getInt("codigo"));
                _Cliente.setNome(rs.getString("nome"));
                telefones.add(rs.getString("telefone"));
            }
            _Cliente.setTelefone(telefones);
            Conexao.fecharConexao(con, pst, rs);
            return _Cliente;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Cliente = new Cliente();
            _Cliente.setNome(ex.getMessage());
            return _Cliente;
        }
    }


    public Cliente listarClienteId(String codigoPedido) {
        Cliente _Cliente = new Cliente();
        ArrayList<String> telefones = new ArrayList<>();
        try {
            sql = "SELECT"
                        + " CLIEFORNEC.CODIGO AS codigo,"
                        + " CLIEFORNEC.RAZAOSOCIAL AS nome,"
                        + " CLIEFORNEC_TELEFONE.Telefone AS telefone"
                    + " FROM CLIEFORNEC_TELEFONE CLIEFORNEC_TELEFONE"
                    + " INNER JOIN CLIEFORNEC CLIEFORNEC"
                        + " ON CLIEFORNEC_TELEFONE.Cliente = CLIEFORNEC.CODIGO"
                    // + " INNER JOIN LANC_ENTREGA_ITENS LANC_ENTREGA_ITENS"
                        // + " ON CLIEFORNEC.CODIGO = LANC_ENTREGA_ITENS.CLIENTE"
                    + " WHERE CLIEFORNEC.CODIGO = '"+codigoPedido+"'"
                    + " GROUP BY CLIEFORNEC.CODIGO, CLIEFORNEC.RAZAOSOCIAL, CLIEFORNEC_TELEFONE.Telefone;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Cliente.setCodigo(rs.getInt("codigo"));
                _Cliente.setNome(rs.getString("nome"));
                telefones.add(rs.getString("telefone"));
            }
            _Cliente.setTelefone(telefones);
            Conexao.fecharConexao(con, pst, rs);
            return _Cliente;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Cliente = new Cliente();
            _Cliente.setNome(ex.getMessage());
            return _Cliente;
        }
    }
}