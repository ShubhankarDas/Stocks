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
 * Git
 
## Steps

 1. Install [Git](https://git-scm.com/downloads).
 
 2. Clone or download this repository to your local dirve. 
   Example -
   
   `G:\Projects\Websites\Code\Stocks`
   
 3. Change `localhost:8000` to `homestead.app` in the `Stocks/public/js/main.js` and `Stocks/public/js/app.js` 
 
 4. Rename `.env.example` in `Stocks` directory to `.env` and open this file using any text editor. Assign `base64:+HMzB7jumsYTV5xib9MKptqNP/rhkcUNI3Y6w/dgOac=` to the `APP_KEY` property and save it.
   
 5. Install PHP 
  * If you are using [WampServer](http://www.wampserver.com/) or [Xampp](https://www.apachefriends.org/index.html) then make sure you are using php version >= 5.6. 
  
 6. Install [Composer](https://getcomposer.org/download/).
 
 7. Creat an empty folder named `vendors` in the downloaded `Stocks` folder.
 
 8. Open the `Stocks` folder in the terminal.
   * For Windows - 
      Open the folder in the Explorer and Hold Shift key and right click on the folder and select "Open Command Window Here".
   * For Linux - 
       Open terminal and then type `cd ` and Drag the folder to the terminal and hit enter.
       
 9. Install Laravel with `composer global require "laravel/installer"` command in the terminal.

 10. Now install the project dependencies by using `composer install`. This will install plugins like vue.js, symphony,etc which is being used by this laravel project.
 
 11. After this we need to set up [Homestead](https://laravel.com/docs/5.3/homestead) Environment. For this you need to install-
   * [VirtualBox](https://www.virtualbox.org/wiki/Downloads)  >=v5.1
   * [Vagrant](https://www.vagrantup.com/downloads.html)
   
   You can even follow the [laravel documentation](https://laravel.com/docs/5.3/homestead) and meet us in step 17.
   
 12. Now add laravel/homestaed to your vagrant installation from your terminal using `vagrant box add laravel/homestead` command.
 If this command fails, make sure your Vagrant installation is up to date.
 
 13. After adding the laravel/homestead, now you need to add Homestaed repository. Concider cloning the Homestead repository. Open your terminal and follow the commands - 
 
 ```
  cd ~
  
  git clone https://github.com/laravel/homestead.git Homestead
 ```
 
 14. Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file. The Homestead.yaml file will be placed in the ~/.homestead hidden directory:
 ```
  // Mac / Linux...
  bash init.sh

  // Windows...
  init.bat
 ```
 15. Now you need to make some changes in the `~/.homestead/Homestead.yaml` file. Open this file using notepad or any text editor.
   * Under the 'folders' key change `map` property to the parent directory of where you have cloned/downloaded this repository.
   
   ```
   folders:
    - map: G:\Projects\Websites\Code 
      to: /home/vagrant/Code
      `
      
   * Under the `sites` key - 
   `sites:
    - map: homestead.app
      to: /home/vagrant/Code/Stocks/public
   ```
      
 16. Now you need to add the domains in your `HOST` file of your machine.  On Mac and Linux, this file is located at `/etc/hosts`. On Windows, it is located at  `C:\Windows\System32\drivers\etc\hosts`. The lines you add to this file will look like the following:
  `192.168.10.10  homestead.app`
  
 17. Make sure the project is updated. For this run `composer update` from your `Stocks` directory. 
  
 18. To launch Homestead, run the `vagrant up` command from your Homestead directory. Now open your browser and go to `homestead.app` and you should see the laravel home page.
  
## Sites 

* http://homestead.app/api/stocks  (all the stock details in JSON format)
* http://homestead.app/api/stocks/up  (All the details with stocks trending UP)
* http://homestead.app/api/stocks/down (All the details with stocks trending Down)
* http://homestead.app/stocks  (All the details in tabular format)
