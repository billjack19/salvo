/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ItemDao;
import Model.Item;
import Model.LancPedidosItens;
import com.google.gson.Gson;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author jack
 */
@Path("ItemWs")
public class ItemWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ItemWs
     */
    public ItemWs() {
    }

    /**
     * Retrieves representation of an instance of WS.ItemWs
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_XML)
    public String getXml() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ItemWs
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_XML)
    public void putXml(String content) {
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarItem/{subGrupo}/{grupo}/{filial}")
    public String listarItens(
            @PathParam("subGrupo")int subGrupo,
            @PathParam("grupo")int grupo,
            @PathParam("filial")int filial
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItens(subGrupo, grupo, filial);
        
        return g.toJson(_Item);
    }

    /* ********************************************************************************* */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarItensComposicao/{item}")
    public String listarItensComposicao(
            @PathParam("item")int item
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItensComposicao(item);
        
        return g.toJson(_Item);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarItensPreparo/{item}")
    public String listarItensPreparo(
            @PathParam("item")int item
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItensPreparo(item);
        
        return g.toJson(_Item);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarItensAdicional/{item}/{filial}")
    public String listarItensAdicional(
            @PathParam("item")int item,
            @PathParam("filial")int filial
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItensAdicional(item, filial);
        
        return g.toJson(_Item);
    }    
     /* ************************************************************************** */

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarTodosItem")
    public String listarTodosItens() throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarTodosItens();
        
        return g.toJson(_Item);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarLancPedidoItem/{filial}/{documento}")
    public String listarLancPedidoItem(
            @PathParam("filial")int filial,
            @PathParam("documento")String documento
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<LancPedidosItens> _LancPedidosItens = _ItemDao.listarLancPedidosItens(filial, documento);
        
        return g.toJson(_LancPedidosItens);
    }
    
    /* ******************************************************************************************* */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarLancPedidoItemExecao/{id}")
    public String listarLancPedidoItemExecao(
            @PathParam("id")int id
    ) throws SQLException{
        ItemDao _ItemDao = new ItemDao();
        return _ItemDao.listarLancPedidosItensExecao(id);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarLancPedidoItemPreparo/{id}")
    public String listarLancPedidoItemPreparo(
            @PathParam("id")int id
    ) throws SQLException{
        ItemDao _ItemDao = new ItemDao();
        return _ItemDao.listarLancPedidosItensPreparo(id);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarLancPedidoItemAdicional/{id}")
    public String listarLancPedidoItemAdicional(
            @PathParam("id")int id
    ) throws SQLException{
        ItemDao _ItemDao = new ItemDao();
        return _ItemDao.listarLancPedidosItensAdicional(id);
    }
    /* *************************************************************************************** */

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("retornaSeguencia/{filial}/{documento}")
    public String retornaSeguencia(
            @PathParam("filial")int filial,
            @PathParam("documento")String documento
    ) throws SQLException{
        //Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao(); 
        return _ItemDao.retornarValorSequencia(filial, documento);
        
        //return g.toJson(_LancPedidosItens);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("remover/{filial}/{documento}/{sequencia}")
    public String excluirLancPedidosItens(
            @PathParam("filial")int filial,
            @PathParam("documento")String documento,
            @PathParam("sequencia")int sequencia
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.removerItem(filial, documento, sequencia)){
            return "Item removido com sucesso!";
        } else {
            return "Erro ao remover Item!";
        }
    }
        

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("atualizaValorPedido/{filial}/{documento}/{valor}")
    public String atualizaValorPedidoAoExcluirLancPedidosItens(
            @PathParam("filial")int filial,
            @PathParam("documento")String documento,
            @PathParam("valor")float valor
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.atualizarValorPedido(filial, documento, valor, "-")){
            return "Valor do pedido atualzado com sucesso!";
        } else {
            return "Erro ao atualizar a valor do pedido!";
        }
    }
        
    /* *************************************************************************************** */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("adicionarItemExecao/{id}/{item}")
    public String adicionarItemExecao(
            @PathParam("id")int id,
            @PathParam("item")int item
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.adicionarItemExecao(id,  item)){
            return "Exeção adicionado com sucesso!";
        } else {
            return "Erro ao adicionar Exeção!";
        }
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("adicionarItemPreparo/{id}/{item}/{filial}/{documento}")
    public String adicionarItemPreparo(
            @PathParam("id")int id,
            @PathParam("item")String item,
            @PathParam("filial")int filial,
            @PathParam("documento")String documento
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.adicionarItemPreparo(id, item, filial, documento)){
            return "Preparo adicionado com sucesso!";
        } else {
            return "Erro ao adicionar Preparo!";
        }
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("adicionarItemAdicional/{id}/{item}/{filial}/{documento}/{valor}/{qtd}")
    public String adicionarItemAdicional(
            @PathParam("id")int id,
            @PathParam("item")int item,
            @PathParam("filial")int filial,
            @PathParam("documento")String documento,
            @PathParam("valor")float valor,
            @PathParam("qtd")float qtd
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.adicionarItemAdicional(id,  item, filial, documento, valor, qtd)){
            return "Adicional adicionado com sucesso!";
        } else {
            return "Erro ao adicionar Adicional!";
        }
    }    
    /* ******************************************************************************************** */
        

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarItensComposicaoExcecao/{id}")
    public String listarItensComposicaoExcecao(
            @PathParam("id")int id
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItensComposicaoExcecao(id);
        
        return g.toJson(_Item);
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserir")
    public int inserirLancPedidosItens(String content){
        Gson g = new Gson();
        LancPedidosItens _LancPedidosItens = (LancPedidosItens) g.fromJson(content, LancPedidosItens.class);
        
        ItemDao _ItemDao = new ItemDao();
        return _ItemDao.adicionarItem(_LancPedidosItens);
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserirImpressao")
    public String inserirLancPedidosItensImpressao(String content){
        Gson g = new Gson();
        LancPedidosItens _LancPedidosItens = (LancPedidosItens) g.fromJson(content, LancPedidosItens.class);
        
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.adicionarItemImpressao(_LancPedidosItens)){
            return "1";
        } else {
            return "0";
        }

    }
}
