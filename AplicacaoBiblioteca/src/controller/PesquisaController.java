/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.List;
import model.DAO.PesquisaDAO;

/**
 *
 * @author jhonnathan
 */
public class PesquisaController {
    PesquisaDAO banco = new PesquisaDAO();
    
    public List procuarUsuario(){
        return banco.pesquisarUsuario();
    }
    
    public List procurarCliente(){
        return banco.pesquisarCliente();
    }
    
    public List procurarLivro(){
        return banco.pesquisarLivro();
    }
    
}
