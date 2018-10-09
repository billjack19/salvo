/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import com.google.gson.Gson;
import Controller.Conexao;
import Model.Caminhao;
import Model.Item;
import Model.Motorista;
import Model.Viagem;
import Model.Viagem_item;
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
public class ViagemSimplesDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;

    public List<Viagem> listarViagensSimples() {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        ArrayList<String> descricaoTelefone = null;
        try {
            sql = "SELECT"
                        // Lanc Entrega
                        + " LANC_ENTREGA.ID_LANC_ENTREGA AS codigo,"
                        // + " LANC_ENTREGA.origem_viagem_simples AS EndInicial,"
                        // + " LANC_ENTREGA.destino_viagem_simples AS EndFinal,"
                        + " LANC_ENTREGA.ID_VEICULO AS codigo_caminhao,"
                        + " LANC_ENTREGA.CARREGADO_KG AS carregado,"
                        + " LANC_ENTREGA.CAPACIDADE_KG AS capacidade,"
                        + " coalesce(LANC_ENTREGA.OBSERVACAO, '0') AS observacao,"
                        + " coalesce(LANC_ENTREGA.CK_ENTREGUE, 0) AS ck_entregue,"
                        + " coalesce(LANC_ENTREGA.CK_INATIVO, 0) AS ck_inativo,"
                        
                        // Veiculos
                        + " TabVeiculos.PLACA AS placa,"
                        + " TabVeiculos.LATITUDE AS latCaminhao,"
                        + " TabVeiculos.LONGITUDE AS lngCaminhao,"
                        + " TabVeiculos.DESCRICAO AS descricaoCaminhao,"
                        
                        // Motorista
                        + " MOTORISTA.DS_MOTORISTA AS motorista,"
                        + " MOTORISTA.ID_MOTORISTA AS codigo_motorista,"
                        + " MOTORISTA.FONE AS fone,"
                        + " MOTORISTA.FONE_COMERCIAL AS foneComercial"

                    + " FROM LANC_ENTREGA LANC_ENTREGA"
                    + " INNER JOIN TabVeiculos TabVeiculos ON LANC_ENTREGA.ID_VEICULO = TabVeiculos.id_Veiculo"
                    + " INNER JOIN MOTORISTA MOTORISTA ON LANC_ENTREGA.ID_MOTORISTA = MOTORISTA.ID_MOTORISTA"
                    + " WHERE coalesce(LANC_ENTREGA.CK_ENTREGUE, 0) = 0"
                    + " AND coalesce(LANC_ENTREGA.CK_INATIVO, 0) = 0"
                    + " ORDER BY LANC_ENTREGA.ID_LANC_ENTREGA DESC;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                descricaoTelefone = new ArrayList<>();

                _Viagem = new Viagem();
                _Viagem.setCodigo(rs.getInt("codigo"));
                /* _Viagem.setEndInicial(rs.getString("EndInicial")); */
                /* _Viagem.setEndInicial("-21.78593779334913,-46.56324505805969"); */
                _Viagem.setEndInicial("-21.786636415451827,-46.56014308333397");
                /* _Viagem.setEndFinal(rs.getString("EndFinal")); */
                /* _Viagem.setEndFinal("-21.78593779334913,-46.56324505805969"); */
                _Viagem.setEndFinal("-21.786636415451827,-46.56014308333397");
                _Viagem.setPesoTotal(
                    Float.toString(rs.getFloat("carregado")).replace(".", ",")/* + "/"
                  + Float.toString(rs.getFloat("capacidade")).replace(".", ",")*/
                );
                _Viagem.setObservacao(rs.getString("observacao"));
                _Viagem.setCk_entregue(rs.getInt("ck_entregue"));
                _Viagem.setCk_inativo(rs.getInt("ck_inativo"));


                _Motorista = new Motorista();
                _Motorista.setCodigo(rs.getInt("codigo_motorista"));
                _Motorista.setNome(rs.getString("motorista"));
                // _Motorista.setTelefone("Fone: "+rs.getString("fone")+"<br>Fone Comercial: "+rs.getString("foneComercial"));
                if(rs.getString("fone") != null && !"".equals(rs.getString("fone"))){
                    descricaoTelefone.add(rs.getString("fone"));
                }
                if(rs.getString("foneComercial") != null && !"".equals(rs.getString("foneComercial"))) {
                    descricaoTelefone.add(rs.getString("foneComercial"));
                }
                _Motorista.setTelefone(descricaoTelefone);
                _Viagem.setMotorista(_Motorista);

                _Caminhao = new Caminhao();
                _Caminhao.setCodigo(rs.getInt("codigo_caminhao"));
                _Caminhao.setPlaca(rs.getString("placa") + " - " + rs.getString("descricaoCaminhao"));
                _Caminhao.setLatitude(rs.getString("latCaminhao"));
                _Caminhao.setLongitude(rs.getString("lngCaminhao"));
                _Caminhao.setCapacidade(Float.toString(rs.getFloat("capacidade")).replace(".", ","));
                _Viagem.setCaminhao(_Caminhao);
                

                Viagens.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for (int i = 0; i < Viagens.size(); i++){
                Viagem_item = listarViagemSimplesItem(Viagens.get(i).getCodigo());
                if(!Viagem_item.isEmpty()){
                    Viagens.get(i).setEndEntrega(Viagem_item);
                } else {
                    Viagens.remove(i);
                    i--;
                }
            }
            return Viagens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Viagem = new Viagem();
            _Viagem.setEndInicial(ex.getMessage());
            Viagens.add(_Viagem);
            return Viagens;
        }
    }
    
    public List<Viagem_item> listarViagemSimplesItem(int codigoProduto) {
        List<Viagem_item> Viagem_itens = new ArrayList<>();
        List<Viagem_item> Viagem_itemParasita = new ArrayList<>();
        ArrayList<Integer> codigo = null;
        boolean primeiro = true; String oldPedido = "";
        Viagem_item _Viagem_item = null;
        ClienteDao _ClienteDao = new ClienteDao();
        List<Item> itens = null;
        Item _Item = null;
        try {
            sql = "SELECT"
                        + " LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS AS codigo,"
                        + " LANC_ENTREGA_ITENS.LATITUDE AS latitude,"
                        + " LANC_ENTREGA_ITENS.LONGITUDE AS longitude,"
                        + " LANC_ENTREGA_ITENS.LOCAL_ENTREGA AS endereco,"
                        + " LANC_ENTREGA_ITENS.NOTAFISCAL AS pedido,"
                        + " LANC_ENTREGA_ITENS.CK_ENTREGUE AS bool_entrega,"
                        // Item
                        + " LANC_ENTREGA_ITENS.ITEM AS codigo_item,"
                        + " ITEM.DESCRICAO AS descricao_item,"
                        + " LANC_ENTREGA_ITENS.QTD_ENTREGA AS qtd_item,"
                        + " LANC_ENTREGA_ITENS.UNIDADE AS unidade_item"
                        // + " localizacao_viagem_simples_item AS EndEntrega,"
                        // + " bool_confirma_entrega AS bool_entrega"
                    + " FROM LANC_ENTREGA_ITENS"
                    + " INNER JOIN ITEM ON LANC_ENTREGA_ITENS.ITEM = ITEM.ITEM"
                    + " WHERE ID_LANC_ENTREGA = " + codigoProduto
                    + " AND coalesce(LANC_ENTREGA_ITENS.CK_INATIVO, 0) = 0"
                    + " ORDER BY LANC_ENTREGA_ITENS.NOTAFISCAL, LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS";
                    //+ " GROUP BY NOTAFISCAL, LATITUDE, LONGITUDE, LOCAL_ENTREGA, CK_ENTREGUE;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                if(primeiro){
                    primeiro = false;
                    oldPedido = rs.getString("pedido");
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                } else if(!oldPedido.equals(rs.getString("pedido"))){
                    oldPedido = rs.getString("pedido");
                    Viagem_itens.add(_Viagem_item);
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                }
                codigo.add(rs.getInt("codigo"));
                _Item = new Item();
                _Item.setCodigo(rs.getInt("codigo_item"));
                _Item.setDescricao(rs.getString("descricao_item"));
                _Item.setQuantidade(rs.getFloat("qtd_item"));
                _Item.setUnidade(rs.getString("unidade_item"));
                
                itens.add(_Item);

                _Viagem_item = new Viagem_item();
                _Viagem_item.setCodigo(codigo);
                _Viagem_item.setEndEntregaItem(rs.getString("latitude")+","+rs.getString("longitude"));
                _Viagem_item.setLatitude(rs.getString("latitude"));
                _Viagem_item.setLongitude(rs.getString("longitude"));
                _Viagem_item.setDescEndEndrega(rs.getString("endereco"));
                _Viagem_item.setPedido(rs.getString("pedido"));
                _Viagem_item.setBool_entrega(rs.getInt("bool_entrega"));
                _Viagem_item.setItens(itens);

                Viagem_itemParasita.add(_Viagem_item);
            }
            Conexao.fecharConexao(con, pst, rs);

            if(!Viagem_itemParasita.isEmpty()){
                Viagem_itens.add(Viagem_itemParasita.get(Viagem_itemParasita.size() - 1));
            }
            
            for(int i = 0; i < Viagem_itens.size(); i++){
                Viagem_itens.get(i).setCliente(_ClienteDao.listarClientesPorRegiao(Viagem_itens.get(i).getPedido()));
            }
            return Viagem_itens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagem_itens;
        }
    }
    
    
    
    public List<Viagem_item> listarEntregaPendente() {
        List<Viagem_item> Viagem_itens = new ArrayList<>();
        List<Viagem_item> Viagem_itemParasita = new ArrayList<>();
        ArrayList<Integer> codigo = null; // new ArrayList<>();
        ArrayList<Integer> codigosCLiente = new ArrayList<>();
        String oldPedido = "";
        boolean primeiro = true;
        Viagem_item _Viagem_item = null;
        int oldCodigoCliente = 0; 
        ClienteDao _ClienteDao = new ClienteDao();
        List<Item> itens = null;
        Item _Item = null;
        try {
            // + " LANC_ENTREGA_ITENS.CK_ENTREGUE AS bool_entrega,"
            sql =  "SELECT"
                        + " ENTREGA.ID_LANC_ENTREGA AS codigo,"
                        + " NF_RECEBER_ITENS.ITEM AS codigo_item,"
                        + " ITEM.DESCRICAO AS descricao_item,"
                        + " NF_RECEBER_ITENS.QTD_ENTREGA AS qtd_item,"
                        + " NF_RECEBER_ITENS.UNIDADE AS unidade_item,"
                        + " NF_RECEBER.NOTAFISCAL AS pedido,"
                        + " NF_RECEBER.CLIENTE AS clienteCodigo,"
                        + " NF_RECEBER.LATITUDE_ENTREGA AS latitude,"
                        + " NF_RECEBER.LONGITUDE_ENTREGA AS longitude,"
                        + " NF_RECEBER.LOCALENTREGA AS endereco"
                        // + " --NF_RECEBER_ITENS.PRIORIDADE_ENTREGA,"
                        //+ " --TAB_REGIOES.DESCRICAO AS REGIAO,"
                        //+ " --CEP_BAIRRO_REGIAO.BAIRRO,"
                        //+ " --NF_RECEBER_ITENS.PREV_ENTREGA,"
                        //+ " --NF_RECEBER.SERIE,"
                        //+ " --NF_RECEBER.FILIAL,"
                        //+ " --NF_RECEBER.TOTALNOTA,"
                        //+ " --CLIEFORNEC.RAZAOSOCIAL,"
                        //+ " --NF_RECEBER.VENDEDOR,"
                        //+ " --VENDEDOR.DESCRICAO AS DESCRICAOVENDEDOR,"
                        //+ " --TAB_REGIOES.CODIGO AS CODIGOREGIAO,"
                        //+ " --NF_RECEBER.CEPENTREGA,"
                        //+ " --NF_RECEBER.NUMEROENTREGA,"
                    + " FROM NF_RECEBER"
                    + " INNER JOIN CLIEFORNEC ON CLIEFORNEC.CODIGO = NF_RECEBER.CLIENTE"
                    + " INNER JOIN VENDEDOR ON VENDEDOR.VENDEDOR = NF_RECEBER.VENDEDOR"
                    + " INNER JOIN NF_RECEBER_ITENS "
                        + " ON NF_RECEBER.FILIAL = NF_RECEBER_ITENS.FILIAL"
                        + " AND NF_RECEBER.SERIE = NF_RECEBER_ITENS.SERIE"
                        + " AND NF_RECEBER.NOTAFISCAL = NF_RECEBER_ITENS.NOTAFISCAL"
                    + " INNER JOIN ITEM ON ITEM.ITEM = NF_RECEBER_ITENS.ITEM"
                    + " LEFT JOIN CEP_BAIRRO_REGIAO ON CEP_BAIRRO_REGIAO.CEP = SUBSTRING(NF_RECEBER.CEPENTREGA, 1, 5) + '-' + SUBSTRING(NF_RECEBER.CEPENTREGA, 6, 3)"
                    + " LEFT JOIN TAB_REGIOES ON TAB_REGIOES.CODIGO = CEP_BAIRRO_REGIAO.REGIAO"
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
                    + " ORDER BY"
                        + " CEP_BAIRRO_REGIAO.REGIAO,"
                        + " CEP_BAIRRO_REGIAO.BAIRRO,"
                        + " NF_RECEBER_ITENS.PREV_ENTREGA";

            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                if(primeiro){
                    primeiro = false;
                    oldPedido = rs.getString("pedido");
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                } else if(!oldPedido.equals(rs.getString("pedido"))){
                    oldPedido = rs.getString("pedido");
                    Viagem_itens.add(_Viagem_item);
                    codigosCLiente.add(oldCodigoCliente);
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                }
                oldCodigoCliente = rs.getInt("clienteCodigo");
                
                rs.getInt("codigo");
                _Item = new Item();
                _Item.setCodigo(rs.getInt("codigo_item"));
                _Item.setDescricao(rs.getString("descricao_item"));
                _Item.setQuantidade(rs.getFloat("qtd_item"));
                _Item.setUnidade(rs.getString("unidade_item"));
                
                itens.add(_Item);

                _Viagem_item = new Viagem_item();
                _Viagem_item.setCodigo(codigo);
                _Viagem_item.setEndEntregaItem(rs.getString("latitude")+","+rs.getString("longitude"));
                _Viagem_item.setDescEndEndrega(rs.getString("endereco"));
                _Viagem_item.setPedido(rs.getString("pedido"));
                _Viagem_item.setBool_entrega(0); // rs.getInt("bool_entrega")
                _Viagem_item.setItens(itens);

                Viagem_itemParasita.add(_Viagem_item);
            }
            Conexao.fecharConexao(con, pst, rs);

            if(!Viagem_itemParasita.isEmpty()){
                Viagem_itens.add(Viagem_itemParasita.get(Viagem_itemParasita.size() - 1));
                codigosCLiente.add(oldCodigoCliente);
            }
            
            for(int i = 0; i < Viagem_itens.size(); i++){
                Viagem_itens.get(i).setCliente(_ClienteDao.listarClienteId(Integer.toString(codigosCLiente.get(i))));
            }
            return Viagem_itens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagem_itens;
        }
    }



    /*public List<Viagem_item> pesquisaViagemSimplesItem(int codigo) {
        List<Viagem_item> Viagem_item = new ArrayList<>();
        Viagem_item _Viagem_item = null;
        try {
            sql = "SELECT"
                        + " localizacao_viagem_simples_item AS EndEntrega,"
                        + " bool_confirma_entrega AS bool_entrega"
                    + " FROM viagem_simples_item"
                    + " WHERE id_viagem_simples_item = " + codigo
                    + " ORDER BY id_viagem_simples_item;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Viagem_item = new Viagem_item();
                _Viagem_item.setEndEntrega(rs.getString("EndEntrega"));
                _Viagem_item.setBool_entrega(rs.getInt("bool_entrega"));

                Viagem_item.add(_Viagem_item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Viagem_item;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagem_item;
        }
    }*/
    
    
    public List<Viagem> listarViagensSimples(String data) {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        ArrayList<String> descricaoTelefone = null;
        try {
            sql = "SELECT"
                        // Lanc Entrega
                        + " LANC_ENTREGA.ID_LANC_ENTREGA AS codigo,"
                        // + " LANC_ENTREGA.origem_viagem_simples AS EndInicial,"
                        // + " LANC_ENTREGA.destino_viagem_simples AS EndFinal,"
                        + " LANC_ENTREGA.ID_VEICULO AS codigo_caminhao,"
                        
                        // Veiculos
                        + " TabVeiculos.PLACA AS placa,"
                        + " TabVeiculos.LATITUDE AS latCaminhao,"
                        + " TabVeiculos.LONGITUDE AS lngCaminhao,"
                        
                        // Motorista
                        + " MOTORISTA.DS_MOTORISTA AS motorista,"
                        + " MOTORISTA.ID_MOTORISTA AS codigo_motorista,"
                        + " MOTORISTA.FONE AS fone,"
                        + " MOTORISTA.FONE_COMERCIAL AS foneComercial"

                    + " FROM LANC_ENTREGA LANC_ENTREGA"
                    + " INNER JOIN TabVeiculos TabVeiculos ON LANC_ENTREGA.ID_VEICULO = TabVeiculos.id_Veiculo"
                    + " INNER JOIN MOTORISTA MOTORISTA ON LANC_ENTREGA.ID_MOTORISTA = MOTORISTA.ID_MOTORISTA"
                    + " WHERE coalesce(LANC_ENTREGA.CK_ENTREGUE, 0) = 0"
                    + " AND coalesce(LANC_ENTREGA.CK_INATIVO, 0) = 0"
                    + " AND DT_ENTREGA = '" + data + "'"
                    + " ORDER BY LANC_ENTREGA.ID_LANC_ENTREGA DESC;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                descricaoTelefone = new ArrayList<>();

                _Viagem = new Viagem();
                _Viagem.setCodigo(rs.getInt("codigo"));
                /* _Viagem.setEndInicial(rs.getString("EndInicial")); */
                /* _Viagem.setEndInicial("-21.78593779334913,-46.56324505805969"); */
                _Viagem.setEndInicial("-21.786636415451827,-46.56014308333397");
                /* _Viagem.setEndFinal(rs.getString("EndFinal")); */
                /* _Viagem.setEndFinal("-21.78593779334913,-46.56324505805969"); */
                _Viagem.setEndFinal("-21.786636415451827,-46.56014308333397");


                _Motorista = new Motorista();
                _Motorista.setCodigo(rs.getInt("codigo_motorista"));
                _Motorista.setNome(rs.getString("motorista"));
                // _Motorista.setTelefone("Fone: "+rs.getString("fone")+"<br>Fone Comercial: "+rs.getString("foneComercial"));
                if(rs.getString("fone") == null && !"".equals(rs.getString("fone"))){
                    descricaoTelefone.add(rs.getString("fone"));
                }
                if(rs.getString("foneComercial") == null && !"".equals(rs.getString("foneComercial"))){
                    descricaoTelefone.add(rs.getString("foneComercial"));
                }
                
                _Motorista.setTelefone(descricaoTelefone);
                _Viagem.setMotorista(_Motorista);

                _Caminhao = new Caminhao();
                _Caminhao.setCodigo(rs.getInt("codigo_caminhao"));
                _Caminhao.setPlaca(rs.getString("placa"));
                _Caminhao.setLatitude(rs.getString("latCaminhao"));
                _Caminhao.setLongitude(rs.getString("lngCaminhao"));
                _Viagem.setCaminhao(_Caminhao);

                Viagens.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for (int i = 0; i < Viagens.size(); i++){
                Viagem_item = listarViagemSimplesItem(Viagens.get(i).getCodigo());
                Viagens.get(i).setEndEntrega(Viagem_item);
            }
            return Viagens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            _Viagem = new Viagem();
            _Viagem.setEndInicial(ex.getMessage());
            Viagens.add(_Viagem);
            return Viagens;
        }
    }


    /*public List<Viagem> pesquisaViagensSimples(int codigo) {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        try {
            sql = "SELECT"
                        + " viagem_simples.id_viagem_simples AS codigo,"
                        + " viagem_simples.origem_viagem_simples AS EndInicial,"
                        + " viagem_simples.destino_viagem_simples AS EndFinal,"
                        + " viagem_simples.placa_viagem_simples AS codigo_caminhao,"
                            + " caminhao.placa_caminhao AS placa,"
                            + " caminhao.latitude_caminhao AS latCaminhao,"
                            + " caminhao.longitude_caminhao AS lngCaminhao,"
                        + " viagem_simples.motorista_viagem_simples AS motorista"
                    + " FROM viagem_simples viagem_simples"
                    + " INNER JOIN caminhao caminhao ON viagem_simples.placa_viagem_simples = caminhao.id_caminhao"
                    + " WHERE id_viagem_simples = " + codigo;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Viagem = new Viagem();
                _Viagem.setCodigo(rs.getInt("codigo"));
                _Viagem.setEndInicial(rs.getString("EndInicial"));
                _Viagem.setEndFinal(rs.getString("EndFinal"));
                
                _Motorista = new Motorista();
                _Motorista.setCodigo(rs.getInt("codigo_motorista"));
                _Motorista.setNome(rs.getString("motorista"));
                 _Viagem.setMotorista(_Motorista);
                
                _Caminhao = new Caminhao();
                _Caminhao.setCodigo(rs.getInt("codigo_caminhao"));
                _Caminhao.setPlaca(rs.getString("placa"));
                _Caminhao.setLatitude(rs.getString("latCaminhao"));
                _Caminhao.setLongitude(rs.getString("lngCaminhao"));
                _Viagem.setCaminhao(_Caminhao);

                Viagens.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for (int i = 0; i < Viagens.size(); i++){
                Viagem_item = listarViagemSimplesItem(Viagens.get(i).getCodigo());
                Viagens.get(i).setEndEntrega(Viagem_item);
            }
            return Viagens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagens;
        }
    }*/
}