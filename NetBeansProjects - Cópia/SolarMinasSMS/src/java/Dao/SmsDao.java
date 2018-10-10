/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Envio_sms;
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
public class SmsDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public String pesquisaClienteContato(int codigo) {
        String contatoClientes = "";
        try {
            sql = "SELECT Telefone FROM CLIEFORNEC_TELEFONE WHERE Cliente = " + codigo;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                if("".equals(contatoClientes)) contatoClientes = rs.getString("Telefone");
                else contatoClientes += "+"+rs.getString("Telefone");
                
            }
            Conexao.fecharConexao(con, pst, rs);
            return contatoClientes;
        } catch (SQLException ex) {
            return ex.getMessage();
        }
    }

    public List<Envio_sms> pesquisaEnvioSMS() {
        List<Envio_sms> envios = new ArrayList<>();
        Envio_sms envio = null;
        try {
            sql = "SELECT"
                        + " lanc_pedidos_sat_email.ID_Lanc_Pedidos_SAT_Email,"
                        + " lanc_pedidos_sat_email.Filial,"
                        + " lanc_pedidos_sat_email.Documento,"
                        + " lanc_pedidos_sat_email.MENSAGEM_EMAIL,"
                        + " CLIEFORNEC.RAZAOSOCIAL,"
                        + " Lanc_Pedidos.CLIENTE"
                    + " FROM lanc_pedidos_sat_email"
                    + " INNER JOIN Lanc_Pedidos Lanc_Pedidos"
                        + " ON lanc_pedidos_sat_email.Filial = Lanc_Pedidos.Filial"
                        + " AND lanc_pedidos_sat_email.Documento = Lanc_Pedidos.Documento"
                    + " INNER JOIN CLIEFORNEC CLIEFORNEC "
                        + " ON Lanc_Pedidos.CLIENTE = CLIEFORNEC.CODIGO";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                envio = new Envio_sms();
                envio.setId(rs.getInt("ID_Lanc_Pedidos_SAT_Email"));
                envio.setFilial(rs.getInt("Filial"));
                envio.setDocumento(rs.getString("Documento"));
                envio.setCliente(rs.getInt("CLIENTE"));
                envio.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                //envio.setTelefones(pesquisaClienteContato(envio.getCliente()));
                //envio.setMensagem_sms(rs.getString("MENSAGEM_EMAIL"));
                envios.add(envio);
            }
            Conexao.fecharConexao(con, pst, rs);

            for (int i = 0; i < envios.size(); i++) {
                envios.get(i).setTelefones(pesquisaClienteContato(envio.getCliente()));
            }
            return envios;
        } catch (SQLException ex) {
            Logger.getLogger(SmsDao.class.getName()).log(Level.SEVERE, null, ex);
            envio = new Envio_sms();
            envio.setDocumento(ex.getMessage());
            envios.add(envio);
            return envios;
        }
    }
    
    public String atualizaCK_enviado(int id){
        try {
            sql = "UPDATE lanc_pedidos_sat_email SET CK_ENVIADO = 1 WHERE ID_Lanc_Pedidos_SAT_Email = "+id;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst);
            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(SmsDao.class.getName()).log(Level.SEVERE, null, ex);
            return "Erro: "+ex.getMessage();
        }
    }
    
    

    public String atualizaCK_cancelado(int id){
        try {
            sql = "UPDATE lanc_pedidos_sat_email SET CK_ENVIADO = 1 WHERE ID_Lanc_Pedidos_SAT_Email = "+id;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();
            Conexao.fecharConexao(con, pst);
            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(SmsDao.class.getName()).log(Level.SEVERE, null, ex);
            return "Erro: "+ex.getMessage();
        }
    }
}
