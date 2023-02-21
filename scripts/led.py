#!/usr/bin/python3

import RPi.GPIO as GPIO
from argparse import ArgumentParser

parser = ArgumentParser()
parser.add_argument("state")

args = parser.parse_args()

GPIO.setwarnings(False)  # Stop 'channel already in use' warning
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)

if (args.state == "on"):
    GPIO.output(17, GPIO.HIGH)
elif (args.state == "off"):
    GPIO.output(17, GPIO.LOW)
