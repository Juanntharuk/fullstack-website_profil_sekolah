# 📘 Fullstack School Profile Website – SMP Negeri Alok Maumere  
_Academic & Non-Academic Information System with WhatsApp Gateway Notification_

## 📍 Overview  
This project is a fullstack School Profile Website developed for **SMP Negeri Alok Maumere** as part of a **Field Internship (Kerja Praktek)** case study.  
It serves as a centralized digital platform providing **academic and non-academic information** to students, parents, teachers, and the public.

A standout feature of this website is the integration of a **WhatsApp Gateway Notification System**, developed using **Fonnte.com REST API**, allowing automatic one-way notifications regarding school activities.

## 🎯 Purpose  
✅ To provide a modern, user-friendly school information system.  
✅ To digitalize academic & non-academic updates.  
✅ To enhance communication efficiency using **automated WhatsApp notifications**.  
✅ To fulfill academic requirements in the **Informatics Engineering internship program**.

## ✨ Key Features  
| Feature | Description |
|--------|------------|
| 🏫 School Identity | Vision, Mission, History, Principal Profile |
| 👨‍🏫 Teacher Data | Teacher name, role, social media, and contact |
| 📰 News & Announcements | Latest academic & non-academic updates |
| 📷 Gallery | Event and school documentation (photo-based) |
| 📲 WhatsApp Notification | Auto-notification to parents/students via WA Gateway |

## 🛠️ Tech Stack  
| Category | Tools |
|----------|--------|
| Backend | PHP – CodeIgniter 3 |
| Frontend | JavaScript, Bootstrap, WOW.js, Animate.css |
| Database | MySQL |
| Development Server | XAMPP (Localhost) |
| Notification API | Fonnte.com (WhatsApp Gateway) |

## 📂 Project Structure (Simplified)
/application
├── controllers
├── models
├── views
/assets
|── css
|── js
|── images
/database
└── web_alok1.sql

## 🚀 Installation & Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo-link.git
   cd project-folder
2. Import the database file:

	-Open phpMyAdmin

	-Create database (e.g. smp_alok)

	-Import file: /database/web_alok1.sql

3. Set Base URL in application/config/config.php

4. Configure database in application/config/database.php

5. Run on local server:

	-Start XAMPP (Apache & MySQL)

	-Access via http://localhost/smp_alok

📡 WhatsApp Notification System

   The system integrates with Fonnte.com using REST API to send automated school notifications.
✅    -One-way communication (admin → parents/students)
✅    -Group or personal modes supported
✅    -Custom message input via UI (not hardcoded)

👤 Author

Juan Tharuk
Informatics Student | Fullstack Web Developer (Intern)
📍 SMP Negeri Alok Maumere – Internship Project

📜 License

This project is developed for educational and internship purposes. Redistribution is restricted unless permitted.




## Branch Workflow

This repository uses the following branch workflow:

- **main**  
  The main branch. Always stable and ready for deployment. All tested features are merged into `main`.

- **development**  
  The development branch. All new features or fixes are developed here before being merged into `main`.  
  Developers should create **feature branches** from `development` for specific features.

- **Feature Branches (optional)**  
  For example, `feature-login`, `feature-navbar`, etc.  
  Used to develop specific features, then create Pull Requests to merge back into `development`.

### Short Workflow

1. Checkout the `development` branch to start working:
   ```bash
   git checkout development



