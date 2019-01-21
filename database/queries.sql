--amount of dependents for x employee using id
SELECT COUNT(*) AS total FROM dependents WHERE em_id = :em_id;

--amount of dependents for x employee that starts w/ 'a'
SELECT COUNT(*) AS total FROM dependents WHERE em_id = :em_id 
AND dep_first_name LIKE 'a%';

--employees that start with 'a'
SELECT em_id FROM employees WHERE em_first_name LIKE 'a%'
								AND em_id = :em_id

--get employee using their ID
SELECT em_first_name, em_last_name FROM employees WHERE em_id = :em_id;

--add employees
INSERT INTO employees (em_first_name, em_last_name) VALUES(:em_first_name, :em_last_name);

--add dependents
INSERT INTO dependents (dep_first_name, dep_last_name, em_id) 
VALUES(:em_first_name, :em_last_name, :em_id);
