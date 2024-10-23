# Duty Management System for Graphic Unit - NAICC

## Overview
The Duty Management System is designed to streamline and manage the duties and tasks of the Graphic Unit at NAICC. This system allows users to efficiently track, assign, and monitor duties within the unit, enhancing productivity and ensuring timely completion of tasks.

## Features
- **User Authentication**: Secure login and registration for users.
- **Duty Assignment**: Assign duties to team members with deadlines.
- **Task Tracking**: Monitor the progress of assigned duties.
- **Notifications**: Automated alerts for upcoming deadlines and task updates.
- **Responsive Design**: User-friendly interface built with Bootstrap, ensuring compatibility across devices.

## Technologies Used
- **Laravel**: PHP framework for backend development.
- **HTML/CSS**: Markup and styling for frontend development.
- **Bootstrap**: Frontend framework for responsive design.
- **MySQL**: Database for storing user and duty data.

## Prerequisites
Before running this project, ensure you have the following installed:
- [PHP](https://www.php.net/downloads) (>= 7.3)
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs/9.x/installation)
- [MySQL](https://dev.mysql.com/downloads/)
- A web server (e.g., Apache or Nginx)

## Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/duty-management-system.git
cd duty-management-system
2. Install Dependencies
Run the following command to install the project dependencies:

bash
Copy code
composer install
3. Configure Environment Variables
Duplicate the .env.example file and rename it to .env. Then, configure your database settings:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=duty_management
DB_USERNAME=your-username
DB_PASSWORD=your-password
4. Generate Application Key
Generate a unique application key by running:

bash
Copy code
php artisan key:generate
5. Run Migrations
Run the following command to create the necessary database tables:

bash
Copy code
php artisan migrate
6. Start the Development Server
You can start the built-in Laravel development server using:

bash
Copy code
php artisan serve
The application will be available at http://localhost:8000.

Usage
Access the application through the browser at http://localhost:8000.
Register a new account or log in with existing credentials.
Navigate through the dashboard to manage duties, view notifications, and track task progress.
Directory Structure
The key directories in this project include:

app/: Contains the core application code.
resources/views/: Contains the Blade templates for frontend views.
public/: Contains publicly accessible files like stylesheets and scripts.
database/migrations/: Contains migration files for database schema.
Running Tests
To run the tests included in the project, use the following command:

bash
Copy code
php artisan test
Contributing
If you would like to contribute to this project, please fork the repository and submit a pull request. Ensure that all tests pass and that the code is well-documented.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Author
Mohammed Naseek
GitHub
