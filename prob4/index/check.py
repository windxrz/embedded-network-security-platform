#!/usr/bin/env python

from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
import os
import sys
from urllib import unquote
import subprocess

name = unquote(sys.argv[1])
ip = subprocess.Popen(["configure_edison", "--showWiFiIP"], stdout=subprocess.PIPE).communicate()[0][: -1]
browser = webdriver.PhantomJS(service_log_path='./ghostdriver.log')
_ = browser.get("http://{}:7074/hack.php?name={}".format(ip, name))
if len(browser.get_log('browser')) > 0:
    print "ok"
else:
    print "wrong"
