/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.SubGrupo;
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
public class SubGrupoDao {
     private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<SubGrupo> listarSubGrupo(int grupo) {
        List<SubGrupo> Grupos = new ArrayList<>();
        SubGrupo _SubGrupo = null;
        try {
            sql = "SELECT SUB_GRUPO, DESCRICAO, Imagem FROM SUB_GRUPO_ESTOQUE "
                    + "WHERE GRUPO = "+grupo+" "
                    + "ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _SubGrupo = new SubGrupo();
                _SubGrupo.setSubGrupoItem(rs.getInt("SUB_GRUPO"));
                _SubGrupo.setGrupoItem(grupo);
                _SubGrupo.setDescricao(rs.getString("DESCRICAO"));
                _SubGrupo.setImagem(rs.getString("Imagem"));

                Grupos.add(_SubGrupo);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Grupos;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Grupos;
        }
    }
}
