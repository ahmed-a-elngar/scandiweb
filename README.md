# Scandiweb Assignment
creating, deleting &amp; view products

# Requirements
  1. Php
  2. MySql
  
# Installation
  1. Clone repository
  2. Import database products.sql
  3. Configure database settings in .env file
  ```
    HOST = "localhost";
    USER_NAME = "root";
    PASSWORD = "root";
    DB_NAME = "products";
  ```
  4. Configure Project Url, if there is sub directories:
      1. edit this line in .htaccess
      ```    
        RewriteBase /sub/
      ```  
      2. edit this line in index.php
      ```          
        $request = str_replace("/sub/", "", $_SERVER['REQUEST_URI']);
      ```
# Links
* [Live site](https://scandiweb-task-0.000webhostapp.com/)
