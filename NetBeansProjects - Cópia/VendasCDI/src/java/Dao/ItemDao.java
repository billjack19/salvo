/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Item;
import Model.LancPedidosItens;
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
public class ItemDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    private String seguencia;
    private int cont;
    
    private int lancPedidosItens;

    public List<Item> listarItens(int grupoItem) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT ITEM, GRUPO, DESCRICAO, UNIDADE_MEDIDA, SUB_GRUPO FROM ITEM WHERE CATEGORIA = " + grupoItem + " ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("ITEM"));
                _Item.setGrupoItem(rs.getInt("GRUPO"));
                _Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DESCRICAO"));
                _Item.setUnidade_medida(rs.getString("UNIDADE_MEDIDA"));

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Items;
        }
    }
    
    public List<Item> listarTodosItens() {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT ITEM, GRUPO, DESCRICAO, UNIDADE_MEDIDA, SUB_GRUPO FROM ITEM ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("ITEM"));
                _Item.setGrupoItem(rs.getInt("GRUPO"));
                _Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DESCRICAO"));
                _Item.setUnidade_medida(rs.getString("UNIDADE_MEDIDA"));

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Items;
        }
    }
    
    public List<LancPedidosItens> listarLancPedidosItens(int lancPedidoId) {
        List<LancPedidosItens> LancPedidosItens = new ArrayList<>();
        LancPedidosItens _LancPedidosItens = null;
        try {
            /*SELECT la.lancPedidoId,
                    la.Filial, la.Documento, la.Sequencia, la.ITEM, la.QUANTIDADE, la.VALOR_UNITARIO, la.VALOR_TOTAL 
                    , i.DESCRICAO 
                    FROM LANC_PEDIDOS_ITENS la 
                    INNER JOIN ITEM i ON la.ITEM = i.ITEM 
                    WHERE lancPedidoId = 1;*/
            
            sql = "SELECT la.idLancPedidosItens, la.lancPedidoId,"
                        + "la.Filial,"
                        + " la.Documento,"
                        + " la.Sequencia,"
                        + " la.ITEM,"
                        + " la.QUANTIDADE,"
                        + " la.VALOR_UNITARIO,"
                        + " la.VALOR_TOTAL,"
                        + " coalesce(la.AdicionalProduto, '0') AS AdicionalProduto,"
                        + " i.DESCRICAO "
                    + "FROM LANC_PEDIDOS_ITENS la "
                    + "INNER JOIN ITEM i ON la.ITEM = i.ITEM "
                    + "WHERE lancPedidoId = " + lancPedidoId;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItens = new LancPedidosItens();
                _LancPedidosItens.setIdLancPedido(rs.getInt("idLancPedidosItens"));
                _LancPedidosItens.setLancPedidoId(rs.getInt("lancPedidoId"));
                _LancPedidosItens.setFilial(rs.getInt("Filial"));
                _LancPedidosItens.setDocumento(rs.getString("Documento"));
                _LancPedidosItens.setSequencia(rs.getInt("Sequencia"));
                _LancPedidosItens.setItem(rs.getInt("ITEM"));
                _LancPedidosItens.setQuantidade(rs.getFloat("QUANTIDADE"));
                _LancPedidosItens.setValorUnitario(rs.getFloat("VALOR_UNITARIO"));
                _LancPedidosItens.setValorTotal(rs.getFloat("VALOR_TOTAL"));
                if("0".equals(rs.getString("AdicionalProduto"))){
                     _LancPedidosItens.setItemNome(
                            rs.getString("DESCRICAO")
                                    //+ "<br><b>Sem complemento</b>"
                    );
                } else {
                    _LancPedidosItens.setItemNome(
                            rs.getString("DESCRICAO")
                                + "<br><b>Complemento: </b>"
                                + rs.getString("AdicionalProduto")
                    );
                }

                LancPedidosItens.add(_LancPedidosItens);
            }
            Conexao.fecharConexao(con, pst, rs);
            return LancPedidosItens;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return LancPedidosItens;
        }
    }
    
     public List<LancPedidosItens> listarLancPedidosItens(String documento) {
        List<LancPedidosItens> LancPedidosItens = new ArrayList<>();
        LancPedidosItens _LancPedidosItens = null;
        try {
            /*SELECT la.lancPedidoId,
                    la.Filial, la.Documento, la.Sequencia, la.ITEM, la.QUANTIDADE, la.VALOR_UNITARIO, la.VALOR_TOTAL 
                    , i.DESCRICAO 
                    FROM LANC_PEDIDOS_ITENS la 
                    INNER JOIN ITEM i ON la.ITEM = i.ITEM 
                    WHERE lancPedidoId = 1;*/
            
            sql = "SELECT la.idLancPedidosItens, la.lancPedidoId,"
                        + " la.Filial,"
                        + " la.Documento,"
                        + " la.Sequencia,"
                        + " la.ITEM,"
                        + " la.QUANTIDADE,"
                        + " la.VALOR_UNITARIO,"
                        + " la.VALOR_TOTAL,"
                        + " coalesce(la.AdicionalProduto, '0') AS AdicionalProduto,"
                    + " i.DESCRICAO "
                    + "FROM LANC_PEDIDOS_ITENS la "
                    + "INNER JOIN ITEM i ON la.ITEM = i.ITEM "
                    + "WHERE Documento = '" + documento + "' "
                    + "AND Filial = 10";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItens = new LancPedidosItens();
                _LancPedidosItens.setIdLancPedido(rs.getInt("idLancPedidosItens"));
                _LancPedidosItens.setLancPedidoId(rs.getInt("lancPedidoId"));
                _LancPedidosItens.setFilial(rs.getInt("Filial"));
                _LancPedidosItens.setDocumento(rs.getString("Documento"));
                _LancPedidosItens.setSequencia(rs.getInt("Sequencia"));
                _LancPedidosItens.setItem(rs.getInt("ITEM"));
                _LancPedidosItens.setQuantidade(rs.getFloat("QUANTIDADE"));
                _LancPedidosItens.setValorUnitario(rs.getFloat("VALOR_UNITARIO"));
                _LancPedidosItens.setValorTotal(rs.getFloat("VALOR_TOTAL"));
                if("0".equals(rs.getString("AdicionalProduto"))){
                     _LancPedidosItens.setItemNome(
                            rs.getString("DESCRICAO")
                                    //+ "<br><b>Sem complemento</b>"
                    );
                } else {
                    _LancPedidosItens.setItemNome(
                            rs.getString("DESCRICAO")
                                + "<br><b>Complemento: </b>"
                                + rs.getString("AdicionalProduto")
                    );
                }
                

                LancPedidosItens.add(_LancPedidosItens);
            }
            Conexao.fecharConexao(con, pst, rs);
            return LancPedidosItens;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return LancPedidosItens;
        }
    }

    public boolean adicionarItem(LancPedidosItens _LancPedidosItens) {
        try {
            /*
            INSERT INTO LANC_PEDIDOS_ITENS 
            (lancPedidoId, Filial , Documento, Sequencia, ITEM, QUANTIDADE, VALOR_UNITARIO, VALOR_TOTAL)
             VALUES 
             (3178, 1, '123   ', '2', 137, '1.00', '12.00', '12.00');
            */
            
            sql = "INSERT INTO LANC_PEDIDOS_ITENS "
                    + "(lancPedidoId, "
                    + "Filial , "
                    + "Documento, "
                    + "Sequencia, "
                    + "ITEM, "
                    + "QUANTIDADE, "
                    + "VALOR_UNITARIO, "
                    + "VALOR_TOTAL, "
                    + "VALOR_BASE, "
                    + "SUB_GRUPO, "
                    + "GRUPO, "
                    + "UNIDADE, "
                    + "AdicionalProduto)"
                    + " VALUES "
                    + "(?,?,?,?,?,?,?,?,?,?,?,?,?);";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.setString(1, Integer.toString(_LancPedidosItens.getLancPedidoId()));
            pst.setString(2, Integer.toString(_LancPedidosItens.getFilial()));
            pst.setString(3, _LancPedidosItens.getDocumento());
            pst.setString(4, Integer.toString(_LancPedidosItens.getSequencia()));
            pst.setString(5, Integer.toString(_LancPedidosItens.getItem()));
            pst.setString(6, Float.toString(_LancPedidosItens.getQuantidade()));
            pst.setString(7, Float.toString(_LancPedidosItens.getValorUnitario()));
            pst.setString(8, Float.toString(_LancPedidosItens.getValorTotal()));
            pst.setString(9, Float.toString(_LancPedidosItens.getValorUnitario()));
            pst.setString(10, Integer.toString(_LancPedidosItens.getSubGrupoItem()));
            pst.setString(11, Integer.toString(_LancPedidosItens.getGrupoItem()));
            pst.setString(12, _LancPedidosItens.getUnidadeMedida());
            pst.setString(13, _LancPedidosItens.getAdicionalProduto());
            pst.execute();
            Conexao.fecharConexao(con, pst);

            return this.atualizarValorPedido(_LancPedidosItens.getLancPedidoId(), _LancPedidosItens.getValorTotal(), "+");
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
            //return ex.toString();
        }
    }

    public boolean atualizarValorPedido(int id, float valorTotal, String op) {
        try {
            sql = "UPDATE LANC_PEDIDOS "
                    + "SET TOTAL = TOTAL " + op + " " + valorTotal + " , "
                    + "TotalFicha = TotalFicha " + op + " " + valorTotal + " "
                    + "WHERE idLancPedido = " + id + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst);
            return true;
        } catch (SQLException ex) {
            //Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    public String retornarValorSequencia(int id) {
        try {
            //SELECT TOP 1 Sequencia FROM Lanc_Pedidos_itens WHERE lancPedidoId = 1 ORDER BY idLancPedidosItens DESC
            sql = "SELECT TOP 1 Sequencia FROM Lanc_Pedidos_itens WHERE lancPedidoId = " + id + " ORDER BY idLancPedidosItens DESC;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            cont = 0;
            while (rs.next()) {
                cont++;
                seguencia = Integer.toString(rs.getInt("Sequencia"));
            }
            if(cont <= 0){ seguencia = "0"; }
            Conexao.fecharConexao(con, pst, rs);
            return seguencia;
        } catch (SQLException ex) {
            //Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "0";
        }
    }

    public boolean removerItem(int id){
        try {
            sql = "DELETE FROM LANC_PEDIDOS_ITENS WHERE idLancPedidosItens = "+id+";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            //pst.setInt(1, id);
            pst.execute();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    public LancPedidosItens lancPedidosItens(int idLancPedidosItens) {
        LancPedidosItens _LancPedidosItem = null;
        try {
            sql = "SELECT TOP 1 Filial, Documento, Sequencia, ITEM, QUANTIDADE, VALOR_UNITARIO, VALOR_TOTAL "
                    + " FROM LANC_PEDIDOS_ITENS WHERE idLancPedidosItens = " + idLancPedidosItens + ";";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItem = new LancPedidosItens();
                _LancPedidosItem.setIdLancPedido(rs.getInt("idLancPedidosItens"));
                _LancPedidosItem.setLancPedidoId(rs.getInt("lancPedidoId"));
                _LancPedidosItem.setFilial(rs.getInt("Filial."));
                _LancPedidosItem.setDocumento(rs.getString("Documento"));
                _LancPedidosItem.setSequencia(rs.getInt("Sequencia"));
                _LancPedidosItem.setItem(rs.getInt("ITEM"));
                _LancPedidosItem.setQuantidade(rs.getFloat("QUANTIDADE"));
                _LancPedidosItem.setValorUnitario(rs.getFloat("VALOR_UNITARIO"));
                _LancPedidosItem.setValorTotal(rs.getFloat("VALOR_TOTAL"));
            }
            Conexao.fecharConexao(con, pst, rs);
            return _LancPedidosItem;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return _LancPedidosItem;
        }
    }
}

/*
[
    "lancPedidoId":1,
    "filial":1,
    "documento":"00001",
    "sequecia":3,
    "item":2,
    "quatidade":1.5,
    "valorUnitario":2,
    "valorTotal":3
]

{"lancPedidoId":1,"filial":1,"documento":"00001","sequecia":3,"item":2,"quatidade":1.5,"valorUnitario":2,"valorTotal":3}

 */
