/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.RegistroDao;
import Model.Coluna;
import Model.Registro;
import Model.Tabela;
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
 * @author CDI
 */
@Path("MigracaoWS")
public class MigracaoWS {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MigracaoWS
     */
    public MigracaoWS() {
    }

    /**
     * Retrieves representation of an instance of WS.MigracaoWS
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of MigracaoWS
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarTabelas")
    public String listarTabelas() throws SQLException{
        Gson g = new Gson();
        RegistroDao _RegistroDao = new RegistroDao();
        List<Tabela> _Registro = _RegistroDao.listarTabelas();
        
        return g.toJson(_Registro);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarColunas/{tabela}")
    public String listarColunas(
            @PathParam("tabela")String tabela
    ) throws SQLException{
        Gson g = new Gson();
        RegistroDao _RegistroDao = new RegistroDao();
        List<Coluna> _Registro = _RegistroDao.listarColuna(tabela);
        
        return g.toJson(_Registro);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarRegistros/{tabela}")
    public String listarRegistros(
            @PathParam("tabela")String tabela
    ) throws SQLException{
        Gson g = new Gson();
        RegistroDao _RegistroDao = new RegistroDao();
        List<Registro> _Registro = _RegistroDao.listarRegistros(tabela);
        
        return g.toJson(_Registro);
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarRegistrosPersonalizado/{tabela}/{colunas}")
    public String listarRegistrosPersonalizado(
            @PathParam("tabela")String tabela,
            @PathParam("colunas")String coluna
    ) throws SQLException{
        Gson g = new Gson();
        RegistroDao _RegistroDao = new RegistroDao();
        List<Registro> _Registro = _RegistroDao.listarRegistrosPersonalizado(tabela, coluna);
        
        return g.toJson(_Registro);
    }
}
