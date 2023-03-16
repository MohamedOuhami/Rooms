## What is Room/Machine Manager ?

Room/Machine Manager is a Web Application written in Laravel. The main goal of the app is to ease up the 
process of managing Room and Machines by creating a dynamic solution to resources manipulation

## How to deploy project locally

To work with the Project, you will need to install : 
- **[PHP](https://www.php.net/)**
- **[Composer](https://getcomposer.org/)**
- **[Laravel](https://laravel.com/)**
- **[XAMPP](https://www.apachefriends.org/fr/index.html)**

### Set-up the Database
- Enter the .env file in the base of the project
- Edit the database environment variables
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

- Run the migrations
```
php artisan migrate
```

### Launch the app

- Start your MySQL with the XAMPP app
- Open the terminal in your project's folder
- Launch the app server by typing 
```
php artisan serve
```

- Open your favorite browser
- Copy the URL that you'll see in the CLI : 
```
Server running on [http://127.0.0.1:8000]. 
```
- Paste It on your browser and hit enter

Now, you're set up to start using the application


