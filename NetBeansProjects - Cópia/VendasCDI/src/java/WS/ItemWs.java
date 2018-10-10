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
    @Path("listarItem/{grupo}")
    public String listarItens(@PathParam("grupo")int grupo) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<Item> _Item = _ItemDao.listarItens(grupo);
        
        return g.toJson(_Item);
    }

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
    @Path("listarLancPedidoItem/{lancPedidoId}")
    public String listarLancPedidoItem(
            @PathParam("lancPedidoId")String lancPedidoId
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<LancPedidosItens> _LancPedidosItens = _ItemDao.listarLancPedidosItens(Integer.parseInt(lancPedidoId));

        return g.toJson(_LancPedidosItens);
    }
    
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarLancPedidoItemDoc/{documento}")
    public String listarLancPedidoItemDoc(
            @PathParam("documento")String lancPedidoId
    ) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        List<LancPedidosItens> _LancPedidosItens = _ItemDao.listarLancPedidosItens(lancPedidoId);

        return g.toJson(_LancPedidosItens);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("retornaSeguencia/{lancPedidoId}")
    public String retornaSeguencia(@PathParam("lancPedidoId")int lancPedidoId) throws SQLException{
        //Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao(); 
        return _ItemDao.retornarValorSequencia(lancPedidoId);
        
        //return g.toJson(_LancPedidosItens);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("remover/{id}")
    public String excluirLancPedidosItens(@PathParam("id")int id) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.removerItem(id)){
            return "Item removido com sucesso!";
        } else {
            return "Erro ao remover Item!";
        }
    }
        

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("atualizaValorPedido/{id}/{valor}")
    public String atualizaValorPedidoAoExcluirLancPedidosItens(@PathParam("id")int id, @PathParam("valor")float valor) throws SQLException{
        Gson g = new Gson();
        ItemDao _ItemDao = new ItemDao();
        if(_ItemDao.atualizarValorPedido(id, valor, "-")){
            return "Valor do pedido atualzado com sucesso!";
        } else {
            return "Erro ao atualizar a valor do pedido!";
        }
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserir")
    public boolean inserirLancPedidosItens(String content){
        Gson g = new Gson();
        LancPedidosItens _LancPedidosItens = (LancPedidosItens) g.fromJson(content, LancPedidosItens.class);
        
        ItemDao _ItemDao = new ItemDao();
        return _ItemDao.adicionarItem(_LancPedidosItens);
    }
}
