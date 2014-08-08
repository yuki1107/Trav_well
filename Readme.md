Trav_Well
=========

####Repository
[Repo Link](https://github.com/yuki1107/Trav_well)


###Installation
Regardless of your OS you will need to set up a mysql database named "Trav_well". After this database is created, run the `trav_well.sql` script located in the root Trav_well directory to create the tables and input the data into the Trav_well database.

Also, ensure that the username and password of your Trav_well database match the username and password in applications/config/database.php

####Windows
To run our website, please go to Trav_well/application/controllers, and run the home.php

####Linux
To host the server simply enter the command:
`php -S localhost:<i>port</i> -t <i>path/to/rootdir</i>`



###Overview
We use codeigniter and bootstrap for this project.
Images are stored in assets/images.
All page layouts can be found in application/views.
There are controllers in application/controllers that control various functionality:

| Controller      | Functions        |
|-----------------|------------------|
|   home.php      | page loading     |
| interaction.php | user interactions (messaging, adding friends, etc) |
| authorize.php   | login system, uploading pictures |
| search.php      | search           |

All database actions are controlled by models in the application/models folder. These files are pretty straightforwardly named, although it should be noted that the difference between a place and a city is that a place is contained within a city. (i.e. a certain restaurant).
The actual layout of the web pages can be found in application/views. Again these should be pretty straightforwardly named.

####Changes To Backlog
We made a bunch of additions to the backlog this iteration. Pretty well everything is new, as it was almost empty before. The reason for this is we wanted the project to be completed before we assessed how secure it would be and how it would scale. Also we needed to learn about scaling and security in class first.

####Testing
There are some users in the database already for testing purposes. User abc has a message, and has posted a comment already. The password for abc is 123456.

###What has been done:

####Phase 3:

| Tasks | Completed by |
|-------|--------------|
|Make the mobile nav bar float | Monica    |
|Localize sidebar code to a single location  | Monica |
|Restrict access to source files   | Monica |
|Encrypt login information     | Monica |
|Fix login page background      | Sean |
|Limit user friends list size    |Sean |
|Limit user inbox size       |Sean |
|Limit # of messages/comments in a short timeframe  |Sean |
|Sort cities alphabetically on main page     | Yuki|
|Make input fields resistant to SQL injections  | Yuki |
|Use multiple pages for listed restaurants, landmarks, etc | Sophie |
|Captchas when registering/logging in        | Shen |
|Prevent users from having “similar” usernames  | Shen |
|Ensure inputs can only accept a limit # of characters | Emmy |


####Phase 2:

|Tasks | Completed by |
|-----------------|------------------|
|Ability to send users messages |  Sean|
|Ability to view messages    |    Sean|
|Ability to add users as friends |    Sean|
|Ability to view friends |    Sean|
|Add edit profile page   |    Shen|
|Allow users to edit their profiles  |    Shen|
|Ability to flag places you want to go   |    Sean|
|Ability to say you've been to places    |    Sean|
|Ability to find users who want to go to the same place as you   |  Monica|
|Restructure and refactor existing code  |  Monica|
|Make city page loading dynamic  |  Monica|
|Make place page loading dynamic |  Monica|
|Login system    |    Yuki|
|Create database |   Sean/Yuki|
|Registration system |    Yuki|
|Give ratings on place pages |  Sean|
|Give comments on place pages    |  Sophie/Emmy|
|make comments display dynamic   |    Yuki|
|Hookup profile page to database |    Sean|
|Search Feature  |    Yuki|
|Search Page |    Shen/Yuki/Monica|
|Collapse menu into header for mobile; Login button disappears   |    Yuki/Monica|
|Input Research into Database    | Sophie/Emmy|


###Homepage, Login Page
On homepage, click the title on top-left corner; then the page can jump back to the homepage.
If click on the login button on top-right corner, the page will jump login page. On login page, the user can use the left section to login and use the right section to register an account.
Beside login button, there is a search bar and search button used for searching.

###City Info Page
After selecting a specific city by clicking the image at the bottom of homepage, the page will jump to a city info page, whcih shows a brief introduction of the city the user selected.

###Place Page
Having the same side bar as the Toronto page, the same function. If we click Overview button, we will go to the Toronto page. If we click Restaurants button, we will stay on the current page.
This page has a list of restaurants with information, such as name, address, contact information, picture, has been there of want to go there. What’s more, you can rate these restaurants.

###Member Info Page
This page is used to record member profile with some basic information.

###Friends
You can send someone a friend request by clicking the "Add as friend" button on their profile. This friend will not be visible on the friends page until they confirm your request.
If a user wishes to go to a similar location as another user, they will be suggested as friends on the friends page.

###Messaging
You can send any valid user a message. Messages can be up to 20,000 characters and will appear on that user's messages screen.
