/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.GrupoItem;
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
public class GrupoItemDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<GrupoItem> listarGrupoItem() {
        List<GrupoItem> GrupoItems = new ArrayList<>();
        GrupoItem _GrupoItem = null;
        try {
            sql = "SELECT Codigo, DESCRICAO, Imagem FROM Tab_Categorias ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _GrupoItem = new GrupoItem();
                _GrupoItem.setGrupotItem(rs.getInt("Codigo"));
                _GrupoItem.setDescricao(rs.getString("DESCRICAO"));
                _GrupoItem.setImagem(rs.getString("Imagem"));

                GrupoItems.add(_GrupoItem);
            }
            Conexao.fecharConexao(con, pst, rs);
            return GrupoItems;
        } catch (SQLException ex) {
            Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return GrupoItems;
        }
    }
}