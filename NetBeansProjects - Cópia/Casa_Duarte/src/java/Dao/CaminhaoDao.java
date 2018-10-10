/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.ConexaoWeb;
import Controller.Conexao;
import Model.Caminhao;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jack Biller
 */
public class CaminhaoDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public Caminhao pesquisaCaminhao(int codigo) {
        Caminhao _Caminhao = new Caminhao();
        try {
            sql = "SELECT"
                    + " id_veiculo AS codigo_caminhao,"
                    + " placa AS placa,"
                    + " descricao AS descricao,"
                    + " latitude AS latCaminhao,"
                    + " longitude AS lngCaminhao"
                    + " FROM tabveiculos"
                    + " WHERE id_veiculo = " + codigo;
            con = ConexaoWeb.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Caminhao = new Caminhao();
                _Caminhao.setCodigo(rs.getInt("codigo_caminhao"));
                _Caminhao.setPlaca(rs.getString("placa") + " - " + rs.getString("descricao"));
                _Caminhao.setLatitude(rs.getString("latCaminhao"));
                _Caminhao.setLongitude(rs.getString("lngCaminhao"));
            }
            ConexaoWeb.fecharConexao(con, pst, rs);

            atualizarCaminhao(_Caminhao);
            return _Caminhao;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Caminhao.setPlaca(ex.getMessage());
            return _Caminhao;
        }
    }
    
    public void atualizarCaminhao(Caminhao _Caminhao){
        try {
            sql = "UPDATE TabVeiculos"
                    + " SET"
                        // + " PLACA = '" + _Caminhao.getPlaca() + "',"
                        + " LATITUDE = '" + _Caminhao.getLatitude() + "'," 
                        + " LONGITUDE = '" + _Caminhao.getLongitude() + "'"
                    + " WHERE id_Veiculo = " + _Caminhao.getCodigo();
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            
            Conexao.fecharConexao(con, pst);
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
