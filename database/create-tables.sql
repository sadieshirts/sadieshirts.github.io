-- Drop table if it already exists so you can start fresh each time.
DROP TABLE IF EXISTS employees;
DROP TABLE IF EXISTS dependents;

-- Create an employees table.
CREATE TABLE `employees` (
	em_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
    em_first_name VARCHAR(50) NOT NULL,
    em_last_name VARCHAR(50) NOT NULL
);

-- Create a dependents table.
CREATE TABLE `dependents` (
    dep_id INT NOT NULL AUTO_INCREMENT,
    dep_first_name VARCHAR(50) NOT NULL,
    dep_last_name VARCHAR(50) NOT NULL,
    em_id INT,
    PRIMARY KEY (dep_id),
    FOREIGN KEY (em_id) REFERENCES employees(em_id)
);

-- Insert test data into employees. 
INSERT INTO employees (em_first_name, em_last_name) VALUES('Floria', 'Benjamin');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Gregg', 'Kelsch');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Jerica', 'Ricketts');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Jenae', 'Lahey');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Rhiannon', 'Reis');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Magdalene', 'Summerfield');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Nana', 'Dayton');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Jo', 'Carbonaro');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Arlette', 'Steiner');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Harry', 'Gramling');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Carline', 'Deitz');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Stacie', 'Allgeier');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Krystle', 'Kubota');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Ashlee', 'Larabee');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Sam', 'Siddall');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Jeromy', 'Forsman');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Ma', 'Cohee');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Danica', 'Vanhook');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Asa', 'Maliszewski');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Tesha', 'Danko');
INSERT INTO employees (em_first_name, em_last_name) VALUES('Art', 'Lozada');

-- Insert test data into dependents. 
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Leia', 'Benjamin', 1);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Hariet', 'Benjamin', 1);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Amy', 'Benjamin', 1);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Liz', 'Carbonaro', 71);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Al', 'Maliszewski', 181);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Billy', 'Smith', 111);
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) VALUES('Butch', 'Charlotte', 191);





