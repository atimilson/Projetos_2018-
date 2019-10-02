package View;

import controller.UsuarioController;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author turma.310157
 */
public class CadastroUsuarioGUI extends javax.swing.JDialog {

    /**
     * Creates new form Cadastro
     */
    public CadastroUsuarioGUI(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        initComponents();
        setLocationRelativeTo(null);
        lblMsgObrigatorioCpf.setVisible(false);

        lblMsgObrigatorioEndereco.setVisible(false);
        lblMsgObrigatorioLogin.setVisible(false);
        lblMsgObrigatorioNome.setVisible(false);
        lblMsgObrigatorioRg.setVisible(false);
        lblMsgObrigatorioTel.setVisible(false);
        lblMsgObrigatorioSenha.setVisible(false);

    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel18 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jTabbedPane1 = new javax.swing.JTabbedPane();
        jPanel2 = new javax.swing.JPanel();
        jLabel2 = new javax.swing.JLabel();
        jTextFieldNome = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        jFormattedTextFieldCPF = new javax.swing.JFormattedTextField();
        jLabel4 = new javax.swing.JLabel();
        jFormattedTextFieldRG = new javax.swing.JFormattedTextField();
        jLabel5 = new javax.swing.JLabel();
        jTextFieldEndereco = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jFormattedTextFieldTelefone = new javax.swing.JFormattedTextField();
        jLabel7 = new javax.swing.JLabel();
        jTextFieldLogin = new javax.swing.JTextField();
        jLabel8 = new javax.swing.JLabel();
        jTextFieldSenha = new javax.swing.JTextField();
        lblMsgObrigatorioNome = new javax.swing.JLabel();
        lblMsgObrigatorioCpf = new javax.swing.JLabel();
        lblMsgObrigatorioRg = new javax.swing.JLabel();
        lblMsgObrigatorioEndereco = new javax.swing.JLabel();
        lblMsgObrigatorioTel = new javax.swing.JLabel();
        lblMsgObrigatorioLogin = new javax.swing.JLabel();
        lblMsgObrigatorioSenha = new javax.swing.JLabel();
        jButtonCadastrar = new javax.swing.JButton();
        jButtonLimpar = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(51, 255, 51));
        jPanel1.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.LOWERED));

        jLabel1.setFont(new java.awt.Font("Monotype Corsiva", 3, 36)); // NOI18N
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("Cadastro de Usuário");

        jLabel9.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/add_user-icon.png"))); // NOI18N

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(531, 531, 531)
                        .addComponent(jLabel18))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addContainerGap()
                        .addComponent(jLabel9)
                        .addGap(18, 18, 18)
                        .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 321, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jLabel18)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel9)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 42, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 33, Short.MAX_VALUE))
        );

        jLabel2.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel2.setText("Nome:");

        jLabel3.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel3.setText("CPF:");

        try {
            jFormattedTextFieldCPF.setFormatterFactory(new javax.swing.text.DefaultFormatterFactory(new javax.swing.text.MaskFormatter("#########-##")));
        } catch (java.text.ParseException ex) {
            ex.printStackTrace();
        }

        jLabel4.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel4.setText("RG:");

        try {
            jFormattedTextFieldRG.setFormatterFactory(new javax.swing.text.DefaultFormatterFactory(new javax.swing.text.MaskFormatter("########")));
        } catch (java.text.ParseException ex) {
            ex.printStackTrace();
        }

        jLabel5.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel5.setText("Endereço:");

        jLabel6.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel6.setText("Telefone:");

        try {
            jFormattedTextFieldTelefone.setFormatterFactory(new javax.swing.text.DefaultFormatterFactory(new javax.swing.text.MaskFormatter("(##)#####-####")));
        } catch (java.text.ParseException ex) {
            ex.printStackTrace();
        }

        jLabel7.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel7.setText("Login:");

        jLabel8.setFont(new java.awt.Font("PMingLiU-ExtB", 1, 12)); // NOI18N
        jLabel8.setText("Senha:");

        lblMsgObrigatorioNome.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioNome.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioNome.setText("*");

        lblMsgObrigatorioCpf.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioCpf.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioCpf.setText("*");

        lblMsgObrigatorioRg.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioRg.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioRg.setText("*");

        lblMsgObrigatorioEndereco.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioEndereco.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioEndereco.setText("*");

        lblMsgObrigatorioTel.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioTel.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioTel.setText("*");

        lblMsgObrigatorioLogin.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioLogin.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioLogin.setText("*");

        lblMsgObrigatorioSenha.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        lblMsgObrigatorioSenha.setForeground(new java.awt.Color(255, 0, 0));
        lblMsgObrigatorioSenha.setText("*");

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(jTextFieldSenha, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jTextFieldLogin, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jFormattedTextFieldTelefone, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 519, Short.MAX_VALUE)
                    .addComponent(jTextFieldEndereco, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jFormattedTextFieldRG, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jFormattedTextFieldCPF, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel2, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel3, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel4, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel5, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel6, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel7, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel8, javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jTextFieldNome, javax.swing.GroupLayout.Alignment.LEADING))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblMsgObrigatorioNome)
                    .addComponent(lblMsgObrigatorioCpf)
                    .addComponent(lblMsgObrigatorioRg)
                    .addComponent(lblMsgObrigatorioEndereco)
                    .addComponent(lblMsgObrigatorioTel)
                    .addComponent(lblMsgObrigatorioLogin)
                    .addComponent(lblMsgObrigatorioSenha))
                .addContainerGap(98, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel2)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblMsgObrigatorioNome)
                    .addComponent(jTextFieldNome, javax.swing.GroupLayout.PREFERRED_SIZE, 25, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jFormattedTextFieldCPF, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioCpf))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel4)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jFormattedTextFieldRG, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioRg))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel5)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jTextFieldEndereco, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioEndereco))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel6)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jFormattedTextFieldTelefone, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioTel))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel7)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jTextFieldLogin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioLogin))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel8)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jTextFieldSenha, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblMsgObrigatorioSenha))
                .addGap(20, 20, 20))
        );

        jPanel2Layout.linkSize(javax.swing.SwingConstants.VERTICAL, new java.awt.Component[] {jFormattedTextFieldCPF, jFormattedTextFieldRG, jFormattedTextFieldTelefone, jTextFieldEndereco, jTextFieldLogin, jTextFieldNome, jTextFieldSenha});

        jTabbedPane1.addTab("Dados do Usuário", jPanel2);

        jButtonCadastrar.setFont(new java.awt.Font("Serif", 1, 14)); // NOI18N
        jButtonCadastrar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/salvar.png"))); // NOI18N
        jButtonCadastrar.setText("Cadastrar");
        jButtonCadastrar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonCadastrarActionPerformed(evt);
            }
        });

        jButtonLimpar.setFont(new java.awt.Font("Sylfaen", 1, 14)); // NOI18N
        jButtonLimpar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagem/limpar.png"))); // NOI18N
        jButtonLimpar.setText("Limpar");
        jButtonLimpar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonLimparActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jTabbedPane1)
                .addContainerGap())
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jButtonLimpar)
                .addGap(64, 64, 64)
                .addComponent(jButtonCadastrar)
                .addGap(71, 71, 71))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jTabbedPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 451, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButtonLimpar)
                    .addComponent(jButtonCadastrar))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButtonLimparActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonLimparActionPerformed
        // TODO add your handling code here:
        jTextFieldNome.setText("");
        jTextFieldEndereco.setText("");
        jTextFieldLogin.setText("");
        jTextFieldSenha.setText("");
        jFormattedTextFieldCPF.setText("");
        jFormattedTextFieldRG.setText("");
        jFormattedTextFieldTelefone.setText("");
        lblMsgObrigatorioEndereco.setVisible(false);
        lblMsgObrigatorioLogin.setVisible(false);
        lblMsgObrigatorioNome.setVisible(false);
        lblMsgObrigatorioCpf.setVisible(false);
        lblMsgObrigatorioRg.setVisible(false);
        lblMsgObrigatorioTel.setVisible(false);
        lblMsgObrigatorioSenha.setVisible(false);

    }//GEN-LAST:event_jButtonLimparActionPerformed

    private void jButtonCadastrarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonCadastrarActionPerformed
        // TODO add your handling code here:
        verificaCampo();
        
        UsuarioController usuario = new UsuarioController();
        
        
        usuario.usuario.setNome(jTextFieldNome.getText());
        usuario.usuario.setCpf(jFormattedTextFieldCPF.getText());
        usuario.usuario.setRg(jFormattedTextFieldRG.getText());
        usuario.usuario.setEndereco(jTextFieldEndereco.getText());
        usuario.usuario.setTelefone(jFormattedTextFieldTelefone.getText());
        usuario.usuario.setLogin(jTextFieldLogin.getText());
        usuario.usuario.setSenha(jTextFieldSenha.getText());
        

        usuario.salvar(usuario.usuario);
                

    }//GEN-LAST:event_jButtonCadastrarActionPerformed

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
            java.util.logging.Logger.getLogger(CadastroUsuarioGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(CadastroUsuarioGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(CadastroUsuarioGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(CadastroUsuarioGUI.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                CadastroUsuarioGUI dialog = new CadastroUsuarioGUI(new javax.swing.JFrame(), true);
                dialog.addWindowListener(new java.awt.event.WindowAdapter() {
                    @Override
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButtonCadastrar;
    private javax.swing.JButton jButtonLimpar;
    private javax.swing.JFormattedTextField jFormattedTextFieldCPF;
    private javax.swing.JFormattedTextField jFormattedTextFieldRG;
    private javax.swing.JFormattedTextField jFormattedTextFieldTelefone;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel18;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JTabbedPane jTabbedPane1;
    private javax.swing.JTextField jTextFieldEndereco;
    private javax.swing.JTextField jTextFieldLogin;
    private javax.swing.JTextField jTextFieldNome;
    private javax.swing.JTextField jTextFieldSenha;
    private javax.swing.JLabel lblMsgObrigatorioCpf;
    private javax.swing.JLabel lblMsgObrigatorioEndereco;
    private javax.swing.JLabel lblMsgObrigatorioLogin;
    private javax.swing.JLabel lblMsgObrigatorioNome;
    private javax.swing.JLabel lblMsgObrigatorioRg;
    private javax.swing.JLabel lblMsgObrigatorioSenha;
    private javax.swing.JLabel lblMsgObrigatorioTel;
    // End of variables declaration//GEN-END:variables

    public void verificaCampo() {
        if (jTextFieldNome.getText().length() > 0) {
            lblMsgObrigatorioNome.setVisible(false);
        } else {
            lblMsgObrigatorioNome.setVisible(true);
        }
        if (!jFormattedTextFieldCPF.getText().equalsIgnoreCase("          - ")) {
            lblMsgObrigatorioCpf.setVisible(false);
        } else {
            lblMsgObrigatorioCpf.setVisible(true);
        }
        if (!jFormattedTextFieldRG.getText().equalsIgnoreCase("        - ")) {
            lblMsgObrigatorioRg.setVisible(false);
        } else {
            lblMsgObrigatorioRg.setVisible(true);
        }
        if (jTextFieldEndereco.getText().length() > 0) {
            lblMsgObrigatorioEndereco.setVisible(false);
        } else {
            lblMsgObrigatorioEndereco.setVisible(true);
        }
        if (!jFormattedTextFieldTelefone.getText().equalsIgnoreCase("(  )    -    ")) {
            lblMsgObrigatorioTel.setVisible(false);
        } else {
            lblMsgObrigatorioTel.setVisible(true);
        }
        if (jTextFieldLogin.getText().length() > 0) {
            lblMsgObrigatorioLogin.setVisible(false);

        } else {
            lblMsgObrigatorioLogin.setVisible(true);
        }
        if (jTextFieldSenha.getText().length() > 0) {
            lblMsgObrigatorioSenha.setVisible(false);
        } else {
            lblMsgObrigatorioSenha.setVisible(true);

        }
        
    }

}
