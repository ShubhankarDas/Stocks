# Stocks Project

Using laravel and Vue.js, I have created a small application which scarpes data from [live stock market](https://www.nseindia.com/live_market/dynaContent/live_watch/equities_stock_watch.htm) and calculates the angle of each graph, and displays it in a very simple layout.

## Dependencies

**This project uses Homestaed with Virtual Box for Laravel to run. For other environment depencies for Laravel you can find it [here](https://laravel.com/docs/5.3/installation) **

 * Laravel 5.3
 * Homestead
 * Virtual Box
 * Vagrant
 * PHP >= 5.6
 * Composer
 
## Steps

 1. Clone or download this repository to your local dirve. 
   Example -
   
   `G:\Projects\Websites\Code\Stocks`
   
 2. Install PHP 
  * If you are using [WampServer](http://www.wampserver.com/) or [Xampp](https://www.apachefriends.org/index.html) then make sure you are using php version >= 5.6. 
  
 3. Install [Composer](https://getcomposer.org/download/).
 
 4. Creat an empty folder named `vendors` in the downloaded `Stocks` folder.
 
 5. Open the `Stocks` folder in the terminal.
   * For Windows - 
      Open the folder in the Explorer and Hold Shift key and right click on the folder and select "Open Command Window Here".
   * For Linux - 
       Open terminal and then type `cd ` and Drag the folder to the terminal and hit enter.
       
 6. Install Laravel with `composer global require "laravel/installer"` command in the terminal.

 7. Now install the project dependencies by using `composer install`.
 
 8. Install Homestead 
 
 
 
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

