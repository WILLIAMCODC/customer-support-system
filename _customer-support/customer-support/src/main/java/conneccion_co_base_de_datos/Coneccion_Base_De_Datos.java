/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package conneccion_co_base_de_datos;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;


/**
 *
 * @author DELL
 */
public class Coneccion_Base_De_Datos {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
         String usuario = "root";
        String password = "Mmcode1234";
        String url = "jdbc:mysql://localhost:3307/servicio_al_cliente";
        Connection conexion;
        Statement statement;
        ResultSet rs;
        
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Coneccion_Base_De_Datos.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        
        try {
            // Establecer la conexión a la base de datos
            
            conexion = DriverManager.getConnection(url,usuario,password);
            statement = conexion.createStatement();
            
              // Insertar un nuevo registro con nombre 'Juan'
              
            statement.executeUpdate("INSERT INTO asesor(nombre) VALUES('Juan'),('William')");
            
            // Mostrar los registros
            
            rs = statement.executeQuery("SELECT * FROM asesor");
            rs.next();
            do{
            System.out.println(rs.getString("nombre"));
            } while(rs.next());
            
            // Actualizar el nombre Juan a Pedro
            
            statement.executeUpdate("UPDATE asesor SET nombre = 'Pedro' WHERE nombre = 'Juan'");
            
            // Mostrar los registros después de la actualización
            
             System.out.println("Registros despues de la actualización:");
            rs = statement.executeQuery("SELECT * FROM asesor");
            while (rs.next()) {
                System.out.println(rs.getString("nombre"));
            }
            
            // Eliminar el registro con nombre Pedro
            
           statement.executeUpdate ("DELETE FROM asesor WHERE nombre = 'Pedro' ");
           System.out.println("Registros despues de borrar datos:");
           
           // Mostar los registros despues de eliminar el nombre Pedro
           
            rs = statement.executeQuery("SELECT * FROM asesor");
            while (rs.next()) {
                System.out.println(rs.getString("nombre"));
            }
           
           
        } catch (SQLException ex) {
            Logger.getLogger(Coneccion_Base_De_Datos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
