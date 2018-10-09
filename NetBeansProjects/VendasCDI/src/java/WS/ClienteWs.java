/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ClienteDao;
import Model.ClieFornec;
import com.google.gson.Gson;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author jack
 */
@Path("ClienteWs")
public class ClienteWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ClienteWsResource
     */
    public ClienteWs() {
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
    public String getJogador() throws SQLException{
        Gson g = new Gson();
        ClienteDao _ClienteDao = new ClienteDao();
        List<ClieFornec> _ClieFornec = _ClienteDao.listarCliente();
        
        return g.toJson(_ClieFornec);
    }
}
