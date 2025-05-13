***** INSTALLING WAMP *****

1. Go to this website: https://www.wampserver.com/en/
2. Click "Start using wampserver"
3. Click "WAMPSERVER 64 BITS (X64) 3.3.7"
4. Click "you can download it directly" on the top

** BEFORE INSTALLATION **
1. Go to this website: https://wampserver.aviatechno.net
2. Select "VC++ Packages"
3. Under Microsoft VC Packages x64 (64bits) select VC 2015-2022 (VC17 x64) 14.42.34438 MD5
4. Download it and install it as administrator
5. You will probably have to restart your computer

** CONTINUING INSTALLING WAMP **
1. Now you can install wampserver
2. Remember what path you install (probably C:\wamp64)
3. Just follow the instructions and start the server

***** ADDING THE PROJECT TO YOUR LOCAL WEBSERVER *****
1. Download the contents of the github repo https://github.com/vidovicsb/DEV640/tree/main using this website:
	https://download-directory.github.io/?url=https%3A%2F%2Fgithub.com%2Fvidovicsb%2FDEV640%2Ftree%2Fmain
2. Copy 'robinsnest' folder and paste it into the 'www' folder in the directory where you installed wamp.
	Probably C:\wamp64\www
3. All the project's content should be in this path: C:\wamp64\www\robinsnest
4. Open your browser and go to 'localhost'. Make sure you see 'robinsnest' under Your Projects in the bottom


***** CREATING THE DATABASE *****
1. Go to localhost/phpmyadmin
2. Log in --> username: 'root'; password: '' (leave it empty)
3. Go to 'Databases' on the top
4. Go to 'Import'
5. Upload 'robinsnest.sql' that you downloaded from the github repo
6. Hit 'Import' on the bottom


***** CREATING A USER *****
1. Select 'User accounts' on the top
2. Select 'Add user account'
3. User name should be 'robinsnest'
4. Host name should be changed from 'Any host' to 'Local'
5. Password needs to be 'password'
6. Type in password again at 'Re-type'
7. Check 'Create database with same name and grant all privileges.' under 'Database for user account'
8. Check 'Check all' under 'Global privileges'
9. Hit 'Go' on the bottom

***** CHECK IF USER IS CREATE PROPERLY *****
1. Log out from the MySQL database on the top left side (under phpMyAdmin, 2nd icon from the left)
2. Log in with the credentials (username: 'robinsnest'; password: 'password'
3. If not good, log back in with username: 'root' and doublecheck if you created the user properly
	in the previous step


***** LAUNCHING THE APP *****
1. Go to 'localhost/robinsnest' in your browser
2. Everything should work