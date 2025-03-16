=============================================
        Task Management API - Laravel 6
=============================================

This is a Laravel 6-based Task Management API that allows users to 
create, update, delete, and manage tasks. Each task can be assigned 
to a user, and comments can be added. The task owner will receive 
an email notification when new comments are added.

---------------------------------------------
📌 FEATURES:
---------------------------------------------
✅ User Authentication (Register, Login, Logout)  
✅ Task Management (CRUD Operations)  
✅ Assign Tasks to Users  
✅ Comment System on Tasks  
✅ Email Notification on New Comments (Using Queues)  
✅ Secure API with Token Authentication  

---------------------------------------------
🚀 INSTALLATION & SETUP:
---------------------------------------------

1️⃣ CLONE THE REPOSITORY:
--------------------------
git clone https://github.com/your-repository.git  
cd your-repository

2️⃣ INSTALL DEPENDENCIES:
--------------------------
composer install  

3️⃣ SET UP ENVIRONMENT FILE:
-----------------------------
Rename `.env.example` to `.env` and update database credentials:
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_user  
DB_PASSWORD=your_database_password  

4️⃣ GENERATE APPLICATION KEY:
------------------------------
php artisan key:generate  

5️⃣ SET UP DATABASE:
--------------------
php artisan migrate  

6️⃣ INSTALL LARAVEL PASSPORT:
------------------------------
php artisan passport:install  

Then update `config/auth.php` file:
'guards' => [  
    'api' => [  
        'driver' => 'passport',  
        'provider' => 'users',  
    ],  
],

7️⃣ SEED DUMMY DATA (OPTIONAL):
-------------------------------
php artisan db:seed  

8️⃣ START THE SERVER:
---------------------
php artisan serve  

---------------------------------------------
🔑 API AUTHENTICATION:
---------------------------------------------

All requests require a Bearer Token.

1️⃣ REGISTER USER:
------------------
POST /api/register  
Body (JSON):
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
}

2️⃣ LOGIN USER:
---------------
POST /api/login  
Body (JSON):
{
    "email": "john@example.com",
    "password": "password"
}

Response:
{
    "token": "ACCESS_TOKEN"
}

3️⃣ LOGOUT USER:
----------------
POST /api/logout  
Headers:
Authorization: Bearer ACCESS_TOKEN

---------------------------------------------
📝 TASK ENDPOINTS:
---------------------------------------------

🔹 CREATE TASK:
POST /api/tasks  
Headers: Authorization + JSON  
Body:
{
    "title": "New Task",
    "description": "Task details",
    "due_date": "2025-03-20"
}

🔹 GET ALL TASKS:
GET /api/tasks  
Headers: Authorization  

🔹 GET SINGLE TASK:
GET /api/tasks/{task_id}  
Headers: Authorization  

🔹 UPDATE TASK:
PUT /api/tasks/{task_id}  
Headers: Authorization + JSON  
Body:
{
    "title": "Updated Task",
    "description": "Updated details",
    "status": "in-progress",
    "due_date": "2025-03-25"
}

🔹 DELETE TASK:
DELETE /api/tasks/{task_id}  
Headers: Authorization  

---------------------------------------------
💬 COMMENT ENDPOINTS:
---------------------------------------------

🔹 ADD COMMENT TO TASK:
POST /api/tasks/{task_id}/comments  
Headers: Authorization + JSON  
Body:
{
    "comment": "This is a comment"
}

🔹 GET COMMENTS FOR TASK:
GET /api/tasks/{task_id}/comments  
Headers: Authorization  

🔹 UPDATE COMMENT:
PUT /api/tasks/{task_id}/comments/{comment_id}  
Headers: Authorization + JSON  
Body:
{
    "comment": "Updated comment"
}

🔹 DELETE COMMENT:
DELETE /api/tasks/{task_id}/comments/{comment_id}  
Headers: Authorization  

---------------------------------------------
📩 EMAIL NOTIFICATIONS:
---------------------------------------------
When a new comment is added to a task, the **task owner** will 
receive an **email notification**.

Run the queue worker:
php artisan queue:work  

---------------------------------------------
📮 IMPORTING POSTMAN COLLECTION:
---------------------------------------------
To test the API using **Postman**:
1. Open **Postman**.
2. Click **Import**.
3. Select the **Postman collection file**: `task_manager.postman_collection.json`
4. Set **Base URL** as:
   http://127.0.0.1:8000/api

---------------------------------------------
🛠 TROUBLESHOOTING:
---------------------------------------------

🔸 ISSUE: `404 Not Found` for API Endpoints  
✔ Ensure you are using `http://127.0.0.1:8000/api/{endpoint}`  
✔ Run `php artisan route:list` to verify available routes  

🔸 ISSUE: Passport Not Working  
✔ Run `php artisan passport:install`  
✔ Add `Passport::routes();` in `AuthServiceProvider.php`  
✔ Clear cache with `php artisan cache:clear`  

🔸 ISSUE: Queue Not Processing Emails  
✔ Start the queue worker with `php artisan queue:work`  
✔ Check mail settings in `.env`  

---------------------------------------------
📌 CONCLUSION:
---------------------------------------------
Your **Task Management API** is now fully functional! 🚀  
If you encounter any issues, feel free to ask! 😊
