/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.List;
import model.DAO.UsuarioDAO;
import model.VO.UsuarioVO;

/**
 *
 * @author turma.310157
 */
public class UsuarioController {
    public UsuarioVO usuario;
    //public CadastroUsuarioGUI tela;
    
    
    public UsuarioController() {
    
    //tela = new CadastroTarefa(null, true);
        usuario = new UsuarioVO();
    
    
    
}
    
 public UsuarioVO getUsuario(){
        return usuario;
    }
    
    public void setUsuario(UsuarioVO usuario){
        this.usuario = usuario;
        
    }   
    
    public void salvar (UsuarioVO usuario){
        UsuarioDAO banco = new UsuarioDAO();
        banco.Salvar(usuario);
        
    }
    
    public List selecionarTodos(){
        UsuarioDAO banco = new UsuarioDAO();
        return banco.selecionarTodos();
    }
    
    
    
    public void excluir(int id) {
        UsuarioDAO banco = new UsuarioDAO();
        banco.excluir(id);
        
        
    }
    
    public void editar(UsuarioVO usuario , int id){
        UsuarioDAO banco = new UsuarioDAO();
        banco.Editar(usuario, id);
        
        
        
    }
    
}
