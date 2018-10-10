/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ViagemDao;
import Dao.ViagemSimplesDao;
import Model.Viagem;
import Model.Viagem_item;
import com.google.gson.Gson;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Jack Biller
 */
@Path("ViagemSimplesWs")
public class ViagemSimplesWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ViagemSimplesWs
     */
    public ViagemSimplesWs() {
    }

    /**
     * Retrieves representation of an instance of WS.ViagemSimplesWs
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ViagemSimplesWs
     * @param content representation for the resource
     */
    @PUT
    @Consumes(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listar")
    public String getViagens() throws SQLException{
        Gson g = new Gson();
        ViagemSimplesDao _ViagemSimplesDao = new ViagemSimplesDao();
        List<Viagem> _Viagem = _ViagemSimplesDao.listarViagensSimples();
        
        return g.toJson(_Viagem);
    }
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarOtimizado")
    public String listarOtimizado() throws SQLException{
        Gson g = new Gson();
        ViagemDao _ViagemDao = new ViagemDao();
        List<Viagem> _Viagem = _ViagemDao.listarViagensSimplesCompleto();
        
        return g.toJson(_Viagem);
    }
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarOtimizadoCliente")
    public String listarOtimizadoCliente() throws SQLException{
        Gson g = new Gson();
        ViagemDao _ViagemDao = new ViagemDao();
        List<Viagem> _Viagem = _ViagemDao.listarViagensSimplesCompletoCliente();
        
        return g.toJson(_Viagem);
    }
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarData/{data}")
    public String getViagens(
            @PathParam("data")String data
    ) throws SQLException{
        Gson g = new Gson();
        ViagemSimplesDao _ViagemSimplesDao = new ViagemSimplesDao();
        List<Viagem> _Viagem = _ViagemSimplesDao.listarViagensSimples(data);
        
        return g.toJson(_Viagem);
    }
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarPendentes")
    public String listarPendentes() throws SQLException{
        Gson g = new Gson();
        ViagemSimplesDao _ViagemSimplesDao = new ViagemSimplesDao();
        List<Viagem_item> _Viagem = _ViagemSimplesDao.listarEntregaPendente();
        
        return g.toJson(_Viagem);
    }
}
