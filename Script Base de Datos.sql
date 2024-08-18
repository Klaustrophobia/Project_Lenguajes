CREATE DATABASE matricula;

USE matricula;

CREATE TABLE Edificios(
    ID_Edificio int not null AUTO_INCREMENT,
    Nombre VARCHAR(50),
    CONSTRAINT PK_Edificios PRIMARY KEY (ID_Edificio)
);

CREATE TABLE Aulas(
    ID_Aula int not null AUTO_INCREMENT,
    ID_Edificio INT NOT NULL,
    Nombre VARCHAR(50),
    CONSTRAINT PK_Aula PRIMARY KEY (ID_Aula),
    CONSTRAINT FK_Aula_Edificio FOREIGN KEY (ID_Edificio) REFERENCES Edificios(ID_Edificio)
);

CREATE TABLE Estado_Clase(
    ID_Estado int not null AUTO_INCREMENT,
    Nombre VARCHAR(50),
    CONSTRAINT PK_Estado PRIMARY KEY (ID_Estado)
);

CREATE TABLE Carreras(
    ID_Carrera int not null AUTO_INCREMENT,
    Nombre VARCHAR(50),
    CONSTRAINT PK_Carrera PRIMARY KEY (ID_Carrera)
);

CREATE TABLE Alumnos(
    NumeroCuenta VARCHAR(12) not null,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Correo VARCHAR(120) NOT NULL,
    Contrasena VARCHAR(50) NOT NULL,
    Sexo CHAR(1),
    CONSTRAINT PK_Alumnos PRIMARY KEY (NumeroCuenta),
    CONSTRAINT UC_AlumnosCorreo UNIQUE (Correo)
);

CREATE TABLE Alumnos_Carreras(
    ID_Alumno VARCHAR(12) NOT NULL,
    ID_Carrera INT NOT NULL,
    CONSTRAINT FK_CarrerasAlumnos_Carreras FOREIGN KEY (ID_Carrera) REFERENCES Carreras(ID_Carrera),
    CONSTRAINT FK_CarrerasAlumnos_Alumnos FOREIGN KEY (ID_Alumno) REFERENCES Alumnos(NumeroCuenta)
);

CREATE TABLE Docentes(
    ID_Docente INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Correo VARCHAR(120) NOT NULL,
    Contrasena VARCHAR(50) NOT NULL,
    Sexo CHAR(1) NOT NULL,
    CONSTRAINT PK_Docentes PRIMARY KEY (ID_Docente),
    CONSTRAINT UC_DocentesCorreo UNIQUE(Correo)
);

CREATE TABLE Periodo(
    ID_Periodo INT NOT NULL AUTO_INCREMENT,
    Ano YEAR NOT NULL,
    NumeroPeriodo INT NOT NULL,
    FechaInicio DATE,
    FechaFin DATE,
    CONSTRAINT PK_Periodo PRIMARY KEY (ID_Periodo)
);

CREATE TABLE Clases(
    ID_Clase INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    UnidadesValorativas INT NOT NULL,
    Codigo VARCHAR(10) NOT NULL,
    ID_Clase_Requisito INT,
    ID_Carrera INT NOT NULL,
    CONSTRAINT PK_Clases PRIMARY KEY (ID_Clase),
    CONSTRAINT FK_Clases_ClaseRequisito FOREIGN KEY (ID_Clase_Requisito) REFERENCES Clases(ID_Clase),
    CONSTRAINT FK_Clases_Carrera FOREIGN KEY (ID_Carrera) REFERENCES Carreras(ID_Carrera)
); 

CREATE TABLE Secciones(
    ID_Seccion INT NOT NULL AUTO_INCREMENT,
    ID_Clase INT NOT NULL,
    HoraInicio TIME NOT NULL,
    HoraFin TIME NOT NULL,
    CodigoSeccion VARCHAR(6) NOT NULL,
    ID_Docente INT NOT NULL,
    ID_Aula INT,
    ID_Periodo INT,
    CONSTRAINT PK_Secciones PRIMARY KEY (ID_Seccion),
    CONSTRAINT FK_Secciones_Clase FOREIGN KEY (ID_Clase) REFERENCES Clases (ID_Clase),
    CONSTRAINT FK_Secciones_Docente FOREIGN KEY (ID_Docente) REFERENCES Docentes (ID_Docente),
    CONSTRAINT FK_Secciones_Aula FOREIGN KEY (ID_Aula) REFERENCES Aulas(ID_Aula),
    CONSTRAINT FK_Secciones_Periodo FOREIGN KEY (ID_Periodo) REFERENCES Periodo(ID_Periodo)
);

CREATE TABLE Matricula(
    ID_Matricula INT NOT NULL AUTO_INCREMENT,
    Cuenta_Alumno VARCHAR(12) NOT NULL,
    ID_Seccion INT NOT NULL,
    CONSTRAINT PK_Matricula PRIMARY KEY (ID_Matricula),
    CONSTRAINT FK_Matricula_Alumno FOREIGN KEY (Cuenta_Alumno) REFERENCES Alumnos(NumeroCuenta),
    CONSTRAINT FK_Matricula_Seccion FOREIGN KEY (ID_Seccion) REFERENCES Secciones(ID_Seccion)
);

CREATE TABLE HistorialAcademico(
    Cuenta_Alumno VARCHAR(12) NOT NULL,
    Codigo VARCHAR(10) NOT NULL,
    CONSTRAINT PK_HistorialAcademico PRIMARY KEY (Cuenta_Alumno),
    CONSTRAINT FK_HistorialAcad_Alumno FOREIGN KEY (Cuenta_Alumno) REFERENCES Alumnos(NumeroCuenta),
    CONSTRAINT UC_HistorialCodigo UNIQUE (Codigo)
);

CREATE TABLE Clases_Historial(
    ID_Clases_Historial INT NOT NULL AUTO_INCREMENT,
    ID_Clase INT NOT NULL,
    ID_Periodo INT NOT NULL,
    Historial_Alumno VARCHAR(12) NOT NULL,
    Calificacion DECIMAL(5,2) NOT NULL,
    ID_Estado INT NOT NULL,
    CONSTRAINT PK_Clases_Historial PRIMARY KEY (ID_Clases_Historial),
    CONSTRAINT FK_Historial_Clases FOREIGN KEY (ID_Clase) REFERENCES Clases(ID_Clase),
    CONSTRAINT FK_Historial_Periodo FOREIGN KEY (ID_Periodo) REFERENCES Periodo(ID_Periodo),
    CONSTRAINT FK_Historial_Alumno FOREIGN KEY (Historial_Alumno) REFERENCES HistorialAcademico(Cuenta_Alumno),
    CONSTRAINT FK_Historial_Estado FOREIGN KEY (ID_Estado) REFERENCES Estado_Clase(ID_Estado),
    CONSTRAINT UC_Clase_Per_Alumno UNIQUE (ID_Clase, ID_Periodo, Historial_Alumno)
);
