/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import View.CadastroClienteGUI;
import java.sql.SQLException;
import java.util.List;
import model.DAO.ClienteDAO;
import model.VO.ClienteVO;

/**
 *
 * @author atimilson
 */
public class ClienteController {
    public ClienteVO cliente;
    public CadastroClienteGUI tela;
    
    public ClienteController(){
        tela = new CadastroClienteGUI(null, true);
        cliente = new ClienteVO();
    }
    
    public ClienteVO getCliente() {
        return cliente;
    }

    public void setCliente(ClienteVO cliente) {
        this. cliente = cliente;
    }

    public void salvar(ClienteVO cliente){
         ClienteDAO banco = new  ClienteDAO();
        banco.salvar(cliente);
    }
    
    public void excluir(int id) throws SQLException{
         ClienteDAO banco = new  ClienteDAO();
        banco.excluir(id);
    }
    
    public void editar(ClienteVO cliente, int id){
        ClienteDAO banco = new  ClienteDAO();
        banco.editar(cliente,id);
    }
    
}
