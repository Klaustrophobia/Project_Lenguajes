package unah.lenguajes.proyecto.servicios;

import java.util.List;
import java.util.Random;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import unah.lenguajes.proyecto.modelos.Alumnos;
import unah.lenguajes.proyecto.modelos.Carreras;
import unah.lenguajes.proyecto.repositorios.AlumnosRepositorio;

@Service
public class AlumnosServicio {

    @Autowired
    private AlumnosRepositorio alumnosRepositorio;

    public List<Alumnos> obtenerTodos() {
        return this.alumnosRepositorio.findAll();
    }

    public Alumnos crearNuevo(Alumnos nvoAlumno) {
        // Generar el número de cuenta antes de guardar
        String numeroCuenta = generarNumeroCuenta(nvoAlumno);
        nvoAlumno.setNumeroCuenta(numeroCuenta);

        List<Carreras> carreras = nvoAlumno.getCarreras();
        if (carreras != null) {
            // Puedes realizar alguna lógica adicional con las carreras si es necesario
        }

        return this.alumnosRepositorio.save(nvoAlumno);
    }

    public Alumnos actualizar(String numeroCuenta, Alumnos alumno) {
        if (this.alumnosRepositorio.existsById(numeroCuenta)) {
            Alumnos alumnoActualizar = this.alumnosRepositorio.findById(numeroCuenta).get();
            if (alumno.getNombre() != null) {
                alumnoActualizar.setNombre(alumno.getNombre());
            }
            if (alumno.getApellido() != null) {
                alumnoActualizar.setApellido(alumno.getApellido());
            }
            if (alumno.getCorreo() != null) {
                alumnoActualizar.setCorreo(alumno.getCorreo());
            }
            if (alumno.getContrasena() != null) {
                alumnoActualizar.setContrasena(alumno.getContrasena());
            }
            if (alumno.getCarreras() != null) {
                alumnoActualizar.setCarreras(alumno.getCarreras());
            }

            return this.alumnosRepositorio.save(alumnoActualizar);
        } else {
            return null;
        }
    }

    private String generarNumeroCuenta(Alumnos alumno) {
        // Generar el número de cuenta basado en el nombre y apellido
        String primeraLetraNombre = alumno.getNombre().substring(0, 1).toUpperCase();
        String primeraLetraApellido = alumno.getApellido().substring(0, 1).toUpperCase();

        String numeroCuenta;
        boolean existe;

        do {
            String sufijo = generarSufijoAleatorio();
            numeroCuenta = primeraLetraNombre + primeraLetraApellido + sufijo;

            // Verificar si el numeroCuenta ya existe en la base de datos
            existe = alumnosRepositorio.existsById(numeroCuenta);

        } while (existe);

        return numeroCuenta;
    }

    private String generarSufijoAleatorio() {
        // Generar un sufijo aleatorio de 4 dígitos
        Random random = new Random();
        int numero = random.nextInt(9000) + 1000; // Número entre 1000 y 9999

        return String.valueOf(numero);
    }
}
