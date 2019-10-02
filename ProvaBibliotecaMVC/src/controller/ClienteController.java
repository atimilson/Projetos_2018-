/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.List;
import model.DAO.ClienteDAO;
import model.VO.ClienteVO;

/**
 *
 * @author atimilson
 */
public class ClienteController {
    public ClienteVO cliente;
    //public CadastroUsuarioGUI tela;
    
    
    public ClienteController() {
    
    //tela = new CadastroTarefa(null, true);
        cliente = new ClienteVO();
    
    
    
}
    
 public ClienteVO getCliente(){
        return cliente;
    }
    
    public void setCliente(ClienteVO cliente){
        this.cliente = cliente;
        
    }   
    
    public void salvar (ClienteVO cliente){
        ClienteDAO banco = new ClienteDAO();
        banco.Salvar(cliente);
        
    }
    
    public List selecionarTodos(){
        ClienteDAO banco = new ClienteDAO();
        return banco.selecionarTodos();
    }
    
    public void excluir(int id) {
        ClienteDAO banco = new ClienteDAO();
        banco.excluir(id);
        
        
    }
    
    public void editar(ClienteVO cliente , int id){
        ClienteDAO banco = new ClienteDAO();
        banco.Editar(cliente, id);
        
        
        
    }
    
}
