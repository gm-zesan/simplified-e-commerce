# Simple E-commerce

This project is a product management system that allows users to browse products by categories and subcategories. It includes features like product listing, product details, and CRUD functionality for categories, subcategories, and products, with authentication for administrative access.

## Features

- Product Listing
- Product Detail View
- Category-Based Product Filtering
- Subcategory-Based Product Filtering
- Product Management (CRUD: Create, Read, Update, Delete)
- Category Management (CRUD: Create, Read, Update, Delete)
- Subcategory Management (CRUD: Create, Read, Update, Delete)
- Dynamic Subcategory Loading Based on Selected Category
- Authenticated Dashboard for Admin Users

## Requirements

- PHP 8.0 or higher
- Composer
- Node.js & npm
- MySQL or any supported database

## Installation

Follow these steps to get the project running on your local machine:


### Clone the Repository
```bash
git clone https://github.com/gm-zesan/simplified-e-commerce.git
cd simplified-e-commerce
```

### Install Dependencies
```bash
composer install
npm install
```

### Configure Environment Variables
```bash
cp .env.example .env
```
### Open .env and update the following values
```bash
DB_CONNECTION=mysql
DB_DATABASE=zesan_01921324091
```
### Generate Application Key
```bash
php artisan key:generate
```

### Import Database
Create a mysql database named `zesan_01921324091` Import the `zesan_01921324091.sql` file in the database.



### Run the Server
```bash
php artisan serve
```
Open `http://localhost:8000` to view the project in your browser.


### Routes
#### Public Routes
```bash
- GET / - Displays all products on the website homepage.
- GET /product-category/{id} - Displays products filtered by a specific category.
- GET /product-sub-category/{id} - Displays products filtered by a specific subcategory.
- GET /product-detail/{id} - Displays detailed information of a specific product.
```

#### Protected Routes (Requires Authentication)
```bash
- GET /dashboard - Displays the admin dashboard for managing the platform.
- Resource /categories - Full CRUD operations for categories (excluding show).
- Resource /subcategories - Full CRUD operations for subcategories (excluding show).
- Resource /products - Full CRUD operations for products (excluding show).
- GET /products/get-subCategory-by-category - Dynamically fetch subcategories based on category selection (AJAX).
```

### Controllers
#### WebsiteController
- allProducts() - Displays all products on the homepage.
- category($id) - Filters and displays products by a specific category.
- subCategory($id) - Filters and displays products by a specific subcategory.
- detail($id) - Displays detailed information for a selected product.
#### DashboardController
- index() - Displays the admin dashboard for managing products, categories, and subcategories.
#### CategoryController
- Handles the CRUD operations for categories.
#### SubcategoryController
- Handles the CRUD operations for subcategories.
#### ProductController
- Handles the CRUD operations for products.
- getSubCategoryByCategory() - Returns subcategories for a selected category via AJAX.


## Database Structure

- Categories: Stores categories of products.
- Subcategories: Stores subcategories linked to categories.
- Products: Stores all product details, including price, image, and relationships to categories and subcategories.

### Admin Credentials
Open `http://localhost:8000/login` to go to the dashboard in your browser.
- Admin Email: `gmzesan7767@gmail.com`
- Admin Password: `12345678aA`

## Conclusion

This documentation provides a high-level overview of the project structure, routes, and installation process. This should give developers the necessary information to install, run, and contribute to the project efficiently.
