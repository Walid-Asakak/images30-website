# 🎬 Studio Cinéma Joël Daguerre

A modern multilingual audiovisual platform developed from scratch using native PHP and the MVC architecture.

This project was developed during a two-month internship at **Images 30** as a complete redesign of the company's previous WordPress website.

The objective was to build a scalable, maintainable and high-performance web application while providing a better user experience and an administration-friendly architecture.

---

# Features

## Authentication

- User registration
- User login
- Secure logout
- Password hashing
- Session management

## Movies

- Movie listing
- Movie detail page
- Image galleries

## Documentaries

- Documentary catalog
- Categories
- Vimeo integration
- Dynamic multilingual descriptions

## Events

- Event listing
- Event detail page
- Event galleries

## DVD Store

- DVD catalog
- Shopping cart
- Quantity management
- Order creation

## Search

Global search for:

- Movies
- Documentaries
- Events

## Multilingual System

Available languages:

- French
- English
- Spanish
- Italian
- Chinese

Static content is translated using language files.

Dynamic content is translated directly from the database.

## Responsive Design

Fully responsive:

- Desktop
- Tablet
- Mobile

---

# Built With

- PHP 8
- HTML5
- SCSS
- JavaScript
- MariaDB
- Composer
- Git
- GitHub
- XAMPP

---

# Architecture

The project follows the MVC architecture.

```
Request
      │
      ▼
 Router
      │
      ▼
Controller
      │
      ▼
Repository
      │
      ▼
Database
      │
      ▼
Controller
      │
      ▼
View
```

The application is organized into several layers:

- Controllers
- Models
- Repositories
- Services
- Views
- Assets
- Languages

This architecture improves readability, maintainability and scalability.

---

# Project Structure

```
stage-website/

controllers/
models/
repositories/
services/
views/
languages/
config/
public/
vendor/

composer.json
index.php
README.md
```

---

# Installation

Clone the repository.

```bash
git clone https://github.com/Walid-Asakak/images30-website
```

Go inside the project.

```bash
cd stage-website
```

Install Composer dependencies.

```bash
composer install
```

Create your environment file.

```env
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWORD=
```

Import the SQL database.

Launch Apache and MariaDB with XAMPP.

Open

```
http://localhost/stage-website
```

---

# Environment Variables

The application uses a `.env` file to store sensitive information.

Example:

```env
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWORD=
```

Sensitive information is never committed thanks to `.gitignore`.

---

# Database

The project uses MariaDB.

Main tables include:

- users
- movies
- movie_images
- documentaries
- documentary_categories
- documentary_translations
- events
- dvds
- dvd_translations
- cart_items
- orders
- order_items
- team_members
- team_member_translations

---

# Translation System

The application supports two translation systems.

## Static translations

Interface texts are stored inside

```
languages/

fr.php
en.php
es.php
it.php
zh.php
```

Every page loads translations automatically through the BaseController.

## Dynamic translations

Dynamic content is stored inside dedicated translation tables.

Example:

```
documentary_translations

dvd_translations

team_member_translations
```

Each translation is retrieved according to the language stored in the user's session.

---

# Security

The project includes several security mechanisms.

- Prepared SQL statements
- Password hashing
- HTML escaping
- Environment variables
- Session management
- Input validation

---

# Git Workflow

Development follows a feature branch workflow.

Example:

```
main

feature/auth

feature/cart

feature/documentary-translations

fix/translation-system
```

Every new feature is developed in its own branch before being merged into `main`.

---

# Responsive Design

The entire project follows a Mobile First approach.

Breakpoints:

- Mobile
- Tablet
- Desktop

SCSS is organized into modular partials to simplify maintenance.

---

# Future Improvements

Possible future improvements include:

- Admin dashboard
- User roles
- SEO improvements
- Performance optimization

---

# Author

Developed by **Walid**

Internship project at **Images 30**

---