# vi: set ft=ruby :

# Project name, used for naming folders, hostname, etc.
PROJECT_NAME = "booster"

# Directory name of related Vagrant files and data
VAGRANTFILE_DATA = "Vagrantfile-data"

# Path to a local Vagrantfile that won't be checked into git that can be used
# for local/private configuration.
VAGRANTFILE_LOCAL = File.join(VAGRANTFILE_DATA, "Vagrantfile.local")

# The path on the VM where our project gets synced.
PROJECT_SYNCED_FOLDER = "/home/vagrant/#{PROJECT_NAME}"

VAGRANTFILE_API_VERSION = "2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # All Vagrant configuration is done here. For a complete reference,
  # please see the online documentation at vagrantup.com.

  config.vm.hostname = "#{PROJECT_NAME}.local"
  config.vm.box = "relativkreativ/centos-6-minimal"

  # VirtualBox DNS proxy apparently fails when using TCP. This can murder
  # performance when doing certain network heavy activities, like installing
  # packages or Ruby gems.
  # https://github.com/rubygems/rubygems/issues/513
  # https://github.com/mitchellh/vagrant/issues/1313
  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
  end

  config.ssh.username = "vagrant"
  # Override this in a local file if you need to.
  #config.ssh.private_key_path = "~/.ssh/nondefault-vagrant-id_rsa"
  #config.ssh.forward_agent = true

  # Move default synced folder.
  config.vm.synced_folder ".", "/vagrant", :disabled => true
  config.vm.synced_folder ".", PROJECT_SYNCED_FOLDER

  # Forward port 8080 for web testing.
  config.vm.network :forwarded_port, :guest => 80, :host => 8080
  config.vm.network :forwarded_port, :guest => 443, :host => 8443

  # Use a local shell script to provision our vm.
  config.vm.provision "shell" do |s|
    # UGLY workaround to pass env vars to the provisioning script.
    provision_script_path = File.join(PROJECT_SYNCED_FOLDER, VAGRANTFILE_DATA, "provision.sh")
    s.inline = <<-EOF
      export PROJECT_NAME=#{PROJECT_NAME}
      export PROJECT_ROOT=#{PROJECT_SYNCED_FOLDER}
      export VAGRANTFILE_DATA=#{File.join(PROJECT_SYNCED_FOLDER, VAGRANTFILE_DATA)}
      #{provision_script_path}
    EOF
    # The script expects to be run as a normal user, not root.
    s.privileged = false
  end
end

# eval the local Vagrantfile, if it exists. The file should contain a
# Vagrant.configure(VAGRANTFILE_API_VERSION) call similar to the one above.
eval IO.read(VAGRANTFILE_LOCAL) if File.file?(VAGRANTFILE_LOCAL)
