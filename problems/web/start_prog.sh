#!/bin/sh
cd website
tmux new-session -d -s "WebServer" ./server.py
