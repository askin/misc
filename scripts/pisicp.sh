#!/bin/bash
svn mkdir ~/kelebekpisi/$1
cp ~/pisi_package/$1/actions.py ~/kelebekpisi/$1
cp ~/pisi_package/$1/pspec.xml ~/kelebekpisi/$1
cd ~/kelebekpisi
svn add $1/pspec.xml
svn add $1/actions.py
svn commit -m "packeges $1 was added"
mv ~/pisi_package/$1/$1*.pisi /home/pisi