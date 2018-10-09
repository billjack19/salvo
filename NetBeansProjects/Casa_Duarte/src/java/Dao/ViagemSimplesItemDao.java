/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

// import com.google.gson.Gson;
import Controller.Conexao;
import Model.Viagem_item;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jack Biller
 */
public class ViagemSimplesItemDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    
    /* 
        - ESTA FUNÇÃO TEM QUE PUXAR DADOS DA WEB
        - POREM NÃO TEM O ESQUEMA DE MANDAR DADOS DAS ENTREGAS PARA WEB 
        - POR ISSO QUE ESTA LOCAL
    */
    public Viagem_item pesquisaBoolEntrega_ViagensSimplesItem(String pedido, int enterga, String codigo) {
        // Gson g = new Gson();
        Viagem_item _Viagem_item = new Viagem_item();
        ArrayList<Integer> codigos = new ArrayList<>();
        sql = "SELECT"
                + " ID_LANC_ENTREGA_ITENS AS codigo,"
                + " coalesce(CK_ENTREGUE, 0) AS bool_entrega"
                + " FROM lanc_entrega_itens"
                + " WHERE NOTAFISCAL = '" + pedido + "'"
                + " AND ID_LANC_ENTREGA = " + enterga
                + " ORDER BY NOTAFISCAL, ID_LANC_ENTREGA_ITENS";
        try {
            
            // con = ConexaoWeb.conexao();
            con = Conexao.conexao();

            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                codigos.add(rs.getInt("codigo"));
                 _Viagem_item.setCodigo(codigos);
                 _Viagem_item.setItem(codigo);
                _Viagem_item.setBool_entrega(rs.getInt("bool_entrega"));
            }
            // ConexaoWeb.fecharConexao(con, pst, rs);
            Conexao.fecharConexao(con, pst, rs);
            setConfirmaViagemItem(_Viagem_item.getCodigo(), _Viagem_item.getBool_entrega());
            
            return _Viagem_item;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Viagem_item.setItem(ex.getMessage()+"-----SQL: "+sql);
            return _Viagem_item;
        }
    }
    
    public void setConfirmaViagemItem(ArrayList<Integer> codigos, int ck_confirmado){
        try {
            String descricao = "";
            for(int i = 0; i < codigos.size(); i++){
                if(i == 0)  descricao  = " WHERE ID_LANC_ENTREGA_ITENS = " + codigos.get(i);
                else        descricao += " OR ID_LANC_ENTREGA_ITENS = " + codigos.get(i);
            }
            sql = "UPDATE LANC_ENTREGA_ITENS"
                        + " SET "
                        + " CK_ENTREGUE = " + ck_confirmado + descricao;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst);
            
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}