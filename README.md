
Steps to run laravel and access the API
 1. Get your machine set up with laravel. follow the steps in https://laravel.com/docs/5.3
 2. Downlowd the Zip form github and extract it in a folder in your drive.
 3. Open the folder in command prompt. 
 For Windows-
 Hold Shift key and right click on the folder and select "Open Command Window Here".
 For Linux-
 Open terminal and then type "cd ". Drag the folder to the terminal and hit enter.
 4. Now that you have opened the folder in the terminal/ command prompt, you can start the server.
 type "php artisan serve " in the terminal/command prompt.
 5.Open your beowser and copy any of the following url and paste it in the url section.

http://localhost:8000/api/stocks  
(all the stock details in JSON format)


http://localhost:8000/api/stocks/up  
(All the details with stocks trending UP)


http://localhost:8000/api/stocks/down 
(All the details with stocks trending Down)


***WIth Vue Update***

Steps to run the stock webpage-

1. Install laravel 5.3 on your machine. (Follow the steps given in the start of this page) And download the git repository.
2. Open the folder in command line/Terminal and type ` npm install ` and hit enter. (This will install the dependencies mentioned in package.json)
3. Type ` php artisan serve ` to start the server.
4. Open the Internet browser and visit http://localhost:8000/stocks

