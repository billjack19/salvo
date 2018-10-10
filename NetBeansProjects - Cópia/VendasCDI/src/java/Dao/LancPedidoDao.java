/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.LancPedido;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author jack
 */
public class LancPedidoDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    private String idLancPedido;
    private int lastId;
    private String nroDoc;

    public List<LancPedido> listarLancPedidos(String data, String identificador) throws SQLException {
        List<LancPedido> LancPedidos = new ArrayList<>();
        LancPedido _LancPedido = null;
        sql = "SELECT la.idLancPedido,"
                + " la.Filial,"
                + " la.Documento,"
                + " la.Emissao,"
                + " la.TOTAL,"
                + " la.Cliente,"
                + " la.USUARIOATUALIZACAO,"
                + " la.CondPagamento,"
                + " la.NumeroFicha,"
                + " coalesce(la.VALORDESCONTO, 0) AS VALORDESCONTO,"
                + " cli.RAZAOSOCIAL";
        sql += " FROM LANC_PEDIDOS la";
        sql += " INNER JOIN CLIEFORNEC cli ON la.Cliente = cli.CODIGO";
        sql += " WHERE la.Emissao = '" + data + "' ";
                //+ "AND la.USUARIOATUALIZACAO = '" + identificador + "'";
        sql += " ORDER BY idLancPedido DESC;";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            _LancPedido = new LancPedido();
            _LancPedido.setIdLancPedido(rs.getInt("idLancPedido"));
            _LancPedido.setFilial(rs.getInt("Filial"));
            _LancPedido.setDocumento(rs.getString("Documento"));
            _LancPedido.setEmissao(rs.getString("Emissao"));
            _LancPedido.setTotal(rs.getFloat("TOTAL"));
            _LancPedido.setCliente(rs.getInt("Cliente"));
            _LancPedido.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
            _LancPedido.setFlagImpressao(rs.getInt("CondPagamento"));
            _LancPedido.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
            _LancPedido.setFicha(rs.getInt("NumeroFicha"));
            _LancPedido.setDesconto(rs.getFloat("VALORDESCONTO"));

            LancPedidos.add(_LancPedido);
        }
        Conexao.fecharConexao(con, pst, rs);
        return LancPedidos;
    }

    public List<LancPedido> listarLancPedidosId(String id) throws SQLException {
        List<LancPedido> LancPedidos = new ArrayList<>();
        LancPedido _LancPedido = null;
        sql = "SELECT la.idLancPedido, "
                + "la.Filial, la.Documento, la.Emissao, la.TOTAL, la.Cliente, la.USUARIOATUALIZACAO, la.CondPagamento, la.NumeroFicha "
                + ", cli.razaoSocial";
        sql += " FROM LANC_PEDIDOS la";
        sql += " INNER JOIN CLIEFORNEC cli ON la.Cliente = cli.CODIGO";
        sql += " WHERE la.idLancPedido = " + id;
        sql += " ORDER BY razaoSocial;";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            _LancPedido = new LancPedido();
            _LancPedido.setIdLancPedido(rs.getInt("idLancPedido"));
            _LancPedido.setFilial(rs.getInt("Filial"));
            _LancPedido.setDocumento(rs.getString("Documento"));
            _LancPedido.setEmissao(rs.getString("Emissao"));
            _LancPedido.setTotal(rs.getFloat("TOTAL"));
            _LancPedido.setCliente(rs.getInt("Cliente"));
            _LancPedido.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
            _LancPedido.setFlagImpressao(rs.getInt("CondPagamento"));
            _LancPedido.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
            _LancPedido.setFicha(rs.getInt("NumeroFicha"));

            LancPedidos.add(_LancPedido);
        }
        Conexao.fecharConexao(con, pst, rs);
        return LancPedidos;
    }

    public List<LancPedido> listarLancPedidosFicha(String ficha, String data) throws SQLException {
        List<LancPedido> LancPedidos = new ArrayList<>();
        LancPedido _LancPedido = null;
        sql = "SELECT la.idLancPedido, "
                + "la.Filial, la.Documento, la.Emissao, la.TOTAL, la.Cliente, la.USUARIOATUALIZACAO, la.CondPagamento, la.NumeroFicha "
                + ", cli.razaoSocial";
        sql += " FROM LANC_PEDIDOS la";
        sql += " INNER JOIN CLIEFORNEC cli ON la.Cliente = cli.CODIGO";
        sql += " WHERE la.NumeroFicha = " + ficha;
        sql += " AND la.Emissao = '" + data + "'"
                + " AND coalesce(la.CondPagamento, 0) = 0";
        sql += " ORDER BY idLancPedido DESC;";
        // Impresso
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            _LancPedido = new LancPedido();
            _LancPedido.setIdLancPedido(rs.getInt("idLancPedido"));
            _LancPedido.setFilial(rs.getInt("Filial"));
            _LancPedido.setDocumento(rs.getString("Documento"));
            _LancPedido.setEmissao(rs.getString("Emissao"));
            _LancPedido.setTotal(rs.getFloat("TOTAL"));
            _LancPedido.setCliente(rs.getInt("Cliente"));
            _LancPedido.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
            _LancPedido.setFlagImpressao(rs.getInt("CondPagamento"));
            _LancPedido.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
            _LancPedido.setFicha(rs.getInt("NumeroFicha"));

            LancPedidos.add(_LancPedido);
        }
        Conexao.fecharConexao(con, pst, rs);
        return LancPedidos;
    }

    public String consultarFichaPedido(String ficha, String data) {
        try {
            sql = "SELECT idLancPedido FROM LANC_PEDIDOS ";
            //+ "WHERE GRUPO = " + ficha + " ORDER BY DESCRICAO;";
            sql += " WHERE NumeroFicha = " + ficha;
            sql += " AND Emissao = '" + data + "'"
                    + " AND coalesce(CondPagamento, 0) = 0";
            sql += " ORDER BY idLancPedido DESC;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            idLancPedido = "0";
            while (rs.next()) {
                idLancPedido = Integer.toString(rs.getInt("idLancPedido"));
            }
            Conexao.fecharConexao(con, pst, rs);
            return idLancPedido;
        } catch (SQLException ex) {
            return "0"+ex.getMessage();
        }
    }

    public List<LancPedido> consultarFichaAnteriorPedido(String ficha, String data) {
        List<LancPedido> LancPedidos = new ArrayList<>();
        LancPedido _LancPedido = null;
        try {
            sql = "SELECT la.idLancPedido, la.Documento, la.Emissao, cli.RAZAOSOCIAL, la.NumeroFicha, la.CondPagamento"
                    + " FROM LANC_PEDIDOS la"
                    + " INNER JOIN CLIEFORNEC cli ON la.Cliente = cli.CODIGO"
                    + " WHERE la.NumeroFicha = " + ficha
                    + " AND la.Emissao < '" + data + "'"
                    + " AND  coalesce(la.CondPagamento, 0) = 0 "
                    + " ORDER BY la.idLancPedido;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            idLancPedido = "0";
            while (rs.next()) {
                _LancPedido = new LancPedido();
                _LancPedido.setIdLancPedido(rs.getInt("idLancPedido"));
                //_LancPedido.setFilial(rs.getInt("Filial"));
                _LancPedido.setDocumento(rs.getString("Documento"));
                _LancPedido.setEmissao(rs.getString("Emissao"));
                //_LancPedido.setTotal(rs.getFloat("TOTAL"));
                //_LancPedido.setCliente(rs.getInt("Cliente"));
                //_LancPedido.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                _LancPedido.setFlagImpressao(rs.getInt("CondPagamento"));
                _LancPedido.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                _LancPedido.setFicha(rs.getInt("NumeroFicha"));

                LancPedidos.add(_LancPedido);
            }
            Conexao.fecharConexao(con, pst, rs);
            return LancPedidos;
        } catch (SQLException ex) {
            return LancPedidos;
        }
    }

    public String adicionarLancPedido(LancPedido _LancPedido) {
        try {
            nroDoc = "000001";
            sql = "SELECT CAST(MAX(DOCUMENTO) AS INT) AS numDoc FROM LANC_PEDIDOS WHERE FILIAL = " + Integer.toString(_LancPedido.getFilial());
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                nroDoc = "000000" + Integer.toString(rs.getInt("numDoc") + 1);
                nroDoc = nroDoc.substring(nroDoc.length() - 6, nroDoc.length());
            }
            Conexao.fecharConexao(con, pst, rs);

            sql = "INSERT INTO LANC_PEDIDOS "
                    + "(Filial , Documento, Emissao, TOTAL, Cliente, USUARIOATUALIZACAO, Vendedor, NumeroFicha, TotalFicha)"
                    + " VALUES "
                    + "(?,?,?,?,?,?,?,?,?);";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.setString(1, Integer.toString(_LancPedido.getFilial()));
            pst.setString(2, nroDoc);
            pst.setString(3, _LancPedido.getEmissao());
            pst.setString(4, Float.toString(_LancPedido.getTotal()));
            pst.setString(5, Integer.toString(_LancPedido.getCliente()));
            pst.setString(6, _LancPedido.getIdentificacao());
            //pst.setString(7, Integer.toString(_LancPedido.getFlagImpressao()));
            pst.setString(7, Integer.toString(_LancPedido.getVendedor()));
            pst.setString(8, Integer.toString(_LancPedido.getFicha()));
            pst.setString(9, Float.toString(_LancPedido.getTotal()));
            pst.executeUpdate();

            rs = pst.getGeneratedKeys();
            if (rs.next()) {
                lastId = rs.getInt(1);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Integer.toString(lastId);
        } catch (SQLException ex) {
            return "0";
        }
    }

    public boolean alterarLancPedido(LancPedido _LancPedido) {
        try {
            sql = "UPDATE LANC_PEDIDOS "
                    + " SET "
                    + "Filial = ?, "
                    + "Documento = ?, "
                    + "Emissao = ?, "
                    + "TOTAL = ?, "
                    + "Cliente = ?, "
                    + "USUARIOATUALIZACAO = ?, "
                    //+ "Impresso = ? "
                    + " WHERE "
                    + "idLancPedido = ?;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.setString(1, Integer.toString(_LancPedido.getFilial()));
            pst.setString(2, _LancPedido.getDocumento());
            pst.setString(3, _LancPedido.getEmissao());
            pst.setString(4, Float.toString(_LancPedido.getTotal()));
            pst.setString(5, Integer.toString(_LancPedido.getCliente()));
            pst.setString(6, _LancPedido.getIdentificacao());
            pst.setString(7, Integer.toString(_LancPedido.getIdLancPedido()));
            pst.execute();
            Conexao.fecharConexao(con, pst);
            return true;
        } catch (SQLException ex) {
            return false;
        }
    }

    public boolean finalizarLancPedido(int id) {
        try {
            sql = "UPDATE LANC_PEDIDOS SET Impresso = 1 WHERE idLancPedido = " + id + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    public boolean removerLancPedido(int id) {
        try {
            sql = "DELETE FROM LANC_PEDIDOS WHERE idLancPedido = " + id + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    public boolean removerLancPedidoItensAoPedido(int id) {
        try {
            sql = "DELETE FROM LANC_PEDIDOS_ITENS WHERE lancPedidoId = " + id + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }
}
