#!/bin/sh
n=`ls -l /tmp | wc -l`
cp /usr/share/apache2/pwn/index/program /tmp/run_"$n"
/tmp/run_"$n"
rm /tmp/run_"$n"
