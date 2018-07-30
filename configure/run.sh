cp mystartup.sh /etc/init.d/
update-rc.d mystartup.sh defaults

cp -r vimrc ~/.vim_runtime
sh ~/.vim_runtime/install_basic_vimrc.sh

cp bashrc ~/.bashrc
source ~/.bashrc

cp -r tunet-cli ~/.tunet-cli

