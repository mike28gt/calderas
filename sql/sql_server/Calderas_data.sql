USE Calderas;


INSERT INTO dbo.caldera (nombre, nombre_pretty, tabla_datos) VALUES
('1', 'Caldera 1', 'dbo.caldera1'),
('2', 'Caldera 2', 'dbo.caldera2'),
('3', 'Caldera 3', 'dbo.caldera3'),
('4', 'Caldera 4', 'dbo.caldera4');



INSERT INTO dbo.medicion (nombre, nombre_pretty) VALUES
('temp_agua', 'Temperatura de Agua'),
('presion_vapor', 'Presión de Vapor'),
('nivel_agua', 'Nivel de Agua'),
('temp_chimenea', 'Temperatura de Chimenea'),
('presion_bunker', 'Presión de Bunker'),
('gas_propano', 'Gas Propano'),
('flama', 'Flama');



INSERT INTO dbo.parametro_medicion (medicion_id, nombre, nombre_pretty, tipo_dato) VALUES
(1, 'temp_max', 'Temperatura Máxima', 'REAL'),
(1, 'temp_min', 'Temperatura Mínima', 'REAL'),
(4, 'temp_max', 'Temperatura Máxima', 'REAL'),
(4, 'temp_min', 'Temperatura Mínima', 'REAL');



INSERT INTO dbo.caldera_medicion (caldera_id, medicion_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7);
