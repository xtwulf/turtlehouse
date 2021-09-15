import time
import board
import adafruit_dht
import RPi.GPIO as GPIO
import os
from time import sleep
from datetime import date
from datetime import datetime
import mysql.connector

# Connecting the database


# Access localhost
db = mysql.connector.connect (
    host = "localhost",
    user = "testbenutzer",
    password = "raspberry",
    database = "testdatenbank"
    )

# Access Freemysqlhosting
# db = mysql.connector.connect (
#     host = "sql11.freemysqlhosting.net",
#     user = "sql11436827",
#     password = "U7m8bK988l",
#     database = "sql11436827"
#     )



print(db)
mycursor = db.cursor()

sql = "TRUNCATE temperature"
mycursor.execute(sql)

now = datetime.now()
date = date.today()
print(date)

GPIO.setmode(GPIO.BCM)

# GPIO for green LED
GPIO.setup(20, GPIO.OUT)
GPIO.output(20, GPIO.LOW)

# GPIO for red LED
GPIO.setup(21, GPIO.OUT)
GPIO.output(21, GPIO.LOW)

# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT22(board.D4)
 
# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.
dhtDevice = adafruit_dht.DHT11(board.D4, use_pulseio=False)

temp_max = 25
temp_min = 22
# interval for getting temp data
interval = 10.0

# main loop
while True:
    
    try:
        # Print the values to the serial port
        temperature_c = dhtDevice.temperature
        #temperature_f = temperature_c * (9 / 5) + 32
        humidity = dhtDevice.humidity
        if temperature_c >= temp_max:
            print('Attention: temperature has reached max level!')
            GPIO.output(20, GPIO.HIGH)
            GPIO.output(21, GPIO.LOW)
            status_motor = True
            status_lamp = False
        if temperature_c <= temp_min:
            print('Attention: temperature is too low!')
            GPIO.output(20, GPIO.HIGH)
            GPIO.output(21, GPIO.LOW)
            status_motor = False
            status_lamp = True
        if (temperature_c < temp_max) and (temperature_c > temp_min):
            print('Temp is ok')
            GPIO.output(20, GPIO.LOW)
            GPIO.output(21, GPIO.HIGH)
            status_motor = False
            status_lamp = False
        print(
            "Temp: {:.1f} C    Humidity: {}% ".format(
                temperature_c, humidity
            )
        )
        
        now = datetime.now()
          
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        
        continue
    except Exception as error:
        dhtDevice.exit()
        raise error
    
    sql = "INSERT INTO temperature (date, temp, humidity, status_motor, status_lamp) VALUES (%s, %s, %s, %s, %s)"
    #status_motor = True
    #status_lamp = False
    val = (now,temperature_c,humidity, status_motor, status_lamp)
    mycursor.execute(sql, val)

    db.commit()
    # waiting for the next step
    time.sleep(interval)



