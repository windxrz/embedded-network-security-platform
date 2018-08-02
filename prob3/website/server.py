#!/usr/bin/env python
# -*- coding: utf-8 -*-
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
# @file: server.py
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
# Contributors:
#   Korepwx              <public@korepwx.com>

import os
import cgisvr
import BaseHTTPServer


class Handler(cgisvr.CGIHTTPRequestHandler):
    cgi_directories = ["/"]


os.chdir('www')
httpd = BaseHTTPServer.HTTPServer(("", 10010), Handler)
httpd.serve_forever()
