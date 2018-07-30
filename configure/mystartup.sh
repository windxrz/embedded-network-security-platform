#!/bin/bash
systemctl enable wpa_supplicant
wpa_supplicant -B -Dnl80211 -iwlan0 -c/etc/wpa_supplicant/wpa_supplicant.conf
busybox udhcpc -i wlan0
configure_edison --showWiFiIP > /tmp/ip.txt
sshpass -p "edison123" scp /tmp/ip.txt root@192.168.1.2:/home/root/IPs/ip_green.txt
source ~/.bashrc
