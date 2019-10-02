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

    private final String INSERT = "INSERT INTO clientes(nome,cpf,rg,endereco,telefone) values(?,?,?,?,?)";
    private final String DELET = "DELETE FROM clientes WHERE cod_cliente = ?";
    private final String UPDATE = "UPDATE clientes SET nome = ?, cpf = ?, rg = ?, endereco = ?, telefone = ? WHERE cod_cliente = ?";
    private final String SELCT_UNICO = "SELECT * FROM clientes WHERE cod_cliente=?";
    
    PreparedStatement stmt;

    public void salvar(ClienteVO clienteS) {
        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(INSERT);

            stmt.setString(1, clienteS.getNome());
            stmt.setString(2, clienteS.getCpf());
            stmt.setString(3, clienteS.getRg());
            stmt.setString(4, clienteS.getEndereco());
            stmt.setString(5, clienteS.getTelefone());

            stmt.execute();
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cadastro realizado com sucesso!");
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, "erro ao cadastrar! " + ex.getMessage(), " error ", JOptionPane.ERROR_MESSAGE);

        } finally {
            fechar();
        }

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

    public void excluir(int id) {
        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(DELET);
            stmt.setInt(1, id);
            stmt.execute();
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cliente excluido com sucesso!!");
        } catch (SQLException error) {
            imprimeErro("Erro ao excluir Cliente", error.getMessage());
        } finally {
            fechar();
        }
    }

    public void editar(ClienteVO clienteE, int idEditar) {
        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(UPDATE);
            
            stmt.setString(1, clienteE.getNome());
            stmt.setString(2, clienteE.getCpf());
            stmt.setString(3, clienteE.getRg());
            stmt.setString(4, clienteE.getEndereco());
            stmt.setString(5, clienteE.getTelefone());
            stmt.setInt(6, idEditar);

            stmt.executeUpdate();
            stmt.close();
            JOptionPane.showMessageDialog(null, "Cadastro editado com sucesso!");
        }catch(SQLException ex){
            JOptionPane.showMessageDialog(null, "erro ao inserir editar! " + ex.getMessage(), " error ", JOptionPane.ERROR_MESSAGE);
        }finally{
            fechar();
        }
    }
    
    public ClienteVO selecionarCliente(int codigo) {
        List<ClienteVO> clienteLista = new ArrayList<ClienteVO>();
        ClienteVO clienteSele = null;

        try {
            conexao.abreConexao();
            stmt = conexao.conn.prepareStatement(SELCT_UNICO);
            stmt.setInt(1, codigo);
            conexao.rs = stmt.executeQuery();

            while (conexao.rs.next()) {
                clienteSele = new ClienteVO();
                clienteSele.setCodigo(conexao.rs.getInt("cod_cliente"));
                clienteSele.setNome(conexao.rs.getString("nome"));
                clienteSele.setCpf(conexao.rs.getString("cpf"));
                clienteSele.setRg(conexao.rs.getString("rg"));
                clienteSele.setTelefone(conexao.rs.getString("telefone"));
                clienteSele.setEndereco(conexao.rs.getString("endereco"));
                
                clienteLista.add(clienteSele);
            }
        } catch (Exception error) {
            System.out.println("ocorreu um erro causa:" + error.getMessage());
        } finally {
            fechar();
        }
        return clienteSele;
    }
        

    }
    
    
    

