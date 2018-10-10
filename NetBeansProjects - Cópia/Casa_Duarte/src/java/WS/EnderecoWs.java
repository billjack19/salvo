/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.EnderecoDao;
import Model.Endereco;
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
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Jack Biller
 */
@Path("EnderecoWs")
public class EnderecoWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of EnderecoWs
     */
    public EnderecoWs() {
    }

    /**
     * Retrieves representation of an instance of WS.EnderecoWs
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of EnderecoWs
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listar")
    public String getEnderecosPendentes() throws SQLException{
        Gson g = new Gson();
        EnderecoDao _EnderecoDao = new EnderecoDao();
        List<Endereco> Enderecos = _EnderecoDao.retonaEnderecosPendentes();
        
        return g.toJson(Enderecos);
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Path("/inserir")
    public String inserirLancPedidosItens(String content){
        Gson g = new Gson();
        Endereco _Endereco = (Endereco) g.fromJson(content, Endereco.class);
        
        EnderecoDao _EnderecoDao = new EnderecoDao();
        return _EnderecoDao.setGeocodificacao(_Endereco);
    }
}