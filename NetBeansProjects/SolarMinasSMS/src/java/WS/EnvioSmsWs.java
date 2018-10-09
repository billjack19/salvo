/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.SmsDao;
import Model.Envio_sms;
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
@Path("EnvioSmsWs")
public class EnvioSmsWs {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of EnvioSmsWs
     */
    public EnvioSmsWs() {
    }

    /**
     * Retrieves representation of an instance of WS.EnvioSmsWs
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of EnvioSmsWs
     * @param content representation for the resource
     */
    @PUT
    @Consumes(javax.ws.rs.core.MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("listarEnviosSms")
    public String listarEnviosSms() throws SQLException {
        Gson g = new Gson();
        SmsDao _SmsDao = new SmsDao();
        List<Envio_sms> envios = _SmsDao.pesquisaEnvioSMS();

        return g.toJson(envios);
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("atualizarCK/{id}/{operacao}")
    public String atualizarCK(
        @PathParam("id")int id,
        @PathParam("operacao") int operacao
    ) throws SQLException {
        Gson g = new Gson();
        Envio_sms envio = new Envio_sms();
        /*SmsDao _SmsDao = new SmsDao();*/
        if(operacao == 1){
            // Confirmar envio
            envio.setDocumento("ENVIADO");
            //return "ENVIADO";// _SmsDao.atualizaCK_enviado(id);
        } else {
            // Operacao de cancelamento
            envio.setDocumento("CANCELADO");
            //return "CANCELADO";// _SmsDao.atualizaCK_cancelado(id);
        }
        return g.toJson(envio);
    }
}
