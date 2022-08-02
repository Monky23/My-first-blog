
# My-first-blog

Create a blog from scratch without framework.
Uml diagrams need to be create.
PHP and Mysql servers are necessary in local.
Use composer Autoloader to charge every class.
Use composer to use some libraries.
A database with different table need to be create.
Links to differents parts of the site are necessary.
Form to contact the webmaster is necessary.
Forms to add update or delete the posts and the comments are necessary.
All datas entered in the différents input need to be control against xss fails
and Sql injections.
A MVC structure need to be use with OOP.
Only Admin can access to the dashboard of the backend part.
Only Login subscribers can write comments.
Comments need to be approoved before to be published.
A dump of the database is necessary.

## Description of the need

The project is to develop my professional blog.
This website is divided into two main groups of pages :

- pages useful to all visitors ;
- the pages allowing to manage my blog.

Here is the list of pages that will be accessible from my website:

- the home page ; //public
- the page listing all the blog posts ; //public
- the page displaying a blog post; //public
- the page allowing to add a blog post ; //for admins
- the page allowing to modify a blog post ; //for admins
- the pages allowing to modify/delete a blog post ; //for admins
- the pages for logging in/registering users.
- I have to develop an administration part that will be accessible
only to registered and validated users.

The administration pages will be accessible on conditions and
I must ensure the security of the administration part.

## Let's start with the pages that are useful to all users'!'

On the home page, you will have to present the following information:

- my name and first name ;
- a photo and/or a logo;
- a catchphrase that looks like me (example: "JM La Paix, the code in action!");
- a menu allowing to navigate among all the pages of my website;
- a contact form (upon submission of this form,
an e-mail with all this information will be sent to me)
with the following fields :
  1. name/first name,
  2. contact e-mail,
  3. message,
- a link to my CV in PDF format;
- and all the links to the social networks where i can be followed
(GitHub, LinkedIn, Twitter...).

On the page listing all blog posts (from the most recent to the oldest),
i should display the following information for each blog post:

- the title ;
- the date of last modification ;
- the caption ;
- and a link to the blog post.

On the page showing the details of a blog post, the following information should be displayed:

- the title ;
- the caption ;
- the content ;
- the author ;
- the date of last update ;
- the form allowing to add a comment (submitted for validation);
- the lists of validated and published comments.
- On the page allowing to modify a blog post,
the user has the possibility to modify the title, caption, author
and content fields.

In the footer menu, there should be a link to access the blog administration.

## Installation

Technologies used

- PHP 8.1.4
- Maria DB 10.4.24
- Composer

Installation

- Clone or download this repository.

- Use the file dump.sql to import the Database.

- Replace the datbase informations by yours
  at the lines 10 to 13 in the file My-first-blog\public\index.php

 define('DB_NAME', '[YOUR DATABASE NAME]');
 define('DB_HOST', '[YOUR DATABASE HOST]');
 define('DB_USER', '[YOUR DATABASE USERNAME]');
 define('DB_PWD', '[YOUR DATABASE PASSWORD]');

- replace SMTP username and SMTP password by yours in the file My-first-blog\src\Controllers\ContactController.php
in the _getMailConfig() function
at the line 64 and 65

$mail->Username   = 'yourusername@example.com';
$mail->Password   = 'yourpassword';
$mail->Host       = 'yourSMTPHost';
$mail->SMTPSecure = 'choose your encryption';
$mail->Port       = 'Use your number port'

- In  your terminal use the command "composer install"
  and "composer dump-autoload" to use composer dependencies.

- Use the command "php -S localhost:8079 -t public" in your terminal
  and type localhost:8079 in your address bar to be sure to access to the blog.

Login par défaut

- USER
 username: albert
 password: albert
- ADMIN
 username: jeanmi
 password: jeanmi

## Author

Jean Michel La Paix
