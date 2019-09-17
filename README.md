## PHP Showcase
A website created to display some PHP functions.

## Technologies used
HTML, CSS, JavaScript, PHP, MySQL and Materialize CSS.

### How to run the website locally
As it is a PHP website, I could not use a static host, to have a live demo. So, the website needs to be run locally.

First, you will need a localhost service, like WAMP, XAMP or MAMP.
Download the files, and put all the folder and files (except the database fodler), inside the localhost folder (for wamp, is the www folder. This might change).

Open the database folder, and open the SQL file. Copy the script, and paste it into you MySQL console, or into PhpMyAdmin.

Now the website should be up and running.

#### Register
Go in the register page, by going into the login page, and selecting "create account".
Complete the form, and submit.

#### Login
Go in the login page, complete the form, and submit. Now, you should be logged in.

#### Tables
There are 2 tables in the website. One shows the errors that have been registered. The other one shows the users that logged in the website.
These 2 tables are hidded, until a user is logged in.

#### Upload images.
Go in the gallery section, while logged in, and click "file". This will open a window that will allow to navigate within your computer, to find and image to upload. The supported format are: __PNG__, __JPG/JPEG__ and __GIF__.

The uploaded images are visible while not logged in, but only logged users can upload new images.
