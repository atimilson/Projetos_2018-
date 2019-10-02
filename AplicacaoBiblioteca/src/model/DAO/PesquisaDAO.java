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
import model.VO.LivroVO;
import model.VO.UsuarioVO;

/**
 *
 * @author jhonnathan
 */
public class PesquisaDAO {
    
    private final String SELECT_USER = "SELECT * FROM usuario";
    private final String SELECT_CLIENTE = "SELECT * FROM clientes";
    private final String SELECT_LIVRO = "SELECT * FROM livros";
    
    PreparedStatement stmt;
    
    
    FabricaConexao conexao = new FabricaConexao();
    
    public List pesquisarUsuario(){
        List<UsuarioVO> usuarioLista= new ArrayList<UsuarioVO>();
        
        try{
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELECT_USER);
            
            conexao.rs = stmt.executeQuery();
            
            while(conexao.rs.next()){
                UsuarioVO usuario = new UsuarioVO();
                
                usuario.setCodigo(conexao.rs.getInt("id_user"));
                usuario.setNome(conexao.rs.getString("nome_user"));
                usuario.setCpf(conexao.rs.getString("cpf_user"));
                usuario.setRg(conexao.rs.getString("rg_user"));
                usuario.setEndereco(conexao.rs.getString("endereco_user"));
                usuario.setTelefone(conexao.rs.getString("telefone_user"));
                
                usuarioLista.add(usuario);
            }
        }catch (SQLException ex){
            System.out.println("Ocorreu erro,causa: "+ex.getMessage());
        }finally{
            fechar();
        }
        return usuarioLista;
    }
    
    public List pesquisarCliente(){
        List<ClienteVO> clienteLista= new ArrayList<ClienteVO>();
        
        try{
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELECT_CLIENTE);
            
            conexao.rs = stmt.executeQuery();
            
            while(conexao.rs.next()){
                ClienteVO cliente = new ClienteVO();
                
                cliente.setCodigo(conexao.rs.getInt("cod_cliente"));
                cliente.setNome(conexao.rs.getString("nome"));
                cliente.setCpf(conexao.rs.getString("cpf"));
                cliente.setRg(conexao.rs.getString("rg"));
                cliente.setEndereco(conexao.rs.getString("endereco"));
                cliente.setTelefone(conexao.rs.getString("telefone"));
                
                clienteLista.add(cliente);
            }
        }catch (SQLException ex){
            System.out.println("Ocorreu erro,causa: "+ex.getMessage());
        }finally{
            fechar();
        }
        return clienteLista;
    }
    
    public List pesquisarLivro(){
        List<LivroVO> LivroLista= new ArrayList<LivroVO>();
        
        try{
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELECT_LIVRO);
            
            conexao.rs = stmt.executeQuery();
            
            while(conexao.rs.next()){
                LivroVO livro = new LivroVO();
                
                livro.setCodigo(conexao.rs.getInt("cod_livro"));
                livro.setAutor(conexao.rs.getString("autor"));
                livro.setTitulo(conexao.rs.getString("titulo"));
                livro.setEditora(conexao.rs.getString("editora"));
                livro.setIsbn(conexao.rs.getInt("isbn"));
                livro.setNumEdicao(conexao.rs.getInt("num_edicao"));
                livro.setGenero(conexao.rs.getString("genero"));
                
                LivroLista.add(livro);
            }
        }catch (SQLException ex){
            System.out.println("Ocorreu erro,causa: "+ex.getMessage());
        }finally{
            fechar();
        }
        return LivroLista;
    }
    
    public void fechar() {
        try {
            stmt.close();
            conexao.conn.close();
        } catch (SQLException ex) {
            imprimeErro("erro ao fechar conexao", ex.getMessage());
        }
    }
    public void imprimeErro(String msg, String msgErro) {
        JOptionPane.showMessageDialog(null, msg, "erro critico!", 0);
        System.out.println(msg);
        System.out.println(msgErro);
        System.exit(0);
    }
}
