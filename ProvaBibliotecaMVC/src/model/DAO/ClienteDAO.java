/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.DAO;

import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;
import model.VO.ClienteVO;

/**
 *
 * @author turma.310157
 */
public class ClienteDAO {
    FabricaConexao conexao = new FabricaConexao();
    
    private final String INSERT = "insert into clientes (nome, cpf, rg, endereco, telefone) values (?,?,?,?,?)";
    private final String UPDATE = "update clientes set nome=?, cpf=?, rg=?, endereco=?, telefone=? where cod_cliente=?";
    private final String DELETE = "delete from clientes where cod_cliente = ?";
     private final String SELECT = "select * from clientes";
    PreparedStatement stmt;
    
    
    public void Salvar(ClienteVO tarefa) {
         try {
            //abre a conexao com o banco de dados 
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(INSERT);

            //
            stmt.setString(1, tarefa.getNome());
            stmt.setString(2, tarefa.getCpf());
            stmt.setString(3, tarefa.getRg());
            stmt.setString(4, tarefa.getEndereco());
            stmt.setString(5, tarefa.getTelefone());
            

            //executa o sql com os valores atribuidos acima
            stmt.execute();

            //Finaliza o stmt
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cadastro realizado com sucesso !");

        } catch (Exception error) {
            JOptionPane.showMessageDialog(null, "Erro ao Salvar \n" + error.getMessage(), "error", JOptionPane.ERROR_MESSAGE);

        } finally {
            fechar();
        }
   
     }
    
    
    
     
      private void fechar() {
        try {
            stmt.close();
            conexao.conn.close();

        } catch (Exception ex) {
            imprimeErro("Erro ao fechar conexão", ex.getMessage());
        }
    }
    
    
    private void imprimeErro(String msg, String msgErro) {
        JOptionPane.showMessageDialog(null, msg, "Erro critico", 0);
        System.out.println(msg);
        System.out.println(msgErro);
        System.exit(0);

    }
    
    
    
    public void excluir(int id)  {
        
        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(DELETE);
            stmt.setInt(1, id);
            stmt.execute();
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cliente excluido com sucesso");

        } catch (SQLException error) {
            imprimeErro("Erro ao excluir Cliente", error.getMessage());
        } finally {
            fechar();
        }
        
    }
        
        
     public void Editar(ClienteVO tarefa, int idEditar) {
        try {
            //abre a conexao com o banco de dados 
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(UPDATE);

            stmt.setString(1, tarefa.getNome());
            stmt.setString(2, tarefa.getCpf());
            stmt.setString(3, tarefa.getRg());
            stmt.setString(4, tarefa.getEndereco());
            stmt.setString(5, tarefa.getTelefone());
            stmt.setInt(6, idEditar);

            //executa o sql com os valores atribuidos acima
            stmt.executeUpdate();

            //Finaliza o stmt
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cadastro editado com sucesso !");

        } catch (Exception error) {
            JOptionPane.showMessageDialog(null, "Erro ao Editar \n" + error.getMessage(), "error", JOptionPane.ERROR_MESSAGE);

        } finally {
            fechar();
        }

    }    
        
        
        
           public List selecionarTodos(){
        // criar um objeto do tipo lista de cliente de clienteVO, para armazenar os valores
        //vindo do banco de dados
        List<ClienteVO> clienteLista = new ArrayList<ClienteVO>();
        
        //cria um pbjeto do tipo clienteVO com o nome tarefa
        
        ClienteVO cliente = null;
        
        try{
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELECT);
            conexao.rs = stmt.executeQuery();
            
            while(conexao.rs.next()){
                cliente = new ClienteVO();
                cliente.setCodigo(conexao.rs.getInt("cod_cliente"));
                cliente.setNome(conexao.rs.getString("nome"));
                cliente.setCpf(conexao.rs.getString("cpf"));
                cliente.setRg(conexao.rs.getString("rg"));
                cliente.setEndereco(conexao.rs.getString("endereco"));
                cliente.setTelefone(conexao.rs.getString("telefone"));
                
                clienteLista.add(cliente);
            }
            
        }catch(Exception error){
            System.out.println("Ocorreu erro causa: "+ error.getMessage());
        } finally{
            fechar();
        }
        
        return clienteLista;
        
        
        
    }  
        

    }
    
    
    

