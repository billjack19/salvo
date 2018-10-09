/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.ItemFilial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author CDI
 */
public class ItemFilialDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<ItemFilial> listarItensFilial() {
        List<ItemFilial> Items = new ArrayList<>();
        ItemFilial _Item = null;
        try {
            sql = "SELECT PRECO_BASE, ITEM, FILIAL, VALOR_INCLUSAO"
                    + " FROM ITEM_FILIAL";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Item = new ItemFilial();
                _Item.setITEM(rs.getInt("ITEM"));
                _Item.setFILIAL(rs.getInt("FILIAL"));
                _Item.setPRECO_BASE(rs.getFloat("PRECO_BASE"));
                _Item.setVALOR_INCLUSAO(rs.getFloat("VALOR_INCLUSAO"));

                Items.add(_Item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Items;
        } catch (SQLException ex) {
            return Items;
        }
    }
}
