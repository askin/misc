#!/usr/bin/python
# -*- coding: utf-8 -*-
#
# Copyright (C) 2009, Aşkın Yollu <askin@askin.ws>
#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free
# Software Foundation; either version 2 of the License, or (at your option)
# any later version.
#

import dbus
import time
import os

ip = "192.168.3.1"
pingtime = 60
while True:
    try:
        ping = os.popen("ping -q -c2 " + ip)
        lines = ping.readlines()
        line = lines[3]

        if(line.find("100% packet loss") > -1):
            kn = dbus.SessionBus().get_object("org.kde.knotify", "/Notify")
            i = kn.event("warning", "kde", [], "Access Point Crash", [0,0,0,0], [], 0, dbus_interface="org.kde.KNotify")

        time.sleep(pingtime)
    except KeyboardInterrupt:
        print "\nGood By!!!"
        exit()
    except:
        print "We have got a problem"

