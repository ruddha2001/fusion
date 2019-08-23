#!/usr/bin/env python
import random
import time
import requests

while 1:
        x=random.randrange(0,100)
        y=random.randrange(0,100)
        z=random.randrange(0,100)
        w=random.randrange(0,100)
        out= "A"+str(x)+"B"+str(y)+"C"+str(z)+"D"+str(w)
        print out
        URL="http://10.4.168.116/piapi.php"
        PARAMS={'value':out}
        r=requests.get(url=URL,params=PARAMS)
        time.sleep(1)
