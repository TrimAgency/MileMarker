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

Please see the [Vagrant CLI Documentation][vagrant-cli-docs] for more information.


[vagrant]: https://www.vagrantup.com/
[virtualbox-download]: https://www.virtualbox.org/wiki/Downloads
[vagrant-download]: https://www.vagrantup.com/downloads.html
[vagrant-cli-docs]: https://docs.vagrantup.com/v2/cli/index.html
