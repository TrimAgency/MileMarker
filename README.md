# Mile Marker

The Mile Marker Redesign project homepage is on Basecamp: 

- https://basecamp.com/2054284/projects/7168430

You will need the appropriate permissions to access the project.


## Development


### WordPress


#### Vagrant

We are using [Vagrant][vagrant] to spin up development servers for this
project. To get up and running, you will need to do the following:

1. Install [VirtualBox][virtualbox-download].
2. Install [Vagrant][vagrant-download].
3. Open a console in the `vagrant-wordpress` folder.
4. Run `vagrant up`. It will create, setup and configure a Ubuntu web server with WordPress installed.
5. Navigate to http://localhost:8080 on your local machine to complete setup of WordPress.
6. In the `vagrant-wordpress` folder again, run `vagrant ssh` to open a terminal inside the virtual machine.
7. Do `cp /vagrant/provision/user/wp-cli.yml ~/` to copy the WP command-line client configuration. The configuration file defines the path `/var/www/localhost/html` for the WordPress installation. Alternatively, you can add the `--path=/var/www/localhost/html` parameter each time you use the WP CLI tool.
8. Do `wp-cli plugin install advanced-custom-fields` to install the Advanced Custom Fields plugin.
9. Do `wp-cli plugin activate advanced-custom-fields` to activate the Advanced Custom Fields plugin.
10. Do `wp-cli plugin activate mm-products` to activate the Mile Marker Products plugin.
11. Do `wp-cli theme activate milemarker` to activate the Mile Marker theme.

You should now be able to add Products as you would Pages or Posts inside of WordPress.


Please see the [Vagrant CLI Documentation][vagrant-cli-docs] for more information.


[vagrant]: https://www.vagrantup.com/
[virtualbox-download]: https://www.virtualbox.org/wiki/Downloads
[vagrant-download]: https://www.vagrantup.com/downloads.html
[vagrant-cli-docs]: https://docs.vagrantup.com/v2/cli/index.html
