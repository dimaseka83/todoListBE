# ToDo List API - Laravel Lumen

## Overview

Welcome to the ToDo List API! This project is a backend service for managing to-do lists, built using the Laravel Lumen framework. The API is hosted at [https://todolistbe-production.up.railway.app/](https://todolistbe-production.up.railway.app/).

## Features

-   User Authentication
-   Create, Read, Update, and Delete (CRUD) operations for to-do items
-   List to-do items with filtering options
-   Secure and efficient endpoints
-   Token-based authentication

## Base URL

All API endpoints are prefixed with the base URL:

```
https://todolistbe-production.up.railway.app/
```

## Endpoints

### Authentication

#### Register

**POST** `/auth/register`

**Request Body:**

```json
{
    "name": "Your Name",
    "email": "your.email@example.com",
    "password": "yourpassword"
}
```

**Response:**

```json
{
    "message": "User registered successfully",
    "token": "your-jwt-token"
}
```

#### Login

**POST** `/auth/login`

**Request Body:**

```json
{
    "email": "your.email@example.com",
    "password": "yourpassword"
}
```

**Response:**

```json
{
    "token": "your-jwt-token"
}
```

### ToDo Items

#### Create ToDo Item

**POST** `/tasks`

**Request Headers:**

```
Authorization: Bearer your-jwt-token
```

**Request Body:**

```json
{
    "title": "Your ToDo Title",
    "description": "Your ToDo Description",
    "due_date": "2024-06-13",
    "is_priority": false
}
```

**Response:**

```json
{
    "title": "Tugas 1",
    "description": "ini sebuah deskripsi",
    "due_date": "2024-06-13",
    "user_id": 1,
    "completed": false,
    "is_priority": false,
    "updated_at": "2024-06-12T06:26:40.000000Z",
    "created_at": "2024-06-12T06:26:40.000000Z",
    "id": 2
}
```

#### List ToDo Items

**GET** `/tasks`

**Request Headers:**

```
Authorization: Bearer your-jwt-token
```

**Response:**

```json
[
    {
        "id": 2,
        "title": "Tugas 1",
        "description": "ini sebuah deskripsi",
        "due_date": "2024-06-13",
        "completed": 0,
        "user_id": 1,
        "is_priority": 0,
        "created_at": "2024-06-12T06:20:52.000000Z",
        "updated_at": "2024-06-12T06:20:52.000000Z"
    }
]
```

#### Update ToDo Item

**POST** `/tasks`

**Request Headers:**

```
Authorization: Bearer your-jwt-token
```

**Request Body:**

```json
{
    "id": 1,
    "title": "Tugas 1",
    "description": "ini sebuah deskripsi",
    "due_date": "2024-06-13",
    "is_priority": false
}
```

**Response:**

```json
{
    "title": "Tugas 1",
    "description": "ini sebuah deskripsi",
    "due_date": "2024-06-13",
    "user_id": 1,
    "completed": false,
    "is_priority": false,
    "updated_at": "2024-06-12T06:26:40.000000Z",
    "created_at": "2024-06-12T06:26:40.000000Z",
    "id": 3
}
```

#### Delete ToDo Item

**DELETE** `/tasks/{id}`

**Request Headers:**

```
Authorization: Bearer your-jwt-token
```

**Response:**

```json
{
    "message": "Task deleted successfully"
}
```

## Authentication

The API uses token-based authentication. After successful login or registration, you will receive a JWT token that must be included in the `Authorization` header of all subsequent requests.

Example:

```
Authorization: Bearer your-jwt-token
```

## Getting Started

### Prerequisites

-   PHP >= 8.0
-   Composer
-   MySQL or any other supported database

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/todolist-api.git
    cd todolist-api
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Copy the `.env.example` to `.env` and update your database credentials and other configurations:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Generate jwt key:

    ```bash
    php artisan jwt:secret
    ```

6. Run database migrations:

    ```bash
    php artisan migrate
    ```

7. Start the development server:
    ```bash
    php -S localhost:8000 -t public
    ```

## Deployment

This API is deployed on [Railway](https://railway.app/). For deployment steps, refer to the Railway documentation.

## Contributing

Feel free to submit issues and enhancement requests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries, please reach out to [your.email@example.com](mailto:your.email@example.com).

---

Thank you for using the ToDo List API!
