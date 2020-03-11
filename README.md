# open-kitchen
We work hard to improve the food industry and change the way things are because we believe they are not efficient enough.

## Table of Contents

- Mission
- Who are we?
- What is open-kitchen?
- Software
- Supported Hardware
- Installation Instructions

## Mission

Open-kitchen (OK) mission is to accelerate the advent of software-for-robotics in the restaurant industry to minimize 
production cost and improve meal experiences in an industry that is dire need to improve margins through automation.

## Who are we?

The restaurant industry is entering a new era. For the past decade, we've seen this industry evolved from legacy controlled
businesses, into a digitalized market places aided by technologies of the like of UberEats, Grubhub and
Doordash. Just as the taxi industry and the hospitality industry evolved, the restaurant industry is entering a phase in which 
digitalization and efficiency will become the norm. 

Today, take-out food is convenient but is still not as cost efficient as cooking at home, this is due to the costs associated 
with hiring human labor which is incurred in the legacy/conventional restaurant model. As the industry continues to evolve, 
food ordering and production is becoming more efficient and more centralized as ghost kitchens and cloud kitchens are becoming 
the digital platforms go-to strategy. Thus, this pursuit for efficiency is sheding light to the potential of 
disruption in the industry and also opens the door to many possibilities in business models by the implementation of 
**automation**. Labor, at one-third of restaurant expenses in today’s model, represents the most inmediate 
challenge for the progress of the industry. Currently, co-bots can help restaurants scale without adding much costs, which 
makes the economics quite attractive. This is where Open Kitchen comes in.

Open-Kitchen (OK) was born out of the necessity to improve efficiency and reduce human error, all aided by our relenteless 
pursuit to bring the perfect dish at the hands of our customer. By implementing a new class of robots, known as collaborative 
robots or co-bots, we aim to come move closer to our vision. 

## What is open-kitchen?

Open-kitchen (OK) is an open source co-bot operating software for the sauté/stir-fry/wok cooking technique. Currently, open-
kitchen performs the functions of 4 diffferent but complementary systems that compose our kitchen:

- Food Dispenser Assembly (FDA) 
- On-Demand Food Transfer Assembly (OFTA)
- Cooking Assembly (CA) 
- Sauce-Dispenser Module (SDM) 

In addition, while Open-kitchen is engaged cooking, it notifies the kitchen staff when to top-up or replace inventory.  


## Software  :octocat:

The software source code is open to the public because ***we strongly believe that great information is not to be centralized 
but it must be distributed and of free access to anyone***, this is so that anybody can help learn, improve or contribute to 
make better quality software. This project can be integrated via APIs; you can connect to the Automated kitchen with a mobile, 
web or desktop application, as long as you have a server that will deliver the data, it can work with anything.

###### Python 

Python was primarily chosen to implement machine learning algorithms into the operating logic to optimize the way we handle 
orders and process the products. This language also facilitates connectivity between Raspberry PI and the many components 
involved in this development. Since this project will revolve around IoT and machine learning, this repository will focus on 
that area. The mobile and web application are yet not built-in python but we will get there sooner than later. 


###### Rpi 

Raspberry PI 3 was chosen as the main brain of the operation. 

This device will perform the following tasks: 
- connecting to the server that will provide the orders 
- manage inventory
- Choose ingredients to cook 

After connecting to the server, the Rpi will be running in a constant loop that will update the current orders for any new 
inputs and decide on which orders will be prepared next. Last but not least, it will receive and send information to the other 
components - Arduinos - that control *woks*, *cup-tipper*, *cup-pushers*, *conveyor belts* and others. 


###### Arduino 

The arduinos chosen for open-kitchen are Arduino Mega and Nano. 

## Supported Hardware

## Installation Instructions


