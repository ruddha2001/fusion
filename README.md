# FUSION

### Requirements
* Raspberry Pi Zero W (2 Units)
* Arduino Uno
* Potentiometers
* LED
* Piezo Buzzer
* LCD Module
* PHP Local Server
* Local MySQL Database
* Android Studio

## Tasks Accomplished
* Created Linux Daemon on Raspberry Pi based on Python to send sample test data to Web API via GET
* Web API based on PHP to read the data, proccess it into segments and write it to Local MySQL Database
* Created Local MySQL Database to store the recieved data
* Created a PHP script to act as a Web API which sends out JSON object

## Trying To Accomplish
* Receive the JSON object and display as graphs
* Creating a seperate Android API to feed the Android App JSON data
