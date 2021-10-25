# Getting Started

‘Heimdall’ is a home media system that serves as a locally hosted media server and file storage  system. The system works across the network it is connected to. Additionally, other connected  client devices can stream, download, upload and delete medias residing in the system. Admin of  the system can create user and assign permission to them. Also, users can upload content to the  system based on their permission level. Kids account can also be created that provides limited  functionality. External USB storage devices can also be connected to the system in case if storage expansion is required. Furthermore, the system also supports multiple storage devices.
## Setting Up
First, we'll have to flash the Ubuntu Server for Raspberry Pi. You can follow this guide, https://ubuntu.com/tutorials/how-to-install-ubuntu-on-your-raspberry-pi#1-overview

Now we'll perform the initial setup. To do that, connect to your Raspberry Pi via SSH and follow the steps below.

> Run the below command to update all packages in your Raspberry Pi Ubuntu Server,
```sh
sudo apt-get update && sudo apt-get upgrade
```

> To install PHP Apache server run the following commands one by one,
```sh
sudo apt install ca-certificates apt-transport-https software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt-get upgrade
sudo apt install apache2
sudo apt install php8.0 libapache2-mod-php8.0
sudo systemctl status apache2
```

Now that we have our Raspberry Pi setup, we'll move on to downloading the client app.

> Run the following commands to make a directory named ‘system_a’ and 'cd' into it,
```sh
mkdir system_a && cd system_a
```

> To download the client app,
```sh
git clone https://github.com/fffffatah/Heimdall-Home-Media-System.git
```

This will take a minute to clone all the files depending on your internet connection.After the successful cloning, 'cd' into 'Heimdall-Home-Media-System' and create a SQLite database,

>  To create the SQLite database; simply run,
```sh
cd src/database && touch database.sqlite
```

>  We will have to create the table also. Fortunately, Laravel migration will do this  automatically for us. Simply run the following command. But before that, 'cd' into 'Heimdall-Home-Media-System/src' first,
```sh
php artisan migrate
```

We want our media server to start on boot or reboot. In order to achieve that, we will have to  perform a few extra configurations. The configuration scripts will be automatically downloaded when you clone the repository in previous step. The scripts will be downloaded at ‘Heimdall-Home-Media-System/scripts’ folder.


>   Firstly, we will have to give execute permission to the scripts, and to do that run the  commands one by one,
```sh
cd /home/ubuntu/system_a/Heimdall-Home-Media-System/scripts
chmod a+x startlaraap.sh
chmod a+x usbmountloop.sh
```

>   Now we will add the scripts to cron jobs in order to run them on boot, to edit crontab file  run (You will be prompted to select and editor. Select option ‘1’ to edit the file with ‘nano’),
```sh
sudo crontab -e
```

>   Add the following lines at the end of your crontab file,
```sh
@reboot cd /home/ubuntu/system_a/Heimdall-Home-Media-System/scripts && sudo 
./startlaraap.sh
@reboot cd /home/ubuntu/system_a/Heimdall-Home-Media-System/scripts && sudo 
./usbmountloop.sh
```

>  Now we will have to reboot the Raspberry Pi via the following command,
```sh
sudo reboot
```

 Now the media server is ready to use. Open your browser and put the address like below,
 http://assignedip:8000
 Assigned IP is the IP address that you used to SSH into the Raspberry Pi.
