/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.ClienteContato;
import Model.LancPedidosItens;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import Model.Mesa;
import java.awt.print.PrinterException;
import java.sql.Statement;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jack Biller
 */
public class MesaDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    //private String idLancPedido;
    //private int lastId;
    private String nroDoc;

    public List<Mesa> listarMesa() {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT mesa.Codigo, mesa.DESCRICAO FROM Tab_Mesas mesa;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesaCodigo(int codigo) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT mesa.Codigo, mesa.DESCRICAO FROM Tab_Mesas mesa WHERE Codigo = " + codigo + ";";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesa(String descricao, int filial) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT Codigo, DESCRICAO FROM Tab_Mesas WHERE DESCRICAO = '" + descricao + "';";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setCodigo(rs.getInt("Codigo"));
                _Mesa.setDescricao(rs.getString("DESCRICAO"));
                //_Mesa.setinativo;

                _Mesa.setFilial(0);
                _Mesa.setDocumento("");
                _Mesa.setEmissao("");
                _Mesa.setTotal(0);
                _Mesa.setCliente(0);
                _Mesa.setIdentificacao("");
                //_Mesa.setCondPagamento(0);
                _Mesa.setRazaoSocial("");
                _Mesa.setVendedor(0);
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            sql = "SELECT TOP 1 p.Filial, p.Documento, p.Cliente, p.Vendedor, p.TOTAL, p.Emissao, p.Condpagamento, p.USUARIOATUALIZACAO, "
                    + "cli.RAZAOSOCIAL "
                    + "FROM Lanc_Pedidos p "
                    + "INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO "
                    + "WHERE coalesce(p.CondPagamento, 0) = 0 "
                    + "AND coalesce(p.flagCancelada, 0) = 0 "
                    + "AND p.Filial = " + filial + " "
                    + "AND p.Mesa = " + Integer.toString(Mesas.get(0).getCodigo()) + " "
                    + "ORDER BY p.Documento DESC;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                Mesas.get(0).setFilial(rs.getInt("Filial"));
                Mesas.get(0).setDocumento(rs.getString("Documento"));
                Mesas.get(0).setEmissao(rs.getString("Emissao"));
                Mesas.get(0).setTotal(rs.getFloat("TOTAL"));
                Mesas.get(0).setCliente(rs.getInt("Cliente"));
                Mesas.get(0).setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                //_Mesa.setCondPagamento(0);
                Mesas.get(0).setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                Mesas.get(0).setVendedor(rs.getInt("Vendedor"));
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarMesaPrincipal(int filial, String filtro, String data) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = " SELECT"
                    + " Lanc_Pedidos.Documento,"
                    + " Lanc_Pedidos.flagCancelada,"
                    + " Lanc_Pedidos.Condpagamento,"
                    + " CLIEFORNEC.RAZAOSOCIAL,"
                    + " Lanc_Pedidos.Emissao,"
                    + " Lanc_Pedidos.TOTAL,"
                    + " Lanc_Pedidos.USUARIOATUALIZACAO,"
                    + " Lanc_Pedidos.Vendedor,"
                    + " Lanc_Pedidos.Cliente,"
                    + " Lanc_Pedidos.DataEntregue"
                + " FROM Lanc_Pedidos Lanc_Pedidos"
                + " INNER JOIN CLIEFORNEC CLIEFORNEC ON Lanc_Pedidos.Cliente = CLIEFORNEC.CODIGO"
                + " WHERE Filial = "+filial
                + " AND Documento LIKE '%"+filtro+"%'"
                + " AND Emissao = '"+data+"'"
                // + " AND coalesce(Lanc_Pedidos.flagCancelada, 0) = 0"
                // + " AND coalesce(Lanc_Pedidos.Condpagamento, 0) = 0"
                //+ " AND  Emissao = '"+data+"'";
                //+ " AND Lanc_Pedidos.TOTAL <> 0"
                + " ORDER BY Documento DESC";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                _Mesa.setFilial(filial);
                _Mesa.setDocumento(rs.getString("Documento"));
                if (rs.getString("Emissao") == null) {
                    _Mesa.setEmissao("");
                } else {
                    _Mesa.setEmissao(rs.getString("Emissao"));
                }

                _Mesa.setTotal(rs.getFloat("TOTAL"));
                _Mesa.setCliente(rs.getInt("Cliente"));
                _Mesa.setIdentificacao(rs.getString("USUARIOATUALIZACAO"));
                _Mesa.setCondPagamento(rs.getInt("Condpagamento"));
                _Mesa.setCancelada(rs.getInt("flagCancelada"));
                _Mesa.setRazaoSocial(rs.getString("RAZAOSOCIAL"));
                _Mesa.setVendedor(rs.getInt("Vendedor"));

                if (rs.getString("DataEntregue") == null) {
                    _Mesa.setContato("");
                } else {
                    _Mesa.setContato(rs.getString("DataEntregue"));
                }
                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            _Mesa = new Mesa();
            _Mesa.setDescricao(ex.getMessage());
            Mesas.add(_Mesa);
            return Mesas;
        }
    }
            
    public String verificaMesa(int mesa, int filial) {
        nroDoc = "1";
        try {
            sql = "SELECT coalesce(PED_MESA.Documento, '1') AS Documento" +
                    " FROM  Tab_Mesas mesa" +
                    " LEFT JOIN " +
                        " ( SELECT  p.Mesa, " +
                                " p.Filial, " +
                                " p.Documento, " +
                                " p.Cliente, " +
                                " p.Vendedor, " +
                                " p.TOTAL, " +
                                " p.Emissao, " +
                                " p.Condpagamento, " +
                                " p.USUARIOATUALIZACAO, " +
                                " cli.RAZAOSOCIAL " +
                            " FROM Lanc_Pedidos p " +
                            " INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO " +
                            " LEFT JOIN NF_RECEBER ON P.DOCUMENTO = NF_RECEBER.PEDIDO" +
                            " WHERE coalesce(p.flagCancelada, 0) = 0" +
                            " AND (NF_RECEBER.NotaFiscal IS NULL OR coalesce(NF_RECEBER.FlagCancelada, 0) = 1)" +
                            " AND P.ENCERRADOENTREGUE = 0" +
                            " AND p.Filial = " + filial +
                        " ) PED_MESA ON PED_MESA.Mesa = mesa.Codigo " +
                    " WHERE mesa.Codigo = " + mesa;
            

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                nroDoc = rs.getString("Documento");
            }
            Conexao.fecharConexao(con, pst, rs);

            return nroDoc;
        } catch (SQLException ex) {
            return ex.getMessage();
        }
    }

    public List<Mesa> buscarDocumento(int id, int filial) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            sql = "SELECT TOP 1 Documento FROM Lanc_Pedidos "
                    + "WHERE coalesce(CondPagamento, 0) = 0 "
                    + "AND Filial = " + filial + " "
                    + "AND Mesa = " + id + " "
                    + "ORDER BY Documento DESC;";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa.setDocumento(rs.getString("Documento"));
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            return Mesas;
        }
    }

    public List<Mesa> listarPedidoId(String filial, String documento) {
        List<Mesa> Mesas = new ArrayList<>();
        Mesa _Mesa = null;
        try {
            /*sql = "SELECT m.DESCRICAO, p.Mesa, p.Emissao, p.TOTAL, cli.RAZAOSOCIAL "
                    + "FROM LANC_PEDIDOS p "
                    + "INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO "
                    + "INNER JOIN Tab_Mesas m ON p.Mesa = m.Codigo "
                    + "WHERE p.Filial = " + filial + " "
                    + "AND p.Documento = '" + documento + "';";*/
            
            sql = " SELECT p.Emissao, p.TOTAL, cli.RAZAOSOCIAL"
                    + " FROM LANC_PEDIDOS p"
                    + " INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO"
                    + " WHERE p.Filial = " + filial
                    + " AND p.Documento = '" + documento + "';";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Mesa = new Mesa();
                //_Mesa.setCodigo(rs.getInt("Mesa"));
                //_Mesa.setDescricao(rs.getString("DESCRICAO"));
                _Mesa.setEmissao(rs.getString("Emissao"));
                _Mesa.setTotal(rs.getFloat("TOTAL"));
                _Mesa.setRazaoSocial(rs.getString("RAZAOSOCIAL"));

                Mesas.add(_Mesa);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Mesas;
        } catch (SQLException ex) {
            _Mesa.setDescricao(ex.getMessage());
            return Mesas;
        }
    }

    public String adicionarLancPedido(Mesa _Mesa) {
        try {
            // Gerar Codigo do Documento
            nroDoc = "000001";
            sql = "SELECT CAST(MAX(DOCUMENTO) AS INT) AS numDoc FROM LANC_PEDIDOS WHERE FILIAL = " + Integer.toString(_Mesa.getFilial());
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                nroDoc = "000000" + Integer.toString(rs.getInt("numDoc") + 1);
                nroDoc = nroDoc.substring(nroDoc.length() - 6, nroDoc.length());
            }
            Conexao.fecharConexao(con, pst, rs);

            /*sql = "INSERT INTO LANC_PEDIDOS "
                    + "(Filial , Documento, Emissao, TOTAL, Cliente, USUARIOATUALIZACAO, Vendedor, Mesa)" //, TotalFicha
                    + " VALUES "
                    + "(?,?,?,?,?,?,?,?);";//,?*/
            sql = "INSERT INTO LANC_PEDIDOS "
                    + "(Filial , Documento, Emissao, TOTAL, Cliente, USUARIOATUALIZACAO, Vendedor)"
                    + " VALUES "
                    + "(?,?,?,?,?,?,?);";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.setString(1, Integer.toString(_Mesa.getFilial()));
            pst.setString(2, nroDoc);
            pst.setString(3, _Mesa.getEmissao());
            pst.setString(4, Float.toString(_Mesa.getTotal()));
            pst.setString(5, Integer.toString(_Mesa.getCliente()));
            pst.setString(6, _Mesa.getIdentificacao());
            //pst.setString(7, Integer.toString(_LancPedido.getFlagImpressao()));
            pst.setString(7, Integer.toString(_Mesa.getVendedor()));
            //pst.setString(8, Integer.toString(_Mesa.getCodigo()));
            //pst.setString(9, Float.toString(_Mesa.getTotal()));
            pst.executeUpdate();

            rs = pst.getGeneratedKeys();
            /*if (rs.next()) {
                lastId = rs.getInt(1);
            }*/
            Conexao.fecharConexao(con, pst, rs);
            return nroDoc;//Integer.toString(lastId);
        } catch (SQLException ex) {
            return "0";
        }
    }
    
    public String finalizaPedido(Mesa _Mesa) throws PrinterException{
        try{
            int sequencia = 1;
            if(_Mesa.getDinheiro() != 0){
                sql = "INSERT INTO Lanc_Pedidos_Vencimento"
                        + "(Filial, Documento, Sequencia, Valor, CondPagamento)"
                        + " VALUES"
                        + " ("+_Mesa.getFilial()+",'"+_Mesa.getDocumento()+"',"+sequencia+","+_Mesa.getDinheiro()
                        + ", (SELECT TOP 1 CondPagamentoDinheiro FROM PARAMETROS))";
                sequencia++;
                con = Conexao.conexao();
                pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
                pst.execute();
                Conexao.fecharConexao(con, pst);
            }
            if(_Mesa.getCartaoDebito()!= 0){
                sql = "INSERT INTO Lanc_Pedidos_Vencimento"
                        + "(Filial, Documento, Sequencia, Valor, CondPagamento)"
                        + " VALUES"
                        + " ("+_Mesa.getFilial()+",'"+_Mesa.getDocumento()+"',"+sequencia+","+_Mesa.getCartaoDebito()
                        + ", (SELECT TOP 1 CondPagamentoCartaoDebito FROM PARAMETROS))";
                sequencia++;
                con = Conexao.conexao();
                pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
                pst.execute();
                Conexao.fecharConexao(con, pst);
            }
            if(_Mesa.getCartaoCredito()!= 0){
                sql = "INSERT INTO Lanc_Pedidos_Vencimento"
                        + "(Filial, Documento, Sequencia, Valor, CondPagamento)"
                        + " VALUES"
                        + " ("+_Mesa.getFilial()+",'"+_Mesa.getDocumento()+"',"+sequencia+","+_Mesa.getCartaoCredito()
                        + ", (SELECT TOP 1 CondPagamentoCartaoCredito FROM PARAMETROS))";
                con = Conexao.conexao();
                pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
                pst.execute();
                Conexao.fecharConexao(con, pst);
            }
            
            sql = "UPDATE LANC_PEDIDOS"
                    + " SET "
                        + " Condpagamento = 1,"
                        + " Desconto = ?,"
                        + " ValorTroco = ?,"
                        + " CONTATO = ?,"
                        + " Observacao = ?"
                    + " WHERE Filial = ?"
                    + " AND Documento = ?";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.setString(1, Float.toString(_Mesa.getDesconto()));
            pst.setString(2, Float.toString(_Mesa.getTroco()));
            pst.setString(3, _Mesa.getRazaoSocial());
            pst.setString(4, _Mesa.getContato());
            pst.setString(5, Integer.toString(_Mesa.getFilial()));
            pst.setString(6, _Mesa.getDocumento());
            pst.execute();
            Conexao.fecharConexao(con, pst);
            
            ImpressaoDao imprimessao = new ImpressaoDao();
            ClienteContato cliente = imprimessao.retornaClienteContato(_Mesa.getFilial(), _Mesa.getDocumento());

            List<LancPedidosItens> listaIntens = imprimessao.listarLancPedidosItensImpressaoDao(_Mesa.getFilial(), _Mesa.getDocumento());
            imprimessao.imprimirComanda(_Mesa.getFilial(), _Mesa.getDocumento(), listaIntens, cliente);
            imprimessao.imprimirSenha(_Mesa.getFilial(), _Mesa.getDocumento(), listaIntens, cliente);
            return "1";

        } catch (SQLException ex) {
            return ex.getMessage();
        }
    }
    
    public String setarClientePedido( int cliente, int filial, String documento){
        try {
            sql = "UPDATE Lanc_Pedidos"
                    + " SET Cliente = " + cliente
                    + " WHERE Filial = " + filial
                    + " AND Documento = '" + documento + "'";
                    
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.execute();
            Conexao.fecharConexao(con, pst);

            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(MesaDao.class.getName()).log(Level.SEVERE, null, ex);
            return ex.getMessage();
        }
    }
    
    public ClienteContato retornarCliente(int filial, String documento){
        ClienteContato cliente = new ClienteContato();
        cliente.setNome(" ");
        cliente.setTelefone(" ");
        try {
            sql = " SELECT p.Cliente, cli.RAZAOSOCIAL"
                    + " FROM LANC_PEDIDOS p"
                    + " INNER JOIN CLIEFORNEC cli ON p.Cliente = cli.CODIGO"
                    + " WHERE p.Filial = " + filial
                    + " AND p.Documento = '" + documento + "';";
            
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                cliente.setNome(rs.getString("RAZAOSOCIAL"));
                cliente.setFilial(rs.getInt("Cliente"));
            }
            Conexao.fecharConexao(con, pst, rs);
            
            if(cliente.getFilial() != 0){
                sql = "SELECT TOP 1 Telefone FROM CLIEFORNEC_TELEFONE WHERE Cliente = " + cliente.getFilial();
                con = Conexao.conexao();
                pst = con.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) cliente.setTelefone(rs.getString("Telefone"));
                Conexao.fecharConexao(con, pst, rs);
            }
        } catch (SQLException ex) {
            Logger.getLogger(MesaDao.class.getName()).log(Level.SEVERE, null, ex);
           cliente.setNome(ex.getMessage()+"\n\n\n"+sql);
        }
        return cliente;
    }
    
    public String entregarPedido(int filial, String documento){
        sql = "UPDATE Lanc_Pedidos"
                + " SET DataEntregue = '" + dataAtualEn() + "'"
                + " WHERE Filial = " + filial
                + " AND Documento = '" + documento + "'";
        
        try {
            con = Conexao.conexao();
            pst = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.execute();
            Conexao.fecharConexao(con, pst);

            return "1";
        } catch (SQLException ex) {
            Logger.getLogger(MesaDao.class.getName()).log(Level.SEVERE, null, ex);
            return ex.getMessage()+"\n\n"+sql;
        }
    }
    
    public static String dataAtualEn(){
        Date d = new Date();

        String dia = Integer.toString(d.getDate());
        String mes = Integer.toString(d.getMonth() + 1);
        String ano = "20" + Integer.toString(d.getYear()).substring(1, Integer.toString(d.getYear()).length());//ano = ano;
        String hora = Integer.toString(d.getHours());
        String minuto = Integer.toString(d.getMinutes());
        String segundo = Integer.toString(d.getSeconds());

        if (Integer.parseInt(dia) < 10) {
            dia = "0" + dia;
        }
        if (Integer.parseInt(mes) < 10) {
            mes = "0" + mes;
        }
        if (Integer.parseInt(hora) < 10) {
            hora = "0" + hora;
        }
        if (Integer.parseInt(minuto) < 10) {
            minuto = "0" + minuto;
        }
        if (Integer.parseInt(segundo) < 10) {
            segundo = "0" + segundo;
        }

        return ano + "-" + mes + "-" + dia + " " + hora + ":" + minuto + ":" + segundo + ".0";
        // 2018-03-05 00:00:00.0
    }
/*

Campos Lanc_pedidos
FlagCancelada  bit
Condpagamento  int
Desconto  float
ValorTroco  float
Pagamento  varchar(200)

MetodosMesa        
setDesconto
setTroco
setDinheiro
setCheque
setCartao

getDesconto
getTroco
getDinheiro
getCheque
getCartao       
        
*/

    
    public String cancelarPedido(int filial, String documento){
        try {
            sql = "UPDATE LANC_PEDIDOS SET FlagCancelada = 1"
                    + " WHERE Filial = "+filial
                    + " AND Documento = '"+documento+"'";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            pst.execute();

            return "removido";
            //return true;
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            //return false;
            return "falha remover: " + ex.getMessage();
        }
    }

    public String desocuparMesa(int filial, String documento) {
        try {
            sql = "DELETE FROM Lanc_Pedidos_itens"
                    + " WHERE Filial = "+filial
                    + " AND Documento = '"+documento+"'";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            //pst.setInt(1, id);
            pst.execute();
            Conexao.fecharConexao(con, pst);

            sql = "DELETE FROM LANC_PEDIDOS"
                    + " WHERE Filial = " + filial
                    + " AND Documento = '" + documento + "'";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            //pst.setInt(1, id);
            pst.execute();
            return "removido";
            //return true;
        } catch (SQLException ex) {
            //Logger.getLogger(ItemDao.class.getName()).log(Level.SEVERE, null, ex);
            //return false;
            return "falha remover: " + ex.getMessage();
        }
    }
}
