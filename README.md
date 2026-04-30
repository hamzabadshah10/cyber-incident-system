# AI-Assisted Cyber Incident Reporting and Threat Alert System

## Course Title: COMP-351 Web Engineering
**Activity:** Complex Computing Problem (CCP)

---

## 1. Application Functional Requirements
1. **User Role Management:** The system must support 'Employee' (reporter) and 'Administrator' (security team) roles.
2. **Incident Reporting:** Employees must be able to report cyber incidents, providing details like incident type, description, and affected systems.
3. **Incident Tracking:** Employees can view the real-time status of their reported incidents (e.g., Pending, Investigating, Resolved).
4. **AI Threat Assessment Simulation:** Upon submission, an AI module (or a simulated keyword-based assessment algorithm) must analyze the incident description and assign a "Severity Score" (Low, Medium, High).
5. **Real-time Threat Alerts:** Administrators must receive live alerts asynchronously on their dashboard whenever a new High-severity incident is logged, without refreshing the page.
6. **Incident Management:** Administrators must be able to view all incidents and update their statuses dynamically.

## 2. Application Non-Functional Requirements
1. **Security:** 
   - Protection against SQL Injection using Prepared Statements (PDO).
   - Protection against XSS through strict input sanitization and output encoding.
   - Use of secure sessions for authentication.
2. **Asynchronous Architecture:** All data fetching and submission must be done via AJAX to ensure a responsive, non-blocking UI.
3. **Performance:** The system should process and respond to AJAX requests in less than 2 seconds.
4. **Reliability:** Data must persist in a relational MySQL database, ensuring ACID compliance.
5. **Usability:** The web interfaces must be intuitive and accessible for non-technical employees.

## 3. Application Architecture (Client–Server + DB)
The application follows a standard **3-Tier Web Architecture**:
- **Presentation Layer (Client):** Built with HTML5, Vanilla CSS, and JavaScript. It utilizes the `Fetch API` for asynchronous AJAX communication.
- **Application Layer (Server):** Built with PHP. It acts as a RESTful API backend, handling business logic, database interactions, input validation, and AI severity calculation.
- **Data Layer (Database):** Built with MySQL. It maintains tables for Users and Incidents.

## 4. Message Types (AJAX Request Types)
The communication protocol uses HTTP methods mapped to the following endpoints:
- `POST /api/report_incident.php`: Submits a new incident report.
- `GET /api/get_incidents.php`: Retrieves incidents for the dashboard.
- `GET /api/poll_alerts.php`: Periodically queried by the Admin dashboard for real-time high-severity alerts (Short Polling).
- `POST /api/update_status.php`: Updates the resolution status of an incident.

## 5. Message Format (JSON)
All asynchronous communication strictly uses **JSON (JavaScript Object Notation)**.

**Example Client Request:**
```json
{
  "type": "Phishing",
  "description": "Received a suspicious email asking for my password."
}
```

**Example Server Response:**
```json
{
  "status": "success",
  "message": "Incident successfully recorded.",
  "data": {
    "severity": "High",
    "incident_id": 142
  }
}
```

## 6. Sequence Flow Diagram (Textual Description)
**Scenario: Employee Reports an Incident and Admin is Alerted**
1. **Employee (Client):** Fills out the form and clicks "Submit".
2. **Employee (Client):** JS intercepts the form, constructs a JSON payload, and sends a `POST` AJAX request.
3. **Server (PHP):** Validates input, passes description to the AI algorithm, which flags it as "High" severity due to keywords like "password".
4. **Database (MySQL):** PHP inserts the incident into the DB.
5. **Server (PHP):** Returns a JSON success response to the Employee.
6. **Admin (Client):** Meanwhile, the Admin dashboard runs a `setInterval` loop, sending `GET` requests to `poll_alerts.php` every 5 seconds.
7. **Server (PHP):** Checks the database for new "High" severity incidents.
8. **Server (PHP):** Returns the new incident as a JSON array.
9. **Admin (Client):** JS parses the JSON and dynamically renders a real-time red alert banner on the dashboard.

## 7. Developer Implementation Guidelines
- **Modern JavaScript:** Use the `fetch()` API with `async/await` syntax for clean asynchronous code. Avoid legacy `XMLHttpRequest`.
- **PHP API Design:** Read JSON request bodies using `json_decode(file_get_contents('php://input'), true)`. Always set `header('Content-Type: application/json')` before echoing output.
- **Database Security:** Use PHP Data Objects (PDO) with `$pdo->prepare()` and `$stmt->execute()` for all database queries. Never concatenate variables directly into SQL strings.
- **Polling:** Implement Short Polling carefully. Pass the `last_checked` timestamp to the server so the DB only queries for genuinely *new* incidents to save server load.

## 8. PHP, MySQL, AJAX Request–Response Examples

### MySQL Schema snippet
```sql
CREATE TABLE incidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50),
    description TEXT,
    severity VARCHAR(20),
    status ENUM('Pending', 'Investigating', 'Resolved') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### JS AJAX Snippet (Client-Side)
```javascript
async function reportIncident(data) {
    const response = await fetch('api/report_incident.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    console.log(result.message);
}
```

### PHP Snippet (Server-Side)
```php
<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['description'])) {
    // Simulated AI Check
    $severity = (stripos($data['description'], 'password') !== false) ? 'High' : 'Low';
    
    // DB Insert Logic Here...

    echo json_encode(["status" => "success", "severity" => $severity]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data"]);
}
?>
```
