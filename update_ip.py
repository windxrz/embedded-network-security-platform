#!/usr/bin/python

import os
import sys
import time

while True :
    ip = os.system("configure_edison --showWiFiIP > /tmp/ip.txt")
    curtime = int(time.time()) % 1000000001
    print(curtime)
    fw = open("/tmp/ip.txt", 'a+')
    fw.write(str(curtime))
    fw.close()
    os.system('sshpass -p "edison123" scp /tmp/ip.txt root@192.168.1.2:/home/root/IPs/TERM_NAME.txt')
    time.sleep(5)
