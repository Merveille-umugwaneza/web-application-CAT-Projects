📘 Web Development Project – README
📖 Overview
This repository contains four web development projects designed to demonstrate proficiency in HTML, CSS, JavaScript, and PHP. Each project builds on core web development concepts, ranging from static page replication to dynamic database-driven applications.

📂 Project Structure
Project One – Page Replication
Goal: Create a webpage that looks exactly the same as a given reference page.

Technologies Used:

HTML for structure

CSS for styling (using classes and divisions)

Key Deliverables:

Pixel-perfect replication of layout, typography, and design.

Proper use of semantic HTML and CSS selectors.

Project Two – Form with Database Connection
Goal: Build a form connected to a database with dropdowns for dates and countries.

Technologies Used:

HTML for form structure

CSS for styling

PHP for backend processing

MySQL for database storage

Form Fields:

Full Name

Email

Phone

Dropdown for Date

Dropdown for Country

Features:

Data validation

Insert form data into database

Confirmation message after successful submission

Project Three – Hotel Website
Goal: Create a fully functional hotel website with six pages.

Technologies Used:

HTML, CSS, JavaScript for frontend

PHP & MySQL for backend and database integration

Pages Included
Home – Introduction and welcome message

About Us – Hotel background and services

Menu – Food and drinks displayed in an HTML table

Order – Online order form connected to database

Gallery – At least 5 food/drink images, each linking to the order page

Contact Us – Contact form connected to database

Key Features
Menu Page:

Uses HTML table to present items (Fish, Drinks, Fresh Juice, etc.).

Gallery Page:

Displays images of food and drinks.

Each image redirects to the Order page.

Order Page:

Form fields: Full Name, Email, Phone, Select Menu, Address, Date.

PHP script inserts customer orders into database.

Login System:

Customers can log in to view their order information.

Logout link provided.

Contact Us Page:

Form fields: Full Name, Email, Phone, Location, Message.

PHP script inserts messages into database.

Project Four – Currency Converter
Goal: Build a simple currency converter using JavaScript.

Technologies Used:

HTML for input fields

CSS for styling

JavaScript for conversion logic

Features
Input field for entering amount

Dropdown for selecting currency type (e.g., FRW, USD)

Input field for currency rate

Output field to display converted amount

⚙️ Installation & Setup
Clone the Repository:

bash
git clone https://github.com/yourusername/web-development-project.git
cd web-development-project
Database Setup:

Create a MySQL database named hotel_db.

Import the provided SQL script (database.sql) to create tables:

orders

users

contacts

Run the Project:

Place files in your local server directory (e.g., htdocs for XAMPP).

Start Apache and MySQL services.

Access the project via http://localhost/project-folder.

📑 Database Schema (Sample)
sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100),
  password VARCHAR(100)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  menu VARCHAR(50),
  address VARCHAR(200),
  date DATE
);

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  location VARCHAR(100),
  message TEXT
);
🚀 Features Summary
Project One: Static page replication.

Project Two: Form submission with dropdowns and database connection.

Project Three: Full hotel website with menu, gallery, order system, login/logout, and contact form.

Project Four: JavaScript-based currency converter.

🛠️ Technologies Used
Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Server: Apache (XAMPP/WAMP recommended)

👨‍💻 Author
Web Development Student Project  
Prepared by: [Your Name]  
Date: April 2026
