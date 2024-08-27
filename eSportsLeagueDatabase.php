<!--Test Oracle file for UBC CPSC304 2018 Winter Term 1
  Created by Jiemin Zhang
  Modified by Simona Radu
  Modified by Jessica Wong (2018-06-22)
  This file shows the very basics of how to execute PHP commands
  on Oracle.

  IF YOU HAVE A TABLE CALLED "demoTable" IT WILL BE DESTROYED
  The script assumes you already have a server set up
  All OCI commands are commands to the Oracle libraries
  To get the file to work, you must place it somewhere where your
  Apache server can run it, and you must rename it to have a ".php"
  extension.  You must also change the username and password on the
  OCILogon below to be your ORACLE username and password 
-->

<!-- This file has been modified from the UBC CPSC 304 2018 Winter Term 1 Oracle file-->

<!-- ***ADAM NOTE***
 I changed name of file to eSportsLeagueDatabase.php; it was previously called project-file-test.php
 If any issues occur when I run it it may have something to do with that. It should only be in the html partion of the code
 -->

<html>
<head>
    <title>PHP/PostgreSQL Demonstration</title>
</head>

<body>
<h1>E-Sports Tournament Organizing Database</h1>
<p> This database holds information about esports organizations, the tournaments they plan, games played at these
    tournaments, esports players and
    teams that participate as well as the sponsors, venues and broadcast services involved. </p>

<h2>Reset To Default Values</h2>
<p>If you wish to reset the tables to their original values press on the reset button. </p>

<p>*IMPORTANT NOTE*: If this is the first time you're running this page, you MUST use reset to ensure the tables are generated correctly.</p>

<form method="POST" action="eSportsLeagueDatabase.php">
    <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
    <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
    <p><input type="submit" value="Reset" name="reset"></p>
</form>

<hr/>

<h2>Add Player to existing team</h2>
<form method="POST" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Gamer Tag: <input type="text" name="insName"> <br/><br/>
    Name: <input type="text" name="insRealName"> <br/><br/>
    Birthdate: <input type="text" name="insBirthday"><br/><br/>
    Nationality: <input type="text" name="insNationality"><br/><br/>
    Phone Number: <input type="text" name="insPhoneNumber"><br/><br/>
    Team Name: <input type="text" name="insTeam"><br/><br/>
    contract Length: <input type="number" name="insContractLength"><br/><br/>

    <input type="submit" value="Add Player" name="insertSubmit"></p>
</form>

<hr/>

<h2>Update Player Birthday</h2>
<p>The values are case sensitive and if you enter in the wrong case, the update statement will not do anything.</p>

<form method="POST" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
    Gamer Tag : <input type="text" name="playerTag"> <br/><br/>
    Name: <input type="text" name="playerName"> <br/><br/>
    New Birthday: <input type="text" name="newBirthday"> <br/><br/>

    <input type="submit" value="Update" name="updateSubmit"></p>
</form>

<hr/>

<h2>Count Players</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="countTupleRequest" name="countTupleRequest">
    <input type="submit" name="countTuples"></p>
</form>

<hr/>

<h2>Display Tournament Names and Ticket Prices less or equal to than a certain ticket price from a specific organization
    - Projection</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayTournamentRequest" name="displayTournamentRequest">
    Ticket Price Maximum Value : <input type="number" name="maxValue"> <br/><br/>
    <input type="submit" value="show Tournaments" name="displayTournamentTuples"></p>
</form>

<h2>Display Names of Spectators that have attended a specified tournament - Join </h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displaySpectatorsRequest" name="displaySpectatorsRequest">
    Tournament Name : <input type="text" name="tournamentName"> <br/><br/>
    <input type="submit" value="show spectators" name="displaySpectatorsTuples"></p>
</form>


<h2>Display Players</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayPlayerTupleRequest" name="displayPlayerTupleRequest">
    <input type="submit" value="show players" name="displayPlayerTuples"></p>
</form>

<h2>Display Team</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayTeamTupleRequest" name="displayTeamTupleRequest">
    <input type="submit" value="show teams" name="displayTeamTuples"></p>
</form>

<hr/>

<h2>Display Funding Sponsors</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayFundsTupleRequest" name="displayFundsTupleRequest">
    <input type="submit" value="Show Sponsors" name="displayFundsTuples"></p>
</form>

<hr/>

<h2>Display Organizations</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayOrganizationsTupleRequest" name="displayFundsTupleRequest">
    <input type="submit" value="Show Organizations" name="displayOrganizationsTuples"></p>
</form>

<hr/>

<h2>Display Employees</h2>
<form method="GET" action="eSportsLeagueDatabase.php"> <!--refresh page when submitted-->
    <input type="hidden" id="displayEmployeesTupleRequest" name="displayFundsTupleRequest">
    <input type="submit" value="Show Employees" name="displayEmployeesTuples"></p>
</form>

<hr/>

<h2>Delete Organization</h2>
<form method="POST" action="eSportsLeagueDatabase.php"><!--refresh page when submitted-->
    <input type="hidden" id="deletePlayerRequest" name="deleteOrganizationRequest">
    Organization Name: <input type="text" name="orgName"> <br/><br/>
    <input type="submit" value="Delete Organization" name="deleteSubmit">
</form>


<hr/>

<h2>View Viewership From Each Country Based Off Amount Spent or Less per Company</h2>
<form method="GET" action="eSportsLeagueDatabase.php">
    <input type="hidden" id="aggregationGroupByRequest" name="aggregationGroupByRequest">
    Canadian Dollar Amount: <input type="number" name="dollarAmount"> <br/><br/>

    <input type="submit" value="View Viewership" name="aggregationGroupBySubmit">
</form>

<h2>Find a Sponsor Who Has Sponsored Every Event</h2>
<form method="GET" action="eSportsLeagueDatabase.php">
    <input type="hidden" id="divisionQueryRequest" name="divisionQueryRequest">
    <input type="submit" value="Find Sponsor" name="divisionQuerySubmit">
</form>

<html>


<hr/>

<?php
//this tells the system that it's no longer just parsing html; it's now parsing PHP

$success = True; //keep track of errors so it redirects the page only if there are no errors
$db_conn = NULL; // edit the login credentials in connectToDB()
$show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

function debugAlertMessage($message)
{
    global $show_debug_alert_messages;

    if ($show_debug_alert_messages) {
        echo "<script type='text/javascript'>alert('" . $message . "');</script>";
    }
}

function executePlainSQL($cmdstr)
{ //takes a plain (no bound variables) SQL command and executes it
    //echo "<br>running ".$cmdstr."<br>";
    global $db_conn, $success;

    // 
    $result = pg_query($db_conn, $cmdstr);

    if (!$result) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $error = pg_last_error($db_conn);
        echo htmlentities($error);
        $success = False;
    }

    return $result;
}

function executeBoundSQL($cmdstr, $params)
{
    /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
In this case you don't need to create the statement several times. Bound variables cause a statement to only be
parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
See the sample code below for how this function is used */

    global $db_conn, $success;
    $result = pg_query_params($db_conn, $cmdstr, $params);

    if (!$result) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $error = pg_last_error($db_conn);
        echo htmlentities($error);
        $success = False;
    }
}

function printPlayerResult($result)
{ //prints results from a select statement
    echo "<br>Current Players:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th>   Gamer Tag  </th><th>  Player Name  </th><th>Date Of Birth</th><th>Nationality</th><th>Phone Number</th><th>Team Name</th><th>Contract Length</th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["INGAMENAME"]) . "  </td><td>  " . htmlspecialchars($row["PLAYERNAME"]) . "  </td><td>  " . htmlspecialchars($row["DATEOFBIRTH"]) . "  </td><td>  " . htmlspecialchars($row["NATIONALITY"]) . "  </td><td>  " . htmlspecialchars($row["PHONENUMBER"]) . "  </td><td>  " . htmlspecialchars($row["TEAMNAME"]) . "  </td><td>  " . htmlspecialchars($row["CONTRACTLENGTH"]) . "  </td></tr>";
    }

    echo "</table>";
}

function printTeamResult($result)
{ //prints results from a select statement
    echo "<br>Current Teams:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th>   Team Location  </th><th>  Team Name  </th><th> Manager Name </th><th>Manager Email</th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["TEAMLOCATION"]) . "  </td><td>  " . htmlspecialchars($row["TEAMNAME"]) . "  </td><td>  " . htmlspecialchars($row["MANAGERNAME"]) . "  </td><td>  " . htmlspecialchars($row["MANAGEREMAIL"]) . "  </td></tr>";
    }

    echo "</table>";
}


function connectToDB()
{
    global $db_conn;

    // fill in the parameters with your information to connect to your postgres database
    $db_conn = pg_connect("host=??? dbname=??? user=??? pass=???");

    if ($db_conn) {
        debugAlertMessage("Database is Connected");
        return true;
    } else {
        debugAlertMessage("Cannot connect to Database");
        $error = pg_last_error();
        echo htmlentities($error);
        return false;
    }
}

function disconnectFromDB()
{
    global $db_conn;

    debugAlertMessage("Disconnect from Database");
    pg_close($db_conn);
}

function handleUpdateRequest()
{
    global $db_conn;
    $gamer_tag = $_POST['playerTag'];
    $real_name = $_POST['playerName'];
    $new_bday = $_POST['newBirthday'];

    $cmdstr = "UPDATE Player SET dateOfBirth=$1 WHERE inGameName=$2 AND playerName=$3";
    $params = array($new_bday, $gamer_tag, $real_name);
    executeBoundSQL($cmdstr, $params);

    pg_query($db_conn, "COMMIT");
}


function handleResetRequest()
{
    global $db_conn;


    // drop all old tables
    $tableNames = ["demoTable",
        "BroadcastService",
        "Manager",
        "spectatorInfo",
        "spectatorTicket",
        "attends",
        "Player",
        "Team",
        "CompetesIn",
        "Tournament",
        "Game",
        "MOBA",
        "fightingGame",
        "FPS",
        "strategyGame",
        "PlayedAt",
        "Venue",
        "SponsorLocation",
        "SponsorInfo",
        "Funds",
        "Organization",
        "Employee",
        "CableNetwork",
        "StreamingService",
        "Broadcasts"
    ];

    foreach ($tableNames as $tableName) {
        executePlainSQL("DROP TABLE IF EXISTS $tableName CASCADE");
    }


    // Create the new tables
    echo "<br> creating new table <br>";
    $newTables = [
        "CREATE TABLE demoTable (id INT PRIMARY KEY, name VARCHAR(30))",
        "CREATE TABLE BroadcastService(broadcasterName VARCHAR(40) PRIMARY KEY, country VARCHAR(30), language VARCHAR(20))",
        "CREATE TABLE Organization(orgName VARCHAR(40) PRIMARY KEY, email VARCHAR(80), website VARCHAR(80))",
        "CREATE TABLE spectatorInfo(name VARCHAR(40), driverID INT PRIMARY KEY, phoneNumber VARCHAR(20))",
        "CREATE TABLE Game(gameName VARCHAR(50) PRIMARY KEY, numParticipants INT, crossPlatformPlay INT)",
        "CREATE TABLE spectatorTicket(ticketNumber INT PRIMARY KEY, driverID INT REFERENCES spectatorInfo(driverID))",
        "CREATE TABLE Venue(address VARCHAR(40), arenaName VARCHAR(40), bookingFee INT, PRIMARY KEY(address, arenaName))",
        "CREATE TABLE Tournament(tournamentName VARCHAR(40) PRIMARY KEY, ticketPrice INT, grandPrize INT, orgName VARCHAR(40) REFERENCES Organization(orgName) ON DELETE SET NULL, address VARCHAR(40) NOT NULL, arenaName VARCHAR(40) NOT NULL, tournamentDate VARCHAR(20), tournamentTime VARCHAR(5), FOREIGN KEY(address, arenaName) REFERENCES Venue(address, arenaName))",
        "CREATE TABLE attends(ticketNumber INT, tournamentName VARCHAR(40), PRIMARY KEY(ticketNumber, tournamentName), FOREIGN KEY(ticketNumber) REFERENCES spectatorTicket(ticketNumber), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName))",
        "CREATE TABLE Manager(managerName VARCHAR(40), managerEmail VARCHAR(40), phoneNumber VARCHAR(15), PRIMARY KEY(managerName, managerEmail))",
        "CREATE TABLE Team(teamLocation VARCHAR(30), teamName VARCHAR(30) PRIMARY KEY, managerName VARCHAR(40) NOT NULL, managerEmail VARCHAR(40) NOT NULL, FOREIGN KEY(managerName, managerEmail) REFERENCES Manager(managerName, managerEmail))",
        "CREATE TABLE Player(inGameName VARCHAR(30), playerName VARCHAR(40), dateOfBirth VARCHAR(20), nationality VARCHAR(20), phoneNumber VARCHAR(20), teamName VARCHAR(30), contractLength INT, PRIMARY KEY(inGameName, playerName), FOREIGN KEY(teamName) REFERENCES Team(teamName))",
        "CREATE TABLE MOBA(game_gameName VARCHAR(50) NOT NULL REFERENCES Game(gameName), numChampions INT PRIMARY KEY)",
        "CREATE TABLE fightingGame(game_gameName VARCHAR(50) NOT NULL REFERENCES Game(gameName), numCharacters INT PRIMARY KEY)",
        "CREATE TABLE FPS(game_gameName VARCHAR(50) NOT NULL REFERENCES Game(gameName), numMaps INT PRIMARY KEY)",
        "CREATE TABLE strategyGame(game_gameName VARCHAR(50) NOT NULL REFERENCES Game(gameName), DLCIncluded INT PRIMARY KEY)",
        "CREATE TABLE PlayedAt(tournamentName VARCHAR(40), gameName VARCHAR(50), tier CHAR(1), PRIMARY KEY(tournamentName, gameName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))",
        "CREATE TABLE SponsorLocation(zipCode VARCHAR(20), city VARCHAR(30), timezone VARCHAR(30), PRIMARY KEY(zipCode, city))",
        "CREATE TABLE SponsorInfo(sponsorName VARCHAR(50), zipCode VARCHAR(20), city VARCHAR(30), PRIMARY KEY(sponsorName), FOREIGN KEY(zipCode, city) REFERENCES SponsorLocation(zipCode, city))",
        "CREATE TABLE Funds(tournamentName VARCHAR(40), sponsorName VARCHAR(50), sponsorFee INT, PRIMARY KEY(tournamentName, sponsorName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(sponsorName) REFERENCES SponsorInfo(sponsorName))",
        "CREATE TABLE Employee(employeeID INT, email VARCHAR(40), name VARCHAR(40), orgName VARCHAR(40), PRIMARY KEY(employeeID, orgName), FOREIGN KEY(orgName) REFERENCES Organization(orgName) ON DELETE CASCADE)",
        "CREATE TABLE CableNetwork(channel VARCHAR(40) PRIMARY KEY, broadcasterName VARCHAR(40) REFERENCES BroadcastService(broadcasterName))",
        "CREATE TABLE StreamingService(website VARCHAR(40) PRIMARY KEY, broadcasterName VARCHAR(40) REFERENCES BroadcastService(broadcasterName))",
        "CREATE TABLE Broadcasts(broadcasterName VARCHAR(40), tournamentName VARCHAR(40), gameName VARCHAR(50), cost INT, viewership INT, PRIMARY KEY(broadcasterName, tournamentName, gameName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))",
        "CREATE TABLE CompetesIn(gameName VARCHAR(50), tournamentName VARCHAR(40), teamName VARCHAR(30), entryFee INT, winnings INT, tournyResult INT, PRIMARY KEY(gameName, tournamentName, teamName), FOREIGN KEY(teamName) REFERENCES Team(teamName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))"
    ];

    foreach ($newTables as $newTable) {
        executePlainSQL($newTable);
    }
    

    //populate tables
    echo "<br> populating tables <br>";

    $insertionStatements = [
        "INSERT INTO spectatorInfo VALUES ('Peter Parker', 1239076, '778-123-3214')",
        "INSERT INTO spectatorInfo VALUES ('Natasha Romanov', 1257784, '434-436-7654')",
        "INSERT INTO spectatorInfo VALUES ('Steve Rogers', 4367654, '982-543-9685')",
        "INSERT INTO spectatorInfo VALUES ('Wanda Maximoff', 3237894, '234-654-7655')",
        "INSERT INTO spectatorInfo VALUES ('Peggy Carter', 5790753, '123-435-6658')",

        "INSERT INTO spectatorTicket VALUES (8930, 1239076)",
        "INSERT INTO spectatorTicket VALUES (9730, 1257784)",
        "INSERT INTO spectatorTicket VALUES (2325, 4367654)",
        "INSERT INTO spectatorTicket VALUES (2313, 3237894)",
        "INSERT INTO spectatorTicket VALUES (4366, 5790753)",

        "INSERT INTO Organization VALUES ('Riot.inc', 'league@riot.com', 'riotgames.com')",
        "INSERT INTO Organization VALUES ('Valve', 'valve@steam.com', 'valvesoftware.com')",
        "INSERT INTO Organization VALUES ('Electronic Arts', 'ea@outlook.com', 'ea.com')",
        "INSERT INTO Organization VALUES ('Tencent', 'tencent@qq.com', 'www.tencent.com')",
        "INSERT INTO Organization VALUES ('NetEase', 'wangyi@163.com', 'neteasegames.com')",

        "INSERT INTO Game VALUES ('Age of Empires: Conquest', 8, 1)",
        "INSERT INTO Game VALUES ('StarCraft 3', 32, 1)",
        "INSERT INTO Game VALUES ('Warhammer 3000', 8, 0)",
        "INSERT INTO Game VALUES ('Clash of Clans 2', 32, 0)",
        "INSERT INTO Game VALUES ('Warcraft 2020', 32, 0)",
        "INSERT INTO Game VALUES ('CS: Return', 12, 1)",
        "INSERT INTO Game VALUES ('Valorant 2', 12, 1)",
        "INSERT INTO Game VALUES ('Overwatch 3', 12, 0)",
        "INSERT INTO Game VALUES ('Call of Duty: Duty Calls', 18, 1)",
        "INSERT INTO Game VALUES ('Battlefield 2022', 18, 0)",
        "INSERT INTO Game VALUES ('Street Fighter 5', 81, 1)",
        "INSERT INTO Game VALUES ('League of Legos', 64, 0)",
        "INSERT INTO Game VALUES ('Dota Fighters', 32, 1)",
        "INSERT INTO Game VALUES ('Tekken 8', 32, 1)",
        "INSERT INTO Game VALUES ('Goru Goru', 32, 0)",
        "INSERT INTO Game VALUES ('League of Legends', 50, 1)",
        "INSERT INTO Game VALUES ('DOTA', 20, 0)",
        "INSERT INTO Game VALUES ('Smite', 100, 1)",
        "INSERT INTO Game VALUES ('Heroes of the Storm', 35, 1)",
        "INSERT INTO Game VALUES ('Vainglory', 15, 1)",

        "INSERT INTO Venue VALUES ('Mercedes-Platz 2', 'Verti Music Hall', 60000)",
        "INSERT INTO Venue VALUES ('1 National Stadium S Rd', 'Beijing National Stadium', 100000)",
        "INSERT INTO Venue VALUES ('101 Denmark way', 'Odense Congress Center', 30000)",
        "INSERT INTO Venue VALUES ('10-1 Kasumigaokamachi', 'Japan National Stadium', 80000)",
        "INSERT INTO Venue VALUES ('2576 Korea Rd', 'LCK Arena', 10000)",

        "INSERT INTO Tournament VALUES ('Berlin Masters', 200, 600000, 'Riot.inc', 'Mercedes-Platz 2', 'Verti Music Hall', '01-11-2021', '13:00')",
        "INSERT INTO Tournament VALUES ('Worlds 2021', 300, 2000000, 'Riot.inc', '1 National Stadium S Rd', 'Beijing National Stadium', '05-10-2021', '18:00')",
        "INSERT INTO Tournament VALUES ('ESL Invitational 2021', 200, 1000000, 'Valve', '101 Denmark way', 'Odense Congress Center', '20-02-2021', '9:00')",
        "INSERT INTO Tournament VALUES ('Tournament of Power', 100, 100000, 'Electronic Arts', '10-1 Kasumigaokamachi', 'Japan National Stadium', '20-05-2021', '16:00')",
        "INSERT INTO Tournament VALUES ('Faker Cup', 100, 100000, 'Riot.inc', '2576 Korea Rd', 'LCK Arena', '13-01-2021', '18:00')",

        "INSERT INTO attends VALUES (8930, 'ESL Invitational 2021')",
        "INSERT INTO attends VALUES (9730, 'Worlds 2021')",
        "INSERT INTO attends VALUES (2325, 'ESL Invitational 2021')",
        "INSERT INTO attends VALUES (2313, 'Worlds 2021')",
        "INSERT INTO attends VALUES (4366, 'Tournament of Power')",

        "INSERT INTO Manager VALUES ('Bob Ross', 'bob.ross@gmail.com', '123-445-6546')",
        "INSERT INTO Manager VALUES ('Amber Howard', 'ahoward@a3a.com', '435-342-4309')",
        "INSERT INTO Manager VALUES ('Nick Garrett', 'ngarett@amg.com', '455-654-2342')",
        "INSERT INTO Manager VALUES ('Peter Letz', 'pletz@caa.com', '343-564-4656')",
        "INSERT INTO Manager VALUES ('Andrew Tomlinson', 'atomlin@csa.com', '545-234-1231')",

        "INSERT INTO Team VALUES ('California USA', 'Punk', 'Bob Ross', 'bob.ross@gmail.com')",
        "INSERT INTO Team VALUES ('Seoul, Korea', 'T1', 'Amber Howard', 'ahoward@a3a.com')",
        "INSERT INTO Team VALUES ('Shanghai, China', 'Atlanta FaZe', 'Nick Garrett', 'ngarett@amg.com')",
        "INSERT INTO Team VALUES ('Tokyo, Japan', 'Scarlett', 'Peter Letz', 'pletz@caa.com')",
        "INSERT INTO Team VALUES ('Melbourne, Australia', 'Cloud 9', 'Andrew Tomlinson', 'atomlin@csa.com')",

        "INSERT INTO Player VALUES ('Punk', 'Victor Woodley', '29-Jul-1998', 'United States', '234-398-2898', 'Punk', 2)",
        "INSERT INTO Player VALUES ('Faker', 'Sang-hyeok', '7-May-1996', 'South Korea', '984-590-3090', 'T1', 6)",
        "INSERT INTO Player VALUES ('Gumayusi', 'Lee Min-hyeong', '6-Feb-2002', 'South Korea', '878-983-2900', 'T1', 3)",
        "INSERT INTO Player VALUES ('Scarlett', 'Sasha Hostyn', '14-Dec-1993', 'Canada', '234-589-4903', 'Scarlett', 2)",
        "INSERT INTO Player VALUES ('Simp', 'Chris Lehr', '6-Feb-2001', 'United States', '234-456-1290', 'Atlanta FaZe', 5)",

        "INSERT INTO PlayedAt VALUES ('Berlin Masters', 'CS: Return', 'A')",
        "INSERT INTO PlayedAt VALUES ('Worlds 2021', 'League of Legos', 'S')",
        "INSERT INTO PlayedAt VALUES ('Faker Cup', 'League of Legos', 'B')",
        "INSERT INTO PlayedAt VALUES ('Berlin Masters', 'Valorant 2', 'A')",
        "INSERT INTO PlayedAt VALUES ('Tournament of Power', 'Street Fighter 5', 'A')",
        
        "INSERT INTO SponsorLocation VALUES ('s3e 2sg', 'Vancouver', 'Pacific Daylight Time')",
        "INSERT INTO SponsorLocation VALUES ('h5r 1g6', 'Seattle', 'Pacific Daylight Time')",
        "INSERT INTO SponsorLocation VALUES ('y7i 5f9', 'Calgary', 'Mountain Daylight Time')",
        "INSERT INTO SponsorLocation VALUES ('v2q 7u8', 'Vancouver', 'Pacific Daylight Time')",
        "INSERT INTO SponsorLocation VALUES ('v5e 2z4', 'Vancouver', 'Pacific Daylight Time')",

        "INSERT INTO SponsorInfo VALUES ('Justice League', 's3e 2sg', 'Vancouver')",
        "INSERT INTO SponsorInfo VALUES ('The Avengers', 'h5r 1g6', 'Seattle')",
        "INSERT INTO SponsorInfo VALUES ('The Martell Foundation', 'y7i 5f9', 'Calgary')",
        "INSERT INTO SponsorInfo VALUES ('RNG', 'v2q 7u8', 'Vancouver')",
        "INSERT INTO SponsorInfo VALUES ('Edifier', 'v5e 2z4', 'Vancouver')",

        "INSERT INTO Funds VALUES ('Berlin Masters', 'Justice League', 2000)",
        "INSERT INTO Funds VALUES ('Worlds 2021', 'Justice League', 5000)",
        "INSERT INTO Funds VALUES ('ESL Invitational 2021', 'Justice League', 4000)",
        "INSERT INTO Funds VALUES ('Faker Cup', 'Justice League', 2000)",
        "INSERT INTO Funds VALUES ('Tournament of Power', 'Justice League', 8000)",
        "INSERT INTO Funds VALUES ('Berlin Masters', 'The Avengers', 2000)",
        "INSERT INTO Funds VALUES ('Berlin Masters', 'RNG', 2000)",
        "INSERT INTO Funds VALUES ('Worlds 2021', 'Edifier', 1000)",

        "INSERT INTO Employee VALUES (12321, 'js@westeros.com', 'Jon Snow', 'Riot.inc')",
        "INSERT INTO Employee VALUES (43543, 'tl@westeros.com', 'Tywin Lannister', 'Riot.inc')",
        "INSERT INTO Employee VALUES (42323, 'ss@westeros.com', 'Sansa Stark', 'Valve')",
        "INSERT INTO Employee VALUES (12341, 'at@westeros.com', 'Arya Stark', 'Valve')",
        "INSERT INTO Employee VALUES (43121, 'jp@westeros.com', 'Jaime Lannister', 'Electronic Arts')",

        "INSERT INTO CompetesIn VALUES ('CS: Return', 'ESL Invitational 2021', 'Cloud 9', 1000, 0, 5)",
        "INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'T1', 8000, 80000, 1)",
        "INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Atlanta FaZe', 8000, 0, 6)",
        "INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Scarlett', 8000, 20000, 3)",
        "INSERT INTO CompetesIn VALUES ('Tekken 8', 'Tournament of Power', 'Punk', 200, 0, 4)",

        "INSERT INTO BroadcastService VALUES ('Valve TV', 'United States', 'English')",
        "INSERT INTO BroadcastService VALUES ('Ginx TV', 'England', 'English')",
        "INSERT INTO BroadcastService VALUES ('Riot Games', 'Japan', 'Japanese')",
        "INSERT INTO BroadcastService VALUES ('ESPN', 'United States', 'English')",
        "INSERT INTO BroadcastService VALUES ('HBO', 'United States', 'English')",
        "INSERT INTO BroadcastService VALUES ('Nerd Street Gamers', 'Canada', 'French')",
        "INSERT INTO BroadcastService VALUES ('ESL', 'Canada', 'English')",
        "INSERT INTO BroadcastService VALUES ('AWL', 'South Korea', 'Korean')",
        "INSERT INTO BroadcastService VALUES ('ESLT', 'China', 'Cantonese')",
        "INSERT INTO BroadcastService VALUES ('Bilibili', 'China', 'Mandarin')",

        "INSERT INTO CableNetwork VALUES ('CCTV 1', 'Valve TV')",
        "INSERT INTO CableNetwork VALUES ('CCTV 2', 'Ginx TV')",
        "INSERT INTO CableNetwork VALUES ('CCTV 3', 'Riot Games')",
        "INSERT INTO CableNetwork VALUES ('ESPN 4', 'ESPN')",
        "INSERT INTO CableNetwork VALUES ('HBO Live', 'HBO')",

        "INSERT INTO StreamingService VALUES ('Twitch.com', 'Nerd Street Gamers')",
        "INSERT INTO StreamingService VALUES ('Twitch.com', 'ESL')",
        "INSERT INTO StreamingService VALUES ('Twitch.com', 'AWL')",
        "INSERT INTO StreamingService VALUES ('Twitch.com', 'ESLT')",
        "INSERT INTO StreamingService VALUES ('Twitch.com', 'Bilibili')",

        "INSERT INTO Broadcasts VALUES ('ESL', 'ESL Invitational 2021', 'Age of Empires: Conquest', 8000, 1320)",
        "INSERT INTO Broadcasts VALUES ('Bilibili', 'Berlin Masters', 'Valorant 2', 60000, 1000000)",
        "INSERT INTO Broadcasts VALUES ('Nerd Street Gamers', 'Worlds 2021', 'League of Legos', 100000, 2000000)",
        "INSERT INTO Broadcasts VALUES ('ESL', 'ESL Invitational 2021', 'Warcraft 2020', 10000, 1143002)",
        "INSERT INTO Broadcasts VALUES ('ESPN', 'Tournament of Power', 'Clash of Clans 2', 8000, 897975)"

    ];
    
    foreach ($insertionStatements as $insertionStatement) {
        executePlainSQL($insertionStatement);
    }
    pg_query($db_conn, "COMMIT");
}


function handleInsertRequest()
{
    global $db_conn;

    //Getting the values from user and insert data into the table
    $gamerTag = $_POST['insName'];
    $name = $_POST['insRealName'];
    $birthday = $_POST['insBirthday'];
    $nationality = $_POST['insNationality'];
    $phoneNumber = $_POST['insPhoneNumber'];
    $teamName = $_POST['insTeam'];
    $contractLength = $_POST['insContractLength'];

    $cmdstr = "INSERT INTO Player VALUES ($1, $2, $3, $4, $5, $6, $7)";
    $params = array($gamerTag, $name, $birthday, $nationality, $phoneNumber, $teamName, $contractLength);


    executeBoundSQL($cmdstr, $params);
    pg_query($db_conn, "COMMIT");
}

function handleCountRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT Count(*) FROM Player");

    if ($row = pg_fetch_row($result)) {
        echo "<br> There are  " . $row[0] . " players currently registered<br>";
    }
}

function handleDisplayPlayerRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT * FROM Player");
    printPlayerResult($result);
}


function handleDisplayTeamRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT * FROM Team");
    printTeamResult($result);
}

function handleDisplayFundsRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT * FROM Funds");
    printFundsResult($result);

    pg_query($db_conn, "COMMIT");
}

function printFundsResult($result)
{ //prints results from a select statement
    echo "<br>Current Sponsors:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th>   Tournament Name  </th><th>  Sponsor Name  </th><th> Sponsor Fee </th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["TOURNAMENTNAME"]) . "  </td><td>  " . htmlspecialchars($row["SPONSORNAME"]) . "  </td><td>  " . htmlspecialchars($row["SPONSORFEE"]) . "  </td></tr>";
    }

    echo "</table>";
}

function handleDisplayOrganizationsRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT * FROM Organization");
    printOrganizationResult($result);

    pg_query($db_conn, "COMMIT");
}

function printOrganizationResult($result)
{ //prints results from a select statement
    echo "<br>Current Organizations:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th>   Organization Name  </th><th>  Website  </th><th> Email </th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["ORGNAME"]) . "  </td><td>  " . htmlspecialchars($row["WEBSITE"]) . "  </td><td>  " . htmlspecialchars($row["EMAIL"]) . "  </td></tr>"; //or just use "echo $row[0]"
    }

    echo "</table>";
}

function handleDisplayEmployeesRequest()
{
    global $db_conn;

    $result = executePlainSQL("SELECT * FROM Employee");
    printEmployeeResult($result);

    pg_query($db_conn, "COMMIT");
}

function printEmployeeResult($result)
{ //prints results from a select statement
    echo "<br>Current Employees:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th>   Employee ID  </th><th>  Name  </th><th> Email </th><th>  Organization Name </th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["EMPLOYEEID"]) . "  </td><td>  " . htmlspecialchars($row["NAME"]) . "  </td><td>  " . htmlspecialchars($row["EMAIL"]) . "  </td><td>  " . htmlspecialchars($row["ORGNAME"]) . "</td></tr>";
    }

    echo "</table>";
}

function handleDeleteRequest()
{
    global $db_conn;
    $org_name = $_POST['orgName'];

    executeBoundSQL("DELETE FROM Organization 
                    WHERE orgName = $1",
                    array($org_name));

    echo "<br> Deleted Organization: " . htmlspecialchars($org_name) . " <br>";

    pg_query($db_conn, "COMMIT");

}

function handleAggregationWithGroupBy()
{
    global $db_conn;

    $monetary_amount = $_GET['dollarAmount'];

    $result = executeBoundSQL($db_conn, "SELECT SUM(b.viewership) AS sum, bs.country, COUNT(*) AS num, SUM(b.cost) AS cost 
                                         FROM BroadcastService bs 
                                         JOIN Broadcasts b ON bs.broadcasterName = b.broadcasterName 
                                         WHERE b.cost <= $1 
                                         GROUP BY bs.country",
                                         array($monetary_amount));

    printGroupByResult($result);

    pg_query($db_conn,"COMMIT");
}

function printGroupByResult($result)
{

    echo "<br>Viewership From Each Country:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th> Viewership </th><th> Country </th><th> # of Broadcasters </th><th> Cost per Country </th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["SUM"]) . "  </td><td>  " . htmlspecialchars($row["COUNTRY"]) . "  </td><td>  " . htmlspecialchars($row["NUM"]) . "  </td><td>  " . htmlspecialchars($row["COST"]) . " </td></tr>";
    }

    echo "</table>";
}

function handleDivisionQuery()
{
    global $db_conn;

    $results = executePlainSQL("SELECT s.sponsorname AS name 
                                   FROM SponsorInfo s 
                                   WHERE NOT EXISTS (
                                       SELECT t.tournamentname 
                                       FROM Tournament t 
                                       EXCEPT 
                                       SELECT f.tournamentname 
                                       FROM Funds f 
                                       WHERE f.sponsorname = s.sponsorname)");

    printDivisionDetails($results);

    pg_query($db_conn, "COMMIT");
}

function printDivisionDetails($result)
{
    echo "<br>Sponsor Who Has Supported Every Tournament:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th> Sponsor Name </th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["NAME"]) . "  </td></tr>";
    }

    echo "</table>";
}

function printTournamentDetails($result)
{

    echo "<br>Current Tournaments:<br>";
    echo "<table border=\"1\">";
    echo "<tr><th> Tournament Name </th><th> Ticket Price </th></tr>";

    while ($row =pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["TOURNAMENTNAME"]) . "  </td><td>  " . htmlspecialchars($row["TICKETPRICE"]) . "  </td></tr>";
    }

    echo "</table>";

}

function handleDisplayTournamentRequest()
{
    global $db_conn;
    $max_val = $_GET['maxValue'];

    $result = executeBoundSQL("SELECT tournamentName, ticketPrice 
                                FROM Tournament 
                                WHERE ticketPrice <= $1", 
                                array($max_val));

    printTournamentDetails($result);

}


function printSpectatorDetails($result, $tournament_Name)
{

    echo "<br>Spectators that attended '$tournament_Name':<br>";
    echo "<table border=\"1\">";
    echo "<tr><th> Spectator Name </th><th> Tournament </th><th>Driver ID</th><th>Spectator Name</th></tr>";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr><td>  " . htmlspecialchars($row["TICKETNUMBER"]) . "  </td><td>  " . htmlspecialchars($row["TOURNAMENTNAME"]) . "  </td><td>  " . htmlspecialchars($row["DRIVERID"]) . "  </td><td>  " . htmlspecialchars($row["NAME"]) . "  </td></tr>";
    }

    echo "</table>";

}

function handleDisplaySpectatorsRequest()
{
    global $db_conn;
    $tournament_Name = $_GET['tournamentName'];

    $result = executeBoundSQL("SELECT attends.ticketNumber, attends.tournamentName, spectatorTicket.driverID, spectatorInfo.Name 
                                FROM attends
                                LEFT JOIN spectatorTicket ON spectatorTicket.ticketNumber = attends.ticketNumber 
                                LEFT JOIN spectatorInfo ON spectatorTicket.driverID = spectatorInfo.driverID 
                                WHERE attends.tournamentName = $1",
                                array($tournament_Name));

    printSpectatorDetails($result, $tournament_Name);

}


// HANDLE ALL POST ROUTES
// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
function handlePOSTRequest()
{
    if (connectToDB()) {
        if (array_key_exists('resetTablesRequest', $_POST)) {
            handleResetRequest();
        } else if (array_key_exists('updateQueryRequest', $_POST)) {
            handleUpdateRequest();
        } else if (array_key_exists('insertQueryRequest', $_POST)) {
            handleInsertRequest();
        } else if (array_key_exists('deleteOrganizationRequest', $_POST)) {
            handleDeleteRequest();
        }

        disconnectFromDB();
    }
}

// HANDLE ALL GET ROUTES
// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
function handleGETRequest()
{
    if (connectToDB()) {
        if (array_key_exists('countTuples', $_GET)) {
            handleCountRequest();
        } else if (array_key_exists('displayPlayerTuples', $_GET)) {
            handleDisplayPlayerRequest();
        } else if (array_key_exists('displayTeamTuples', $_GET)) {
            handleDisplayTeamRequest();
        } else if (array_key_exists('displayTournamentTuples', $_GET)) {
            handleDisplayTournamentRequest();
        } else if (array_key_exists('displaySpectatorsTuples', $_GET)) {
            handleDisplaySpectatorsRequest();
        } else if (array_key_exists('aggregationGroupBySubmit', $_GET)) {
            handleAggregationWithGroupBy();
        } else if (array_key_exists('divisionQuerySubmit', $_GET)) {
            handleDivisionQuery();
        } else if (array_key_exists('displayFundsTuples', $_GET)) {
            handleDisplayFundsRequest();
        } else if (array_key_exists('displayOrganizationsTuples', $_GET)) {
            handleDisplayOrganizationsRequest();
        } else if (array_key_exists('displayEmployeesTuples', $_GET)) {
            handleDisplayEmployeesRequest();
        }

        disconnectFromDB();
    }
}

if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
    handlePOSTRequest();
} else if (isset($_GET['countTupleRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displayPlayerTupleRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displayTeamTupleRequest'])) {
    handleGETRequest();
} else if (isset($_POST['deleteSubmit'])) {
    handlePOSTRequest();
} else if (isset($_GET['displayTournamentRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displaySpectatorsRequest'])) {
    handleGETRequest();
} else if (isset($_GET['aggregationGroupByRequest'])) {
    handleGETRequest();
} else if (isset($_GET['divisionQueryRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displayFundsTupleRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displayOrganizationsTupleRequest'])) {
    handleGETRequest();
} else if (isset($_GET['displayEmployeesTupleRequest'])) {
    handleGETRequest();
}

?>
</body>
</html>