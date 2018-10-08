<?php


date_default_timezone_set("America/Sao_Paulo");

include "atualiza_statusController.php";


$serveName = $_POST['ServerName'];
$serveName = str_replace("\\","\\\\",$serveName);
$porta = $_POST['Port_Number'];
$dataBase = $_POST['nameDadabaseMigration'];


echo $conexaoJava = "
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author jack
 */
public class Conexao {


    private static final String DRIVER = \"com.microsoft.sqlserver.jdbc.SQLServerDriver\";
    private static final String URL = \"jdbc:sqlserver://$serveName:$porta;databaseName=$dataBase\";
    private static final String USER = \"sa\";
    private static final String SENHA = \"teste\";

    public static Connection conexao() {
        try {
            Class.forName(DRIVER);
            return DriverManager.getConnection(URL, USER, SENHA);
        } catch (ClassNotFoundException | SQLException ex) {
            throw new RuntimeException(\"Erro na conexão: \"+ex+\": \", ex);
        }
    }

    public static void fecharConexao(Connection con) {
        try {
            if (con != null) {
                con.close();
            }
        } catch (SQLException ex) {
            Logger.getLogger(Conexao.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public static void fecharConexao(Connection con, PreparedStatement stmt) {
        fecharConexao(con);
        try {
            if (stmt != null) {
                stmt.close();
            }
        } catch (SQLException ex) {
            Logger.getLogger(Conexao.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public static void fecharConexao(Connection con, PreparedStatement stmt, ResultSet rs) {
        fecharConexao(con, stmt);
        try {
            if (rs != null) {
                rs.close();
            }
        } catch (SQLException ex) {
            Logger.getLogger(Conexao.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}

";

criarArquivo("C:\Users\CDI\Documents\NetBeansProjects\MigracaoCDI\src\java\Controller\Conexao.java", $conexaoJava);


function criarArquivo($nome, $conteudo){
	$myfile = fopen($nome, "w") or die("Unable to open file!");
	$txt = $conteudo;
	fwrite($myfile, $txt);
	fclose($myfile);
	return 1;
}

?>