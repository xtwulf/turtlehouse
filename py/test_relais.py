import RPi.GPIO as GPIO
from time import sleep
GPIO.setmode(GPIO.BCM)

RELAIS_1_GPIO = 18
GPIO.setup(RELAIS_1_GPIO, GPIO.OUT)
while True:
	GPIO.output(RELAIS_1_GPIO, GPIO.LOW)
	print ('Aus')
	sleep(10)
	GPIO.output(RELAIS_1_GPIO, GPIO.HIGH)
	print ('An')
	sleep(10)
	
