package unah.lenguajes.proyecto.controladores;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import unah.lenguajes.proyecto.modelos.EstadoClase;
import unah.lenguajes.proyecto.servicios.EstadosServicio;
import org.springframework.web.bind.annotation.GetMapping;


@RestController
@RequestMapping("/api/estado")
public class EstadoController {
    @Autowired
    private EstadosServicio estadosServicio;

    @GetMapping("/obtener/todos")
    public List<EstadoClase> obtenerTodos(){
        return this.estadosServicio.obtenerTodos();
    }
}
