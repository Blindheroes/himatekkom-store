# Himatekkom Store

## Overview

Himatekkom Store is an online marketplace platform for the Himatekkom community. The platform connects buyers with sellers, allowing them to browse and purchase products or services through direct WhatsApp communication.

## Features

-   **Product/Service Listing**: Browse through various products and services offered by verified sellers
-   **Direct Communication**: Connect with sellers directly via WhatsApp
-   **User Management**: Different access levels for guests, sellers, and administrators
-   **Seller Verification**: All sellers are verified by administrators before they can list their products

## User Roles

### Guest/Buyer

-   Browse all products and services without registration
-   View detailed product/service information
-   Contact sellers directly through WhatsApp using the number provided in listings
-   Filter and search for products or services by category

### Seller

-   Register for a seller account (requires admin approval)
-   Create, edit, and manage their product/service listings
-   Update product information, availability, and pricing
-   Receive direct inquiries from interested buyers via WhatsApp
-   Track their active and pending listings

### Admin

-   Review and approve/reject seller registrations
-   Review and approve/reject product/service listings
-   Manage all products and users on the platform
-   Monitor platform activities and maintain quality control

## Main Flow

1. **For Buyers (Guests)**:

    - Browse available products and services
    - View detailed information about items of interest
    - Contact sellers directly via WhatsApp using the contact number in the product description
    - No registration required for browsing and contacting

2. **For Sellers**:

    - Register for a seller account
    - Wait for admin approval
    - Once approved, create listings for products or services
    - Wait for admin to approve the listings
    - Manage approved listings and respond to buyer inquiries

3. **For Admins**:
    - Review and approve new seller registrations
    - Review and approve new product/service listings
    - Monitor platform activity and ensure quality

## Technology Stack

-   **Backend**: Laravel PHP Framework
-   **Frontend**: Blade templates with JavaScript
-   **Database**: MySQL
-   **Admin Panel**: Laravel Filament

## Installation

1. Clone the repository
2. Install dependencies with `composer install`
3. Configure your environment variables in `.env`
4. Run migrations with `php artisan migrate`
5. Seed the database with `php artisan db:seed`
6. Serve the application with `php artisan serve`

## License

[License information]
