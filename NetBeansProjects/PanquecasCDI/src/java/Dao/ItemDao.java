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
    //private String descricaoPreparo;
    private int lastId;
    private float vlrTotal;

    public List<Item> listarItens(int subGrupoItem, int grupo, int filial) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT itf.PRECO_BASE, i.ITEM, i.GRUPO, i.DESCRICAO, i.UNIDADE_MEDIDA, i.SUB_GRUPO"
                    + " FROM ITEM i"
                    + " INNER JOIN ITEM_FILIAL itf ON i.ITEM = itf.item"
                    + " WHERE i.SUB_GRUPO = " + subGrupoItem
                    + " AND i.GRUPO = " + grupo
                    + " AND itf.filial = " + filial
                    + " ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("ITEM"));
                _Item.setGrupoItem(rs.getInt("GRUPO"));
                _Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DESCRICAO"));
                _Item.setUnidade_medida(
                        rs.getString("UNIDADE_MEDIDA") + "+" + Float.toString(rs.getFloat("PRECO_BASE"))
                );

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            return Items;
        }
    }

    /* *************************** Listar para adicionar o complemento *********************************** */
    public List<Item> listarItensComposicao(int item) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT i.GRUPO, i.DESCRICAO, i.UNIDADE_MEDIDA, i.SUB_GRUPO, ip.ITeM_ITEM, ip.QUANTIDADE "
                    + "FROM ITEM_PRODUCAO ip "
                    + "INNER JOIN item i on ip.ITeM_ITEM = i.item "
                    + "WHERE ip.item = " + item + " "
                    + "ORDER BY i.DESCRICAO;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("ITeM_ITEM"));
                _Item.setGrupoItem(rs.getInt("GRUPO"));
                _Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DESCRICAO"));
                _Item.setUnidade_medida(Float.toString(rs.getFloat("QUANTIDADE")));

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            sql = "\nSELECT i.GRUPO, i.DESCRICAO, i.UNIDADE_MEDIDA, i.SUB_GRUPO, ip.ITeM_ITEM "
                    + "FROM ITEM_PRODUCAO ip "
                    + "INNER JOIN item i on ip.ITeM_ITEM = i.item "
                    + "WHERE ip.item = " + item + " "
                    + "ORDER BY i.DESCRICAO;";

            _Item = new Item();
            _Item.setDescricao("<br><b>" + ex.getMessage() + "</b><br><br>" + sql);
            Items.add(_Item);
            return Items;
        }
    }

    public List<Item> listarItensPreparo(int item) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT tapI.DescricaoPreparo, tapI.Sequencia"
                    + " FROM TabPreparoProdutosItens tapI"
                    + " INNER JOIN TabPreparoProdutos tap ON tapI.codigo = tap.CODIGO"
                    + " WHERE tapI.codigo = "
                    + "("
                    + "SELECT Adicional FROM ITEM WHERE ITEM = " + item
                    + " )"
                    + " ORDER BY tapI.Sequencia;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("Sequencia"));
                //_Item.setGrupoItem(rs.getInt("GRUPO"));
                //_Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DescricaoPreparo"));
                //_Item.setUnidade_medida(Float.toString(rs.getFloat("QUANTIDADE")));

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            _Item = new Item();
            _Item.setDescricao(ex.getMessage());
            Items.add(_Item);
            return Items;
        }
    }

    public List<Item> listarItensAdicional(int item, int filial) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT"
                    + " coalesce(itf.VALOR_INCLUSAO, 0) as VALOR_INCLUSAO,"
                    + " i.GRUPO, i.DESCRICAO, i.UNIDADE_MEDIDA, i.SUB_GRUPO,"
                    + " tapI.item, tapI.QUANTIDADE"
                    + " FROM TabAdicionalProdutosItens tapI"
                    + " INNER JOIN item i on tapI.item = i.item"
                    + " INNER JOIN ITEM_FILIAL itf on tapI.item = itf.item"
                    + " INNER JOIN TabAdicionalProdutos tap ON tapI.codigo = tap.CODIGO"
                    + " WHERE tapI.codigo = "
                    + " ("
                    + " SELECT Adicional"
                    + " FROM ITEM"
                    + " WHERE ITEM = " + item
                    + " )"
                    + " AND itf.filial = " + filial
                    + " ORDER BY i.DESCRICAO;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("item"));
                _Item.setGrupoItem(rs.getInt("GRUPO"));
                _Item.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _Item.setDescricao(rs.getString("DESCRICAO"));
                _Item.setUnidade_medida(
                        Float.toString(rs.getFloat("QUANTIDADE")) + "+" + Float.toString(rs.getFloat("VALOR_INCLUSAO"))
                );
                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            _Item = new Item();
            _Item.setDescricao(ex.getMessage());
            Items.add(_Item);
            return Items;
        }
    }

    /* ************************************************************************************************** */

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
            return Items;
        }
    }

    public List<LancPedidosItens> listarLancPedidosItens(int filial, String documento) {
        List<LancPedidosItens> LancPedidosItens = new ArrayList<>();
        LancPedidosItens _LancPedidosItens = null;
        try {
            sql = "SELECT la.ID_Lanc_Pedidos_Itens, "
                    + "la.Filial, "
                    + "la.Documento, "
                    + "la.Sequencia, "
                    + "la.ITEM, "
                    + "la.QUANTIDADE, "
                    + "la.VALOR_UNITARIO, "
                    + "la.VALOR_TOTAL, "
                    + "coalesce(la.FlagImpressao, 0) AS FlagImpressao"
                    + ", i.DESCRICAO "
                    + "FROM LANC_PEDIDOS_ITENS la "
                    + "INNER JOIN ITEM i ON la.ITEM = i.ITEM "
                    + "WHERE Filial = " + filial + " "
                    + "AND Documento = '" + documento + "';";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItens = new LancPedidosItens();
                _LancPedidosItens.setIdLancPedido(rs.getInt("ID_Lanc_Pedidos_Itens"));
                //_LancPedidosItens.setLancPedidoId(rs.getInt("lancPedidoId"));
                _LancPedidosItens.setFilial(rs.getInt("Filial"));
                _LancPedidosItens.setDocumento(rs.getString("Documento"));
                _LancPedidosItens.setSequencia(rs.getInt("Sequencia"));
                _LancPedidosItens.setItem(rs.getInt("ITEM"));
                _LancPedidosItens.setQuantidade(rs.getFloat("QUANTIDADE"));
                _LancPedidosItens.setValorUnitario(rs.getFloat("VALOR_UNITARIO"));
                _LancPedidosItens.setValorTotal(rs.getFloat("VALOR_TOTAL"));
                _LancPedidosItens.setItemNome(rs.getString("DESCRICAO"));
                _LancPedidosItens.setFlagImpressao(rs.getInt("FlagImpressao"));

                LancPedidosItens.add(_LancPedidosItens);
            }
            Conexao.fecharConexao(con, pst, rs);

            return LancPedidosItens;
        } catch (SQLException ex) {
            return LancPedidosItens;
        }
    }

    /* ******************************** Trazer depois de adicionado ************************************* */
    public String listarLancPedidosItensExecao(int lancPedidoItem) {
        String resultado = null;
        try {
            cont = 0;
            sql = "SELECT i.DESCRICAO"
                    + " FROM Lanc_pedidos_itens_Excessao iex"
                    + " INNER JOIN item i on iex.item = i.item"
                    + " WHERE iex.ID_Lanc_Pedidos_itens = " + lancPedidoItem;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                if (cont == 0) {
                    resultado = rs.getString("DESCRICAO");
                } else {
                    resultado = resultado + ", " + rs.getString("DESCRICAO");
                }
                cont++;
            }
            Conexao.fecharConexao(con, pst, rs);
            return resultado + "+" + lancPedidoItem;
        } catch (SQLException ex) {
            return resultado;
        }
    }

    public String listarLancPedidosItensPreparo(int lancPedidoItem) {
        String resultado = null;
        try {
            cont = 0;
            sql = "SELECT DescricaoPreparo"
                    + " FROM Lanc_Pedidos_Itens_Preparo"
                    + " WHERE ID_TabPreparoProdutosItens = " + lancPedidoItem;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                if (cont == 0) {
                    resultado = rs.getString("DescricaoPreparo");
                } else {
                    resultado = resultado + ", " + rs.getString("DescricaoPreparo");
                }
                cont++;
            }
            Conexao.fecharConexao(con, pst, rs);
            return resultado + "+" + lancPedidoItem;
        } catch (SQLException ex) {
            return resultado;
        }
    }

    public String listarLancPedidosItensAdicional(int lancPedidoItem) {
        String resultado = null;
        try {
            cont = 0;
            sql = "SELECT i.DESCRICAO, iex.VALOR_UNITARIO"
                    + " FROM Lanc_Pedidos_Itens_Adicional iex"
                    + " INNER JOIN item i on iex.item = i.item"
                    + " WHERE iex.ID_TabAdicionalProdutosItens = " + lancPedidoItem;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                seguencia = Float.toString(rs.getFloat("VALOR_UNITARIO"));
                seguencia = seguencia.replace(".", ",");
                if (cont == 0) {
                    resultado = rs.getString("DESCRICAO") + " (R$ " + seguencia + ")";
                } else {
                    resultado = resultado + ", " + rs.getString("DESCRICAO") + " (R$ " + seguencia + ")";
                }
                cont++;
            }
            Conexao.fecharConexao(con, pst, rs);
            return resultado + "+" + lancPedidoItem;
        } catch (SQLException ex) {
            return resultado;
        }
    }

    /* ************************************************************************************************ */

    public int adicionarItem(LancPedidosItens _LancPedidosItens) {
        try {
            if (atualizarValorPedido(_LancPedidosItens.getFilial(), _LancPedidosItens.getDocumento(), _LancPedidosItens.getValorTotal(), "+")) {
                sql = "INSERT INTO LANC_PEDIDOS_ITENS "
                        + "( "
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
                        + "(?,?,?,?,?,?,?,?,?,?,?,?);";
                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                //pst.setString(1, Integer.toString(_LancPedidosItens.getLancPedidoId()));
                pst.setString(1, Integer.toString(_LancPedidosItens.getFilial()));
                pst.setString(2, _LancPedidosItens.getDocumento());
                pst.setString(3, Integer.toString(_LancPedidosItens.getSequencia()));
                pst.setString(4, Integer.toString(_LancPedidosItens.getItem()));
                pst.setString(5, Float.toString(_LancPedidosItens.getQuantidade()));
                pst.setString(6, Float.toString(_LancPedidosItens.getValorUnitario()));
                pst.setString(7, Float.toString(_LancPedidosItens.getValorTotal()));
                pst.setString(8, Float.toString(_LancPedidosItens.getValorUnitario()));
                pst.setString(9, Integer.toString(_LancPedidosItens.getSubGrupoItem()));
                pst.setString(10, Integer.toString(_LancPedidosItens.getGrupoItem()));
                pst.setString(11, _LancPedidosItens.getUnidadeMedida());
                pst.setString(12, _LancPedidosItens.getAdicionalProduto());
                pst.execute();

                Conexao.fecharConexao(con, pst, rs);

                sql = "SELECT TOP 1 ID_Lanc_Pedidos_Itens "
                        + "FROM LANC_PEDIDOS_ITENS la "
                        + "ORDER BY ID_Lanc_Pedidos_Itens DESC";

                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                lastId = 0;
                while (rs.next()) {
                    lastId = rs.getInt("ID_Lanc_Pedidos_Itens");
                }
                Conexao.fecharConexao(con, pst, rs);

                return lastId;
            } else {
                return 0;
            }
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return 0;
            //return ex.toString();
        }
    }

    public boolean adicionarItemImpressao(LancPedidosItens _LancPedidosItens) {
        try {
            sql = "INSERT INTO Lanc_Pedidos_Itens_Impressao "
                    + "( "
                    + "Filial , "
                    + "Documento, "
                    + "Sequencia, "
                    + "Item, "
                    + "Quantidade, "
                    + "Descricao, "
                    + "DataAtualizacao, "
                    + "HoraAtualizacao, "
                    + "UsuarioAtualizacao)"
                    + " VALUES "
                    + "(?,?,?,?,?,?,?,?,?);";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.setString(1, Integer.toString(_LancPedidosItens.getFilial()));
            pst.setString(2, _LancPedidosItens.getDocumento());
            pst.setString(3, Integer.toString(_LancPedidosItens.getSequencia()));
            pst.setString(4, Integer.toString(_LancPedidosItens.getItem()));
            pst.setString(5, Float.toString(_LancPedidosItens.getQuantidade()));
            pst.setString(6, _LancPedidosItens.getUnidadeMedida());
            pst.setString(7, _LancPedidosItens.getItemNome());
            pst.setString(8, _LancPedidosItens.getHoraComplemento());
            pst.setString(9, _LancPedidosItens.getAdicionalProduto());
            pst.execute();

            Conexao.fecharConexao(con, pst, rs);
            
            sql = "UPDATE Lanc_Pedidos_itens"
                    + " SET FlagImpressao = 1"
                    + " WHERE ID_Lanc_Pedidos_Itens = "+Integer.toString(_LancPedidosItens.getIdLancPedido());
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();

            Conexao.fecharConexao(con, pst, rs);

            return true;
        } catch (SQLException ex) {
            return false;
            //return ex.toString();
        }
    }

    /* ************************** Adicionar complemtno do item ******************************** */
    public boolean adicionarItemExecao(int idLancPedidoItem, int item) {
        try {
            sql = "INSERT INTO Lanc_pedidos_itens_Excessao "
                    + "( ID_Lanc_Pedidos_itens ,  item)"
                    + " VALUES "
                    + "(" + idLancPedidoItem + ", " + item + ");";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst, rs);

            return true;

        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
            //return ex.toString();
        }
    }

    public boolean adicionarItemPreparo(int idLancPedidoItem, String item, int filial, String documento) {
        try {
            item = item.replace("-", " ");

            sql = "INSERT INTO Lanc_Pedidos_Itens_Preparo "
                    + "( ID_TabPreparoProdutosItens ,  DescricaoPreparo, Filial, Documento)"
                    + " VALUES "
                    + "(" + idLancPedidoItem + ", '" + item + "', " + filial + ", '" + documento + "');";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst, rs);

            return true;
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }

    public boolean adicionarItemAdicional(int idLancPedidoItem, int item, int filial, String documento, float valor, float qtd) {
        try {
            vlrTotal = valor * qtd;
            sql = "INSERT INTO Lanc_Pedidos_Itens_Adicional "
                    + "( ID_TabAdicionalProdutosItens , ITEM, Filial, Documento, VALOR_TOTAL, QUANTIDADE, VALOR_UNITARIO)"
                    + " VALUES "
                    + "(" + idLancPedidoItem + ", " + item + ", " + filial + ", '" + documento + "', " + vlrTotal + ", " + qtd + ", " + valor + ");";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst, rs);

            return true;

        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            return false;
            //return ex.toString();
        }
    }

    /* ************************************************************************************* */
    public List<Item> listarItensComposicaoExcecao(int idLancPedidoItem) {
        List<Item> Items = new ArrayList<>();
        Item _Item = null;
        try {
            sql = "SELECT i.GRUPO, i.DESCRICAO, i.UNIDADE_MEDIDA, i.SUB_GRUPO, iex.item "
                    + "FROM Lanc_pedidos_itens_Excessao iex "
                    + "INNER JOIN item i on iex.item = i.item "
                    + "WHERE iex.ID_Lanc_Pedidos_itens = " + idLancPedidoItem + " "
                    + "ORDER BY i.DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new Item();
                _Item.setItem(rs.getInt("item"));
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

    public boolean atualizarValorPedido(int filial, String documento, float valorTotal, String op) {
        try {
            sql = "UPDATE LANC_PEDIDOS "
                    + "SET TOTAL = TOTAL " + op + " " + valorTotal + " "
                    //+ "TotalFicha = TotalFicha " + op + " " + valorTotal + " "
                    + "WHERE filial = " + filial + " "
                    + "AND Documento = '" + documento + "';";
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

    public String retornarValorSequencia(int filial, String documento) {
        try {
            sql = "SELECT TOP 1 Sequencia FROM Lanc_Pedidos_itens "
                    + "WHERE filial = " + filial + " "
                    + "AND Documento = '" + documento + "' "
                    + "ORDER BY Sequencia DESC;";
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
            if (cont <= 0) {
                seguencia = "0";
            }
            Conexao.fecharConexao(con, pst, rs);
            return seguencia;
        } catch (SQLException ex) {
            //Logger.getLogger(UsuarioDao.class.getName()).log(Level.SEVERE, null, ex);
            return "0";
        }
    }

    public boolean removerItem(int filial, String documento, int sequencia) {
        try {
            sql = "DELETE FROM LANC_PEDIDOS_ITENS "
                    + "WHERE Filial = " + filial + " "
                    + "AND Documento = '" + documento + "' "
                    + "AND Sequencia = " + sequencia + ";";
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

    public LancPedidosItens lancPedidosItens(int filial, String documento) {
        LancPedidosItens _LancPedidosItem = null;
        try {
            sql = "SELECT TOP 1 ID_Lanc_Pedidos_Itens, Filial, Documento, Sequencia, ITEM, QUANTIDADE, VALOR_UNITARIO, VALOR_TOTAL "
                    + "FROM LANC_PEDIDOS_ITENS "
                    + "WHERE Filial = " + filial + " "
                    + "AND Documento = '" + documento + "';";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _LancPedidosItem = new LancPedidosItens();
                _LancPedidosItem.setIdLancPedido(rs.getInt("ID_Lanc_Pedidos_Itens"));
                //_LancPedidosItem.setLancPedidoId(rs.getInt("lancPedidoId"));
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
