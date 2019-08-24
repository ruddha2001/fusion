# FUSION

## Problem Statement
### Garbage Transportation Management System
62 million tonnes annually averages out to 450 grams of waste per person per day. However, there is a lot of variability in per capita waste generation in India, daily household municipal solid waste (MSW) generation ranges from 170 grams per person in small towns to 620 grams per person in large cities. With rapid urbanisation, the country is facing massive waste management challenge. Over 377 million urban people live in 7,935 towns and cities and generate 62 million tonnes of municipal solid waste per annum. Only 43 million tonnes (MT) of the waste is collected, 11.9 MT is treated and 31 MT is dumped in landfill sites.

More than three-fourth of solid waste management budget is allotted to collection and transportation, leaving very little for processing or resource recovery and disposal.

## Requirements
* Raspberry Pi Zero W
* Arduino Uno
* Potentiometers
* LED
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
* Displays real time data in the Android App
