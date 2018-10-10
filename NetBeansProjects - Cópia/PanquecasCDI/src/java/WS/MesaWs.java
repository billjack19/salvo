/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import com.google.gson.Gson;
import Dao.MesaDao;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import Model.Mesa;
import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;

/**
 * REST Web Service
 *
 * @author CDI
 */
@Path("MesaWs")
public class MesaWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MesaWs
     */
    public MesaWs() {
    }

    /**
     * Retrieves representation of an instance of WS.ClienteWsResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_XML)
    public String getXml() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ClienteWsResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_XML)
    public void putXml(String content) {
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listar/{filial}")
    public String listarMesaPrincipal(
        @PathParam("filial") int filial
    ) throws SQLException{
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.listarMesaPrincipal(filial);
        
        return g.toJson(_Mesas);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarMesaId/{codigo}")
    public String listarMesaid(
        @PathParam("codigo") int codigo
    ) throws SQLException{
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.listarMesaCodigo(codigo);
        
        return g.toJson(_Mesas);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarMesa/{filial}")
    public String listarMesa(
        @PathParam("filial") int filial
    ) throws SQLException{
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.listarMesaPrincipal(filial);
        
        return g.toJson(_Mesas);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("documento/{id}/{filial}")
    public String documento(
        @PathParam("id") int id,
        @PathParam("filial") int filial
    ) throws SQLException{
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.buscarDocumento(id, filial);
        
        return g.toJson(_Mesas);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarMesaDesc/{tipo}/{numero}/{filial}")
    public String listarMesaDesc(
            @PathParam("tipo") String tipo,
            @PathParam("numero") String numero,
            @PathParam("filial") int filial
    ) throws SQLException {
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.listarMesa(tipo+" "+numero, filial);
        
        return g.toJson(_Mesas);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarPedidoId/{filial}/{documento}")
    public String listarPedidoId(
            @PathParam("filial") String filial,
            @PathParam("documento") String documento
    ) throws SQLException {
        Gson g = new Gson();
        MesaDao _MesaDao = new MesaDao();
        List<Mesa> _Mesas = _MesaDao.listarPedidoId(filial, documento);
        
        return g.toJson(_Mesas);
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserir")
    public String inserirJogador(String content){
        Gson g = new Gson();
        Mesa _Mesa = (Mesa) g.fromJson(content, Mesa.class);

        MesaDao _MesaDao = new MesaDao();
        return _MesaDao.adicionarLancPedido(_Mesa);
    }
}