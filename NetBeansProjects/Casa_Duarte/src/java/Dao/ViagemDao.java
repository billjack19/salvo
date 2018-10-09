/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import com.google.gson.Gson;
import Controller.Conexao;
import Model.Caminhao;
import Model.Cliente;
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
public class ViagemDao {
    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;


    public List<Viagem> listarViagensSimplesCompleto() {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem> Viagens_parasitas = new ArrayList<>();
        // List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        ArrayList<String> descricaoTelefone = null;
        int oldCodigoEntrega = 0;
        
        /* VARIAVEIS PARA VIAGEM_ITEM */
        List<Viagem_item> Viagem_itens = new ArrayList<>();
        List<Viagem_item> Viagem_itemParasita = new ArrayList<>();
        ArrayList<Integer> codigo = null;
        boolean primeiro = true;
        String oldPedido = "";
        Viagem_item _Viagem_item = null;
        ClienteDao _ClienteDao = new ClienteDao();
        List<Item> itens = null;
        Item _Item = null;

        /* VARIAVEIS PARA CLIENTE */
        Cliente _Cliente = new Cliente();
        ArrayList<String> telefones = new ArrayList<>();
        try {
            sql = "SELECT"
                        // CLIENTE
                        + " CLIEFORNEC.CODIGO AS codigo_cliente,"
                        + " CLIEFORNEC.RAZAOSOCIAL AS nome_cliente,"
                        + " CLIEFORNEC_TELEFONE.Telefone AS telefone_cliente,"
                        
                        // LANC_ENTREGA_ITENS
                        + " LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS AS codigo_lancItem,"
                        + " LANC_ENTREGA_ITENS.LATITUDE AS latitude,"
                        + " LANC_ENTREGA_ITENS.LONGITUDE AS longitude,"
                        + " LANC_ENTREGA_ITENS.LOCAL_ENTREGA AS endereco,"
                        + " LANC_ENTREGA_ITENS.NOTAFISCAL AS pedido,"
                        + " LANC_ENTREGA_ITENS.CK_ENTREGUE AS bool_entrega,"
                        + " LANC_ENTREGA_ITENS.CK_INATIVO AS bool_cancelado,"
                        + " LANC_ENTREGA_ITENS.CEP as cep,"
                        // Item
                        + " LANC_ENTREGA_ITENS.ITEM AS codigo_item,"
                        + " ITEM.DESCRICAO AS descricao_item,"
                        + " LANC_ENTREGA_ITENS.QTD_ENTREGA AS qtd_item,"
                        + " LANC_ENTREGA_ITENS.UNIDADE AS unidade_item,"
                    
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

                    + " FROM CLIEFORNEC_TELEFONE CLIEFORNEC_TELEFONE"
                    + " INNER JOIN CLIEFORNEC CLIEFORNEC ON CLIEFORNEC_TELEFONE.Cliente = CLIEFORNEC.CODIGO"
                    + " INNER JOIN LANC_ENTREGA_ITENS LANC_ENTREGA_ITENS ON CLIEFORNEC.CODIGO = LANC_ENTREGA_ITENS.CLIENTE"
                    + " INNER JOIN ITEM ITEM ON LANC_ENTREGA_ITENS.ITEM = ITEM.ITEM"
                    + " INNER JOIN LANC_ENTREGA LANC_ENTREGA ON LANC_ENTREGA_ITENS.ID_LANC_ENTREGA = LANC_ENTREGA.ID_LANC_ENTREGA"
                    + " INNER JOIN TabVeiculos TabVeiculos ON LANC_ENTREGA.ID_VEICULO = TabVeiculos.id_Veiculo"
                    + " INNER JOIN MOTORISTA MOTORISTA ON LANC_ENTREGA.ID_MOTORISTA = MOTORISTA.ID_MOTORISTA"
                    + " WHERE coalesce(LANC_ENTREGA.CK_ENTREGUE, 0) = 0"
                    + " AND coalesce(LANC_ENTREGA.CK_INATIVO, 0) = 0"
                    // + " AND coalesce(LANC_ENTREGA_ITENS.CK_INATIVO, 0) = 0"
                    + " ORDER BY LANC_ENTREGA.ID_LANC_ENTREGA,LANC_ENTREGA_ITENS.NOTAFISCAL, LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {

                if(primeiro){
                    primeiro = false;
                    oldPedido = rs.getString("pedido");
                    oldCodigoEntrega = rs.getInt("codigo");
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                    telefones = new ArrayList<>();
                } else if(!oldPedido.equals(rs.getString("pedido"))){
                    oldPedido = rs.getString("pedido");
                    _Cliente.setTelefone(telefones);
                    _Viagem_item.setCliente(_Cliente);
                    Viagem_itens.add(_Viagem_item);
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                    telefones = new ArrayList<>();
                    _Cliente = new Cliente();
                }
                
                if(oldCodigoEntrega != rs.getInt("codigo")){
                    oldCodigoEntrega = rs.getInt("codigo");
                    _Viagem.setEndEntrega(Viagem_itens);
                    Viagem_itens = new ArrayList<>();
                    Viagens.add(_Viagem);
                }

                _Cliente.setCodigo(rs.getInt("codigo_cliente"));
                _Cliente.setNome(rs.getString("nome_cliente"));
                if(!telefones.contains(rs.getString("telefone_cliente"))){
                    telefones.add(rs.getString("telefone_cliente"));
                }


                codigo.add(rs.getInt("codigo_lancItem"));
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
                _Viagem_item.setBool_cancelado(rs.getInt("bool_cancelado"));
                _Viagem_item.setCep(rs.getString("cep"));
                _Viagem_item.setItens(itens);

                Viagem_itemParasita.add(_Viagem_item);
                
                
                
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
                

                Viagens_parasitas.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            
            
            if(!Viagens_parasitas.isEmpty()){
                Viagens.add(Viagens_parasitas.get(Viagens_parasitas.size() - 1));
                if(!Viagem_itemParasita.isEmpty()){
                    Viagem_itens.add(Viagem_itemParasita.get(Viagem_itemParasita.size() - 1));
                    Viagens.get(Viagens.size() - 1).setEndEntrega(Viagem_itens);
                }
            }
            
            for (int i = 0; i < Viagens.size(); i++){
                for(int j = 0; j < Viagens.get(i).getEndEntrega().size(); j++){
                    Viagens.get(i).getEndEntrega().get(j).setCliente(
                        _ClienteDao.listarClientesPorRegiao(
                            Viagens.get(i).getEndEntrega().get(j).getPedido()
                        )
                    );
                }
                //Viagem_item = listarViagemSimplesItem(Viagens.get(i).getCodigo());
                /*if(!Viagem_item.isEmpty()){
                    Viagens.get(i).setEndEntrega(Viagem_item);
                } else {
                    Viagens.remove(i);
                    i--;
                }*/
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









    public List<Viagem> listarViagensSimplesCompletoCliente() {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem> Viagens_parasitas = new ArrayList<>();
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        ArrayList<String> descricaoTelefone = null;
        int oldCodigoEntrega = 0;
        
        /* VARIAVEIS PARA VIAGEM_ITEM */
        List<Viagem_item> Viagem_itens = new ArrayList<>();
        List<Viagem_item> Viagem_itemParasita = new ArrayList<>();
        ArrayList<Integer> codigo = null;
        boolean primeiro = true;
        String oldPedido = "";
        Viagem_item _Viagem_item = null;
        List<Item> itens = null;
        Item _Item = null;

        /* VARIAVEIS PARA CLIENTE */
        Cliente _Cliente = new Cliente();
        ArrayList<String> telefones = new ArrayList<>();
        try {
            sql = "SELECT"
                        // CLIENTE
                        + " CLIEFORNEC.CODIGO AS codigo_cliente,"
                        + " CLIEFORNEC.RAZAOSOCIAL AS nome_cliente,"
                        // + " CLIEFORNEC_TELEFONE.Telefone AS telefone_cliente,"
                        
                        // LANC_ENTREGA_ITENS
                        + " LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS AS codigo_lancItem,"
                        + " LANC_ENTREGA_ITENS.LATITUDE AS latitude,"
                        + " LANC_ENTREGA_ITENS.LONGITUDE AS longitude,"
                        + " LANC_ENTREGA_ITENS.LOCAL_ENTREGA AS endereco,"
                        + " LANC_ENTREGA_ITENS.NOTAFISCAL AS pedido,"
                        + " LANC_ENTREGA_ITENS.CK_ENTREGUE AS bool_entrega,"
                        
                        // Item
                        + " LANC_ENTREGA_ITENS.ITEM AS codigo_item,"
                        + " ITEM.DESCRICAO AS descricao_item,"
                        + " LANC_ENTREGA_ITENS.QTD_ENTREGA AS qtd_item,"
                        + " LANC_ENTREGA_ITENS.UNIDADE AS unidade_item,"
                    
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
                        + " coalesce(LANC_ENTREGA.HORA_SAIDA, '0') AS hora_saida,"
                        
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

                    + " FROM CLIEFORNEC "
                    // + " INNER JOIN CLIEFORNEC CLIEFORNEC"
                       //  + " ON CLIEFORNEC_TELEFONE.Cliente = CLIEFORNEC.CODIGO"
                    + " INNER JOIN LANC_ENTREGA_ITENS LANC_ENTREGA_ITENS"
                        + " ON CLIEFORNEC.CODIGO = LANC_ENTREGA_ITENS.CLIENTE"
                    + " INNER JOIN ITEM ITEM"
                        + " ON LANC_ENTREGA_ITENS.ITEM = ITEM.ITEM"
                    + " INNER JOIN LANC_ENTREGA LANC_ENTREGA"
                        + " ON LANC_ENTREGA_ITENS.ID_LANC_ENTREGA = LANC_ENTREGA.ID_LANC_ENTREGA"
                    + " INNER JOIN TabVeiculos TabVeiculos"
                        + " ON LANC_ENTREGA.ID_VEICULO = TabVeiculos.id_Veiculo"
                    + " INNER JOIN MOTORISTA MOTORISTA"
                        + " ON LANC_ENTREGA.ID_MOTORISTA = MOTORISTA.ID_MOTORISTA"
                    + " WHERE coalesce(LANC_ENTREGA.CK_ENTREGUE, 0) = 0"
                    + " AND coalesce(LANC_ENTREGA.CK_INATIVO, 0) = 0"
                    + " AND coalesce(LANC_ENTREGA_ITENS.CK_INATIVO, 0) = 0"
                    + " ORDER BY"
                        + " LANC_ENTREGA.ID_LANC_ENTREGA,"
                        + " LANC_ENTREGA_ITENS.NOTAFISCAL,"
                        + " LANC_ENTREGA_ITENS.ID_LANC_ENTREGA_ITENS;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {

                if(primeiro){
                    primeiro = false;
                    oldPedido = rs.getString("pedido");
                    oldCodigoEntrega = rs.getInt("codigo");
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                    // telefones = new ArrayList<>();
                } else if(!oldPedido.equals(rs.getString("pedido"))){
                    oldPedido = rs.getString("pedido");
                    _Cliente.setTelefone(telefones);
                    _Viagem_item.setCliente(_Cliente);
                    Viagem_itens.add(_Viagem_item);
                    codigo = new ArrayList<>();
                    itens = new ArrayList<>();
                    // telefones = new ArrayList<>();
                    _Cliente = new Cliente();
                }
                
                if(oldCodigoEntrega != rs.getInt("codigo")){
                    oldCodigoEntrega = rs.getInt("codigo");
                    _Viagem.setEndEntrega(Viagem_itens);
                    Viagem_itens = new ArrayList<>();
                    Viagens.add(_Viagem);
                }

                _Cliente.setCodigo(rs.getInt("codigo_cliente"));
                _Cliente.setNome(rs.getString("nome_cliente"));
                // if(!telefones.contains(rs.getString("telefone_cliente"))){
                    // telefones.add(rs.getString("telefone_cliente"));
                // }

                codigo.add(rs.getInt("codigo_lancItem"));
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
                _Viagem.setHora_saida(rs.getString("hora_saida"));


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
                

                Viagens_parasitas.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);

            if(!Viagens_parasitas.isEmpty()){
                Viagens.add(Viagens_parasitas.get(Viagens_parasitas.size() - 1));
                if(!Viagem_itemParasita.isEmpty()){
                    Viagem_itens.add(Viagem_itemParasita.get(Viagem_itemParasita.size() - 1));
                    // _Cliente.setTelefone(telefones);
                    Viagem_itens.get(Viagem_itens.size()-1).setCliente(_Cliente);
                    Viagens.get(Viagens.size() - 1).setEndEntrega(Viagem_itens);
                }
            }
            
            for(int i = 0; i < Viagens.size(); i++){
                for(int j = 0; j < Viagens.get(i).getEndEntrega().size(); j++){
                    sql = "SELECT "
                            + " CLIEFORNEC_TELEFONE.Telefone AS telefone_cliente"
                            + " FROM CLIEFORNEC_TELEFONE"
                            + " WHERE CLIEFORNEC_TELEFONE.Cliente = " + Viagens.get(i).getEndEntrega().get(j).getCliente().getCodigo();
                    con = Conexao.conexao();
                    pst = con.prepareStatement(sql);
                    rs = pst.executeQuery();
                    telefones = new ArrayList<>();
                    while (rs.next()) {
                        if(!telefones.contains(rs.getString("telefone_cliente"))){
                            telefones.add(rs.getString("telefone_cliente"));
                        }
                    }
                    Conexao.fecharConexao(con, pst, rs);
                    Viagens.get(i).getEndEntrega().get(j).getCliente().setTelefone(telefones);
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public List<Viagem> listarViagens() {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        try {
            sql = "SELECT"
                        + " viagem.id_viagem AS codigo,"
                        + " viagem.endereco_incial_viagem AS EndInicial,"
                        + " viagem.endereco_final_viagem AS EndFinal,"
                        + " caminhao.placa_caminhao AS placa,"
                        + " motorista.nome_motorista AS motorista"
                    + " FROM viagem viagem"
                    + " INNER JOIN caminhao caminhao ON viagem.caminhao_id = caminhao.id_caminhao"
                    + " INNER JOIN motorista motorista ON viagem.motorista_id = motorista.id_motorista"
                    + " WHERE viagem.bool_ativo_viagem = 1"
                    + " ORDER BY viagem.id_viagem DESC;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Viagem = new Viagem();
                _Viagem.setCodigo(rs.getInt("codigo"));
                _Viagem.setEndInicial(rs.getString("EndInicial"));
                _Viagem.setEndFinal(rs.getString("EndFinal"));
                
                
                _Motorista = new Motorista();
                /*_Motorista.setCodigo(rs.getInt("codigo_motorista"));*/
                _Motorista.setNome(rs.getString("motorista"));
                _Viagem.setMotorista(_Motorista);
                
                _Caminhao = new Caminhao();
                _Viagem.setCaminhao(_Caminhao);

                Viagens.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for (int i = 0; i < Viagens.size(); i++){
                Viagem_item = listarViagemItem(Viagens.get(i).getCodigo());
                Viagens.get(i).setEndEntrega(Viagem_item);
            }
            return Viagens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagens;
        }
    }    




    public List<Viagem> pesquisaViagens(int codigo) {
        List<Viagem> Viagens = new ArrayList<>();
        List<Viagem_item> Viagem_item = null;
        Gson g = new Gson();
        Viagem _Viagem = null;
        Caminhao _Caminhao = null;
        Motorista _Motorista = null;
        try {
            sql = "SELECT"
                        + " viagem.id_viagem AS codigo,"
                        + " viagem.endereco_incial_viagem AS EndInicial,"
                        + " viagem.endereco_final_viagem AS EndFinal,"
                        + " caminhao.placa_caminhao AS placa,"
                        + " motorista.nome_motorista AS motorista"
                    + " FROM viagem viagem"
                    + " INNER JOIN caminhao caminhao ON viagem.caminhao_id = caminhao.id_caminhao"
                    + " INNER JOIN motorista motorista ON viagem.motorista_id = motorista.id_motorista"
                    + " WHERE viagem.id_viagem = " + codigo;
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Viagem = new Viagem();
                _Viagem.setCodigo(rs.getInt("codigo"));
                _Viagem.setEndInicial(rs.getString("EndInicial"));
                _Viagem.setEndFinal(rs.getString("EndFinal"));
                
                
                _Motorista = new Motorista();
                /*_Motorista.setCodigo(rs.getInt("codigo_motorista"));*/
                _Motorista.setNome(rs.getString("motorista"));
                _Viagem.setMotorista(_Motorista);
                
                _Caminhao = new Caminhao();
                _Viagem.setCaminhao(_Caminhao);

                Viagens.add(_Viagem);
            }
            Conexao.fecharConexao(con, pst, rs);
            
            for (int i = 0; i < Viagens.size(); i++){
                Viagem_item = listarViagemItem(Viagens.get(i).getCodigo());
                Viagens.get(i).setEndEntrega(Viagem_item);
            }
            return Viagens;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagens;
        }
    }




    public List<Viagem_item> listarViagemItem(int codigoProduto) {
        List<Viagem_item> Viagem_item = new ArrayList<>();
        Viagem_item _Viagem_item = null;
        try {
            sql = "SELECT"
                        + " viagem_item.endereco_viagem_item AS EndEntrega,"
                        + " item.descricao_item AS descricao,"
                        + " viagem_item.quantidade_viagem_item AS quantidade"
                    + " FROM viagem_item viagem_item"
                    + " INNER JOIN item item ON viagem_item.item_id = item.id_item"
                    + " WHERE viagem_item.viagem_id = " + codigoProduto
                    + " ORDER BY viagem_item.id_viagem_item;";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                _Viagem_item = new Viagem_item();
                //_Viagem_item.setPedido(codigoProduto);
                _Viagem_item.setEndEntregaItem(rs.getString("EndEntrega"));
                _Viagem_item.setItem(rs.getString("descricao"));
                _Viagem_item.setQuantidade(rs.getFloat("quantidade"));

                Viagem_item.add(_Viagem_item);
            }
            Conexao.fecharConexao(con, pst, rs);
            return Viagem_item;
        } catch (SQLException ex) {
            Logger.getLogger(ViagemDao.class.getName()).log(Level.SEVERE, null, ex);
            return Viagem_item;
        }
    }
}
