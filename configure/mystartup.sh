#!/bin/bash
systemctl enable wpa_supplicant
wpa_supplicant -B -Dnl80211 -iwlan0 -c/etc/wpa_supplicant/wpa_supplicant.conf
busybox udhcpc -i wlan0
source ~/.bashrc
/usr/share/apache2/start.sh
