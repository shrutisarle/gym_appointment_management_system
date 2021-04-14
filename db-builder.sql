CREATE DATABASE GymAppointmentMgmt;
use GymAppointmentMgmt;

CREATE TABLE Client (cid int NOT NULL, name varchar(255), email varchar(255), password varchar(255), phone BIGINT, birthdate DATE, gender varchar(255), height INT, weight INT, health_conditions LONGTEXT, emergency_name varchar(255), emergency_phone BIGINT, PRIMARY KEY (cid));

INSERT INTO Client VALUES (1, 'John', 'john0195@gmail.com', '123456', 9999988888, '2000/01/01', 'Male', 180, 80, 'Knee pain', 'Doe', 8888877777);

CREATE TABLE Trainer (tid int NOT NULL, name varchar(255), email varchar(255), password varchar(255), phone BIGINT, PRIMARY KEY (tid));

INSERT INTO Trainer VALUES (1, 'Tony', 'tonystark@gmail.com', '987654', 1234588888);

CREATE TABLE Appointments(client_id int NOT NULL, trainer_id int NOT NULL, date DATE, time TIME, PRIMARY KEY (client_id, trainer_id), FOREIGN KEY (client_id) REFERENCES Client(cid), FOREIGN KEY (trainer_id) REFERENCES Trainer(tid));

INSERT INTO Appointments VALUES (1, 1, '2000/01/01', '10:00:00');

CREATE TABLE Facilities (fid int NOT NULL, type varchar(255), PRIMARY KEY (fid));

INSERT INTO Facilities VALUES (1, 'Locker room');
INSERT INTO Facilities VALUES (2, 'Sauna');
INSERT INTO Facilities VALUES (3, 'Basketball');
INSERT INTO Facilities VALUES (4, 'Table tennis');
INSERT INTO Facilities VALUES (5, 'Bowling');
INSERT INTO Facilities VALUES (6, 'Climbing');

CREATE TABLE Specialization (sid int NOT NULL, type varchar(255), PRIMARY KEY (sid));

INSERT INTO Specialization VALUES (1, 'Strength training');
INSERT INTO Specialization VALUES (2, 'Calisthenics');
INSERT INTO Specialization VALUES (3, 'Cardio');
INSERT INTO Specialization VALUES (4, 'Swimming');
INSERT INTO Specialization VALUES (5, 'Yoga');
INSERT INTO Specialization VALUES (6, 'Zumba');
INSERT INTO Specialization VALUES (7, 'Tennis');
INSERT INTO Specialization VALUES (8, 'Boxing');

CREATE TABLE OptedFor(client_id int NOT NULL, facility_id int NOT NULL, PRIMARY KEY (client_id, facility_id), FOREIGN KEY (client_id) REFERENCES Client(cid), FOREIGN KEY (facility_id) REFERENCES Facilities(fid));

INSERT INTO OptedFor VALUES (1, 1);
INSERT INTO OptedFor VALUES (1, 3);
INSERT INTO OptedFor VALUES (1, 5);

CREATE TABLE SpecializesIn(trainer_id int NOT NULL, specialization_id int NOT NULL, PRIMARY KEY (trainer_id, specialization_id), FOREIGN KEY (trainer_id) REFERENCES Trainer(tid), FOREIGN KEY (specialization_id) REFERENCES Specialization(sid));

INSERT INTO SpecializesIn VALUES (1, 1);
INSERT INTO SpecializesIn VALUES (1, 3);
INSERT INTO SpecializesIn VALUES (1, 5);