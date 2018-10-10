/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.GrupoDao;
import Model.Grupo;
import com.google.gson.Gson;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.Consumes;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author CDI
 */
@Path("GrupoWs")
public class GrupoWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of GrupoWs
     */
    public GrupoWs() {
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
    @Path("listar")
    public String getGrupo() throws SQLException{
        Gson g = new Gson();
        GrupoDao _GrupoDao = new GrupoDao();
        List<Grupo> _Grupo = _GrupoDao.listarGrupo();
        
        return g.toJson(_Grupo);
    }
}
