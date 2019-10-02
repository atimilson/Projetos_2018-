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
import model.VO.LivroVO;

/**
 *
 * @author turma.310157
 */
public class LivroDAO {
    FabricaConexao conexao = new FabricaConexao();
    
    private final String INSERT = "insert into livros (autor, titulo, editora, isbn, num_edicao, genero)"
            + "values (?,?,?,?,?,?)";
    private final String UPDATE = "update livros set autor=?, titulo=?, editora=?, isbn=?, num_edicao=?, genero=? where cod_livro=?";
    private final String DELETE = "delete from livros where cod_livro = ?";
    private final String SELECT = "select * from livros";
    private final String SELCT_UNICO = "SELECT * FROM livros WHERE cod_livro=?";
    
    PreparedStatement stmt;
    
    
    
    
    public void Salvar(LivroVO tarefa) {
         try {
            //abre a conexao com o banco de dados 
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(INSERT);

            //
            stmt.setString(1, tarefa.getAutor());
            stmt.setString(2, tarefa.getTitulo());
            stmt.setString(3, tarefa.getEditora());
            stmt.setInt(4, tarefa.getIsbn());
            stmt.setInt(5, tarefa.getNumEdicao());
            stmt.setString(6, tarefa.getGenero());
            
            

            //executa o sql com os valores atribuidos acima
            stmt.execute();

            //Finaliza o stmt
            stmt.close();
            JOptionPane.showMessageDialog(null, "Registro realizado com sucesso !");

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
            JOptionPane.showMessageDialog(null, "Registro excluido com sucesso");

        } catch (SQLException error) {
            imprimeErro("Erro ao excluir Cliente", error.getMessage());
        } finally {
            fechar();
        }
        
    }
        
        
     public void Editar(LivroVO tarefa, int idEditar) {
        try {
            //abre a conexao com o banco de dados 
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(UPDATE);

            stmt.setString(1, tarefa.getAutor());
            stmt.setString(2, tarefa.getTitulo());
            stmt.setString(3, tarefa.getEditora());
            stmt.setInt(4, tarefa.getIsbn());
            stmt.setInt(5, tarefa.getNumEdicao());
            stmt.setString(6, tarefa.getGenero());
            stmt.setInt(7, idEditar);

            //executa o sql com os valores atribuidos acima
            stmt.executeUpdate();

            //Finaliza o stmt
            stmt.close();
            JOptionPane.showMessageDialog(null, "Registro editado com sucesso !");

        } catch (Exception error) {
            JOptionPane.showMessageDialog(null, "Erro ao Editar \n" + error.getMessage(), "error", JOptionPane.ERROR_MESSAGE);

        } finally {
            fechar();
        }

    }
     
     
     
     public LivroVO selecionarLivro(int codigo) {
        List<LivroVO> livroLista = new ArrayList<LivroVO>();
        LivroVO livroSele = null;

        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELCT_UNICO);
            stmt.setInt(1, codigo);
            conexao.rs = stmt.executeQuery();

            while (conexao.rs.next()) {
                livroSele = new LivroVO();
                livroSele.setCodigo(conexao.rs.getInt("cod_livro"));
                livroSele.setAutor(conexao.rs.getString("autor"));
                livroSele.setTitulo(conexao.rs.getString("titulo"));
                livroSele.setEditora(conexao.rs.getString("editora"));
                livroSele.setIsbn(conexao.rs.getInt("isbn"));
                livroSele.setNumEdicao(conexao.rs.getInt("num_edicao"));
                livroSele.setGenero(conexao.rs.getString("genero"));
                
                livroLista.add(livroSele);
            }
        } catch (Exception error) {
            System.out.println("ocorreu um erro causa:" + error.getMessage());
        } finally {
            fechar();
        }
        return livroSele;
    }
    
    
}
