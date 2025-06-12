
use real_estate;
-- Query 1: Find the addresses of all houses currently listed.
SELECT DISTINCT House.address
FROM House
JOIN Listings ON House.address = Listings.address;

-- Query 2: Find the addresses and MLS numbers of all houses currently listed.
SELECT House.address, Listings.mlsNumber
FROM House
JOIN Listings ON House.address = Listings.address;

-- Query 3: Find the addresses of all 3-bedroom, 2-bathroom houses currently listed.
SELECT House.address
FROM House
JOIN Listings ON House.address = Listings.address
WHERE House.bedrooms = 3 AND House.bathrooms = 2;

-- Query 4: Find the addresses and prices of all 3-bedroom, 2-bathroom houses with prices in the range
-- $100,000 to $250,000, with the results shown in descending order of price.
SELECT Property.address, Property.price
FROM Property
JOIN House ON Property.address = House.address
JOIN Listings ON Property.address = Listings.address
WHERE House.bedrooms = 3 AND House.bathrooms = 2 AND Property.price BETWEEN 100000 AND 250000
ORDER BY Property.price DESC;

-- Query 5: Find the addresses and prices of all business properties that are advertised as office space in
-- descending order of price.
SELECT Property.address, Property.price
FROM Property
JOIN BusinessProperty ON Property.address = BusinessProperty.address
WHERE BusinessProperty.type = 'Office'
ORDER BY Property.price DESC;

-- Query 6: Find all the ids, names and phones of all agents, together with the names of their firms and the
-- dates when they started.
SELECT Agent.agentId, Agent.name AS agentName, Agent.phone, Firm.name AS firmName, Agent.dateStarted
FROM Agent
JOIN Firm ON Agent.firmId = Firm.id;

-- Query 7: Find all the properties currently listed by agent with id “001” (or some other suitable id).
SELECT Property.address
FROM Property
JOIN Listings ON Property.address = Listings.address
WHERE Listings.agentId = 1; -- Replace 1 with the desired agent ID.

-- Query 8: Find all Agent.name-Buyer.name pairs where the buyer works with the agent, sorted
-- alphabetically by Agent.name.
SELECT Agent.name AS agentName, Buyer.name AS buyerName
FROM Works_With
JOIN Agent ON Works_With.agentID = Agent.agentId
JOIN Buyer ON Works_With.buyerId = Buyer.id
ORDER BY Agent.name ASC;

-- Query 9: For each agent, find the total number of buyers currently working with that agent.
-- The output should be Agent.id-count pairs.
SELECT Agent.agentId, COUNT(Works_With.buyerId) AS buyerCount
FROM Agent
LEFT JOIN Works_With ON Agent.agentId = Works_With.agentID
GROUP BY Agent.agentId;
  
-- Query 10: For some buyer that is interested in a house, where the buyer is identified by an id (e.g., “001”),
-- find all houses that meet the buyer’s preferences, with the results shown in descending order of price.
SELECT Property.address, Property.price
FROM Property
JOIN House ON Property.address = House.address
JOIN Buyer ON Buyer.propertyType = 'House'
WHERE Buyer.id = 1 -- Replace 1 with the desired buyer ID.
  AND Property.price BETWEEN Buyer.minimumPreferredPrice AND Buyer.maximumPreferredPrice
  AND House.bedrooms = Buyer.bedrooms
  AND House.bathrooms = Buyer.bathrooms
ORDER BY Property.price DESC;
