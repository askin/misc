#!/usr/bin/python
import gtk
import pygtk
import pango

class Window(object):
    def __init__(self):
        title = "Stupid!!!"
        self.window = gtk.Window(gtk.WINDOW_TOPLEVEL)
        self.window.show()
        self.window.set_title(title)
        self.window.resize(500, 210)
        # close
        self.window.connect("delete_event", gtk.main_quit)

        self.layout = gtk.Layout(None, None)
        self.layout.show()
        self.window.add(self.layout)

        self.textbox = gtk.TextView()
        self.textbox.set_size_request(480, 150)
        self.textbox.set_wrap_mode(True)
        self.textbox.show()
        self.layout.put(self.textbox, 10, 10)
        self.buffer = self.textbox.get_buffer()

        # Add Button
        self.addButton()

        self.textsize = 9

    def addButton(self):
        # Clear Button
        self.clear_button = gtk.Button("Clear")
        self.clear_button.set_size_request(200, 40)
        self.clear_button.show()
        self.layout.put(self.clear_button, 10, 165)
        self.clear_button.connect("clicked", self.clear)

        # Font size button
        self.zoom_button = gtk.Button("Zoom +")
        self.zoom_button.set_size_request(70, 40)
        self.zoom_button.show()
        self.layout.put(self.zoom_button, 261, 165)
        self.zoom_button.connect("clicked", self.set_fontsize)

        # Font size button
        self.zoom_out_button = gtk.Button("Zoom -")
        self.zoom_out_button.set_size_request(70, 40)
        self.zoom_out_button.show()
        self.layout.put(self.zoom_out_button, 336, 165)
        self.zoom_out_button.connect("clicked", self.set_fontsize)


        # Close Button
        self.close_button = gtk.Button("Close")
        self.close_button.set_size_request(70, 40)
        self.close_button.show()
        self.layout.put(self.close_button, 420, 165)
        self.close_button.connect("clicked", gtk.main_quit)

        self.table = gtk.Table(2, 2)
        for i in range(2):
            for j in range(2):
                size = (i * 2) + j
                b = gtk.Button()
                b.connect("clicked", self.set_fontsize, size)
                b.show()
                self.table.attach(b,  j, j + 1, i, i + 1)

        self.table.set_size_request(40, 40)
        self.table.show()
        self.layout.put(self.table, 215, 165)

    def set_fontsize(self, button, size=None):
        if size != None:
            if size == 0:
                self.textsize = 9
            elif size == 1:
                self.textsize = 16
            elif size == 2:
                self.textsize = 20
            else:
                self.textsize = 26
        elif button.get_label() == "Zoom -":
            self.textsize -= 1
        else:
            self.textsize += 1

        self.textbox.modify_font(pango.FontDescription("%s" % self.textsize))

    def clear(self, button):
        self.buffer.set_text("")

    def main(self):
        gtk.main()

if __name__ == "__main__":
    win = Window()
    win.main()
