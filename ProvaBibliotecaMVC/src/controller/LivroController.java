/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.List;
import model.DAO.LivroDAO;
import model.VO.LivroVO;

/**
 *
 * @author atimilson
 */
public class LivroController {
    public LivroVO livro;
    //public CadastroUsuarioGUI tela;
    
    
    public LivroController() {
    
    //tela = new CadastroTarefa(null, true);
        livro = new LivroVO();
    
    
    
}
    
 public LivroVO getCliente(){
        return livro;
    }
    
    public void setCliente(LivroVO livro){
        this.livro = livro;
        
    } 
public void salvar (LivroVO usuario){
        LivroDAO banco = new LivroDAO();
        banco.Salvar(usuario);
        
    }
    
    public List selecionarTodos(){
        LivroDAO banco = new LivroDAO();
        return banco.selecionarTodos();
    }
    
    public void excluir(int id) {
        LivroDAO banco = new LivroDAO();
        banco.excluir(id);
        
        
    }
    
    public void editar(LivroVO livro , int id){
        LivroDAO banco = new LivroDAO();
        banco.Editar(livro, id);
        
        
        
    }
    
    
    
    
    
    
    
}
