#!/usr/bin/python
# -*- coding: utf-8 -*-
#
# Licensed under GPL v2
# Copyright 2009, Aşkın Yollu <askin@askin.ws>
#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free
# Software Foundation; either version 2 of the License, or (at your option)
# any later version.
#
# Please read the COPYING file.
#

import subprocess

class Connection:
    def __init__(self, conffile, logfile):
        self.confFile = conffile
        self.interface = ""
        self.driver = ""
        self.logfile = logfile

    def authorize(self, interface, driver):
        self.interface = interface
        self.driver = driver
        command = ["/usr/sbin/wpa_supplicant", "-B", "-D%s" % self.driver, "-i%s" % self.interface, "-c%s" % self.confFile]

        try:
            subprocess.call(command)
        except:
            print "Crate process failed!!!"

    def getip(self):
        try:
            subprocess.call(["dhcpcd", self.interface])
        except:
            print "Get IP fails"

        def findWirelessInterfaces(self):
            ''' Finds wireless interface '''
            fileName = 'wireless'
            for interface in os.listdir('/sys/class/net'):
                if os.path.exists(os.path.join(self.class_path, interface, fileName)):
                    return interface
