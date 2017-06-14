# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.hostname = "symfony-party-box"
  config.vm.box_check_update = false
  config.vm.network "private_network", ip: "192.168.33.133"
  config.vm.synced_folder ".", "/var/www/symfony-party", :nfs => true

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
    vb.cpus = "2"
    vb.name = "symfony-party box"
  end

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y --no-install-recommends curl ca-certificates python-software-properties software-properties-common
    add-apt-repository -y ppa:ondrej/php
    apt-get update
    apt-get -yqq --allow-unauthenticated install php7.1-cli php7.1-curl php7.1-zip php7.1-xml php7.1-intl
    apt-get clean
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
  SHELL
end
