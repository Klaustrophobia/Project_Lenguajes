package unah.lenguajes.proyecto.servicios;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import unah.lenguajes.proyecto.modelos.EstadoClase;
import unah.lenguajes.proyecto.repositorios.EstadoClaseRepositorio;

@Service
public class EstadosServicio {

    @Autowired
    private EstadoClaseRepositorio estadoClaseRepositorio;

    public List<EstadoClase> obtenerTodos(){
        return this.estadoClaseRepositorio.findAll();
    }
}
