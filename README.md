# Blog App

Built with Laravel and Breeze by Jas for Censony

## Features

- Authentication: User login and registration services
- Posts: Create, view, edit, and delete blog posts
- Categories: Posts are associated with a category
- Validation: Input validation for posts and authentication
- Tailwind: Styling using Tailwind CSS for a basic modern UI

## Installation

1. git clone https://github.com/x-jas/blog-app.git
2. cd blog-app
3. composer install
4. npm install
5. cp .env.example .env
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed
9. npm run dev
10. php artisan serve

## Structure

- Models: Post, User and Category
- Views: Welcome, Dashboard, Create and Edit
- Controllers: PostController
