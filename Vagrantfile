# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

	config.vm.provider "virtualbox" do |v|
	  v.memory = 4096
	  v.cpus = 4
	end
	
    config.vm.box = "ubuntu/trusty64"
    config.ssh.insert_key = false
    config.vm.synced_folder ".", "/vagrant", disabled: true

    config.vm.define "default" do |node|

		node.vm.hostname = "default"
		node.vm.network "private_network", ip: "192.168.50.10"
        node.vm.synced_folder "./", "/home/vagrant/code", mount_options: ["dmode=755,fmode=744"]
        
        # Install required packages
		node.vm.provision :shell, :inline => "apt-get update"
		node.vm.provision :shell, :inline => "apt-get install -y php5-cli"
		node.vm.provision :shell, :inline => "apt-get install -y php5-curl"
		node.vm.provision :shell, :inline => "apt-get install -y git"
        
        #Composer
		node.vm.provision :shell, :inline => "wget https://getcomposer.org/installer --output-document=/home/vagrant/composer-setup.php"
		node.vm.provision :shell, :inline => "php /home/vagrant/composer-setup.php --install-dir=/home/vagrant"
		node.vm.provision :shell, :inline => "rm /home/vagrant/composer-setup.php"
    end
end