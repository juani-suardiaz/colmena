SET FOREIGN_KEY_CHECKS = 0;

-- //////////////////////////////////////////////////////////// DOCENTES ////////////////////////////////////////////////////////////

-- tabla: persona

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_persona.csv'
REPLACE INTO TABLE persona
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: docente

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_docente.csv'
REPLACE INTO TABLE docente
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: docente_curso

TRUNCATE TABLE docente_curso;
LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_docente_curso.csv'
REPLACE INTO TABLE docente_curso
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: grilla_horaria

TRUNCATE TABLE grilla_horaria;
LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_grilla_horaria.csv'
REPLACE INTO TABLE grilla_horaria
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: planta_funcional

TRUNCATE TABLE planta_funcional;
LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_planta_funcional.csv'
REPLACE INTO TABLE planta_funcional
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- //////////////////////////////////////////////////////////// ESTUDIANTES ////////////////////////////////////////////////////////////

DELETE FROM persona WHERE actuacion = 1;
TRUNCATE TABLE estudiante_curso;
TRUNCATE TABLE estudiante_allegados;
TRUNCATE TABLE estudiante;

-- tabla: persona

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_persona.csv'
REPLACE INTO TABLE persona
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: estudiante

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_estudiante.csv'
REPLACE INTO TABLE estudiante
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: estudiante_curso

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_estudiante_curso.csv'
REPLACE INTO TABLE estudiante_curso
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: estudiante_allegados

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_estudiante_allegados.csv'
REPLACE INTO TABLE estudiante_allegados
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- //////////////////////////////////////////////////////////// AMBOS ////////////////////////////////////////////////////////////

-- tabla: persona_telefono;

TRUNCATE TABLE persona_telefono;

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_persona_telefono.csv'
REPLACE INTO TABLE persona_telefono
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_persona_telefono.csv'
REPLACE INTO TABLE persona_telefono
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

-- tabla: persona_email;

TRUNCATE TABLE persona_email;

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/docentes/colmena_persona_correo.csv'
REPLACE INTO TABLE persona_email
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

LOAD DATA INFILE 'C:/xampp/htdocs/colmena/fuentes de datos/estudiantes/colmena_persona_correo.csv'
REPLACE INTO TABLE persona_email
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';

SET FOREIGN_KEY_CHECKS = 1;