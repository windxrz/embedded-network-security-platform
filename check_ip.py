import os
import os.path
import sys
import time

rootdir = "/home/root/IPs/"

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
            print(tmptime)
            if(curtime < tmptime) :
                curtime += 1000000001
            if(curtime - tmptime > 5) :
                tmp = True
        if tmp == True :
            os.remove(pathname)
    time.sleep(5)

