-- Create database
CREATE DATABASE IF NOT EXISTS counter_db;
USE counter_db;

-- Create table for counter
CREATE TABLE IF NOT EXISTS counter (
    id INT PRIMARY KEY,
    value INT DEFAULT 0
);

-- Insert default counter value
INSERT INTO counter (id, value) VALUES (1, 0)
ON DUPLICATE KEY UPDATE value = value;
