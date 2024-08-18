package unah.lenguajes.proyecto.modelos;

import java.util.List;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.JoinTable;
import jakarta.persistence.ManyToMany;
import jakarta.persistence.Table;
import lombok.Data;

@Entity
@Table(name="alumnos")
@Data
public class Alumnos {
    
    @Id
    @Column(name="numerocuenta")
    private String numeroCuenta;

    @Column(name="nombre")
    private String nombre;

    @Column(name="apellido")
    private String apellido;

    @Column(name="correo", unique = true, nullable = false)  
    private String correo;

    @Column(name="contrasena", nullable = false)  
    private String contrasena;

    @Column(name="sexo")
    private char sexo;

    @ManyToMany
    @JoinTable(
        name = "alumnos_carreras",
        joinColumns = @JoinColumn(name = "id_alumno", referencedColumnName = "numerocuenta"),
        inverseJoinColumns = @JoinColumn(name = "id_carrera", referencedColumnName = "id_carrera")
    )
    private List<Carreras> carreras;
}
