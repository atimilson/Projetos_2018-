/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.DAO;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;



/**
 *
 * @author turma.310157
 */
public class FabricaConexao {
    public String porta = "3306"; //porta do banco de dados
    public String host = "localhost";// define o endereço do banco de dados
    public String banco = "biblioteca";//define o banco de dados utilizado
    public String driver = "com.mysql.jdbc.Driver";// define o driver indentificador do serviço
    public String caminho = "jdbc:mysql://" + host + "/" + banco +"";// caminho de conexao para o banco de dados
    public String usuario = "root";
    public String senha = "";
    public Connection conn;// responsavel por realizar a conexao com o banco de dados
    public Statement stmt;//responsavel por preparar a realizar pesquisa DB
    public ResultSet rs;// responsavel por armazenar o resultado da pesquisa do stmt
    
    
    
    //Método reponsável por abrir uma conexao com o banco de dados
    
    public void abreConexao() throws SQLException{
        try {
            Class.forName(driver); //Carrega o Drive de conexao
            
            //obtem a conexao com o bendo de dados
            conn = (Connection) DriverManager.getConnection(caminho, usuario, senha);
            
            // cria um statement para podermos mandar um SQL para o banco de dados
            stmt = (Statement) conn.createStatement();
            
        } catch (ClassNotFoundException ex) {
            JOptionPane.showMessageDialog(null, "erro ao conectar ao bando de dados","Erro",JOptionPane.ERROR_MESSAGE);
        }
        
        
        
    }   
    public void fechaConexao(){
        try{
            conn.close();
        }catch(Exception e){
            e.printStackTrace();
        }
        
        
        
    }
    
    
    
}
