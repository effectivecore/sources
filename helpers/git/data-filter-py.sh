#!/usr/bin/env python3

def processing(filename):
  if filename.endswith(b".php"):
    filename = filename.replace(b"/classes_events/",   b"/classes/")
    filename = filename.replace(b"/classes_patterns/", b"/patterns/")
    filename = filename.replace(b"/code/",             b"/classes/")
  return filename

file_in  = open("/Users/max/Desktop/etalon-0.txt", "r")
file_out = open("/Users/max/Desktop/etalon-1.txt", "w")

while file:
    line = file_in.readline()
    file_out.write(
        processing(
            str.encode(line.replace("\n", ""))
        ).decode() + "\n"
    )
    if line == "":
        break

file_in.close()