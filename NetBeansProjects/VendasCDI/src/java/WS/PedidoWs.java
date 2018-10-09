/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ItemDao;
import Dao.LancPedidoDao;
import Model.LancPedido;
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
@Path("PedidoWS")
public class PedidoWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of PedidoWSResource
     */
    public PedidoWs() {
    }

    /**
     * Retrieves representation of an instance of WS.PedidoWSResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of PedidoWSResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listar/{data}/{identificador}")
    public String getJogador(@PathParam("data")String data, @PathParam("identificador")String identificador) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidosDao = new LancPedidoDao();
        List<LancPedido> _LancPedidos = _LancPedidosDao.listarLancPedidos(data, identificador);
        
        return g.toJson(_LancPedidos);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarId/{id}")
    public String getJogador(@PathParam("id")String id) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidosDao = new LancPedidoDao();
        List<LancPedido> _LancPedidos = _LancPedidosDao.listarLancPedidosId(id);
        
        return g.toJson(_LancPedidos);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarFicha/{ficha}/{data}")
    public String listarPedidoFicha(@PathParam("ficha")String ficha, @PathParam("data")String data) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidosDao = new LancPedidoDao();
        List<LancPedido> _LancPedidos = _LancPedidosDao.listarLancPedidosFicha(ficha, data);
        
        return g.toJson(_LancPedidos);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarFichaId/{ficha}/{data}")
    public String consultarFichaPedido(@PathParam("ficha")String ficha, @PathParam("data")String data) throws SQLException{
        LancPedidoDao _LancPedidosDao = new LancPedidoDao();
        return _LancPedidosDao.consultarFichaPedido(ficha, data);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarFichaAnteriorId/{ficha}/{data}")
    public String consultarFichaAnteriorPedido(@PathParam("ficha")String ficha, @PathParam("data")String data) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidosDao = new LancPedidoDao();
        List<LancPedido> _LancPedidos = _LancPedidosDao.consultarFichaAnteriorPedido(ficha, data);
        
        return g.toJson(_LancPedidos);
    }
    
    
    //consultarFichaAnteriorPedido
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserir")
    public String inserirJogador(String content){
        Gson g = new Gson();
        LancPedido _LancPedido = (LancPedido) g.fromJson(content, LancPedido.class);
        
        LancPedidoDao _LancPedidoDao = new LancPedidoDao();
        return _LancPedidoDao.adicionarLancPedido(_LancPedido);
    }
    
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/alterar")
    public boolean atualizarJogador(String content){
        Gson g = new Gson();
        LancPedido _LancPedido = (LancPedido) g.fromJson(content, LancPedido.class);
        
        LancPedidoDao _LancPedidoDao = new LancPedidoDao();
        return _LancPedidoDao.alterarLancPedido(_LancPedido);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("finalizar/{id}")
    public String finalizarLancPedido(@PathParam("id")int id) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidoDao = new LancPedidoDao();
        if(_LancPedidoDao.finalizarLancPedido(id)){
            return "Pedido foi finalizado com sucesso!";
        } else {
            return "0";
        }
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("remover/{id}")
    public String excluirLancPedido(@PathParam("id")int id) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidoDao = new LancPedidoDao();
        if(_LancPedidoDao.removerLancPedido(id)){
            return "Pedido removido com sucesso!";
        } else {
            return "0";
        }
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("removerItens/{id}")
    public String removerLancPedidoItensAoPedido(@PathParam("id")int id) throws SQLException{
        Gson g = new Gson();
        LancPedidoDao _LancPedidoDao = new LancPedidoDao();
        if(_LancPedidoDao.removerLancPedidoItensAoPedido(id)){
            return "Itens removidos com sucesso!";
        } else {
            return "0";
        }
    }
}
