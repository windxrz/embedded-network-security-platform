#!/bin/sh
n=`ls -l /tmp | wc -l`
echo $n
cp /usr/share/apache2/1/program /tmp/run_"$n".dms
/tmp/run_"$n".dms
rm /tmp/run_"$n".dms
