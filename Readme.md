Trav_Well
=========


###Installation
Regardless of your OS you will need to set up a mysql database named "Trav_well". After this database is created, run the trav_well.sql script located in the root Trav_well directory to create the tables and input the data into the Trav_well database.

Also, ensure that the username and password of your Trav_well database match the username and password in applications/config/database.php

##Windows
To run our website, please go to Trav_well/application/controllers, and run the home.php

##Linux
To host the server simply enter the command: 'php -S localhost:<i>port</i> -t <i>path/to/rootdir</i>'



###Overview
We use codeigniter and bootstrap for this project.
Images are stored in assets/images.
All page layouts can be found in application/views.
There are controllers in application/controllers that control various functionality. home.php controls functions related to page loading. interaction.php controls user interactions such as messaging or adding friends. authorize.php contains the login system, and search.php contains search functionality.
All database actions are controlled by models in the application/models folder. These files are pretty straightforwardly named, although it should be noted that the difference between a place and a city is that a place is contained within a city. (i.e. a certain restaurant).
The actual layout of the web pages can be found in application/views. Again these should be pretty straightforwardly named.


###Homepage, Login Page
On homepage, click the title on top-left corner; then the page can jump back to the homepage.
If click on the login button on top-right corner, the page will jump login page. On login page, the user can use the left section to login and use the right section to register an account. 
Beside login button, there is a search bar and search button used for searching.

###City info Page
After selecting a specific city by clicking the image at the bottom of homepage, the page will jump to a city info page, whcih shows a brief introduction of the city the user selected.

###Restaurant page
Having the same side bar as the Toronto page, the same function. If we click Overview button, we will go to the Toronto page. If we click Restaurants button, we will stay on the current page.
This page has a list of restaurants with information, such as name, address, contact information, picture, has been there of want to go there. What’s more, you can rate these restaurants.

###Member info Page
This page is used to record member profile with some basic information. 

###Friends
You can send someone a friend request by clicking the "Add as friend" button on their profile. This friend will not be visible on the friends page until they confirm your request.
If a user wishes to go to a similar location as another user, they will be suggested

###Messaging
You can send any valid user a message. Messages can be up to 20,000 characters and will appear on that user's messages screen.
