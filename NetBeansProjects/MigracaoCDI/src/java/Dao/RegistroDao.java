/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Dao;

import Controller.Conexao;
import Model.Tabela;
import Model.Coluna;
import Model.Registro;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author CDI
 */
public class RegistroDao {

    private PreparedStatement pst;
    private ResultSet rs;
    private Connection con;
    private String sql;
    private int numRegistro;

    /*public void pegarValoresConexao(String ServerName, String database, int porta, String senha, String user){
        BancoDados registro = new BancoDados();
        registro.setServerName(ServerName);
        registro.setDatabase(database);
        registro.setPort_Number(porta);
        registro.setSenha(senha);
        registro.setUser(user);
        
        setarConexao(registro);
    }
    
    public String setarConexao(BancoDados registro){
        conexao = new Conexao();
        urlCompleta = "jdbc:sqlserver://"+registro.getServerName()+":"+registro.getPort_Number()+";databaseName="+registro.getDatabase();
        conexao.setURL(urlCompleta);
        conexao.setSENHA(registro.getSenha());
        conexao.setUSER(registro.getUser());
        
        con = Conexao.conexao();
        return conexao.getURL();
    }*/
    public List<Tabela> listarTabelas() {
        List<Tabela> Tabelas = new ArrayList<>();
        try {
            sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES ORDER BY TABLE_NAME";
            /*
                TABLE_CATALOG
                TABLE_SCHEMA
                TABLE_NAME
                TABLE_TYPE
            */            
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                Tabelas.add(new Tabela(rs.getString("TABLE_NAME")));
            }
            Conexao.fecharConexao(con, pst, rs);

            return Tabelas;
        } catch (SQLException ex) {
            Tabelas.add(new Tabela(ex.getMessage()));
            return Tabelas;
        }
    }

    public List<Coluna> listarColuna(String tabela) {
        List<Coluna> Colunas = new ArrayList<>();
        Coluna coluna;
        try {
            sql = "     SELECT "
                    + " COLUMN_NAME,"
                    + " IS_NULLABLE,"
                    + " coalesce(CHARACTER_MAXIMUM_LENGTH, 0) AS tamanho,"
                    + " DATA_TYPE"
                    + " FROM INFORMATION_SCHEMA.COLUMNS where table_name = '" + tabela + "'";
            con = Conexao.conexao();
            pst = con.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                coluna = new Coluna();
                coluna.setDescricao(rs.getString("COLUMN_NAME"));
                coluna.setIs_null(rs.getString("IS_NULLABLE"));
                coluna.setTabela(tabela);
                coluna.setTamanho(rs.getInt("tamanho"));
                coluna.setTipo(rs.getString("DATA_TYPE"));

                Colunas.add(coluna);
            }
            Conexao.fecharConexao(con, pst, rs);

            return Colunas;
        } catch (SQLException ex) {
            coluna = new Coluna();
            coluna.setDescricao(ex.getMessage());
            return Colunas;
        }
    }

    public List<Registro> listarRegistros(String tabela) throws SQLException {
        List<Registro> Registros = new ArrayList<>();
        List<Registro> Colunas = new ArrayList<>();
        List<Registro> Tipos = new ArrayList<>();
        Registro registro;
        //try {
        sql = "SELECT COLUMN_NAME, DATA_TYPE"
                + " FROM INFORMATION_SCHEMA.COLUMNS"
                + " WHERE table_name = '" + tabela + "'";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            Colunas.add(new Registro(rs.getString("COLUMN_NAME")));
            Tipos.add(new Registro(rs.getString("DATA_TYPE")));
        }
        Conexao.fecharConexao(con, pst, rs);

        sql = "SELECT * FROM " + tabela;// + "order by item desc";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        numRegistro = 0;
        while (rs.next()) {
            registro = new Registro();
            for (int i = 0; i < Colunas.size(); i++) {
                if (null != Tipos.get(i).getDescricao()) {
                    switch (Tipos.get(i).getDescricao()) {
                        case "int":
                        case "bit":
                        case "numeric":
                        case "bigint":
                        case "smallint":
                        case "tinyint":
                            if (Integer.toString(rs.getInt(Colunas.get(i).getDescricao())) != null
                                    && !"null".equals(Integer.toString(rs.getInt(Colunas.get(i).getDescricao())))) {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + Integer.toString(rs.getInt(Colunas.get(i).getDescricao())));
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]" + Integer.toString(rs.getInt(Colunas.get(i).getDescricao())));
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]");
                                }
                            }
                            break;
                        case "float":
                        case "money":
                        case "decimal":
                        case "real":
                            if (Float.toString(rs.getFloat(Colunas.get(i).getDescricao())) != null
                                    && !"null".equals(Float.toString(rs.getFloat(Colunas.get(i).getDescricao())))) {
                                if (i == 0) {
                                    //numRegistro++;
                                    registro.setDescricao(registro.getDescricao() + Float.toString(rs.getFloat(Colunas.get(i).getDescricao())));
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]" + Float.toString(rs.getFloat(Colunas.get(i).getDescricao())));
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]");
                                }
                            }
                            break;
                        case "varchar":
                        case "nchar":
                        case "datetime":
                        case "char":
                        case "nvarchar":
                        case "text":
                        case "smalldatetime":
                        case "date":
                        case "ntext":
                            if (rs.getString(Colunas.get(i).getDescricao()) != null
                                    && !"null".equals(rs.getString(Colunas.get(i).getDescricao()))) {
                                if (i == 0) {
                                    //numRegistro++;
                                    registro.setDescricao(registro.getDescricao() + rs.getString(Colunas.get(i).getDescricao()));
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]" + rs.getString(Colunas.get(i).getDescricao()));
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + "[/]");
                                }
                            }
                            break;
                        case "image":
                        case "uniqueidentifier":
                            if (i == 0) {
                                //numRegistro++;
                                registro.setDescricao(registro.getDescricao() + "");
                            } else {
                                registro.setDescricao(registro.getDescricao() + "[/]");
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
            registro.setDescricao(registro.getDescricao().replaceAll("null", ""));
            Registros.add(registro);
        }
        Conexao.fecharConexao(con, pst, rs);

        return Registros;
        /*} catch (SQLException ex) {
            Registros.add(new Registro(ex.getMessage()));
            return Registros;
        }*/
    }

    public List<Registro> listarRegistrosPersonalizado(String tabela, String colunas) throws SQLException {
        List<Registro> Registros = new ArrayList<>();
        List<Registro> Colunas = new ArrayList<>();
        List<Registro> Tipos = new ArrayList<>();
        String[] colunasSelecionas = colunas.split(",");
        Registro registro;
        //try {
        sql = "SELECT COLUMN_NAME, DATA_TYPE"
                + " FROM INFORMATION_SCHEMA.COLUMNS"
                + " WHERE table_name = '" + tabela + "'";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        while (rs.next()) {
            for(int i = 0; i < colunasSelecionas.length; i++){
                if(colunasSelecionas[i].equals(rs.getString("COLUMN_NAME"))){
                    Colunas.add(new Registro(rs.getString("COLUMN_NAME")));
                    Tipos.add(new Registro(rs.getString("DATA_TYPE")));
                }
            }
        }
        Conexao.fecharConexao(con, pst, rs);

        sql = "SELECT " + colunas + " FROM " + tabela;// + "order by item desc";
        con = Conexao.conexao();
        pst = con.prepareStatement(sql);
        rs = pst.executeQuery();
        numRegistro = 0;
        while (rs.next()) {
            registro = new Registro();
            registro.setDescricao("\nINSERT INTO " + tabela + " (" + colunas + ") VALUES (");
            for (int i = 0; i < Colunas.size(); i++) {
                if (null != Tipos.get(i).getDescricao()) {
                    switch (Tipos.get(i).getDescricao()) {
                        case "int":
                        case "bit":
                        case "numeric":
                        case "bigint":
                        case "smallint":
                        case "tinyint":
                            if (Integer.toString(rs.getInt(Colunas.get(i).getDescricao())) != null
                                    && !"null".equals(Integer.toString(rs.getInt(Colunas.get(i).getDescricao())))) {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + Integer.toString(rs.getInt(Colunas.get(i).getDescricao())));
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", " + Integer.toString(rs.getInt(Colunas.get(i).getDescricao())));
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "\"\"");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", \"\"");
                                }
                            }
                            break;
                        case "float":
                        case "money":
                        case "decimal":
                        case "real":
                            if (Float.toString(rs.getFloat(Colunas.get(i).getDescricao())) != null
                                    && !"null".equals(Float.toString(rs.getFloat(Colunas.get(i).getDescricao())))) {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + Float.toString(rs.getFloat(Colunas.get(i).getDescricao())));
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", " + Float.toString(rs.getFloat(Colunas.get(i).getDescricao())));
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "\"\"");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", \"\"");
                                }
                            }
                            break;
                        case "varchar":
                        case "nchar":
                        case "datetime":
                        case "char":
                        case "nvarchar":
                        case "text":
                        case "smalldatetime":
                        case "date":
                        case "ntext":
                            if (rs.getString(Colunas.get(i).getDescricao()) != null
                                    && !"null".equals(rs.getString(Colunas.get(i).getDescricao()))) {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "\"" + rs.getString(Colunas.get(i).getDescricao()) + "\"");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", \"" + rs.getString(Colunas.get(i).getDescricao()) + "\"");
                                }
                            } else {
                                if (i == 0) {
                                    registro.setDescricao(registro.getDescricao() + "\"\"");
                                } else {
                                    registro.setDescricao(registro.getDescricao() + ", \"\"");
                                }
                            }
                            break;
                        case "image":
                        case "uniqueidentifier":
                            if (i == 0) {
                                registro.setDescricao(registro.getDescricao() + "\"\"");
                            } else {
                                registro.setDescricao(registro.getDescricao() + ", \"\"");
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
            registro.setDescricao(registro.getDescricao() + ");");
            registro.setDescricao(registro.getDescricao().replaceAll("null", ""));
            Registros.add(registro);
        }
        Conexao.fecharConexao(con, pst, rs);
        return Registros;
    }
}
