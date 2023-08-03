php notes
      zoho link https://people.zoho.com/hrportal1524037045856/zp#task/mytask
      https://ded1875.inmotionhosting.com:2096/cpsess0975465567/3rdparty/roundcube/?_task=mail
      

	    To show All errors in script
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

	    Ubunto Commands list
		https://miarsiddique.medium.com/ubuntu-development-setup-5b49dfe1755a 
		Ubuntu Development Setup
		https://miarsiddique.medium.com

	    Composer installation
		https://mirasvit.com/knowledge-base/magento-2-installation-guide-composer-sample-data.html#:~:text=To%20install%20Composer%20on%20your,phar%20%2Fuse%2Flocal%2Fbin 
	    
	    To install magento
	    https://www.youtube.com/watch?v=vw4fLahgRpw&list=PLgOUQYMnO_STuEpuiUHh7NXCQuw5igXnP

	    To change php version
		--------Change Terminal Php Version 
		        sudo update-alternatives --config php  
		        --------change php verion in apache 
		        sudo a2dismod php5 
		        sudo a2enmod php7.0 

	   Apache Commands
		sudo a2enmod rewrite
		sudo systemctl restart apache2
		
	
           Username: Your public Key  2fc966a913d4e83b28041eeb3c3b72e5
           Password: Your private key. 48e05400d17ca1bcb4e693825c45416e

	  To install magento
		Elastic Search-->
		    sudo apt-get remove --purge elasticsearch
		    sudo rm -rf /etc/elasticsearch
		    sudo rm -rf /var/lib/elasticsearch
		    sudo apt-get update
		    sudo apt-get install elasticsearch
		    systemctl elastcisearch stop
		    sudo systemctl start elasticsearch
		    curl http://localhost:9200/


	    To Migrate  env files in db
		sudo apt-get install -y php8.1 libapache2-mod-php8.1 
		php8.1-curl php8.1-gmp php8.1-mbstring php8.1-phpdbg 
		php8.1-sqlite3 php8.1-zip php8.1-bcmath php8.1-dba php8.1-imap 
		php8.1-pspell php8.1-sybase php8.1-bz2 php8.1-dev php8.1-interbase
		 php8.1-mysql php8.1-readline php8.1-tidy php8.1-cgi php8.1-enchant 
		 php8.1-intl php8.1-odbc php8.1-xml php8.1-cli php8.1-fpm php8.1-json 
		 php8.1-opcache php8.1-snmp php8.1-xmlrpc php8.1-common php8.1-gd php8.1-ldap 
		 php8.1-pgsql php8.1-soap php8.1-xsl php8.1-mongo php8.1-mysql 

	    Commands for Update Changes in magento project
	    
		rm -rf var/di/ var/generation/ var/cache/ var/tmp/ var/page_cache/ var/session/* var/view_preprocessed/ pub/static/frontend generated/ 
		<------>
		php -dmemory_limit=-1 bin/magento setup:upgrade 
		php -dmemory_limit=-1 bin/magento setup:d:c 
		php -dmemory_limit=-1 bin/magento setup:s:d -f
		php -dmemory_limit=-1 bin/magento c:c 
		php -dmemory_limit=-1 bin/magento c:f 
		chmod -R 0777 .
		 <------>
		php -dmemory_limit=-1 bin/magento ind:res 
		php -dmemory_limit=-1 bin/magento ind:rei 
		
          Command For Disable Two Factor Auth
                bin/magento module:disable Magento_TwoFactorAuth
		
	   Magento Modes
		bin/magento cache:flush
		bin/magento deploy:mode:set production
		bin/magento deploy:mode:set developer
		bin/magento cache:flush



