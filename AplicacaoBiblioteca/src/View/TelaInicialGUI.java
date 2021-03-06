/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package View;

/**
 *
 * @author Manoel
 */
public class TelaInicialGUI extends javax.swing.JFrame {

    /**
     * Creates new form TelaInicialGUI
     */
    public TelaInicialGUI() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        Pan = new javax.swing.JPanel();
        lblCliente = new javax.swing.JLabel();
        lblLivros = new javax.swing.JLabel();
        lblUsuario = new javax.swing.JLabel();
        lblSair = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        jMenuBar1 = new javax.swing.JMenuBar();
        jMenu1 = new javax.swing.JMenu();
        jMenu2 = new javax.swing.JMenu();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        Pan.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(240, 240, 240), 3));

        lblCliente.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/folder-customer-icon.png"))); // NOI18N
        lblCliente.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        lblCliente.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                lblClienteMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                lblClienteMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                lblClienteMouseExited(evt);
            }
        });

        lblLivros.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/adicionar livro.png"))); // NOI18N
        lblLivros.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        lblLivros.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                lblLivrosMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                lblLivrosMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                lblLivrosMouseExited(evt);
            }
        });

        lblUsuario.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/add_user-icon.png"))); // NOI18N
        lblUsuario.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        lblUsuario.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                lblUsuarioMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                lblUsuarioMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                lblUsuarioMouseExited(evt);
            }
        });

        lblSair.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/button-x.png"))); // NOI18N
        lblSair.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        lblSair.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                lblSairMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                lblSairMouseExited(evt);
            }
        });

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/335__loupe.png"))); // NOI18N
        jLabel1.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabel1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabel1MouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                jLabel1MouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                jLabel1MouseExited(evt);
            }
        });

        javax.swing.GroupLayout PanLayout = new javax.swing.GroupLayout(Pan);
        Pan.setLayout(PanLayout);
        PanLayout.setHorizontalGroup(
            PanLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(PanLayout.createSequentialGroup()
                .addComponent(lblSair)
                .addGap(0, 0, Short.MAX_VALUE))
            .addGroup(PanLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(PanLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblCliente)
                    .addComponent(lblLivros)
                    .addComponent(jLabel1)
                    .addComponent(lblUsuario))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        PanLayout.setVerticalGroup(
            PanLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(PanLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lblCliente)
                .addGap(18, 18, 18)
                .addComponent(lblLivros)
                .addGap(18, 18, 18)
                .addComponent(lblUsuario)
                .addGap(18, 18, 18)
                .addComponent(jLabel1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 146, Short.MAX_VALUE)
                .addComponent(lblSair))
        );

        jMenu1.setText("Arquivo");
        jMenuBar1.add(jMenu1);
        jMenuBar1.add(jMenu2);

        setJMenuBar(jMenuBar1);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(Pan, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 686, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(Pan, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void lblClienteMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblClienteMouseClicked
        // TODO add your handling code here:
        CadastroClienteGUI cadastrocliente = new CadastroClienteGUI(null, rootPaneCheckingEnabled);
        cadastrocliente.setVisible(true);
       

    }//GEN-LAST:event_lblClienteMouseClicked

    private void lblClienteMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblClienteMouseEntered
        // TODO add your handling code here:
        
        Pan.setBackground(new java.awt.Color(255, 255, 51));
       
    }//GEN-LAST:event_lblClienteMouseEntered

    private void lblClienteMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblClienteMouseExited
        // TODO add your handling code here:

        Pan.setBackground(new java.awt.Color(240, 240, 240));
        

    }//GEN-LAST:event_lblClienteMouseExited

    private void lblLivrosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblLivrosMouseClicked
        // TODO add your handling code here:
        
        CadastroLivroGUI cadastroLivro = new CadastroLivroGUI(null, rootPaneCheckingEnabled);
        cadastroLivro.setVisible(true);
    }//GEN-LAST:event_lblLivrosMouseClicked

    private void lblLivrosMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblLivrosMouseEntered
        // TODO add your handling code here:
        
        Pan.setBackground(new java.awt.Color(51, 153, 255));
    }//GEN-LAST:event_lblLivrosMouseEntered

    private void lblLivrosMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblLivrosMouseExited
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(240, 240, 240));
      
    }//GEN-LAST:event_lblLivrosMouseExited

    private void lblUsuarioMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblUsuarioMouseClicked
        // TODO add your handling code here:
        CadastroUsuarioGUI cadastroUsuario = new CadastroUsuarioGUI(null, rootPaneCheckingEnabled);
        cadastroUsuario.setVisible(true);
    }//GEN-LAST:event_lblUsuarioMouseClicked

    private void lblUsuarioMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblUsuarioMouseEntered
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(51, 255, 51));
    }//GEN-LAST:event_lblUsuarioMouseEntered

    private void lblUsuarioMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblUsuarioMouseExited
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(240, 240, 240));
    }//GEN-LAST:event_lblUsuarioMouseExited

    private void lblSairMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblSairMouseEntered
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(255, 00, 00));
    }//GEN-LAST:event_lblSairMouseEntered

    private void lblSairMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_lblSairMouseExited
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(240, 240, 240));
    }//GEN-LAST:event_lblSairMouseExited

    private void jLabel1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MouseClicked
        // TODO add your handling code here:
        TelaPesquisa telapesquisa = new TelaPesquisa(null, rootPaneCheckingEnabled);
        telapesquisa.setVisible(true);
    }//GEN-LAST:event_jLabel1MouseClicked

    private void jLabel1MouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MouseEntered
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(153, 153, 153));
    }//GEN-LAST:event_jLabel1MouseEntered

    private void jLabel1MouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MouseExited
        // TODO add your handling code here:
        Pan.setBackground(new java.awt.Color(240, 240, 240));
    }//GEN-LAST:event_jLabel1MouseExited

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(TelaInicialGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(TelaInicialGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(TelaInicialGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(TelaInicialGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new TelaInicialGUI().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPanel Pan;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JMenu jMenu1;
    private javax.swing.JMenu jMenu2;
    private javax.swing.JMenuBar jMenuBar1;
    private javax.swing.JLabel lblCliente;
    private javax.swing.JLabel lblLivros;
    private javax.swing.JLabel lblSair;
    private javax.swing.JLabel lblUsuario;
    // End of variables declaration//GEN-END:variables
}
