# E-Sports Organization and Tournament Database


## Project Description:

This project models an esports organization that organizes both live and online video game tournaments. The organization earns revenue from ticket sales, advertising, and entry fees. It employs one or more staff members responsible for tasks such as booking venues for events. Additionally, the organization partners with broadcast companies to obtain the rights to stream or broadcast tournaments on their platforms. Teams, consisting of one or more players, register to compete in these tournaments.

The aim of this project was to model an e-sports event website that stored information about multiple tournaments. This information included corresponding organizers, audiences, competitors, and spectators. The final product is a web interface that allows users to query information about e-sports tournaments, games, organizations, viewership, sponsors, and players. For this database there exists two intended users:
1. Website administrative users who can access and edit all information, including specific players, teams and sponsor contributions.
2. E-sports competitors and spectators who can access information to assist them regarding available tournaments, based on specific criterias, such as ticket prices or tournament hosts.


## Queries and Operations:

The website allows users to:
* **Insertion Operation**
  * Add players to an existing team using their gamer tag, name, birthdate, nationality, phone number, team name and contract length.
* **Update Operation**
  * Update a player’s birthday information using their gamer tag, name and new birthdate.
* **Select Operation**
  * Filter games in the database based on the number of participants required and whether or not the games are cross-platform (i.e. they can be played on multiple platforms such as PC, Xbox, PS5 etc.).
* **Deletion Operation**
  * Delete a specified organization. If the organization is deleted, all associated employees will also be deleted by the DELETE ON CASCADE functionality.
* **Projection Query**
  * Display Tournament Names and Ticket Prices less or equal to than a certain ticket price from a specific organization by specifying the maximum ticket price and the organization of interest.
* **Join Query**
  * Display Names of Spectators that have attended a specified tournament by specifying the tournament name.
* **Aggregation with having**
  * Find the total amount contributed by each sponsor equal to or above a certain specified value.
* **Aggregation with Group By Query**
  * View total viewership from each country based on a specified maximum value that is spent by each organization.
* **Nested Aggregation Query**
  * View organizations for which their average tournament prize is the maximum over all tournaments.
* **Division Query**
  * Identify the sponsor(s) that have sponsored every recorded esports tournament.
 

## ER Diagram




