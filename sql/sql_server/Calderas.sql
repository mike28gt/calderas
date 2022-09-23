USE Calderas;

ALTER TABLE dbo.caldera3 ADD tempagua real;
ALTER TABLE dbo.caldera4 ADD tempagua real;

ALTER TABLE dbo.caldera1 ADD temchimenea real;
ALTER TABLE dbo.caldera2 ADD temchimenea real;
ALTER TABLE dbo.caldera3 ADD temchimenea real;
ALTER TABLE dbo.caldera4 ADD temchimenea real;

EXEC sp_rename 
@objname = 'dbo.caldera1.presionbunk', 
@newname = 'presionbunker', 
@objtype = 'COLUMN';

EXEC sp_rename 
@objname = 'dbo.caldera4.presionbunk', 
@newname = 'presionbunker', 
@objtype = 'COLUMN';

IF NOT EXISTS (SELECT 1
FROM sys.tables t 
JOIN sys.schemas s ON (t.schema_id = s.schema_id)
WHERE s.name = 'dbo'
  AND t.name = 'caldera')
    CREATE TABLE dbo.caldera (
        caldera_id          INT IDENTITY(1, 1) NOT NULL,
        nombre              VARCHAR(50) NOT NULL,
        nombre_pretty       VARCHAR(100) DEFAULT NULL,
        tabla_datos         VARCHAR(100) DEFAULT NULL,
        activo_p            CHAR(1) DEFAULT 't',
        fecha_grabacion     SMALLDATETIME DEFAULT GETDATE(),
        fecha_actualizacion SMALLDATETIME DEFAULT NULL,
        CONSTRAINT PK_caldera PRIMARY KEY CLUSTERED (caldera_id)
    );


IF NOT EXISTS (SELECT 1
FROM sys.tables t 
JOIN sys.schemas s ON (t.schema_id = s.schema_id)
WHERE s.name = 'dbo'
  AND t.name = 'medicion')
    CREATE TABLE dbo.medicion (
        medicion_id         INT IDENTITY(1,1) NOT NULL,
        nombre              VARCHAR(25) NOT NULL,
        nombre_pretty       VARCHAR(50) DEFAULT NULL,
        activo_p            CHAR(1) DEFAULT 't',
        fecha_grabacion     SMALLDATETIME NOT NULL DEFAULT GETDATE(),
        fecha_actualizacion SMALLDATETIME DEFAULT NULL,
        CONSTRAINT PK_medicion PRIMARY KEY CLUSTERED (medicion_id)
    );


IF NOT EXISTS (SELECT 1
FROM sys.tables t 
JOIN sys.schemas s ON (t.schema_id = s.schema_id)
WHERE s.name = 'dbo'
  AND t.name = 'parametro_medicion')
    CREATE TABLE dbo.parametro_medicion (
        parametro_medicion_id   INT IDENTITY(1,1) NOT NULL,
        medicion_id             INT NOT NULL,
        nombre                  VARCHAR(25) NOT NULL,
        nombre_pretty           VARCHAR(50) DEFAULT NULL,
        tipo_dato               VARCHAR(50) DEFAULT NULL,
        activo_p                CHAR(1) DEFAULT 't',
        fecha_grabacion         SMALLDATETIME DEFAULT GETDATE(),
        fecha_actualizacion     SMALLDATETIME DEFAULT NULL,
        CONSTRAINT PK_parametro_medicion PRIMARY KEY CLUSTERED (parametro_medicion_id),
        CONSTRAINT FK_parametro_medicion_medicion FOREIGN KEY (medicion_id)
        REFERENCES medicion (medicion_id)
    );



IF NOT EXISTS (SELECT 1
FROM sys.tables t 
JOIN sys.schemas s ON (t.schema_id = s.schema_id)
WHERE s.name = 'dbo'
  AND t.name = 'caldera_medicion')
    CREATE TABLE dbo.caldera_medicion (
        caldera_medicion_id INT IDENTITY(1,1) NOT NULL,
        caldera_id          INT NOT NULL,
        medicion_id         INT NOT NULL,
        fecha_grabacion     SMALLDATETIME DEFAULT GETDATE()
        CONSTRAINT PK_caldera_medicion PRIMARY KEY CLUSTERED (caldera_medicion_id),
        CONSTRAINT FK_caldera_medicion_caldera FOREIGN KEY (caldera_id)
        REFERENCES caldera (caldera_id),
        CONSTRAINT FK_caldera_medicion_medicion FOREIGN KEY (medicion_id)
        REFERENCES medicion (medicion_id),
        CONSTRAINT UNQ_caldera_medicion_unique UNIQUE (caldera_id,medicion_id)
    );



IF NOT EXISTS (SELECT 1
FROM sys.tables t 
JOIN sys.schemas s ON (t.schema_id = s.schema_id)
WHERE s.name = 'dbo'
  AND t.name = 'configuracion_parametro_medicion_caldera')
    CREATE TABLE dbo.configuracion_parametro_medicion_caldera (
        caldera_medicion_id     INT NOT NULL,
        parametro_medicion_id   INT NOT NULL,
        valor                   VARCHAR(10) DEFAULT NULL,
        fecha_grabacion         SMALLDATETIME DEFAULT GETDATE(),
        fecha_actualizacion     SMALLDATETIME DEFAULT NULL,
        CONSTRAINT FK_conf_par_med_cal_cal_med FOREIGN KEY (caldera_medicion_id)
        REFERENCES caldera_medicion (caldera_medicion_id),
        CONSTRAINT FK_con_par_med_cal_med FOREIGN KEY (parametro_medicion_id)
        REFERENCES parametro_medicion (parametro_medicion_id)
    );