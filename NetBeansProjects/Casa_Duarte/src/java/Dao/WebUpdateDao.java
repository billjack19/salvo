/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.ConexaoWeb;
import Model.Resultado;
import Model.Viagem;
import Model.Viagem_item;
import com.google.gson.Gson;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jack Biller
 */
public class WebUpdateDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    private int cont;
    
    public void atualizarTudo(){
        this.buscarPedidos();
    }

    public String buscarPedidos() { 
        ViagemDao _ViagemDao = new ViagemDao();
        List<Viagem> Viagens = _ViagemDao.listarViagensSimplesCompleto();
        // ArrayList<Resultado> resultados = new ArrayList<>();
        String resultadoText = "";

        //for(int i = 0; i < Viagens.size(); i++) resultados.add(this.atualizarPedido(Viagens.get(i)));
        for(int i = 0; i < Viagens.size(); i++) {
            resultadoText = this.atualizarPedido(Viagens.get(i));
        }

        return resultadoText;
    }

    public String atualizarPedido(Viagem _Viagem) {
        Resultado _resultado = new Resultado();
        String resutText = "";
        Gson g = new Gson();
        String observacao = "''";
        if(!_Viagem.getObservacao().equals('0')){
            observacao = "'" + _Viagem.getObservacao()+"'";
        }
        String sqlI = "INSERT INTO lanc_entrega"
                + " ("
                + " ID_LANC_ENTREGA,"
                + " ID_VEICULO,"
                + " ID_MOTORISTA,"
                + " CARREGADO_KG,"
                + " CAPACIDADE_KG,"
                + " OBSERVACAO,"
                + " CK_ENTREGUE,"
                + " CK_INATIVO"
                + " ) "
                + " VALUES"
                + " ("
                       + Integer.toString(_Viagem.getCodigo())
                + ", " + _Viagem.getCaminhao().getCodigo()
                + ", " + _Viagem.getMotorista().getCodigo()
                + ", " + _Viagem.getPesoTotal().replace(",", ".")
                + ", " + _Viagem.getCaminhao().getCapacidade().replace(",", ".")
                + ", " + observacao
                + ", " + _Viagem.getCk_entregue()
                + ", " + _Viagem.getCk_inativo()
                + ")";
        String sqlU = "UPDATE lanc_entrega"
                    + " SET " 
                            + "  ID_VEICULO = "     + _Viagem.getCaminhao().getCodigo()
                            + ", ID_MOTORISTA = "   + _Viagem.getMotorista().getCodigo()
                            + ", CARREGADO_KG = "   + _Viagem.getPesoTotal().replace(",", ".")
                            + ", CAPACIDADE_KG = "  + _Viagem.getCaminhao().getCapacidade().replace(",", ".")
                            + ", OBSERVACAO = "     + observacao
                            + ", CK_ENTREGUE = "    + _Viagem.getCk_entregue()
                            + ", CK_INATIVO = "     + _Viagem.getCk_inativo()
                    + " WHERE ID_LANC_ENTREGA = " + _Viagem.getCodigo();
        sql = "SELECT COUNT(*) AS total FROM lanc_entrega WHERE ID_LANC_ENTREGA = " + _Viagem.getCodigo();
        try {
            con = ConexaoWeb.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) cont = rs.getInt("total");
            ConexaoWeb.fecharConexao(con, pst, rs);

            if(cont == 0)   sql = sqlI;
            else            sql = sqlU;

            con = ConexaoWeb.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            ConexaoWeb.fecharConexao(con, pst);
            _resultado.setRQE(1, sql, "Nenhum Erro!");


            /*sql = "DELETE FROM lanc_entrega_itens WHERE ID_LANC_ENTREGA = " + _Viagem.getCodigo();
            con = ConexaoWeb.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            ConexaoWeb.fecharConexao(con, pst);
            _resultado.setRQE(1, sql, g.toJson( _Viagem.getEndEntrega() ));*/

            resutText = "1";
            for(int i = 0; i < _Viagem.getEndEntrega().size(); i++){
                resutText = atualizarPedidoItem(_Viagem.getEndEntrega().get(i), _Viagem.getCodigo());
            }

            return resutText; // g.toJson(_Viagem.getEndEntrega().get(0));
        } catch (SQLException ex) {
            Logger.getLogger(WebUpdateDao.class.getName()).log(Level.SEVERE, null, ex);
            _resultado.setRQE(0, sql, ex.getMessage());
            return "0";
            //return _resultado;
        }
    }
    
    public String atualizarPedidoItem(Viagem_item _Viagem_item, int codigo){
        Resultado _resultado = new Resultado();
        String sqlI, sqlU;
        //Resultado _subResultado = null;
        Gson g = new Gson();
        try {
            for(int i = 0; i < _Viagem_item.getCodigo().size(); i++){
                sqlI = "INSERT INTO lanc_entrega_itens"
                    + "("
                        + " ID_LANC_ENTREGA_ITENS,"
                        + " LATITUDE,"
                        + " LONGITUDE,"
                        + " LOCAL_ENTREGA,"
                        + " NOTAFISCAL,"
                        + " CK_ENTREGUE,"
                        + " ITEM,"
                        + " QTD_ENTREGA,"
                        + " UNIDADE,"
                        + " ID_LANC_ENTREGA,"
                        + " CEP,"
                        + " CK_INATIVO"
                    + ") VALUES ("
                        + ""    + _Viagem_item.getCodigo().get(i)
                        + ", '" + _Viagem_item.getLatitude() + "'"
                        + ", '" + _Viagem_item.getLongitude() + "'"
                        + ", '" + _Viagem_item.getDescEndEndrega() + "'"
                        + ", '" + _Viagem_item.getPedido() + "'"
                        + ", "  + _Viagem_item.getBool_entrega()
                        + ", "  + _Viagem_item.getItens().get(i).getCodigo()
                        + ", "  + _Viagem_item.getItens().get(i).getQuantidade()
                        + ", '" + _Viagem_item.getItens().get(i).getUnidade() + "'"
                        + ", " + codigo
                        + ", '" + _Viagem_item.getCep() + "'"
                        + ", " +  _Viagem_item.getBool_cancelado()
                    + ")";
                sqlU = "UPDATE lanc_entrega_itens"
                        + " SET"
                        + "  LATITUDE = '" + _Viagem_item.getLatitude() + "'"
                        + ", LONGITUDE = '" + _Viagem_item.getLongitude() + "'"
                        + ", LOCAL_ENTREGA = '" + _Viagem_item.getDescEndEndrega() + "'"
                        + ", NOTAFISCAL = '" + _Viagem_item.getPedido() + "'"
                        // + ", CK_ENTREGUE = "  + _Viagem_item.getBool_entrega()
                        + ", ITEM = " + _Viagem_item.getItens().get(i).getCodigo()
                        + ", QTD_ENTREGA = "  + _Viagem_item.getItens().get(i).getQuantidade()
                        + ", UNIDADE = '" + _Viagem_item.getItens().get(i).getUnidade() + "'"
                        + ", ID_LANC_ENTREGA = " + codigo
                        + ", CEP = '" + _Viagem_item.getCep() + "'"
                        + ", CK_INATIVO = " +  _Viagem_item.getBool_cancelado()
                        + " WHERE ID_LANC_ENTREGA_ITENS = " + _Viagem_item.getCodigo().get(i);

                sql = "SELECT COUNT(*) AS total FROM lanc_entrega_itens WHERE ID_LANC_ENTREGA_ITENS = " + _Viagem_item.getCodigo().get(i);
                con = ConexaoWeb.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) cont = rs.getInt("total");
                ConexaoWeb.fecharConexao(con, pst, rs);

                if(cont == 0) sql = sqlI;
                else          sql = sqlU;

                con = ConexaoWeb.conexao();
                pst = con.prepareStatement(sql);
                pst.execute();
                ConexaoWeb.fecharConexao(con, pst);

                //_subResultado = new Resultado();
                /*_subResultado.setRQE(1, sql, "Nenhum Erro até agora!");
                _resultado.getSubResultado().add(_subResultado);*/
            }

            _resultado.setRQE(1, sql, "Nenhum Erro!");
            // return g.toJson(_resultado)+sql+g.toJson(_Viagem_item);
            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(WebUpdateDao.class.getName()).log(Level.SEVERE, null, ex);
            _resultado.setRQE(0, sql, ex.getMessage());
            // return _resultado;
            // return g.toJson(_resultado)+sql+g.toJson(_Viagem_item); // ex.getMessage();
            return sql+" - 0 - "+ex.getMessage();
        }
    }
}