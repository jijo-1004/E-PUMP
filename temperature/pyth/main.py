import serial
import time
import requests
arduino = serial.Serial('COM3',9600)
time.sleep(2)
while(True):
    data = arduino.readline()
    str_rn = data.decode()
    str = str_rn.rstrip()
    print(str)
    URL = "http://localhost:1800/snct/pump/temp.php"
    # location given here
    location = "1800"
    # defining a params dict for the parameters to be sent to the API
    PARAMS = {'temp': str}
    # sending get request and saving the response as response object
    r = requests.get(url=URL, params=PARAMS)