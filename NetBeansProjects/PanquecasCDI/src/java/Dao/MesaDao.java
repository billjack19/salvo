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
import Model.Mesa;
import java.sql.Statement;

/**
 *
 * @author CDI
 */
public class MesaDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    //private String idLancPedido;
    //private int lastId;
    private String nroDoc;

    public List<Mesa> listarMesa() {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT mesa.Codigo, mesa.DESCRICAO FROM Tab_Mesas mesa;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesaCodigo(int codigo) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT mesa.Codigo, mesa.DESCRICAO FROM Tab_Mesas mesa WHERE Codigo = " + codigo + ";";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesa(String descricao, int filial) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT Codigo, DESCRICAO FROM Tab_Mesas WHERE DESCRICAO = '" + descricao + "';";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;

                _Mesa.setFilial(0);
                _Mesa.setDocumento("");
                _Mesa.setEmissao("");
                _Mesa.setTotal(0);
                _Mesa.setCliente(0);
                _Mesa.setIdentificacao("");
                //_Mesa.setCondPagamento(0);
                _Mesa.setRazaoSocial("");
                _Mesa.setVendedor(0);
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            sql = "SELECT TOP 1 p.Filial, p.Documento, p.Cliente, p.Vendedor, p.TOTAL, p.Emissao, p.Condpagamento, p.USUARIOATUALIZACAO, "
                    + "cli.RAZAOSOCIAL "
                    + "FROM Lanc_Pedidos p "
                    + "INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO "
                    + "WHERE coalesce(p.CondPagamento, 0) = 0 "
                    + "AND p.Filial = " + filial + " "
                    + "AND p.Mesa = " + Integer.toString(Mesas.get(0).getCodigo()) + " "
                    + "ORDER BY p.Documento;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                Mesas.get(0).setFilial(rs.getInt("Filial"));
                Mesas.get(0).setDocumento(rs.getString("Documento"));
                Mesas.get(0).setEmissao(rs.getString("Emissao"));
                Mesas.get(0).setTotal(rs.getFloat("TOTAL"));
                Mesas.get(0).setCliente(rs.getInt("Cliente"));
                Mesas.get(0).setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                //_Mesa.setCondPagamento(0);
                Mesas.get(0).setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                Mesas.get(0).setVendedor(rs.getInt("Vendedor"));
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesaPrincipal(int filial) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = " SELECT "
                            + " mesa.Codigo, "
                            + " PED_MESA.Filial, "
                            + " PED_MESA.Documento, "
                            + " PED_MESA.Cliente, "
                            + " PED_MESA.Vendedor, "
                            + " PED_MESA.TOTAL, "
                            + " PED_MESA.Emissao, "
                            + " PED_MESA.Condpagamento, "
                            + " PED_MESA.USUARIOATUALIZACAO, "
                            + " PED_MESA.RAZAOSOCIAL, "
                            + " mesa.DESCRICAO "
                    + " FROM  Tab_Mesas mesa"
                    + " LEFT JOIN "
                        + " ( SELECT p.Mesa, "
                                    + " p.Filial, "
                                    + " p.Documento, "
                                    + " p.Cliente, "
                                    + " p.Vendedor, "
                                    + " p.TOTAL, "
                                    + " p.Emissao, "
                                    + " p.Condpagamento, "
                                    + " p.USUARIOATUALIZACAO, "
                                    + " cli.RAZAOSOCIAL "
                            + " FROM Lanc_Pedidos p "
                            + " INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO "
                            + " WHERE coalesce(p.CondPagamento, 0) = 0 "
                            + " AND p.Filial = " + filial
                        + " ) PED_MESA ON PED_MESA.Mesa = mesa.Codigo ";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;
                _Mesa.setFilial(rs.getInt("Filial"));
                _Mesa.setDocumento(rs.getString("Documento"));
                if (rs.getString("Emissao") == null) {
                    _Mesa.setEmissao("");
                } else {
                    _Mesa.setEmissao(rs.getString("Emissao"));
                }

                _Mesa.setTotal(rs.getFloat("TOTAL"));
                _Mesa.setCliente(rs.getInt("Cliente"));
                _Mesa.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                //_Mesa.setCondPagamento(0);
                _Mesa.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                _Mesa.setVendedor(rs.getInt("Vendedor"));
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            _Mesa = new Mesa();
            _Mesa.setDescricao(ex.getMessage());
            Mesas.add(_Mesa);
            return Mesas;
        }
    }

    public List<Mesa> buscarDocumento(int id, int filial) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT TOP 1 Documento FROM Lanc_Pedidos "
                    + "WHERE coalesce(CondPagamento, 0) = 0 "
                    + "AND Filial = " + filial + " "
                    + "AND Mesa = " + id + " "
                    + "ORDER BY Documento DESC;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa.setDocumento(rs.getString("Documento"));
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarPedidoId(String filial, String documento) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT m.DESCRICAO, p.Mesa, p.Emissao, p.TOTAL, cli.RAZAOSOCIAL "
                    + "FROM LANC_PEDIDOS p "
                    + "INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO "
                    + "INNER JOIN Tab_Mesas m ON p.Mesa = m.Codigo "
                    + "WHERE p.Filial = " + filial + " "
                    + "AND p.Documento = '" + documento + "';";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Mesa"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                _Mesa.setEmissao(rs.getString("Emissao"));
                _Mesa.setTotal(rs.getFloat("TOTAL"));
                _Mesa.setRazaoSocial(rs.getString("RAZAOSOCIAL"));

                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public String adicionarLancPedido(Mesa _Mesa) {
        try {
            // Gerar Codigo do Documento
            nroDoc = "000001";
            sql = "SELECT CAST(MAX(DOCUMENTO) AS INT) AS numDoc FROM LANC_PEDIDOS WHERE FILIAL = " + Integer.toString(_Mesa.getFilial());
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                nroDoc = "000000" + Integer.toString(rs.getInt("numDoc") + 1);
                nroDoc = nroDoc.substring(nroDoc.length() - 6, nroDoc.length());
            }
            Conexao.fecharConexao(con, pst, rs);

            sql = "INSERT INTO LANC_PEDIDOS "
                    + "(Filial , Documento, Emissao, TOTAL, Cliente, USUARIOATUALIZACAO, Vendedor, Mesa)" //, TotalFicha
                    + " VALUES "
                    + "(?,?,?,?,?,?,?,?);";//,?
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.setString(1, Integer.toString(_Mesa.getFilial()));
            pst.setString(2, nroDoc);
            pst.setString(3, _Mesa.getEmissao());
            pst.setString(4, Float.toString(_Mesa.getTotal()));
            pst.setString(5, Integer.toString(_Mesa.getCliente()));
            pst.setString(6, _Mesa.getIdentificacao());
            //pst.setString(7, Integer.toString(_LancPedido.getFlagImpressao()));
            pst.setString(7, Integer.toString(_Mesa.getVendedor()));
            pst.setString(8, Integer.toString(_Mesa.getCodigo()));
            //pst.setString(9, Float.toString(_Mesa.getTotal()));
            pst.executeUpdate();

            rs = pst.getGeneratedKeys();
            /*if (rs.next()) {
                lastId = rs.getInt(1);
            }*/
            Conexao.fecharConexao(con, pst, rs);
            return nroDoc;//Integer.toString(lastId);
        } catch (SQLException ex) {
            return "0";
        }
    }
}
