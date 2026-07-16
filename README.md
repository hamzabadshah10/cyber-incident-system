<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=200&section=header&text=Cyber%20Incident%20System&fontSize=60&fontColor=ffffff&animation=fadeIn&fontAlignY=38&desc=Web%20Engineering%20%7C%20AI%20Simulation%20%7C%20PHP&descAlignY=60&descAlign=50" width="100%"/>

<br/>

# 🚨 AI-Assisted Cyber Incident Reporting & Threat Alert System

### *A 3-tier web architecture for real-time cyber threat management.*

<br/>

[![PHP](https://img.shields.io/badge/PHP-%3E%3D%207.4-8892bf.svg?style=for-the-badge&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![HTML5](https://img.shields.io/badge/HTML5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)

<br/>

[![GitHub Stars](https://img.shields.io/github/stars/hamzabadshah10/cyber-incident-system?style=for-the-badge&logo=github&color=ffd700)](https://github.com/hamzabadshah10/cyber-incident-system/stargazers)
[![GitHub Forks](https://img.shields.io/github/forks/hamzabadshah10/cyber-incident-system?style=for-the-badge&logo=github&color=4fc3f7)](https://github.com/hamzabadshah10/cyber-incident-system/network)
[![GitHub Issues](https://img.shields.io/github/issues/hamzabadshah10/cyber-incident-system?style=for-the-badge&logo=github&color=ff7043)](https://github.com/hamzabadshah10/cyber-incident-system/issues)
[![License](https://img.shields.io/badge/License-MIT-22c55e?style=for-the-badge)](LICENSE)

</div>

---

## 👩‍💻 About This Repository

This project is an **AI-Assisted Cyber Incident Reporting and Threat Alert System**, developed as a Complex Computing Problem (CCP) for the COMP-351 Web Engineering course. The platform allows employees to report incidents, while an AI module simulates threat severity assessment and alerts administrators in real-time.

---

## 🚀 Key Functional Requirements

1. **User Role Management:** Supports 'Employee' (reporter) and 'Administrator' (security team) roles.
2. **Incident Reporting:** Employees can report cyber incidents detailing type, description, and affected systems.
3. **Incident Tracking:** Employees view real-time status updates (Pending, Investigating, Resolved).
4. **AI Threat Assessment:** An AI module (or simulated algorithm) analyzes incident descriptions and assigns a "Severity Score" (Low, Medium, High).
5. **Real-time Threat Alerts:** Administrators receive asynchronous, live alerts on their dashboard for new High-severity incidents.
6. **Incident Management:** Dynamic status updates and incident oversight for administrators.

---

## 🛡️ Non-Functional Requirements & Security

- **Security:** SQL Injection protection via Prepared Statements (PDO), strict XSS sanitization, and secure sessions.
- **Asynchronous Architecture:** 100% AJAX (Fetch API) communication for a non-blocking UI.
- **Performance:** Sub-2 second response times for asynchronous requests.
- **Reliability:** ACID compliant persistence via MySQL.
- **Usability:** Intuitive interfaces for non-technical users.

---

## 🏗 System Architecture (3-Tier)

- **Presentation Layer (Client):** HTML5, Vanilla CSS, JavaScript. Asynchronous AJAX communication.
- **Application Layer (Server):** PHP RESTful API backend handling business logic and AI severity calculation.
- **Data Layer (Database):** MySQL handling Users and Incidents tables.

### Message Types (AJAX API)
All communication is strictly **JSON**.
- `POST /api/report_incident.php`
- `GET /api/get_incidents.php`
- `GET /api/poll_alerts.php`
- `POST /api/update_status.php`

---

## 🧠 Skills & Technologies

<div align="center">

### Core Stack
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-323330?style=flat-square&logo=javascript&logoColor=F7DF1E)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)

### Concepts Covered
![Web Engineering](https://img.shields.io/badge/Web_Engineering-6f42c1?style=flat-square)
![AJAX](https://img.shields.io/badge/AJAX_/_REST-6f42c1?style=flat-square)
![Cybersecurity](https://img.shields.io/badge/Cybersecurity-6f42c1?style=flat-square)

</div>

---

## 🤝 Connect & Contribute

<div align="center">

[![GitHub Follow](https://img.shields.io/github/followers/hamzabadshah10?label=Follow%20on%20GitHub&style=for-the-badge&logo=github&color=181717)](https://github.com/hamzabadshah10)
[![Star Repo](https://img.shields.io/badge/⭐%20Star%20This%20Repo-ffd700?style=for-the-badge)](https://github.com/hamzabadshah10/cyber-incident-system/stargazers)
[![Fork Repo](https://img.shields.io/badge/🍴%20Fork%20This%20Repo-4fc3f7?style=for-the-badge)](https://github.com/hamzabadshah10/cyber-incident-system/fork)

</div>

Feel free to explore, fork, or reach out with any questions! If you found this repo helpful, please **⭐ star it** — it means a lot! 🙏

---

## 📄 License

Distributed under the **MIT License** — free to use, share, and adapt with attribution.

---

<div align="center">

### 👩‍💻 Author

**Hamza Badshah**
*Web Engineering, PAF-IAST*

[![GitHub](https://img.shields.io/badge/GitHub-hamzabadshah10-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/hamzabadshah10)

<br/>

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=100&section=footer" width="100%"/>

</div>
