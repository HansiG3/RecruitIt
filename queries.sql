create database recruitit;

use recruitit;

create table admin (
	admin_id int primary key auto_increment,
    username varchar(100),
    email varchar(100) unique,
    password varchar(255)
);

create table user (
	user_id int primary key auto_increment,
    username varchar(100),
    email varchar(100) unique,
    password varchar(255),
    role enum("job_seeker", "employer")
);

create table employer (
	employer_id int primary key auto_increment,
    user_id int,
    company_name varchar(100),
    industry varchar(100),
    location varchar(100),
    foreign key(user_id) references user(user_id)
);

create table job_seeker (
	job_seeker_id int primary key auto_increment,
    user_id int,
    experience int,
    skill1 varchar(100),
    skill2 varchar(100),
    skill3 varchar(100),
    skill4 varchar(100),
    skill5 varchar(100),
    foreign key(user_id) references user(user_id)
);

create table job_listing (
	job_id int primary key auto_increment,
    employer_id int,
    title varchar(100),
    description text,
    location varchar(100),
    job_type enum("full_time", "part_time", "contract", "internship"),
    salary decimal(10, 2),
    posting_date date,
    foreign key(employer_id) references employer(employer_id)
);

create table application (
	application_id int primary key auto_increment,
    job_id int,
	job_seeker_id int,
    application_date date,
    status enum("pending", "reviewed", "interviewed", "accepted", "rejected"),
    foreign key(job_id) references job_listing(job_id),
    foreign key(job_seeker_id) references job_seeker(job_seeker_id)
);

show tables;

describe admin;

describe application;

describe employer;

describe job_listing;

describe job_seeker;

describe user;
