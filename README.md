# FUSION

## Problem Statement
### Garbage Transportation Management System
Garbage is everywhere. And in Metropolitian Cities, there is of course more of it. Garbage collection and transportation becomes a huge challenge for the Municipal Corporations. Covering huge areas is usually hectic and expensive. Also it is not always so, that every dustbin requires cleaning every day.
The trucks going to and checking each and every dutbin is a waste of time and resources. "What If" a truck will visit only those dustbins that actually require cleaning? "What If" is there is less load to manage everyday? "What If" the lesser "on road times" of the trucks contribute to reducing pollution?
Team HackaThanos plans to change these "What If's" with FUSION - A Garbage Management System.

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
* Created Linux Daemon on Raspberry Pi based on Python to send sample test data to Web API via GET.
* Web API based on PHP to read the data, proccess it into segments and write it to Local MySQL Database.
* Created Local MySQL Database to store the recieved data.
* Created a PHP script to act as a Web API which sends out JSON object.
* Created a seperate Android API to feed the Android App JSON object.
* Recieving the JSON object and display as graphs on a Web Interface.
* Updating the data in real time in the Android App.
* Arduino Code to send output from sensors.
* Displays multi line graph for an entire locality on the Web Server.
