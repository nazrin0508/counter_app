# Counter App – PHP & MySQL with AJAX

## 📖 Project Overview
This is a simple counter web application built using **PHP, MySQL, JavaScript (AJAX), and Bootstrap**.  
It allows a user to increment, decrement, or reset a counter value. The counter value is stored in a MySQL database so that it persists across sessions.

---

## 🚀 Features
- ➕ Increment counter by 1  
- ➖ Decrement counter by 1 (does not go below 0)  
- 🔄 Reset counter to 0  
- 💾 Counter value is saved in MySQL for persistence  
- ⚡ Updates happen instantly using AJAX (no page reload)  
- 📱 Responsive UI using Bootstrap  

---

## ⚙️ Requirements
- XAMPP / WAMP / MAMP (for PHP & MySQL)  
- PHP 7.4+  
- MySQL 5.7+  
- Web browser (Chrome, Firefox, Edge, etc.)  

---

## 📂 Project Structure
counter_app/
│── index.php
│── update_counter.php
│── dbconn.php
│── counter_db.sql
│── README.md
│── assets/
    └── css/
        └── style.css


---

## 🛠️ Installation & Setup

1. **Clone this repository**
   ```bash
   git clone https://github.com/your-username/counter_app.git
2. Import database
  * Open phpMyAdmin or MySQL terminal
  * Run:
   mysql -u root -p < counter_db.sql
4. Configure database connection
  * Open dbconn.php
  * Update with your MySQL credentials:
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "counter_db";
4. Run the project
  * Place the counter_app folder in htdocs/ (XAMPP) or www/ (WAMP).
  * Start Apache & MySQL from your control panel.
  * Open your browser and go to:
    http://localhost/counter_app/

##  📊 Database Schema

  CREATE DATABASE IF NOT EXISTS counter_db;
  USE counter_db;
  
  CREATE TABLE IF NOT EXISTS counter (
      id INT PRIMARY KEY,
      value INT DEFAULT 0
  );
  
  INSERT INTO counter (id, value) VALUES (1, 0)
  ON DUPLICATE KEY UPDATE value = value;

👨‍💻 Author

Nazrin
Lead Web Developer, Sigma e Solution Pvt Ltd

📜 License

This project is for educational purposes only.
