# 🌍 ODS Challenge – Sustainable Urban Gymkhanas

## 📖 Project Overview
**ODS Challenge** is a web application designed to organize and manage sustainable gymkhanas (urban or educational scavenger hunts) inspired by the **United Nations Sustainable Development Goals (SDGs)**. The project combines **education, gamification, and sustainability**, encouraging participants to explore real-world challenges such as climate change, gender equality, and responsible consumption through interactive routes and tasks.

This implementation was developed by **RobertGP** as part of the **DAW2 Web Application Development** program. It follows the **MVC architecture** using **PHP (Emeset framework)**, **MySQL**, and **Docker** for deployment.

## 🚀 Main Features

### Public Area (No Registration)
- View active gymkhanas.
- Display interactive maps (Leaflet) showing general routes.
- Access educational content about the 17 SDGs.
- View the site's carbon footprint and sustainability page.

### Registered Participants
- User registration and login (profile image support).
- Join gymkhanas and access geolocated challenges on an interactive map.
- Complete tasks (text, image, or quiz), upload proof images, and track scores.
- Rate gymkhanas (1–5 stars) and comment (comments are moderated by admin).
- View final rankings after gymkhana completion.

### Organizers / Administrators
- Create, edit, and delete gymkhanas and their challenges (with lat/long points).
- Define challenge types (textual, image, quiz) and automatic validation rules.
- Manage users, comments, and ratings; moderate content.
- Generate PDF reports for gymkhanas and export events as ICS files.
- Edit SDG content using a WYSIWYG editor (the 17 ODS entries are fixed).

## 💾 Data Model (high level)
- **Gymkhana:** title, description, image, start/end dates, status (active/finished/deleted).
- **Challenges:** gymkhana ID, title, latitude/longitude, type, expected answer, points.
- **Participants:** personal data, enrolled gymkhanas, solved challenges, score.
- **Comments:** gymkhana ID, text, status (pending/published).

## ⚙️ Technical Stack

### Frontend
- jQuery and jQuery UI for UI behavior.
- Leaflet for maps and geolocation.
- Bootstrap for responsive, accessible design (WCAG AA target).
- JS sliders and visual effects; cookie policy and use of free images.
- PDF generation in-browser or server-side for reports.

### Backend
- MVC pattern with **Emeset** PHP framework.
- Middleware for restricted routes and role-based access.
- CRUD operations for gymkhanas, challenges, users, comments.
- Automatic validation and scoring for challenges.
- ICS calendar export, PDF report generation, and WYSIWYG content editing.

## 🐳 Deployment & Version Control
- Git with a manual **GitFlow** branching methodology.
- Shared repository hosted on **GitHub**.
- Includes a database initialization script for easy setup.
- Docker image that bundles the web server and project (published to DockerHub).
  - Commands to build the image and start containers are documented in the repo.
  - Containers are started without Docker Compose (manual `docker` commands).
- Final deployment via FTP to **Dinahosting** (as required by the course).

## 🌱 Sustainability Considerations
- `carbon.txt` contains the URL to the sustainability page with an estimated carbon footprint (using an external analysis tool).
- SDG content and demonstration challenges are evaluated for the sustainability module.
- Accessibility and performance optimizations were considered to reduce resource usage.

## 🧩 Additional Project Files
- **`carbon.txt`** – URL of the sustainability page.  
- **Database init script** – SQL script to create and seed the database.  
- **Dockerfile** – Instructions to build the Docker image.  
- **Docs/** – Additional documentation and the project PDF brief.

## 🧠 Learning Goals
- Apply MVC architecture and PHP frameworks in a real project.  
- Integrate geolocation and mapping with Leaflet.  
- Implement user roles, authentication, and content moderation.  
- Containerize the application with Docker and document deployment.  
- Incorporate sustainability and accessibility into a web product.

## 🧑‍💻 Author
**RobertGP** — Developed as part of the DAW2 project.  

---
