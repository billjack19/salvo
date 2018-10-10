/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.RegiaoDao;
import Model.Regiao;
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
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Jack Biller
 */
@Path("RegiaoWs")
public class RegiaoWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of Regiao
     */
    public RegiaoWs() {
    }

    /**
     * Retrieves representation of an instance of WS.Regiao
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of Regiao
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }


    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listar")
    public String getViagens() throws SQLException{
        Gson g = new Gson();
        RegiaoDao _RegiaoDao = new RegiaoDao();
        List<Regiao> Regioes = _RegiaoDao.listarRegioes();

        return g.toJson(Regioes);
    }
}
