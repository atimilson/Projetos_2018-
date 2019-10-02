
import javax.swing.JOptionPane;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 05506932111
 */
public class calculo_de_luz extends javax.swing.JFrame {

    /**
     * Creates new form calculo_de_luz
     */
    public calculo_de_luz() {
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

        jLabel1 = new javax.swing.JLabel();
        txtKw = new javax.swing.JFormattedTextField();
        rdResidencia = new javax.swing.JRadioButton();
        rdComercial = new javax.swing.JRadioButton();
        rdIndustrial = new javax.swing.JRadioButton();
        jButton1 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jLabel1.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        jLabel1.setText("Digite a Quantia KW/h :");

        txtKw.setFormatterFactory(new javax.swing.text.DefaultFormatterFactory(new javax.swing.text.NumberFormatter(new java.text.DecimalFormat("#0.00"))));

        rdResidencia.setText("Residencia");
        rdResidencia.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdResidenciaActionPerformed(evt);
            }
        });

        rdComercial.setText("Comercial");
        rdComercial.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdComercialActionPerformed(evt);
            }
        });

        rdIndustrial.setText("Industrial");
        rdIndustrial.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                rdIndustrialActionPerformed(evt);
            }
        });

        jButton1.setText("Calcular");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(txtKw, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(rdResidencia)
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(rdComercial)
                                .addGap(18, 18, 18)
                                .addComponent(rdIndustrial))
                            .addGroup(layout.createSequentialGroup()
                                .addGap(11, 11, 11)
                                .addComponent(jButton1)))))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(28, 28, 28)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(txtKw, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(45, 45, 45)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(rdResidencia)
                    .addComponent(rdComercial)
                    .addComponent(rdIndustrial))
                .addGap(51, 51, 51)
                .addComponent(jButton1)
                .addContainerGap(23, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        // TODO add your handling code here:
        double resultado = 0;
        
      
            if(rdResidencia.isSelected() || rdComercial.isSelected() || rdIndustrial.isSelected() ){
        if(rdResidencia.isSelected()){
            float kw = Float.parseFloat(txtKw.getText().replace(",", "."));
            resultado = kw*0.6;
        }if(rdComercial.isSelected()){
            float kw = Float.parseFloat(txtKw.getText().replace(",", "."));
            resultado = kw*0.4;
        }if(rdIndustrial.isSelected()){
            float kw = Float.parseFloat(txtKw.getText().replace(",", "."));
            resultado = kw*1.29;
            
        
       }
            }else{
               JOptionPane.showMessageDialog(this, "Preencha os Campos"); 
            }
            
        
        
        
        if(resultado != 0){
            JOptionPane.showMessageDialog(this,"R$: "+resultado);
        }
         String v =(" residencia 0,60 , comercial 0,40 industrial 1,29");
        
    }//GEN-LAST:event_jButton1ActionPerformed

    private void rdResidenciaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdResidenciaActionPerformed
        // TODO add your handling code here:
        rdComercial.setSelected(false);
        rdIndustrial.setSelected(false);
    }//GEN-LAST:event_rdResidenciaActionPerformed

    private void rdComercialActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdComercialActionPerformed
        // TODO add your handling code here:
        
        rdResidencia.setSelected(false);
        rdIndustrial.setSelected(false);
    }//GEN-LAST:event_rdComercialActionPerformed

    private void rdIndustrialActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_rdIndustrialActionPerformed
        // TODO add your handling code here:
         rdResidencia.setSelected(false);
        rdComercial.setSelected(false);
    }//GEN-LAST:event_rdIndustrialActionPerformed

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
            java.util.logging.Logger.getLogger(calculo_de_luz.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(calculo_de_luz.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(calculo_de_luz.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(calculo_de_luz.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new calculo_de_luz().setVisible(true);
            }
        });
    }

   
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JRadioButton rdComercial;
    private javax.swing.JRadioButton rdIndustrial;
    private javax.swing.JRadioButton rdResidencia;
    private javax.swing.JFormattedTextField txtKw;
    // End of variables declaration//GEN-END:variables
}