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

import sys
import time
import getopt
from Configuration import *
from Connection import *

def printUsage():
    print "Usage: %s -i interface -d driver -l logfile -u username -p password -n domain" % sys.argv[0]
    print ""

def main():
    try:
        opts, args = getopt.getopt(sys.argv[1:], "hi:d:l:u:p:n:", [])
    except getopt.GetoptError, err:
        printUsage()
        sys.exit(2)

    interface = ""
    driver = ""
    logfile = ""
    username = ""
    password = ""
    domain = ""

    for o, a in opts:
        if o == "-h":
            printUsage()
            sys.exit(2)
        elif o == "-i":
            interface = a
        elif o == "-d":
            driver = a
        elif o == "-l":
            logfile = a
        elif o == "-u":
            username = a
        elif o == "-p":
            password = a
        elif o == "-n":
            domain = a

    if "" in [interface, driver, logfile, username, password, domain]:
        printUsage()
        sys.exit(2)

    print "interface\t: %s\ndriver\t\t: %s\nlogfile\t\t: %s\nusername\t: %s\npassword\t: %s\ndomain\t\t: %s" % (interface, driver, logfile, username, password, domain)

    conf       = ConfFile()
    conf.change_info("%s@%s" % (username, domain), "anonymous@%s" % domain, password)
    conf.create_file()

    connection = Connection(conf.get_filename(), logfile)

    print "Authorize..."
    connection.authorize(interface, driver)
    time.sleep(2)

    print "Getting IP..."
    connection.getip()

if __name__ == "__main__":
    main()
