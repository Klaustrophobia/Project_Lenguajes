package unah.lenguajes.proyecto.controladores;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import unah.lenguajes.proyecto.modelos.ClasesHistorial;
import unah.lenguajes.proyecto.servicios.ClasesHistorialServicio;
import org.springframework.web.bind.annotation.GetMapping;


@RestController
@RequestMapping("/api/claseshistorial")
public class ClasesHistorialController {
    
    @Autowired
    private ClasesHistorialServicio clasesHistorialServicio;

    @PostMapping("/crear/{cuentaAlumno}")
    public ClasesHistorial crearEntrada(@PathVariable String cuentaAlumno, @RequestBody ClasesHistorial clasesHistorial){
        return this.clasesHistorialServicio.crearEntrada(cuentaAlumno, clasesHistorial);
    }

    @GetMapping("/obtener/todos/{numeroCuenta}")
    public List<ClasesHistorial> obtenerTodosPorEstudiante(@PathVariable String numeroCuenta){
        return this.clasesHistorialServicio.obtenerTodosPorEstudiante(numeroCuenta);
    }

}
