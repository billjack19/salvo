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
        /*String array[] = new String[3];
        array = _Endereco.getCodigo().split("+");*/
        sql = "UPDATE LANC_ENTREGA_ITENS"
                + " SET"
                    + " LANC_ENTREGA_ITENS.LATITUDE = '" + _Endereco.getLatitude() + "',"
                    + " LANC_ENTREGA_ITENS.LONGITUDE = '" + _Endereco.getLongitude() + "'"
                + " WHERE"
                    + " LANC_ENTREGA_ITENS.LATITUDE IS NULL"
                + " AND LANC_ENTREGA_ITENS.CK_ENTREGUE = 0"
                + " AND LANC_ENTREGA_ITENS.FILIAL = " + _Endereco.getFilial()
                + " AND LANC_ENTREGA_ITENS.SERIE = '" + _Endereco.getSerie() + "'"
                + " AND LANC_ENTREGA_ITENS.NOTAFISCAL = '" + _Endereco.getNota_fiscal()+ "'";
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
    
    
    
    public String setGeocodificacao2(Endereco _Endereco){
        /*String array[] = new String[3];
        array = _Endereco.getCodigo().split("+");*/
        sql = "UPDATE NF_RECEBER"
                + " SET"
                    + " NF_RECEBER.LATITUDE_ENTREGA = '" + _Endereco.getLatitude() + "',"
                    + " NF_RECEBER.LONGITUDE_ENTREGA = '" + _Endereco.getLongitude() + "'"
                    /*+ " LANC_ENTREGA_ITENS.LATITUDE = '"
                    + " LANC_ENTREGA_ITENS.LONGITUDE = '"*/
                + " WHERE"
                    + " NF_RECEBER.LONGITUDE_ENTREGA IS NULL"
                // + " AND LANC_ENTREGA_ITENS.CK_ENTREGUE = 0"
                + " AND NF_RECEBER.FILIAL = " + _Endereco.getFilial()
                + " AND NF_RECEBER.Serie = '" + _Endereco.getSerie() + "'"
                + " AND NF_RECEBER.NotaFiscal = '" + _Endereco.getNota_fiscal()+ "'";
                /*
                    + " AND LANC_ENTREGA_ITENS.FILIAL = "
                    + " AND LANC_ENTREGA_ITENS.SERIE = '"
                    + " AND LANC_ENTREGA_ITENS.NOTAFISCAL = '";
                */
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
            sql = "SELECT DISTINCT"
                        + " LANC_ENTREGA_ITENS.FILIAL, "
                        + " LANC_ENTREGA_ITENS.SERIE, "
                        + " LANC_ENTREGA_ITENS.NOTAFISCAL, "
                        + " LANC_ENTREGA_ITENS.LOCAL_ENTREGA, "
                        + " LANC_ENTREGA_ITENS.CEP, "
                        + " coalesce(LANC_ENTREGA_ITENS.NUMERO, '0') AS NUMERO, "
                        + " CEP.ENDERECO, "
                        + " CEP.CIDADE, "
                        + " CEP.ESTADO, "
                        + " LANC_ENTREGA_ITENS.LATITUDE, "
                        + " LANC_ENTREGA_ITENS.LONGITUDE"
                    + " FROM"
                    + " LANC_ENTREGA_ITENS"
                    + " INNER JOIN GUIA_CORREIOS..CEP CEP ON LANC_ENTREGA_ITENS.CEP = REPLACE(CEP.CEP, '-', '')"
                    + " WHERE"
                        + " LANC_ENTREGA_ITENS.LATITUDE IS NULL"
                    + " AND LANC_ENTREGA_ITENS.CK_ENTREGUE = 0";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Endereco = new Endereco();
                // _Endereco.setCodigo(rs.getInt("filial")+"+"+rs.getString("serie")+"+"+rs.getString("notafiscal"));
                _Endereco.setFilial(rs.getInt("FILIAL"));
                _Endereco.setSerie(rs.getString("SERIE"));
                _Endereco.setNota_fiscal(rs.getString("NOTAFISCAL"));
                _Endereco.setEndereco(rs.getString("ENDERECO"));
                _Endereco.setNumero(rs.getString("NUMERO"));
                _Endereco.setCidade(rs.getString("CIDADE"));
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
    
    public List<Endereco> retonaEnderecosPendentes2(){
        List<Endereco> _Enderecos = new ArrayList<>();
        Endereco _Endereco = null;
        try {
            sql = "SELECT"
                    + " NF_RECEBER.FILIAL,"
                    + " NF_RECEBER.Serie,"
                    + " NF_RECEBER.NotaFiscal,"
                    // + " ENTREGA.ID_LANC_ENTREGA AS codigo,"
                    // + " NF_RECEBER_ITENS.ITEM AS codigo_item,"
                    // + " ITEM.DESCRICAO AS descricao_item,"
                    // + " NF_RECEBER_ITENS.QTD_ENTREGA AS qtd_item,"
                    // + " NF_RECEBER_ITENS.UNIDADE AS unidade_item,"
                    // + " NF_RECEBER.NOTAFISCAL AS pedido,"
                    // + " NF_RECEBER.CLIENTE AS clienteCodigo,"
                    // + " NF_RECEBER.LATITUDE_ENTREGA AS latitude,"
                    // + " NF_RECEBER.LONGITUDE_ENTREGA AS longitude,"
                    // + " NF_RECEBER.LOCALENTREGA AS endereco,"
                    + " CEP.ENDERECO, "
                    + " CEP.CIDADE, "
                    + " NF_RECEBER.CEPENTREGA AS cep,"
                    + " NF_RECEBER.NUMEROENTREGA AS NUMERO"
                + " FROM NF_RECEBER"
                + " INNER JOIN GUIA_CORREIOS..CEP CEP ON NF_RECEBER.CEPENTREGA = REPLACE(CEP.CEP, '-', '')"
                //+ " INNER JOIN CLIEFORNEC ON CLIEFORNEC.CODIGO = NF_RECEBER.CLIENTE"
                //+ " INNER JOIN VENDEDOR ON VENDEDOR.VENDEDOR = NF_RECEBER.VENDEDOR"
                + " INNER JOIN NF_RECEBER_ITENS "
                   + " ON NF_RECEBER.FILIAL = NF_RECEBER_ITENS.FILIAL"
                   + " AND NF_RECEBER.SERIE = NF_RECEBER_ITENS.SERIE"
                   + " AND NF_RECEBER.NOTAFISCAL = NF_RECEBER_ITENS.NOTAFISCAL"
                //+ " INNER JOIN ITEM ON ITEM.ITEM = NF_RECEBER_ITENS.ITEM"
                //+ " LEFT JOIN CEP_BAIRRO_REGIAO ON CEP_BAIRRO_REGIAO.CEP = SUBSTRING(NF_RECEBER.CEPENTREGA, 1, 5) + '-' + SUBSTRING(NF_RECEBER.CEPENTREGA, 6, 3)"
                //+ " LEFT JOIN TAB_REGIOES ON TAB_REGIOES.CODIGO = CEP_BAIRRO_REGIAO.REGIAO"
                + " LEFT JOIN("
                    + " SELECT DISTINCT"
                        + " LANC_ENTREGA.ID_LANC_ENTREGA,"
                        + " NOTAFISCAL,"
                        + " SERIE,"
                        + " FILIAL,"
                        + " ITEM"
                        + " FROM LANC_ENTREGA"
                        + " INNER JOIN LANC_ENTREGA_ITENS ON LANC_ENTREGA.ID_LANC_ENTREGA = LANC_ENTREGA_ITENS.ID_LANC_ENTREGA"
                        + " WHERE LANC_ENTREGA.CK_INATIVO = 0"
                        + " AND COALESCE(LANC_ENTREGA_ITENS.CK_INATIVO, 0) = 0"
                    + " ) ENTREGA ON ENTREGA.FILIAL = NF_RECEBER.FILIAL AND ENTREGA.SERIE = NF_RECEBER.SERIE AND ENTREGA.NOTAFISCAL = NF_RECEBER.NOTAFISCAL AND ENTREGA.ITEM = NF_RECEBER_ITENS.ITEM"
                + " WHERE NF_RECEBER.SERIE = 'ENC'"
                + " AND NF_RECEBER.FLAGCANCELADA = 0"
                + " AND NF_RECEBER.FLAGIMPRESSAO = 1"
                + " AND NF_RECEBER_ITENS.CK_ENTREGA = 1"
                + " AND ENTREGA.NOTAFISCAL IS NULL"
                + " AND NF_RECEBER.LATITUDE_ENTREGA  IS NULL";
                //+ " ORDER BY"
                    //+ " CEP_BAIRRO_REGIAO.REGIAO,"
                    //+ " CEP_BAIRRO_REGIAO.BAIRRO,"
                    //+ " NF_RECEBER_ITENS.PREV_ENTREGA";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Endereco = new Endereco();
                // _Endereco.setCodigo(rs.getInt("filial")+"+"+rs.getString("serie")+"+"+rs.getString("notafiscal"));
                _Endereco.setFilial(rs.getInt("FILIAL"));
                _Endereco.setSerie(rs.getString("Serie"));
                _Endereco.setNota_fiscal(rs.getString("NotaFiscal"));

                _Endereco.setEndereco(rs.getString("ENDERECO"));
                _Endereco.setNumero(rs.getString("NUMERO"));
                _Endereco.setCidade(rs.getString("CIDADE"));
                _Endereco.setCep(rs.getString("cep"));
                _Enderecos.add(_Endereco);
            }
            Conexao.fecharConexao(con, pst, rs);
            return _Enderecos;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Endereco = new Endereco();
            _Endereco.setEndereco(ex.getMessage());
            _Enderecos.add(_Endereco);
            return _Enderecos;
        }
    }
}
