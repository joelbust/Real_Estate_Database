-- Create the database
CREATE DATABASE IF NOT EXISTS real_estate;
USE real_estate;

-- Create tables
CREATE TABLE Property (
    address VARCHAR(50) PRIMARY KEY,
    ownerName VARCHAR(30) NOT NULL,
    price INT NOT NULL
);

CREATE TABLE House (
    address VARCHAR(50),
    bedrooms INT NOT NULL,
    bathrooms INT NOT NULL,
    size INT NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE BusinessProperty (
    address VARCHAR(50),
    type CHAR(20) NOT NULL,
    size INT NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE Firm (
    id INT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    address VARCHAR(50) NOT NULL
);

CREATE TABLE Agent (
    agentId INT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone CHAR(12) NOT NULL,
    firmId INT NOT NULL,
    dateStarted DATE NOT NULL,
    FOREIGN KEY (firmId) REFERENCES Firm(id)
);

CREATE TABLE Listings (
    mlsNumber INT PRIMARY KEY,
    address VARCHAR(50) NOT NULL,
    agentId INT NOT NULL,
    dateListed DATE NOT NULL,
    FOREIGN KEY (address) REFERENCES Property(address),
    FOREIGN KEY (agentId) REFERENCES Agent(agentId)
);

CREATE TABLE Buyer (
    id INT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone CHAR(12) NOT NULL,
    propertyType CHAR(20) NOT NULL,
    bedrooms INT,
    bathrooms INT,
    businessPropertyType CHAR(20),
    minimumPreferredPrice INT,
    maximumPreferredPrice INT
);

CREATE TABLE Works_With (
    buyerId INT NOT NULL,
    agentID INT NOT NULL,
    FOREIGN KEY (buyerId) REFERENCES Buyer(id),
    FOREIGN KEY (agentID) REFERENCES Agent(agentId),
    PRIMARY KEY (buyerId, agentID)
);

INSERT INTO Property (address, ownerName, price) VALUES
('101 Maple St', 'Alice Johnson', 180000), -- House
('202 Pine St', 'Bob Smith', 220000),      -- House
('303 Oak St', 'Charlie Brown', 300000),   -- House
('404 Elm St', 'Diana Prince', 450000),    -- House
('101 Business Rd', 'John Corp', 500000),  -- Business
('202 Commercial St', 'Smith LLC', 750000),-- Business
('303 Industry Ave', 'Industrial Co.', 900000); -- Business

INSERT INTO House (address, bedrooms, bathrooms, size) VALUES
('101 Maple St', 3, 2, 1200),
('202 Pine St', 4, 3, 2000),
('303 Oak St', 3, 2, 1500),
('404 Elm St', 5, 4, 3000);

INSERT INTO BusinessProperty (address, type, size) VALUES
('101 Business Rd', 'Office', 1000),
('202 Commercial St', 'Retail', 1200),
('303 Industry Ave', 'Warehouse', 3000);

INSERT INTO Firm (id, name, address) VALUES
(1, 'Elite Realty', '555 Market St'),
(2, 'Pinnacle Properties', '123 High St'),
(3, 'Prime Realtors', '987 Center Rd'),
(4, 'Luxury Homes LLC', '654 Oak Ave');

INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES
(1, 'Sarah Lee', '555-1234', 1, '2022-01-15'),
(2, 'Mike Green', '555-5678', 2, '2021-06-10'),
(3, 'Sophia White', '555-9101', 3, '2020-11-20'),
(4, 'David Black', '555-1212', 4, '2019-08-30');

INSERT INTO Listings (mlsNumber, address, agentId, dateListed) VALUES
(101, '101 Maple St', 1, '2024-01-01'),
(102, '202 Pine St', 2, '2024-02-01'),
(103, '303 Oak St', 3, '2024-03-01'),
(104, '404 Elm St', 4, '2024-04-01'),
(201, '101 Business Rd', 1, '2024-05-01'),
(202, '202 Commercial St', 2, '2024-06-01'),
(203, '303 Industry Ave', 3, '2024-07-01');

INSERT INTO Buyer (id, name, phone, propertyType, bedrooms, bathrooms, businessPropertyType, minimumPreferredPrice, maximumPreferredPrice) VALUES
(1, 'John Doe', '555-2222', 'House', 3, 2, NULL, 200000, 300000),
(2, 'Jane Roe', '555-3333', 'Business', NULL, NULL, 'Office', 400000, 600000),
(3, 'Alex Kim', '555-4444', 'House', 4, 3, NULL, 300000, 500000),
(4, 'Chris Patel', '555-5555', 'Business', NULL, NULL, 'Retail', 500000, 800000),
(5, 'Taylor Swift', '555-6666', 'House', 5, 4, NULL, 400000, 600000);

INSERT INTO Works_With (buyerId, agentID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1);