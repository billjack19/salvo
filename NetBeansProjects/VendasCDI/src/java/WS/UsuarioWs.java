/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.TabUsuarioDao;
import Model.TabUsuarios;
import com.google.gson.Gson;
import java.io.IOException;
import java.sql.SQLException;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author jack
 */
@Path("UsuarioWs")
public class UsuarioWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of UsuarioWsResource
     */
    public UsuarioWs() {
    }

    @GET
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/autencicar/{indetificador}/{senha}")
    public Response autencicarJogador(
            @PathParam("indetificador") String indetificador,
            @PathParam("senha") String senha
    ) throws SQLException {
        Gson g = new Gson();
        TabUsuarioDao _TabUsuarioDao = new TabUsuarioDao();
        List<TabUsuarios> TabUsuarios = _TabUsuarioDao.autenticaJogador(indetificador, senha);

        return Response.ok()
                .entity(g.toJson(TabUsuarios))
                .header("Access-Control-Allow-Origin", "*")
                .header("Access-Control-Allow-Methods", "POST, GET, PUT, UPDATE, OPTIONS")
                .header("Access-Control-Allow-Headers", "Content-Type, Accept, X-Requested-With").build();
    }

    /**
     * Retrieves representation of an instance of WS.UsuarioWsResource
     *
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    @GET
    @Path("{id}")
    @Produces({MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML})
    public Response getPodcastById(@PathParam("id") Long id, @QueryParam("detailed") boolean detailed)
            throws IOException {
        //Podcast podcastById = podcastService.getPodcastById(id);
        return Response.ok() //200
                //.entity(podcastById, detailed ? new Annotation[]{PodcastDetailedView.Factory.get()} : new Annotation[0])
                .header("Access-Control-Allow-Origin", "*")
                .header("Access-Control-Allow-Methods", "GET, POST, DELETE, PUT")
                .allow("OPTIONS").build();
    }

    /**
     * PUT method for updating or creating an instance of UsuarioWsResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Consumes(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
