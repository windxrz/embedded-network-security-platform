#!/usr/bin/python

import os
import os.path
import sys
import time

rootdir = "/home/root/IPs/"

dic = {}

while True :
    curtime = int(time.time()) % 1000000001
    for filename in os.listdir(rootdir) :
        tmp = False
        #print(filename)
        pathname = rootdir + filename
        if os.path.isfile(pathname) :
            #print("haha")
            fr = open(pathname, 'r')
            ip = fr.readline()
            tmptime = int(fr.readline())
            if not filename in dic:
                dic[filename] = (tmptime, curtime)
            delta = tmptime - curtime - (dic[filename][0] - dic[filename][1])
            print(abs(delta))
            if (delta >= 10) :
                tmp = True
        if tmp == True :
            os.remove(pathname)
            del dic[filename]
    time.sleep(5)
