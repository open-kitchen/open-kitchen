# open-kitchen
We thrive and work hard to improve the food industry and change the way things are because they are not efficient enough

## Table of Contents

- Who are we?
- What is open-kitchen?
- Mission
- Software
- Supported Hardware
- Installation Instructions



## Who are we?

The restaurant industry is entering a new era. For the past decade, we've seen this industry evolved from what is known as legacy system, into a digital + ghost kitchen market place, aided by technologies of the like as UberEats, Grubhub and Doordash. Just as the taxi industry and the hospitality industry, the restaurant industry is entering a phase in which digitalization and efficiency will become the norm. This project will assist to accomplish just that. 

Today, take-out food is convenient but is still not as cost efficient compared to cooking at home, due to costs associated with human labor especially during preparation. As food ordering becomes more centralized through digital platforms, however, new business models and technologies should improve efficiency significantly. This is where Open Kitchen comes in.

This project was born out of the necessity to improve efficiency and reduce human error, by implementing a new class of robots, called collaborative robots or co-bots, which can work safely alongside humans. Currently, co-bots could help restaurants scale without adding much labor, which at one-third of restaurant expenses in today’s model, could make the economics quite attractive.

## What is open-kitchen?

Open-kitchen (OK) is an open source co-bot operating software for the sauté/stir-fry/wok cooking technique. Currently, open-kitchen performs the functions of Food Dispenser Assembly (FDA), On-Demand Food Transfer Assembly (OFTA), Cooking Assembly (CA), and Sauce-Dispenser Module (SDM) for a co-bot under development by [Chefsurf](http://chefsurf.co). While performing all the mentioned functions, with the help of algorithm, open-kitchen will prioritize orders to maximize efficiency and ultimately to improve order time fulfillment.

## Mission

Open-kitchen (OK) mission is to accelerate the advent of software-for-robotics in the restaurant industry to minimize production cost and improve meal experiences in an industry that is dire need to improve margins through automation.

## Software  :octocat:

The software source code is open to the public because ***we strongly believe that great information is not to be centralized but it must be distributed and of free access to anyone***, this is so that anybody can help learn, improve or contribute to make better quality software. This project can be integrated via APIs; you can connect to the Automated kitchen with a mobile, web or desktop application, as long as you have a server that will deliver the data, it can work with anything.

###### Python 

Python was primarily chosen to implement machine learning algorithms into the operating logic to optimize the way we handle orders and process the products. This language also facilitates connectivity between Raspberry PI and the many components involved in this development. Since this project will revolve around IoT and machine learning, this repository will focus on that area. The mobile and web application are yet not built-in python but we will get there sooner than later. 


###### Rpi 

Raspberry PI 3 was chosen as the main brain of the operation. 

This device will perform the following tasks: 
- connecting to the server that will provide the orders 
- manage inventory
- Choose ingredients to cook 

After connecting to the server, the Rpi will be running in a constant loop that will update the current orders for any new inputs and decide on which orders will be prepared next. Last but not least, it will receive and send information to the other components - Arduinos - that control *woks*, *cup-tipper*, *cup-pushers*, *conveyor belts* and others. 


###### Arduino 

The arduinos chosen for open-kitchen are Arduino Mega and Nano. 

## Supported Hardware

## Installation Instructions


