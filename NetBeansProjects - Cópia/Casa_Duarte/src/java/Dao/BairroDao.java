/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Bairro;
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
 * @author Jack Biller
 */
public class BairroDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    
    public List<Bairro> listarBairros() {
        List<Bairro> Bairros = new ArrayList<>();
        Bairro _Bairro = null;
        try {
            sql = "SELECT"
                        + " id_bairro AS codigo,"
                        + " descricao_bairro AS descricao,"
                        + " lat_lng_bairro AS lat_lng,"
                        + " raio_bairro AS raio"
                    + " FROM bairro;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Bairro = new Bairro();
                _Bairro.setCodigo(rs.getString("codigo"));
                _Bairro.setDescricao(rs.getString("descricao"));
                _Bairro.setLatLng(rs.getString("lat_lng"));
                _Bairro.setRaio(rs.getFloat("raio"));

                Bairros.add(_Bairro);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Bairros;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Bairro = new Bairro();
            _Bairro.setDescricao(ex.getMessage());
            Bairros.add(_Bairro);
            return Bairros;
        }
    }
    
    public List<Bairro> listarBairrosPorRegiao(int codigoRegiao) {
        List<Bairro> Bairros = new ArrayList<>();
        Bairro _Bairro = null;
        
        sql = " select "
                    + " guia_correios.cep.cep,"
                    + " guia_correios.cep.endereco,"
                    + " guia_correios.temp_lat_lng_regiao.latitude,"
                    + " guia_correios.temp_lat_lng_regiao.longitude"
                + " from cep_bairro_regiao cep_bairro_regiao"
                + " inner join guia_correios.temp_lat_lng_regiao on cep_bairro_regiao.cep = guia_correios.temp_lat_lng_regiao.cep"
                + " inner join guia_correios.cep on cep_bairro_regiao.cep = guia_correios.cep.cep"
                + " where cep_bairro_regiao.regiao = "+codigoRegiao+"";
        try {
            /*sql = "SELECT"
                        + " id_bairro AS codigo,"
                        + " descricao_bairro AS descricao,"
                        + " lat_lng_bairro AS lat_lng,"
                        + " raio_bairro AS raio"
                    + " FROM cep_bairro_regiao"
                    + " WHERE regiao = "+codigoRegiao+";";*/
            
            
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Bairro = new Bairro();
                /*_Bairro.setCodigo(rs.getInt("codigo"));
                _Bairro.setDescricao(rs.getString("descricao"));
                _Bairro.setLatLng(rs.getString("lat_lng"));
                _Bairro.setRaio(rs.getFloat("raio"));*/
                
                _Bairro.setCodigo(rs.getString("cep"));
                _Bairro.setDescricao(rs.getString("endereco"));
                _Bairro.setLatLng(rs.getString("latitude")+","+rs.getString("longitude"));
                _Bairro.setRaio(500); // rs.getFloat("raio")

                Bairros.add(_Bairro);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Bairros;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Bairro = new Bairro();
            _Bairro.setDescricao("SQL: "+sql+" \n\nIGNORAR KKKKKKKKK\n\n"+ex.getMessage());
            Bairros.add(_Bairro);
            return Bairros;
        }
    }
}
