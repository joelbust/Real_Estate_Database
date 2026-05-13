# Real Estate Database System

A database-driven real estate management web application built using PHP, SQL, HTML, and CSS. The project provides an interface for managing real estate data including agents, buyers, property listings, and database queries through a browser-based system.

---

## Overview

This project was developed to demonstrate relational database design, SQL integration, and backend web application development. The system connects a PHP frontend to a MySQL database and allows users to interact with structured real estate data through multiple application pages.

The application includes functionality for managing:
- Property listings
- Agents
- Buyers
- Database queries and results

---

## Features

- Relational database design for real estate management
- PHP and MySQL integration
- Property listing management
- Agent and buyer data handling
- SQL query execution and result visualization
- Multi-page web application structure

---

## Technologies Used

- PHP
- MySQL
- SQL
- HTML
- CSS
- XAMPP / Local Apache Server

---

## Project Structure

```text
Real_Estate_Database-main/
│
├── DatabasesProject/
│   ├── real_estate_project/
│   │   ├── agents.php
│   │   ├── buyers.php
│   │   ├── listings.php
│   │   ├── query.php
│   │   ├── query_result.php
│   │   ├── db_connect.php
│   │   ├── functions.php
│   │   ├── index.php
│   │   ├── real_estate_db_setup.sql
│   │   └── script.sql
│   │
│   ├── ER Diagram.pdf
│   ├── Script_Query_results.pdf
│   ├── Script_Query_results.png
│   └── Website Interface Specifications.pdf
│
└── README.md
```

---

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/joelbust/Real_Estate_Database.git
```

### 2. Move Project into Server Directory

Place the `real_estate_project` folder inside your local server directory (such as `htdocs` if using XAMPP).

Example:

```text
xampp/htdocs/real_estate_project
```

### 3. Start Apache and MySQL

Use XAMPP or another local development environment to start:
- Apache
- MySQL

### 4. Create the Database

Import the SQL setup file:

```text
real_estate_db_setup.sql
```

into MySQL/phpMyAdmin.

### 5. Run the Application

Open the browser and navigate to:

```text
http://localhost/real_estate_project
```

---

## Technical Highlights

- Designed a relational database schema for a real estate management system
- Implemented backend functionality using PHP and MySQL
- Created modular PHP pages for managing agents, buyers, and listings
- Utilized SQL scripts for database setup and query execution
- Applied database concepts including relationships, structured queries, and data organization

---

## Included Documentation

The repository also contains:
- ER Diagram documentation
- Query result examples
- Website interface specifications

These files demonstrate the database structure and application design process.

---

## Future Improvements

- Add user authentication and authorization
- Improve UI styling and responsiveness
- Add search and filtering functionality
- Implement CRUD forms with validation
- Add property image uploads
- Deploy the application online

---

## Author

Joel Bustamante

- Portfolio: https://joelbust.xyz
- GitHub: https://github.com/joelbust
