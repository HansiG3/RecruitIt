# Recruit-It Job Portal System

### Overview

Recruit-It is a web-based job portal that connects job seekers with potential employers. It provides a platform where users can create profiles, search for jobs, apply for positions, and manage job applications. Employers can post job listings, review applications, and manage job postings, streamlining the hiring process.

### Features

- **Job Seekers:**
  - Create and update profiles (including resumes, skills, etc.)
  - Search and apply for jobs
  - Manage job applications

- **Employers:**
  - Post, edit, and delete job listings
  - Review applications and shortlist candidates
  - Manage job postings

- **Admin:**
  - Manage users (job seekers and employers)
  - Oversee job postings
  - Handle system settings

### Functional Requirements

- **User Authentication:** Registration, login, and account management for both job seekers and employers.
- **Job Listings:** Employers can post, edit, and delete listings; job seekers can search and apply.
- **Application Management:** Job seekers manage their applications, while employers handle candidate applications.
- **Profile Management:** Users can update personal information, resumes and skills.
- **Search and Filter:** Jobs can be searched and filtered based on location, job type, salary, and more.
- **Notifications:** Users receive updates on job statuses and application responses.

### Non-Functional Requirements

- **Performance:** Efficient handling of concurrent users with fast response times.
- **Scalability:** Designed to scale with increasing numbers of users and job listings.
- **Security:** Data protection via encryption and secure authentication.
- **Usability:** A user-friendly interface accessible across multiple devices.

### Database Design

- **Entities:**
  - Users (UserID, Name, Email, Role)
  - Job Seekers (UserID, Resume, Skills, Experience)
  - Employers (UserID, CompanyName, Industry, Location)
  - Job Listings (JobID, EmployerID, Title, Description, Location, Salary, JobType, PostingDate)
  - Applications (ApplicationID, JobID, JobSeekerID, ApplicationDate, Status)
  - Admin (AdminID, Name, Email)

- **Relationships:**
  - Many-to-many between Job Seekers and Job Listings
  - One-to-many between Employers and Job Listings
  - Admins manage both users and job postings

### Technologies

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, SQL for database management
- **Database:** MySQL/PostgreSQL (RDBMS)
- **Hosting:** Cloud platforms (AWS/Azure) or traditional web hosting services

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/KartikAg13/RecruitIt.git
