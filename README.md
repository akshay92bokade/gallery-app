# Datalogy Test Project - Laravel Image Gallery and User Management

This project is a simple Laravel-based web application that provides user authentication, profile management, an image gallery, and cart functionality. It allows users to register, upload their profile pictures, browse an image gallery, add images to a cart, and manage their profiles.

## Features

- **User Registration & Authentication**: Users can register, log in, and update their profiles.
- **Profile Management**: Users can update their name, email, password, and upload a profile picture.
- **Image Gallery**: Users can view and upload images to their gallery.
- **Add-to-Cart**: Users can add images to their cart and save the cart for future access.
- **Pagination**: Image gallery is paginated to improve performance.
- **Image Upload & Management**: Users can upload multiple images and delete them as needed.

## Technologies Used

- **Laravel 10**: The PHP framework for building the application.
- **MySQL**: The database for storing user and image data.
- **Sanctum**: Used for API authentication.
- **Bootstrap**: For frontend UI styling.
- **Vite**: For asset bundling and handling frontend assets (JavaScript, CSS).
- **Intervention Image (Optional)**: For image compression and resizing.

## Local Setup Instructions

Follow these steps to set up and run the project locally on your machine.

### Prerequisites

Before you begin, make sure you have the following installed:

- **PHP** (7.4 or higher)
- **Composer**: A tool for dependency management in PHP.
- **MySQL**: The database system.
- **Node.js**: For running npm commands.
- **npm**: The package manager for JavaScript.

### Step 1: Clone the repository

```bash
git clone https://github.com/your-username/datalogy-test.git
cd datalogy-test

### Step 2: Install Backend Dependencies

```bash
composer install
npm install

### Step 3: Set up Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate


### Step 7: Run the Development Server

```bash
npm run dev