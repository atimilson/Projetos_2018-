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
import model.VO.UsuarioVO;

/**
 *
 * @author turma.310157
 */
public class UsuarioDAO {
    FabricaConexao conexao = new FabricaConexao();
    
    private final String INSERT =  "insert into usuario (nome_user, cpf_user, rg_user, endereco_user,"
            + "telefone_user, login_user, senha_user) values(?,?,?,?,?,?,?)";
    private final String UPDATE = "update usuario set nome_user=?, cpf_user=?, rg_user=?, endereco_user=?, telefone_user=?, login_user=?, senha_user=? where id_user=?";
    private final String DELETE = "delete from usuario where id_user = ?";
    private final String SELECT = "select * from usuario";
    private final String SELCT_UNICO = "SELECT * FROM usuario WHERE id_user=?";
    
    
    
    PreparedStatement stmt;
    
    
    public void Salvar(UsuarioVO tarefa) {
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
            stmt.setString(6, tarefa.getLogin());
            stmt.setString(7, tarefa.getSenha());
            

            //executa o sql com os valores atribuidos acima
            stmt.execute();

            //Finaliza o stmt
            stmt.close();
            JOptionPane.showMessageDialog(null, "Usuario realizado com sucesso !");

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
            JOptionPane.showMessageDialog(null, "Usuario excluido com sucesso");

        } catch (SQLException error) {
            imprimeErro("Erro ao excluir Usuario", error.getMessage());
        } finally {
            fechar();
        }
        
    }
        
        
     public void Editar(UsuarioVO tarefa, int idEditar) {
        try {
            //abre a conexao com o banco de dados 
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(UPDATE);

            stmt.setString(1, tarefa.getNome());
            stmt.setString(2, tarefa.getCpf());
            stmt.setString(3, tarefa.getRg());
            stmt.setString(4, tarefa.getEndereco());
            stmt.setString(5, tarefa.getTelefone());
            stmt.setString(6, tarefa.getLogin());
            stmt.setString(7, tarefa.getSenha());
            stmt.setInt(8, idEditar);

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
    
     public UsuarioVO selecionarUsuario(int codigo) {
        List<UsuarioVO> usuarioLista = new ArrayList<UsuarioVO>();
        UsuarioVO usuarioSele = null;

        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELCT_UNICO);
            stmt.setInt(1, codigo);
            conexao.rs = stmt.executeQuery();

            while (conexao.rs.next()) {
                usuarioSele = new UsuarioVO();
                usuarioSele.setCodigo(conexao.rs.getInt("id_user"));
                usuarioSele.setNome(conexao.rs.getString("nome_user"));
                usuarioSele.setCpf(conexao.rs.getString("cpf_user"));
                usuarioSele.setRg(conexao.rs.getString("rg_user"));
                usuarioSele.setTelefone(conexao.rs.getString("telefone_user"));
                usuarioSele.setEndereco(conexao.rs.getString("endereco_user"));
                
                usuarioLista.add(usuarioSele);
            }
        } catch (Exception error) {
            System.out.println("ocorreu um erro causa:" + error.getMessage());
        } finally {
            fechar();
        }
        return usuarioSele;
    }
         
         
         
         
         
         
     

     
     
     public List selecionarTodos(){
        // criar um objeto do tipo lista de usuario de usuarioVO, para armazenar os valores
        //vindo do banco de dados
        List<UsuarioVO> usuarioLista = new ArrayList<UsuarioVO>();
        
        //cria um pbjeto do tipo usuarioVO com o nome tarefa
        
        UsuarioVO usuario = null;
        
        try{
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELECT);
            conexao.rs = stmt.executeQuery();
            
            while(conexao.rs.next()){
                usuario = new UsuarioVO();
                usuario.setCodigo(conexao.rs.getInt("id_user"));
                usuario.setNome(conexao.rs.getString("nome_user"));
                usuario.setCpf(conexao.rs.getString("cpf_user"));
                usuario.setRg(conexao.rs.getString("rg_user"));
                usuario.setEndereco(conexao.rs.getString("endereco_user"));
                usuario.setTelefone(conexao.rs.getString("telefone_user"));
                
                usuarioLista.add(usuario);
            }
            
        }catch(Exception error){
            System.out.println("Ocorreu erro causa: "+ error.getMessage());
        } finally{
            fechar();
        }
        
        return usuarioLista;
        
        
        
    }
    
   
    
   
    
    
}
