/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WS;

import Dao.ImpressaoDao;
import Model.LancPedidosItens;
import java.awt.print.PrinterException;
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
@Path("ImprimirWS")
public class ImprimirWS {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ImprimirWS
     */
    public ImprimirWS() {
    }

    /**
     * Retrieves representation of an instance of WS.ImprimirWS
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ImprimirWS
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("imprimirComanda/{filial}/{documento}")
    public String imprimirComanda(
            @PathParam("filial") String filial,
            @PathParam("documento") String documento
    ) throws SQLException, PrinterException {
        //Gson g = new Gson();
        ImpressaoDao _Impressao = new ImpressaoDao();
        List<LancPedidosItens> listaIntens = _Impressao.listarLancPedidosItensImpressaoDao(Integer.parseInt(filial), documento);
        String resultado = _Impressao.imprimirComanda(
                Integer.parseInt(filial), documento, listaIntens, 
                _Impressao.retornaClienteContato(Integer.parseInt(filial), documento)
        );
        
        return resultado;
    }
    
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("imprimirSenha/{filial}/{documento}")
    public String imprimirSenha(
            @PathParam("filial") String filial,
            @PathParam("documento") String documento
    ) throws SQLException, PrinterException {
        //Gson g = new Gson();
        ImpressaoDao _Impressao = new ImpressaoDao();
        List<LancPedidosItens> listaIntens = _Impressao.listarLancPedidosItensImpressaoDao(Integer.parseInt(filial), documento);
        String resultado = _Impressao.imprimirSenha(
                Integer.parseInt(filial), documento, listaIntens,
                _Impressao.retornaClienteContato(Integer.parseInt(filial), documento)
        );
        
        return resultado;
    }
}
