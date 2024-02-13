# LearnHub

LearnHub is a simple demo platform developed with Laravel and Tailwind CSS, designed to allow users to sign up, buy courses, create and sell courses, and provide administrative functionalities to monitor users and their activities.

## Features

- **User Authentication:** Users can sign up, log in, and manage their accounts securely.
- **Course Marketplace:** Users can browse and purchase courses from a variety of categories.
- **Course Creation:** Users can create and publish their own courses, earning money from sales.
- **Admin Dashboard:** Administrators have access to a dashboard to monitor user activity, manage courses, and handle other administrative tasks.

## Technologies Used

- **Laravel:** Laravel is a PHP framework used for building web applications.
- **Tailwind CSS:** Tailwind CSS is a utility-first CSS framework used for styling the application.

## Final Result
![courser](https://github.com/amirr0z/LearnHub/blob/main/public/res/course.png?raw=true)
![home](https://github.com/amirr0z/LearnHub/blob/main/public/res/home.png?raw=true)
![enter image description here](https://github.com/amirr0z/LearnHub/blob/main/public/res/signup.png?raw=true)
## Installation

1. Clone the repository:

       `git clone https://github.com/your-username/learnhub.git`


2.  Navigate into the project directory:
    
    
        `cd learnhub`

    
3.  Install dependencies using Composer:
    
    
    `composer install` 
    
4.  Copy the `.env.example` file to `.env`:
    
    
    `cp .env.example .env` 
    
5.  Generate the application key:
    
    
    `php artisan key:generate` 
    
6.  Set up your database in the `.env` file:
    
    
   

    ` DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password`
    
7.  Migrate the database:
    
    
    `php artisan migrate` 
    
    
8. Install node modules dependencies
`npm install`
9. Run vite
	`npm run dev` 
 10.  Serve the application:
    `php artisan serve` 
    
11.  Access the application in your web browser at `http://localhost:8000`.
    

## Contributing

Contributions are welcome! Feel free to open an issue or submit a pull request for any bugs or features you would like to see implemented.

## License

This project is licensed under the MIT License.

