#!/usr/bin/python3

import RPi.GPIO as GPIO
from argparse import ArgumentParser

parser = ArgumentParser()
parser.add_argument("state")

args = parser.parse_args()

GPIO.setwarnings(False)  # Stop 'channel already in use' warning
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)

json_state = {}

if (args.state == "on"):
    GPIO.output(17, GPIO.HIGH)
    json_state["state"] = "on"
    print("success")
elif (args.state == "off"):
    GPIO.output(17, GPIO.LOW)
    json_state["state"] = "off"
    print("success")

