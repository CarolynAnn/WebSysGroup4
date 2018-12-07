RPI Events - a platform for sharing events with the RPI community
Web Systems Development Group 4.

Contributors: Carolyn Zhang, Trulee Hersh, Harman Singh, Jon-Luke Williams

Github repository: https://github.com/CarolynAnn/WebSysGroup4

Setup: Clone the git repository into your xampp/htdocs folder. Start the xampp server. Locate the rpi_events.sql file and manually import it into localhost/phpmyadmin. Locate the config.php and functions.php files. In these, enter your credentials for your mysql database. (Primarily the username and password). Navigate to the website.

Project Structure:
root folder:
	- contains all php pages visible to the end user
	- README
	- includes folder: php files that are included in the visible pages. Configures the database and renders the navigation bar.
	- resources folder:
		- css folder: contains styling files for website
		- functions folder: contains functions used for backend data processing. For code simplicity.
		- sql folder: contains database to be imported.
		- scripts: contains Javascript files that render the data onto the page. 
