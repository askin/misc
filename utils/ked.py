#!/usr/bin/python
# -*- coding: utf-8 -*-
#
# Licensed under GPL v2
# Copyright 2010, Aşkın Yollu <askin@askin.ws>
#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free
# Software Foundation; either version 2 of the License, or (at your option)
# any later version.
#
# Please read the COPYING file.
#

import pygtk
import hashlib
import base64
pygtk.require('2.0')
import gtk

class Ked:
    def __init__(self):
        # reversable
        self.reverseble_encryptions = ["Base16", "Base32", "Base64"]
        # notreversable
        self.notreverseble_encryptions = ["sha1", "sha224", "sha256", "sha384", "sha512", "md5"]

        # create window
        self.window = gtk.Window(gtk.WINDOW_TOPLEVEL)
        self.window.set_title("Kelebek Encrypt / Decrypt Tool")
        pix = gtk.gdk.pixbuf_new_from_file("./ked.png")
        self.window.set_icon(pix)
        self.window.resize(340, 325)
        self.window.connect("destroy", self.destroy)
        self.layout = gtk.Layout(None, None)
        self.layout.set_size(340, 320)
        self.layout.show()
        self.window.add(self.layout)
        self.init_textbox()
        self.init_combo()
        self.init_button()
        self.window.show()

    '''
    Initialize textboxes
    '''
    def init_textbox(self):
        # First textbox
        self.textbox1 = gtk.TextView()
        self.textbox1.set_size_request(338, 144)
        self.textbox1.set_wrap_mode(True)
        self.textbox1.show()
        # Second textbox
        self.textbox2 = gtk.TextView()
        self.textbox2.set_size_request(338, 144)
        self.textbox2.set_editable(False)
        self.textbox2.set_wrap_mode(True)
        self.textbox2.show()
        # Add to layout
        self.layout.put(self.textbox1, 2, 2)
        self.layout.put(self.textbox2, 2, 146)

    '''
    Initialize cobobox
    '''
    def init_combo(self):
        self.combobox = gtk.combo_box_new_text()
        cb = gtk.combo_box_new_text()
        self.layout.put(self.combobox, 5, 295)
        for item in self.notreverseble_encryptions + self.reverseble_encryptions:
            self.combobox.append_text(item)
        self.combobox.show()

    '''
    Initialize all needen button
    '''
    def init_button(self):
        # Create buttons
        self.encrypt_button = gtk.Button("Encrypt")
        self.decrypt_button = gtk.Button("Decrypt")
        self.clear_button = gtk.Button("Clear")

        # Listen buttons
        self.encrypt_button.connect("clicked", self.encrypt, None)
        self.decrypt_button.connect("clicked", self.decrypt, None)
        self.clear_button.connect("clicked", self.clear, None)

        # Add to layout
        self.layout.put(self.encrypt_button, 204, 295)
        self.layout.put(self.decrypt_button, 275, 295)
        self.layout.put(self.clear_button, 133, 295)

        # Show
        self.decrypt_button.show()
        self.encrypt_button.show()
        self.clear_button.show()

    '''
    Call GTK main
    '''
    def main(self):
        gtk.main()

    '''
    Destroy main window
    '''
    def destroy(self, widget, data=None):
        print "destroy signal occurred"
        gtk.main_quit()

    '''
    Encrypt button call this method
    This method call encryptions functions
    '''
    def encrypt(self, widget, data=None):
        # get choose
        choose = self.combobox.get_active_text()

        # do it
        if choose == "md5":
            m = hashlib.md5(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "sha1":
            m = hashlib.sha1(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "sha224":
            m = hashlib.sha224(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "sha256":
            m = hashlib.sha256(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "sha384":
            m = hashlib.sha384(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "sha512":
            m = hashlib.sha512(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m.hexdigest())
        elif choose == "Base16":
            m = base64.b16encode(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m)
        elif choose == "Base32":
            m = base64.b32encode(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m)
        elif choose == "Base64":
            m = base64.b64encode(self.get_text(self.textbox1))
            self.set_text(self.textbox2, m)
        else:
            print "Yok Böyle Birşey"

    '''
    Decrypt button call this method
    This method call decryptions functions
    '''
    def decrypt(self, widget, data=None):
        choose = self.combobox.get_active_text()
        if choose == "Base16":
            try:
                m = base64.b16decode(self.get_text(self.textbox1))
                self.set_text(self.textbox2, m)
            except:
                self.set_text(self.textbox2, "Incorrect Coded String!!!")
        elif choose == "Base32":
            try:
                m = base64.b32decode(self.get_text(self.textbox1))
                self.set_text(self.textbox2, m)
            except:
                self.set_text(self.textbox2, "Incorrect Coded String!!!")
        elif choose == "Base64":
            try:
                m = base64.b64decode(self.get_text(self.textbox1))
                self.set_text(self.textbox2, m)
            except:
                self.set_text(self.textbox2, "Incorrect Coded String!!!")
        else:
            self.set_text(self.textbox2, "%s algorithm is not reversable!!!" % choose)


    def clear(self, widget, data=None):
        self.set_text(self.textbox1, "")
        self.set_text(self.textbox2, "")

    # Return text for given textbox
    def get_text(self, textbox):
        textbuffer = textbox.get_buffer()
        iter = textbuffer.get_iter_at_offset(0)
        text = iter.get_char()
        while(iter.forward_char()):
            text += iter.get_char()
        return text

    def set_text(self, textbox, text):
        textbuffer = textbox.get_buffer()
        textbuffer.set_text(text)
if __name__ == "__main__":
    base = Ked()
    base.main()
