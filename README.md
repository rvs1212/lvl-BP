## Designing Filtering API

This project is built to demonstrates a clean, scalable, and maintainable Laravel 12 API for filtering users based on various criteria using SOLID principles.

---

## 🔧 Tech Stack

- PHP 8.2
- Laravel 12 (Vue + Breeze Starter Kit)
- MySQL (via phpMyAdmin)
- Inertia (Vue front-end starter, not used for API)
- Postman (for API testing)

---

## ✅ Features

- RESTful API to retrieve a list of users
- Dynamic filtering via query parameters (e.g., gender, location)
- Uses Form Request (`FilterUsersRequest`) for validation
- Custom Filter classes following Open/Closed & Interface Segregation principles
- Clean Eloquent `UserQueryBuilder` for base query logic
- Many-to-many relationship between users and languages (can define more such relations)
- Response formatted using Laravel's `UserResource` for consistency

---
## 📂 Project Structure Overview
```
app/
├── Contracts/Filters/           # FilterInterface
├── Filters/UserFilters/         # LocationFilter, GenderFilter, etc.
├── Http/
│   ├── Controllers/Api/         # UserController.php
│   ├── Requests/                # FilterUsersRequest.php
│   └── Resources/               # UserResource.php
├── Models/                      # User.php, Language.php
├── Services/User/
│   ├── UserFilterService.php    # Applies filters dynamically
│   └── UserQueryBuilder.php     # Base query logic

```

---

## 🚀 API Usage

### GET /api/v1/users

Sample Json response

```
{
    "data": [
        {
            "id": 1,
            "name": "Miss Bernadine Beatty",
            "age": 30,
            "gender": "other",
            "location": "Christiansenview",
            "bio": "Ut est esse molestias est rem maiores.",
            "languages": [
                "English",
                "German",
                "Spanish"
            ]
        },
        {
            "id": 2,
            "name": "Prof. Stanton Bauch V",
            "age": 33,
            "gender": "female",
            "location": "East Wilfridton",
            "bio": "Deserunt corrupti est earum sint.",
            "languages": [
                "English",
                "Dutch",
                "German"
            ]
        },
        {
            "id": 3,
            "name": "Felicita Larson",
            "age": 34,
            "gender": "female",
            "location": "East Jaunitaview",
            "bio": "Quis voluptatem eos consequatur architecto ut ea.",
            "languages": [
                "English",
                "Dutch"
            ]
        },
        ...
}
```

### GET /api/v1/users?gender=female&location=East Wilfridton

Sample Json response

```
{
    "data": [
        {
            "id": 2,
            "name": "Prof. Stanton Bauch V",
            "age": 33,
            "gender": "female",
            "location": "East Wilfridton",
            "bio": "Deserunt corrupti est earum sint.",
            "languages": [
                "English",
                "Dutch",
                "German"
            ]
        }
    ]
}

```
---

## 🛠️ Setup Instructions

1. Clone the repo

    * git clone `<repo-url>`
    * cd nina-care

2. Install dependencies:

    * composer install
    * npm install
    * npm run build

2. Create and configure .env file:

    * Set up your MySQL DB
    * Configure DB credentials

4. Run migrations and seed data:

    * php artisan migrate:fresh --seed

5. Serve the app:

    * composer run dev 
    * `or`
    * php artisan serve 

6. Test API with Postman:

        GET http://127.0.0.1:8000/api/v1/users

---

🙌 Notes

- New filters can be added (e.g., AgeFilter) by creating a new class and updating the UserFilterService's $filters array.

- This structure is designed to scale well as the application grows.

