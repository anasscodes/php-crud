CREATE DATABASE smartphones;

USE smartphones;


CREATE TABLE smartphones (
    id INT PRIMARY KEY,            -- Unique identifier for each smartphone
    name VARCHAR(255) NOT NULL,    -- Smartphone name
    description TEXT,              -- Detailed description
    price DECIMAL(10, 2) NOT NULL, -- Smartphone price
    quantity INT NOT NULL,         -- Stock quantity
    picture  VARCHAR(255)          -- Path to the smartphone image file
);