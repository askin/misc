#!/usr/bin/env python
import pygtk
pygtk.require('2.0')
import gtk

class Ked:
    def __init__(self):
        # reversable 
        self.reverseble_encryptions = ["DES"]
        # notreversable
        self.notreverseble_encryptions = ["sha1", "md5"]

        # create window
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

    '''
    Initialize textboxes
    '''
    def init_textbox(self):
        # First textbox
        self.textbox1 = gtk.TextView()
        self.textbox1.set_size_request(338, 144)
        self.textbox1.show()
        # Second texbox
        self.textbox2 = gtk.TextView()
        self.textbox2.set_size_request(338, 144)
        self.textbox2.set_editable(False)
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

        # Listen buttons
        self.encrypt_button.connect("clicked", self.encrypt, None)
        self.decrypt_button.connect("clicked", self.decrypt, None)

        # Add to layout
        self.layout.put(self.encrypt_button, 204, 295)
        self.layout.put(self.decrypt_button, 275, 295)

        # Show
        self.decrypt_button.show()
        self.encrypt_button.show()

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
        choose = self.combobox.get_active_text()
        print "Encryption: %s" % choose
        if choose == "md5":
            import md5
            m = md5.new()
            m.update()

    '''
    Decrypt button call this method
    This method call decryptions functions
    '''
    def decrypt(self, widget, data=None):
        choose = self.combobox.get_active_text()
        print "Decrypt!!!"
        textbuffer1 = self.textbox1.get_buffer()
        textbuffer2 = self.textbox2.get_buffer()
        iter = textbuffer1.get_iter_at_offset(0)
        text1 = iter.get_char()
        while(iter.forward_char()):
            text1 += iter.get_char()

        textbuffer2.set_text(text1)


if __name__ == "__main__":
    base = Ked()
    base.main()
