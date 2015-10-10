# HelloWorld
HelloWorld SW Assessment Project (Web Registration Form)

This project is meant to illustrate a simple web registration form.  The setup is as follows:

1 - Linux web server using Apache
2 - MySQL DBMS
3 - HTML, PHP, JavaScript and CSS for the pages

The main page is regiser.php.  This page renders a basic CSS-styled login form which includes simple validation.  
will check for empty fields, valid character type (alpha/numeric).  Once the form is correctly filled out, the user
presses 'Submit' which will send the data to the run.php script.  This script will also perform the same type of validation, 
from the server side.  If there are any errors, they are reported to the user and a link to return is given.  If there are
no errors, then the data is cleansed properly to avoid exploits and inserted into a MySQL table called user_registration.  
A sconnect.php file also details the configurations needed for this connection to work.  Once the data is inserted, the user
is then taken to the confirmation.php page to simply state that the data was collected properly.

The second important item is the reporting page found on admin.php.  This page performs a simple SELECT statement to show all of
the registered users, sorted in descending order based on the timestamp of when they registered.  The HTML table is styled using
CSS and uses and alternating color-scheme for the rows.  

--Tareq Falah
