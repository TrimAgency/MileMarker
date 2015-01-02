#!/usr/bin/env bash

# This is where the variables for the rest of the installation are created
USER=vagrant
DBROOTPASSWORD=lostyetinthyme
DBNAME=wordpress
DBUSER=wp_user
DBPASSWORD=mordidapotdevin
DBPREFIX=wp_
SITENAME=localhost

echo "Provisioning virtual machine..."


echo "Updating apt sources..."
sudo apt-get update -qq > /dev/null


echo "Installing and securing MariaDB..."

echo "mysql-server mysql-server/root_password password $DBROOTPASSWORD" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $DBROOTPASSWORD" | debconf-set-selections
sudo apt-get install -qq mariadb-server > /dev/null
sudo mysql_install_db

# Emulate results of mysql_secure_installation, without using 'expect' to handle input
mysql --user=root --password=$DBROOTPASSWORD -e "UPDATE mysql.user SET Password=PASSWORD('$DBROOTPASSWORD') WHERE User='root'"
mysql --user=root --password=$DBROOTPASSWORD -e "DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1')"
mysql --user=root --password=$DBROOTPASSWORD -e "DELETE FROM mysql.user WHERE User=''"
mysql --user=root --password=$DBROOTPASSWORD -e "DELETE FROM mysql.db WHERE Db='test' OR Db='test\_%'"
mysql --user=root --password=$DBROOTPASSWORD -e "FLUSH PRIVILEGES"


echo "Installing PHP and disabling path info default settings..."
sudo apt-get install -qq php5-fpm php5-mysql php5-gd libssh2-php php5-cli > /dev/null
sudo cp /etc/php5/fpm/php.ini /etc/php5/fpm/php.ini.orig
sudo sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php5/fpm/php.ini
sudo service php5-fpm restart


echo "Installing NGinx and removing default config..."
sudo apt-get install -qq nginx > /dev/null

# If you want to test your Nginx-PHP config, uncomment the lines below, but be SURE to delete the .php file after testing
# sudo cp /etc/nginx/sites-available/default /etc/nginx/sites-available/default.orig
# sudo cp /vagrant/provision/nginx.php /etc/nginx/sites-available/default
# sudo service nginx reload
# sudo cp /vagrant/provision/info.php /usr/share/nginx/html/info.php

# Remove the default nginx config from sites-enabled
sudo rm /etc/nginx/sites-enabled/default


echo "Setting up NGinx for Wordpress..."
sudo cp /vagrant/provision/nginx/common /etc/nginx -r
sudo cp /vagrant/provision/nginx/wptemplate.nginx /etc/nginx/sites-available/$SITENAME
sed -i "s/SITENAME/$SITENAME/g" /etc/nginx/sites-available/$SITENAME
sudo ln -s /etc/nginx/sites-available/$SITENAME /etc/nginx/sites-enabled/
sudo mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.orig
sudo cp /vagrant/provision/nginx/nginx.conf /etc/nginx/
sudo service nginx reload
sudo service php5-fpm restart


echo "Setting up database for Wordpress..."
mysql --user=root --password=$DBROOTPASSWORD -e "CREATE DATABASE $DBNAME;"
mysql --user=root --password=$DBROOTPASSWORD -e "CREATE USER $DBUSER@localhost IDENTIFIED BY '$DBPASSWORD';"
mysql --user=root --password=$DBROOTPASSWORD -e "GRANT ALL PRIVILEGES ON $DBNAME.* TO $DBUSER@localhost;"
mysql --user=root --password=$DBROOTPASSWORD -e "FLUSH PRIVILEGES;"


echo "Downloading and installing Wordpress and dependencies..."
# Download and extract Wordpress, and delete archive
curl -L --silent http://wordpress.org/latest.tar.gz > /tmp/latest.tar.gz
tar xzfC /tmp/latest.tar.gz /tmp
rm /tmp/latest.tar.gz


echo "Setting up Wordpress configurations and file permissions..."
# Setup Wordpress config file with database info
cp /tmp/wordpress/wp-config-sample.php  /tmp/wordpress/wp-config.php
sed -i "s/database_name_here/$DBNAME/"  /tmp/wordpress/wp-config.php
sed -i "s/username_here/$DBUSER/"       /tmp/wordpress/wp-config.php
sed -i "s/password_here/$DBPASSWORD/"   /tmp/wordpress/wp-config.php
sed -i "s/wp_/$DBPREFIX/"               /tmp/wordpress/wp-config.php


echo 'Setting up and configuring WP CLI, command-line tools for WordPress'
WP_CLI=/tmp/wp-cli
curl -L --silent https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > ${WP_CLI}
chown root:vagrant ${WP_CLI}
chmod 750 ${WP_CLI}
mv ${WP_CLI} /usr/local/bin/
sudo cp /vagrant/provision/user/wp-cli.yml ${HOME}/


# Add authentication salts from the Wordpress API
SALT=$(curl -L --silent https://api.wordpress.org/secret-key/1.1/salt/)
STRING='put your unique phrase here'
printf '%s\n' "g/$STRING/d" a "$SALT" . w | ed -s /tmp/wordpress/wp-config.php

# Move Wordpress to appropriate directory and set file permissions
SITEPATH=/var/www/$SITENAME
sudo mkdir -p $SITEPATH/html
sudo rsync -aqP /tmp/wordpress/ $SITEPATH/html
sudo mkdir $SITEPATH/html/wp-content/uploads
sudo chown -R $USER:www-data $SITEPATH/*
rm -r /tmp/wordpress

# Setup file and directory permissions on Wordpress
sudo find $SITEPATH/html -type d -exec chmod 0755 {} \;
sudo find $SITEPATH/html -type f -exec chmod 0644 {} \;
sudo chmod 0640 $SITEPATH/html/wp-config.php


echo "Success! Navigate to your website's URL to finish the setup..."
