# Macaron Magic Website

## Overview

This project is a full-stack web application for a macaron shop called "Macaron Magic." The application will display a variety of macarons, allow users to add them to a cart, and complete their orders via WhatsApp.

## Project Outline

### Style & Design

*   **Aesthetics:** Modern, visually balanced layout with clean spacing and polished styles.
*   **Fonts:** Expressive and relevant typography with emphasis on hero text, headlines, and keywords.
*   **Color:** A vibrant and energetic color palette.
*   **Texture:** Subtle noise texture on the main background.
*   **Visual Effects:** Multi-layered drop shadows to create a sense of depth.
*   **Iconography:** Icons to enhance user understanding and navigation.
*   **Interactivity:** Interactive elements with a "glow" effect.

### Features

*   **Product Display:** Display a list of available macarons with their descriptions, images, and prices.
*   **Add to Cart:** Allow users to add macarons to a shopping cart with a dropdown for size selection.
*   **WhatsApp Ordering:** A button to complete the order via WhatsApp, which will pre-fill the order details in a WhatsApp message.

## Current Request: Initial Setup

### Plan

1.  **Update Product Seeder:** Modify the `database/seeders/ProductSeeder.php` file to include the new macaron products and their pricing information.
2.  **Update Welcome Page:** Modify the `resources/views/welcome.blade.php` file to:
    *   Display the new products from the database.
    *   Implement the "add to cart" functionality with a size dropdown.
    *   Add a "Complete Order via WhatsApp" button.
3.  **Run Migrations and Seeders:** Run the necessary artisan commands to update the database with the new products.
