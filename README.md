This is a lightweight API project built with Laravel, demonstrating core principles of API development, user access control, and action-based restrictions. The project incorporates middleware, gates, and a structured Postman collection for seamless API interaction and testing.

Features
1. Middleware for Action Restriction
A custom middleware is implemented to block users from performing specific actions based on an attribute in their token. This ensures precise control over user permissions.
2. Gate-Based Access Control
Laravel Gates are used to restrict users from performing actions on resources owned by other users, ensuring robust role-based security.
3. Postman Collection
The project includes a Postman collection for API testing, available in the postman/ folder. This collection provides pre-configured API requests for easier interaction and testing of the endpoints.
Project Structure

Middleware: Implements token-based user restrictions.
Gates: Provides access control for resource ownership.
Postman Collection: Located in the postman/ folder, ready for import into Postman for testing.
