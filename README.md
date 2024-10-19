
Book Rental System (BRS)
========================

Project Overview
----------------
The Book Rental System (BRS) is a Laravel-based web application that allows users to interact with a digital library. The system provides functionality for both anonymous and authenticated users, with different roles and permissions for readers and librarians. Readers can browse, borrow, and view details of books, while librarians manage the collection and handle rental requests.

This project is built using Laravel's powerful MVC framework, SQLite for database management, and Bootstrap for a responsive and user-friendly design.

Key Features
------------
Anonymous Users:
- Search Books: Search by author or title.
- Browse by Genre: View a list of books categorized by genres.
- Book Details: View information like title, author, release date, and available stock.

Reader Functions (Authenticated Users):
- Borrow Books: Submit a request to borrow books that are available in stock.
- View Rentals: View active and past book rentals with detailed information.
- Track Rental Status: Monitor rental request statuses (pending, accepted, rejected, returned).

Librarian Functions:
- Manage Books: Add, edit, or delete books.
- Manage Genres: Organize books into genres by adding, editing, or deleting genres.
- Manage Rentals: Oversee rental requests, approve or reject requests, and set deadlines for book returns.
- Update Rental Status: Update rental status and manage returns.

Technology Stack

	•	Backend Framework: Laravel (PHP)
	•	Database: SQLite
	•	Frontend: Blade templating with Bootstrap CSS for responsive design
	•	Authentication: Laravel’s built-in authentication system
	•	Seeder: Faker for generating sample data
	•	Version Control: Git

Setup Instructions
------------------
1. Clone the Repository:
   ```
   git clone https://github.com/your-username/book-rental-system.git
   cd book-rental-system
   ```

2. Install PHP Dependencies:
   ```
   composer install
   ```

3. Install JavaScript Dependencies:
   ```
   npm install
   ```

4. Compile Frontend Assets:
   ```
   npm run prod
   ```

5. Configure Environment Variables:
   Copy the .env.example file to create your own .env file:
   ```
   cp .env.example .env
   ```

6. Set Up the SQLite Database:
   ```
   touch database/database.sqlite
   ```

7. Run Migrations and Seed the Database:
   ```
   php artisan migrate:fresh --seed
   ```

8. Start the Laravel Development Server:
   ```
   php artisan serve
   ```

9. Access the Application:
   Visit http://localhost:8000 in your browser.

Sample Credentials
------------------
- Reader Account:
  - Email: reader@brs.com
  - Password: password!
- Librarian Account:
  - Email: librarian@brs.com
  - Password: password!


Testing
-------
Run tests with:
```
php artisan test
```

Future Improvements
-------------------
- User Notifications: Automatic emails for due dates and status updates.
- Advanced Search: Filters like genre, language, and year.
- Reporting Tools: Admin dashboard for rental statistics.
