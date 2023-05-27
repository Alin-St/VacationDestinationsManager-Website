# This is the original problem statement for the assignment

## Lab 7 - Php, Ajax, JSON

### Documentation

In this lab you will have to develop a server-side web application in PHP. The web application has to manipulate a Mysql database with 1 to 3 tables and should implement the following base operations on these tables: select, insert, delete, update. Also the web application must use AJAX for getting data asynchronously from the web server and the web application should contain at least 5 web pages (client-side html or server-side php).

For the database, you can use the mysql database on www.scs.ubbcluj.ro. On this myql server you have an account, a password and a database, all identical to your username and password on the SCS network.

Please make sure that you avoid sql-injection attacks when working with the database.

Have in mind the user experience when you implement the problem:
add different validation logic for input fields
do not force the user to input an ID for an item if he wants to delete/edit/insert it; this should happen automatically (e.g. the user clicks an item from a list, and a page/modal prepopulated with the data for that particular item is opened, where the user can edit it)
add confirmation when the user deletes/cancels an item
do a bare minimum CSS that at least aligns the various input fields
Documentation can be found at:
1) http://www.cs.ubbcluj.ro/~forest/wp
2) http://www.php.net/manual/en
3) http://www.w3schools.com/php
4) http://www.w3schools.com/ajax

### Problem

Write a web application for managing vacation destinations. A destination has in the database besides the name of the location (i.e. city etc.), the country name, description, tourist targets in that location an an estimated cost per day. The user can add, delete or modify the destinations and he can also browse the vacation destinations grouped by countries (use AJAX for this). Vacation destination browsing should be paged - destinations are displayed on pages with maximum 4 vacation destinations on a page (you should be able to go to the previous and the next page).

## Lab 8 - Angular, Php

Develop an Angular UI (user interface) for the PHP lab task you have solved for Lab7. So, the problem you need to solve for this lab will be the same problem you had for Lab7 (PHP, Ajax, JSON), the backend of the solution will be the same (i.e. the php code), but you have to change the frontend (html, css, javascript part) to be an Angular application.
