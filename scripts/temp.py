#!/usr/bin/python3 

import adafruit_dht
import board

dht_device = adafruit_dht.DHT11(board.D4)

try:
    temp_c = dht_device.temperature
    temp_f = temp_c * (9 / 5) + 32
    humidity = dht_device.humidity
    print(f'{temp_f:.1f} {humidity:.1f}')
except RuntimeError as error:
    print("error")


