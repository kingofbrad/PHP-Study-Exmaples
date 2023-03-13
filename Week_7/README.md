# Displaying User Detail using PHP

## Table of Contents:
1. [What is this project](#what-is-this-project)
2. [How to use the project](#how-to-use-the-project)
    1. [Web Server](#web-server)
    2. [SQL Database](#sql-database)
    3. [Cloning](#cloning)
    4. [Setting Up the Files](#setting-up-in-files)
3. [Running the Project](#running-the-project)



### What is this project?

This project is a simple demonstration of how to use PHP on showing data from a SQL database.

The user will input their data into the fields and it will be displayed on the screen in a table.

## How to use the project

To use this project, a few thing will need to be setup before hand.

### Web Server

To have a SQL database, make sure you have a service that provides access to something like phpMyAdmin, i recommend MAMP as it provides with a local server and SQL.

Within phpMyAdmin, set up a database and table to what you want and rename the files if you can copy the code, if using these files then make sure the names match the ones stated in the php variables.

### SQL Database

The SQL database connected this project has five columns as shown below.
the ID field is set to a primary key and auto indentented as well.

| ID  | Firstname | Lastname | Email                  | Age |
| --- | --------- | -------- | ---------------------- | --- |
| 1   | John      | Smith    | John.Smith@Exmaple.com | 37  |
| 2   | Ace       | Rogers   | Ace.Rogers@Exmaple.com | 23  |

Data provided here are dummy data to fill the slots.

> Please change the fields if using the code for your own usage.

### Cloning

Once the SQL database has been created and configured. Clone this repo into the folder you are using to host the local server

For example, if using MAMP, then clone the repo into the htdocs folder.

When the repo has been cloned then, open you selected Text Editor.

### Setting up in files

If you are using the same field names then ignore this step and head to [Running the Project](#running-the-project) section, however if you changing the names, please read.

First off, go to the `index.php` and edit the following fields:

```php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";
```

keep the servername the same for now unless you have your SQL database on the different system. change the other fields to match the SQL database. dbname is the name of the database that yuor created eariler.

Once you have changed them, then you will have to change the corresponding fields to match all the colmuns you made in the SQL database. This includes the form HTML elements as well.

```php
<td>" . $row["id"] . "</td>
<td>" . $row["firstname"] . "</td>
<td>". $row["lastname"]. "</td>
<td>" . $row["email"] . "</td>
<td>" . $row["age"] . "</td>
```

```html
 <div class="formInputSection">
                <label for="firstname">First name:</label><br>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="formInputSection">
                <label for="lastname">Last name:</label><br>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div class="formInputSection">
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email">
            </div>
            <div class="formInputSection">
                <label for="age">Age:</label><br>
                <input type="number" id="age" name="age">
            </div>
```
---

Once all the fields have been changed in the `index.php`, do the same in the `insert.php` file as well. 

### Running the project
When everything is setup then run the server if not already and navigate to the localhost in the browser. The url will usually look like this. 
>`localhost:8888` or `localhost:3000`

Then head to the folder where this project is located at. 
Everything should be running perfectly fine if you have used the same fields, if you are having problems then please look through all the different fields you have changed and see if they match up. 