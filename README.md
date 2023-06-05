## About Coronatime App

The Corona Statistics App is a web application built with the Laravel framework that provides  statistics about the coronavirus. The app utilizes data from rest API source to display information about the number of cases, deaths, and recoveries for different countries.

The app includes features such as registration and login functionality, allowing users to create accounts and securely log in to access the statistics. The statistics page presents the data in a user-friendly manner, with visualizations and charts to help users better understand the state of the pandemic.


#
### Table of Contents
* [Features](#features)
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Database](#database-backups)


#
### Features

- **Registration and Login:** The app includes user registration and login functionality, allowing users to create accounts and securely log in to access the statistics. It also provides password reset functionality to help users recover their accounts if needed.

- **Real-time Statistics:** The app fetches data from the rest API sources, ensuring that users have access to the information about COVID-19 cases, deaths, and recoveries. The statistics are automatically updated to reflect the latest data.

- **Data Visualization:** The statistics page presents the COVID-19 data using lists, while enabling them to search for any particular country statistics, making it easier for users to interpret the information.

- **Responsive Design:** The app is designed to be responsive and optimized for different screen sizes. It provides a seamless experience on both desktop and mobile devices, allowing users to access the statistics and interact with the app comfortably from their preferred devices.

- **Password Reset:** The app includes a password reset functionality that allows users to reset their passwords if they forget them. Users can request a password reset email, and upon verification, they can set a new password securely.

- **Email Notifications:** The app sending email notifications  includes sending an email when a user successfully registers an account, and in order for the user to verify their account with their email address.

#
### Prerequisites

* <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@7.2 and up*
* <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> *npm@6 and up*
* <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2 and up*

#
## Tech Stack

- **[PHP](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**
- **[NPM](https://www.npmjs.com/)**
- **[Composer](https://getcomposer.org/)**
- **[Laravel](https://laravel.com/)**


#
### Getting Started
1\. First, you need to clone Movie Quotes repository from github:
```sh
git clone https://github.com/RedberryInternship/ekaterine-abashidze-corona-time.git
```

2\. Run *composer install* to install all the dependencies.
```sh
composer install
```

3\. Install NPM for JS dependencies:
```sh
npm install
```

Then, run the following command:
```sh
npm run dev
```
to build JS/SaaS resources.

4\. To set the .env file, go to the root of the project and run the following command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:

#
**MYSQL:**
>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****


4\. In the root of the project, run the following command:
```sh
  php artisan key:generate
```
This will generate auth key.


#
### Migration
After the competion of getting started section, it's time to migrate the database. For it to be done, run:
```sh
php artisan migrate
```

#
### Development

Run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

To transform JS files into executable scripts, run:

```sh
  npm run dev
```

## Database

- **[DrawSQL](https://drawsql.app/)**

In the CoronaTime application, there are two models: CountryStatistics and User, which do not have a direct relationship with each other. The models are designed to store separate data and serve different purposes within the application.

The CountryStatistics model represents the statistics for different countries regarding COVID-19 cases, deaths, and recoveries. 

The User model represents the registered users of the CoronaTime application. It stores user-related information such as username, email, and password.

Both models are independent and don't have relationship with each other - they operate independently and their data is stored and managed separately.

Utilizing DrawSQL, a visual representation of the database structure is shown, highlighting the separate entities of CountryStatistics and User models without any direct relationship between them. This helps to maintain a clear and organized database structure, making it easier to understand and work with the data.

![drawsql screenshot]()

- **[The link to the drawsql diagram](https://drawsql.app/teams/ekas-team/diagrams/coronatime)**