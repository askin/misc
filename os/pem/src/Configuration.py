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

class ConfFile:
    def __init__(self):
        self.ssid = "eduroam"
        self.key_mgmt = "WPA-EAP"
        self.pairwise = "TKIP"
        self.group = "TKIP"
        self.eap = "TTLS"
        self.phase2 = "auth=PAP"
        self.anonymous_identity = "anonymous@university.deu"
        self.identity = "id@university.eud"
        self.password = "passwd"
        self.filePath = "/tmp/wpa_supplicant.conf"

    def change_info(self, identity, aidentity, password):
        self.anonymous_identity = aidentity
        self.identity = identity
        self.password = password

    def create_file(self):
        conffile = open(self.filePath, "w")
        conffile.writelines("network={\n")
        conffile.writelines("\tssid=\"%s\"\n" % self.ssid)
        conffile.writelines("\tkey_mgmt=%s\n" % self.key_mgmt)
        conffile.writelines("\tpairwise=%s\n" % self.pairwise)
        conffile.writelines("\tgroup=%s\n" % self.group)
        conffile.writelines("\teap=%s\n" % self.eap)
        conffile.writelines("\tphase2=\"%s\"\n" % self.phase2)
        conffile.writelines("\tanonymous_identity=\"%s\"\n" % self.anonymous_identity)
        conffile.writelines("\tidentity=\"%s\"\n" % self.identity)
        conffile.writelines("\tpassword=\"%s\"\n" % self.password)
        conffile.writelines("}")

        conffile.close()

    def get_filename(self):
        return self.filePath
