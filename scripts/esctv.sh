#!/bin/bash
# OctaShape Binary
osbin=http://www.octoshape.com/files/octosetup-linux_i386.bin

# Download OctaShape
cd /tmp
wget -c $osbin
sh octosetup-linux_i386.bin
cd octoshape

./OctoshapeClient -url:EBU.esc2010.final;rtmp=false