# Project DIEZI7 Oficial Web

This project is about the Institucional page of DIEZI7 Comunity Manager Agency.

#### We use HTML, CSS, JavaScript and PHP to build this page. Also is powered by Bootstrap to improve the styles.

## Project Requirements 
We need some important details before deploy this web page:

### Install PHP dependencies

You need to make sure that the selected hosting has php and composer installed.

```
composer install
```

### Secrets and Environment Variables
It is good practice to separate sensitive information from your project. 
I have installed a package called 'php-dotenv' that helps me manage secrets easily. 
Let's go ahead and create an env file to store information that is specific to our working environment. 
Use the following command in your terminal.

#### windows machine
```
copy .env.template .env
```
#### mac/linux
```
cp .env.template .env
```
Now you must configure that .env file with the Google account and the API key of said account. 

Now this web page will be ready to production.
