# SpaceTourism - Back Office & API

This Laravel project provides:

- An administration module (back-office) to manage data for the SpaceTourism website.
- A RESTful API to expose data about destinations, crew members, and technologies

'Breeze' is used to handle admin login and registration

---

## Requirements
- PHP 8.3.1
- Composer 2.8.6
- Node.js 20.18.0

---

## Installation

Clone the repository, then run the following commands in your terminal:

- composer install
- npm install
- php artisan storage:link
- cp .env.example .env
- php artisan key:generate

---

## Running the project

Start the local server with the command: 

- php artisan serve

---

## API Documentation

The API documentation is generated with Scribe.

You can access it at : http://localhost/docs
