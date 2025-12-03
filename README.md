#  Kazon Store | E-Commerce Platform

---

#  About the Project
**Kazon Store** is designed to be a flexible and fast e-commerce solution. The system is built on a robust architecture that connects an interactive, attractive **Frontend** with a **Backend** developed using **Native PHP**, ensuring high performance and full control over data.

The project is divided into two main parts:
1. **Client Interface:** Where users can browse, shop, and interact with the store.
2. **Admin Dashboard:** A dedicated panel for managing content, products, and categories.

---

# Key Features

# For Users (Customers):
* **Secure Authentication:** Ability to create a new account and log in securely to access full features.
* **Product Browsing:** Browse products by categories (Clothes, Electronics, Food, Perfumes, etc.).
* **Advanced Search:** A search system allowing users to find products by name, description, or price.
* **Shopping Cart:** Add items to the cart, adjust quantities, and remove products with automatic total calculation.
* **Responsive Design:** A seamless user experience across various devices and screen sizes, powered by custom CSS media queries.

# For Admins:
* **Dedicated Dashboard:** A private control panel protected by a separate authentication system.
* **Product Management (CRUD):** Add new products with images, update existing product details, and delete them.
* **Category Management:** Add new categories/sections to the store or remove them.
* **Inventory Control:** Manage product availability status (Available/Unavailable).

---

# Technologies Used

I utilized a specific set of technologies to build a cohesive and efficient system:

* **Frontend:**
    * HTML5
    * CSS3 (Custom styling + Media Queries for responsiveness).
    * FontAwesome (For icons).
* **Backend:**
    * PHP (Native).
* **Database:**
    * MySQL.

---

# Installation & Setup

To run the project locally on your machine, follow these steps:

1. **Prerequisites:** Ensure you have a local server environment (like **XAMPP** or **WAMP**) installed.
2. **Clone the Project:** Place the project folder inside your server's root directory (e.g., `htdocs` in XAMPP).
3. **Database Setup:**
    * Open `phpMyAdmin`.
    * Create a new database named: `kazon_store`.
    * Import the provided `kazon_store.sql` file into the new database.
4. **Configure Connection:**
    * Verify the connection settings in the `include/conected.php` file. The default settings are:
        ```php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kazon_store";
        ```
5. **Run the Website:**
    * Open your browser and navigate to: `http://localhost/kazon-store`

---

# Demo Credentials

For quick testing purposes, you can use the following pre-existing credentials:

* **Admin Account:**
    * **Email:** `osamah@gmail.com`
    * **Password:** `go123`
    * *Login Link:* `/admin/admin.php`

* **User Account:**
    * You can register a new account, or use:
    * **Username:** `os`
    * **Password:** `555`

---
---
Copyright © 2025 Osamah Hassan. All rights reserved.
