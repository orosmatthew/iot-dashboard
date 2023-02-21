#!/usr/bin/python3

import RPi.GPIO as GPIO
import time
from argparse import ArgumentParser

parser = ArgumentParser()
parser.add_argument("state")

args = parser.parse_args()

servo_pin = 12
GPIO.setmode(GPIO.BCM)
GPIO.setup(servo_pin, GPIO.OUT)

pwm = GPIO.PWM(servo_pin, 50)
pwm.start(2.5)

# Min: 2.5, Max: 12.5
if (args.state == "lock"):
    pwm.ChangeDutyCycle(2.5)
    time.sleep(0.5)
elif (args.state == "unlock"):
    pwm.ChangeDutyCycle(7.5)
    time.sleep(0.5)

GPIO.cleanup()
