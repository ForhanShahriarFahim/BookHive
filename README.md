
# Bookstore Management System

This is a simple Laravel project designed to manage a bookstore. The system allows you to add, view, update, delete, and search for books. It demonstrates basic CRUD (Create, Read, Update, Delete) operations and a search feature to filter books.

## Features
- **Add New Book**: Create and add a new book to the system.
- **View Book Details**: View detailed information about a book.
- **Update Book**: Edit the details of an existing book.
- **Delete Book**: Remove a book from the system.
- **Search Books**: Search for books by title or author.

## Prerequisites
- PHP >= 8.3
- Composer
- Laravel >= 11.x
- MySQL or any other database (This project uses MySQL)
- Node.js & npm (optional, for frontend assets)

## Project Setup

### 1. Clone the repository
```bash
git clone https://github.com/ForhanShahriarFahim/BookHive.git
cd BookHive
```

### 2. Install Dependencies
Use Composer to install the project dependencies:
```bash
composer install
```

### 3. Create `.env` file
Create the `.env` file by copying the example file and then set your database credentials:
```bash
cp .env.example .env
```

### 4. Set up the database
Create a new MySQL database called `lara-book` (or any name of your choice) and update your `.env` file:
```
DB_DATABASE=lara-book
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword
```

### 5. Run Migrations
Run the following command to create the required tables in your database:
```bash
php artisan migrate:fresh
```

### 6. Seed the Database
You can populate the database with seed data using the seeder:
```bash
php artisan db:seed
```

### 7. Create a Book model, Controller, Factory, and Migration
If not already created, you can generate the Book model and necessary files with:
```bash
php artisan make:model Book -cfm
```
This command will create:
- **Book Model** (`app/Models/Book.php`)
- **Book Controller** (`app/Http/Controllers/BookController.php`)
- **Book Migration** to create the `books` table
- **Factory** for generating fake data

### 8. Run the Laravel development server
```bash
php artisan serve
```

Once the server starts, you can visit the application at `http://localhost:8000`.

## Routes

| Method | URI                   | Action                              | Route Name         |
|--------|------------------------|-------------------------------------|--------------------|
| GET    | `/`                    | Display all books                   | books.index        |
| GET    | `/books/{id}/show`      | Display details of a specific book  | books.show         |
| GET    | `/books/create`         | Show form to create a new book      | books.create       |
| POST   | `/books`               | Store a new book in the database    | books.store        |
| GET    | `/books/{id}/edit`      | Show form to edit a specific book   | books.edit         |
| POST   | `/books/update`         | Update the book's details           | books.update       |
| DELETE | `/books/{id}`           | Delete a specific book              | books.destroy      |

## Technologies Used
- **Laravel**: PHP Framework
- **MySQL**: Relational Database
- **Blade**: Templating Engine

## Project Structure
- **Models**: Contains the Book model that represents the books in the database.
- **Controllers**: Handles the logic of adding, editing, deleting, and displaying books.
- **Views**: Blade templates for displaying and managing books.
  
## Example Commands
- **Create a Laravel project**:
```bash
composer create-project laravel/laravel example-app
```

- **Run the migration**:
```bash
php artisan migrate
```

- **Seed the database**:
```bash
php artisan db:seed
```

