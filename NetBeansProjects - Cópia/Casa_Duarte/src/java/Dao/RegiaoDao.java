/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Controller.ConexaoWeb;
import Model.Regiao;
import Model.Viagem;
import Model.Viagem_item;
import com.google.gson.Gson;
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
public class RegiaoDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    
    public List<Regiao> listarRegioes() {
        List<Regiao> Regioes = new ArrayList<>();
        Regiao _Regiao = null;
        // int codigo = 0;
        // BairroDao _BairroDao = new BairroDao();
        try {
            /*sql = "SELECT"
                        + " id_regiao AS codigo,"
                        + " descricao_regiao AS descricao,"
                        + " lat_lng_regiao AS lat_lng,"
                        + " raio_regiao AS raio"
                    + " FROM regiao;";*/
            
            /*sql = "select "
                        + " cep_bairro_regiao.regiao AS codigo,"
                        + " tab_regioes.descricao AS descricao,"
                        + " cep_bairro_regiao.central_ponto AS lat_lng,"
                        + " cep_bairro_regiao.raio AS raio"
                    + " from cep_bairro_regiao"
                    + " inner join tab_regioes on cep_bairro_regiao.regiao = tab_regioes.codigo"
                    + " where COALESCE(cep_bairro_regiao.raio, 0) <> 0"
                    + " group by "
                        + " cep_bairro_regiao.regiao, "
                        + " tab_regioes.descricao, "
                        + " cep_bairro_regiao.central_ponto, "
                        + " cep_bairro_regiao.raio";*/
            
            /*sql = "select "
                        + " cep_bairro_regiao.regiao AS codigo,"
                        + " temp_lat_lng_bairro.cep AS descricao,"
                    + " CONCAT(temp_lat_lng_bairro.latitude,\",\",temp_lat_lng_bairro.longitude) AS lat_lng,"
                    // + " -- cep_bairro_regiao.central_ponto AS lat_lng,"
                    + " cep_bairro_regiao.raio AS raio"
                    + " from cep_bairro_regiao"
                    + " inner join tab_regioes on cep_bairro_regiao.regiao = tab_regioes.codigo"
                    + " inner join temp_lat_lng_bairro on cep_bairro_regiao.bairro = temp_lat_lng_bairro.cep"
                    // + " where COALESCE(cep_bairro_regiao.raio, 0) <> 0"
                    + " where cep_bairro_regiao.regiao = 5"
                    + " group by cep_bairro_regiao.bairro";*/
            
            sql = "SELECT "
                    + " codigo,"
                    + " descricao,"
                    + " CONCAT(latitude,\",\",longitude) AS lat_lng,"
                    + " raio"
                    + " FROM tab_regioes";
            
            con = ConexaoWeb.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Regiao = new Regiao();
                _Regiao.setCodigo(rs.getInt("codigo"));
                // _Regiao.setCodigo(codigo);
                _Regiao.setDescricao(rs.getString("descricao"));
                _Regiao.setLat_lng(rs.getString("lat_lng"));
                _Regiao.setRaio(rs.getFloat("raio"));
                //_Regiao.setRaio(500);
                
                Regioes.add(_Regiao);
                // codigo++;
            }
            ConexaoWeb.fecharConexao(con, pst, rs);

            /*for(int i = 0; i < Regioes.size(); i++){
                Regioes.get(i).setBairros(_BairroDao.listarBairrosPorRegiao(Regioes.get(i).getCodigo()));
            }*/
            
            return Regioes;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Regiao = new Regiao();
            _Regiao.setDescricao(ex.getMessage());
            Regioes.add(_Regiao);
            return Regioes;
        }
    }
}
