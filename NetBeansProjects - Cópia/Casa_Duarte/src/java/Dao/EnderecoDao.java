/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Endereco;
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
public class EnderecoDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    
     public String setGeocodificacao(Endereco _Endereco){
        sql = "UPDATE geocodificacao"
                + " SET"
                + " latitude_geocodificacao = '"+_Endereco.getLatitude()+"',"
                + " longitude_geocodificacao = '"+_Endereco.getLongitude()+"'"
                + " WHERE id_geocodificacao = "+_Endereco.getCodigo();
        try {
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst);
            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(EnderecoDao.class.getName()).log(Level.SEVERE, null, ex);
            return sql+"   SEPARA TUDO    "+ex.getMessage();
        }
    }
    
    public List<Endereco> retonaEnderecosPendentes(){
        List<Endereco> _Enderecos = new ArrayList<>();
        Endereco _Endereco = null;
        try{
            sql = "SELECT"
                    + " id_geocodificacao AS codigo,"
                    + " endereco_geocodificacao AS endereco,"
                    + " numero_geocodificacao AS numero,"
                    + " cep_geocodificacao AS cep,"
                    + " cidade_geocodificacao AS cidade"
            + " FROM geocodificacao"
            + " WHERE latitude_geocodificacao = ''"
            + " OR latitude_geocodificacao = null"
            + " OR longitude_geocodificacao = ''"
            + " OR longitude_geocodificacao = null";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Endereco = new Endereco();
                _Endereco.setCodigo(rs.getInt("codigo"));
                _Endereco.setEndereco(rs.getString("endereco"));
                _Endereco.setNumero(rs.getInt("numero"));
                _Endereco.setCidade(rs.getString("cidade"));
                _Endereco.setCep(rs.getString("cep"));
                _Enderecos.add(_Endereco);
            }
            Conexao.fecharConexao(con, pst, rs);
            return _Enderecos;
        } catch (SQLException ex){
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Endereco = new Endereco();
            _Endereco.setEndereco(ex.getMessage());
            _Enderecos.add(_Endereco);
            return _Enderecos;
        }
    }
}
