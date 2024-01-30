CREATE TABLE company(
    id serial primary key,
    company_name varchar(30) NOT NULL,
    company_description varchar(500)
);

INSERT INTO company (company_name,company_description) VALUES ('Facebook','Facebook, American online social media platform and social network service that is part of the company Meta Platforms. Facebook was founded in 2004 by Mark Zuckerberg, Eduardo Saverin, Dustin Moskovitz, and Chris Hughes, all of whom were students at Harvard University.');
INSERT INTO company (company_name,company_description) VALUES ('Programmers Force','Programmers Force is Pakistans leading AI-based Firm whose products are being used in 150+ countries. We are a team of dedicated problem-solvers working to solve problems businesses face and provide the best-quality solutions!');
INSERT INTO company (company_name,company_description) VALUES ('Samsung','Samsung Electronics Co., Ltd. engages in the manufacturing and selling of electronics and computer peripherals. The company operates through the following business divisions: Consumer Electronics, Information Technology & Mobile Communications and Device Solutions.');

CREATE TABLE department(
    id serial primary key,
    deparmtment_name varchar(30) NOT NULL
);

INSERT INTO department (department_name) VALUES ('Human Resource');
INSERT INTO department (department_name) VALUES ('Procurement');
INSERT INTO department (department_name) VALUES ('Accounts');

CREATE TABLE employee(
    id serial primary key,
    employee_name varchar(30),
    department_id int references department(id)
);

INSERT INTO employee (employee_name,department_id) VALUES ('Hassan Asif',6);
INSERT INTO employee (employee_name,department_id) VALUES ('Asim Mukhtar',7);
INSERT INTO employee (employee_name,department_id) VALUES ('Zulfiqar Ali',8);

CREATE TABLE company_department(
    company_id int references company(id),
    department_id int references department(id)
);

INSERT INTO company_department (company_id,department_id) VALUES (5,6);
INSERT INTO company_department (company_id,department_id) VALUES (3,7);
INSERT INTO company_department (company_id,department_id) VALUES (4,8);

select * from company_department