/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ViagemSimplesItemDao;
import Model.Viagem_item;
import com.google.gson.Gson;
import java.sql.SQLException;
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
@Path("ViagemSimplesItemWs")
public class ViagemSimplesItemWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ViagemSimplesItemWs
     */
    public ViagemSimplesItemWs() {
    }

    /**
     * Retrieves representation of an instance of WS.ViagemSimplesItemWs
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ViagemSimplesItemWs
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    
    
    

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("pesquisa/{pedido}/{entrega}/{codigo}")
    public String getViagens(
            @PathParam("pedido")String pedido,
            @PathParam("entrega")int entrega,
            @PathParam("codigo")String codigo
    ) throws SQLException{
        Gson g = new Gson();
        ViagemSimplesItemDao _ViagemSimplesItemDao = new ViagemSimplesItemDao();
        Viagem_item _Viagem_item = _ViagemSimplesItemDao.pesquisaBoolEntrega_ViagensSimplesItem(pedido, entrega, codigo);
        
        return g.toJson(_Viagem_item);
        // return pedido+"/"+entrega;
    }
}
