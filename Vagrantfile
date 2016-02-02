# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.require_version ">= 1.8.1"

$vm_gui = false
$vm_memory = 4096
$vm_cpus = 2
# VM name
$vm_name = 'dev.sug.org'
# Choose random addr from 192.168.X.X
$vm_ip = '192.168.108.19'

# Use old vb_xxx config variables when set
def vm_gui
  $vb_gui.nil? ? $vm_gui : $vb_gui
end

def vm_memory
  $vb_memory.nil? ? $vm_memory : $vb_memory
end

def vm_cpus
  $vb_cpus.nil? ? $vm_cpus : $vb_cpus
end

Vagrant.configure(2) do |config|

  config.vm.box = "geerlingguy/centos7"
  config.vm.hostname = $vm_name

  ["vmware_fusion", "vmware_workstation"].each do |vmware|
    config.vm.provider vmware do |v|
      v.gui = vm_gui
      v.vmx['memsize'] = vm_memory
      v.vmx['numvcpus'] = vm_cpus
    end
  end

  config.vm.provider :virtualbox do |vb|
    vb.gui = vm_gui
    vb.memory = vm_memory
    vb.cpus = vm_cpus
  end

  # always use Vagrants insecure key
  config.ssh.insert_key = false

  config.vm.network :private_network, ip: $vm_ip

  config.vm.synced_folder ".", "/vagrant/sug", id: "default", :nfs => true, :mount_options => ['nolock,vers=3,udp,actimeo=2']

  # Provision nodes with Ansible
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = 'ansible/provision.yml'
    ansible.inventory_path = 'ansible/inventory/development'
    ansible.limit = 'all'
  end
end
