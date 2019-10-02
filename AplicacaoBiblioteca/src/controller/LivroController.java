/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.List;
import model.DAO.LivroDAO;
import model.VO.LivroVO;
import View.CadastroLivroGUI;

/**
 *
 * @author atimilson
 */
public class LivroController {
    public LivroVO livro;
    public CadastroLivroGUI tela;
    
    
    public LivroController() {
    
    tela = new CadastroLivroGUI(null, true);
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
    
    
    
    public void excluir(int id) {
        LivroDAO banco = new LivroDAO();
        banco.excluir(id);
        
        
    }
    
    public void editar(LivroVO livro , int id){
        LivroDAO banco = new LivroDAO();
        banco.Editar(livro, id);
        
        
        
    }
    
    
    
    
    
    
    
}
