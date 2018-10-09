/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Grupo;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author jack
 */
public class GrupoDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<Grupo> listarGrupo() {
        List<Grupo> Grupos = new ArrayList<>();
        Grupo _Grupo = null;
        try {
            sql = "SELECT GRUPO, DESCRICAO, Imagem FROM GRUPO_ESTOQUE ORDER BY DESCRICAO;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Grupo = new Grupo();
                _Grupo.setGrupotItem(rs.getInt("GRUPO"));
                _Grupo.setDescricao(rs.getString("DESCRICAO"));
                _Grupo.setImagem(rs.getString("Imagem"));

                Grupos.add(_Grupo);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Grupos;
        } catch (SQLException ex) {
            //Logger.getLogger(ClienteDao.class.getName()).log(Level.SEVERE, null, ex);
            return Grupos;
        }
    }
}