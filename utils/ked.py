#!/usr/bin/env python
import pygtk
pygtk.require('2.0')
import gtk

class Base:
    def __init__(self):
        self.reverseble_encryptions = ["DES"]
        self.notreverseble_encryptions = ["sha1", "md5"]

        self.window = gtk.Window(gtk.WINDOW_TOPLEVEL)
        self.window.set_title("Kelebek Encrypt / Decrypt Tool")
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

    def init_textbox(self):
        self.textbox1 = gtk.TextView()
        self.textbox1.set_size_request(338, 144)
        self.textbox1.show()
        self.textbox2 = gtk.TextView()
        self.textbox2.set_size_request(338, 144)
        self.textbox2.set_editable(False)
        self.textbox2.show()
        self.layout.put(self.textbox1, 2, 2)
        self.layout.put(self.textbox2, 2, 146)

    def init_combo(self):
        self.combobox = gtk.combo_box_new_text()
        cb = gtk.combo_box_new_text()
        self.layout.put(self.combobox, 5, 295)
        for item in self.notreverseble_encryptions + self.reverseble_encryptions:
            self.combobox.append_text(item)
        self.combobox.show()

    def init_button(self):
        self.encrypt_button = gtk.Button("Encrypt")
        self.decrypt_button = gtk.Button("Decrypt")
        self.encrypt_button.connect("clicked", self.encrypt, None)
        self.decrypt_button.connect("clicked", self.decrypt, None)
        self.layout.put(self.encrypt_button, 204, 295)
        self.layout.put(self.decrypt_button, 275, 295)
        self.decrypt_button.show()
        self.encrypt_button.show()

    def main(self):
        gtk.main()

    def destroy(self, widget, data=None):
        print "destroy signal occurred"
        gtk.main_quit()

    def encrypt(self, widget, data=None):
        choose = self.combobox.get_active_text()
        print "Encryption: %s" % choose

    def decrypt(self, widget, data=None):
        choose = self.combobox.get_active_text()
        print "Decrypt!!!"
        if(choose in self.notreverseble_encryptions):
            print "No no no!!"

if __name__ == "__main__":
    base = Base()
    base.main()
