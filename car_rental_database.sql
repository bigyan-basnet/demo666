-- Create Database
CREATE DATABASE IF NOT EXISTS car_rental_database;
USE car_rental_database;

-- -----------------------------
-- Table: user_registration
-- -----------------------------
CREATE TABLE user_registration (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  middle_name VARCHAR(50),
  last_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  is_admin BOOLEAN NOT NULL DEFAULT 0,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Users
INSERT INTO user_registration 
  (first_name, middle_name, last_name, username, is_admin, password) 
VALUES 
  ('Bigyan', 'Bahadur', 'Basnet', 'bigyan', 0, '$2y$10$hashedpasswordexample1'),
  ('Chetan', 'Raj', 'Bhagat', 'chetan', 0, '$2y$10$hashedpasswordexample2'),
  ('Admin', 'Admin', 'Admin', 'admin', 1, '$2y$10$hashedpasswordexample3');

-- -----------------------------
-- Table: car
-- -----------------------------
CREATE TABLE car (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  car_year INT NOT NULL,
  car_model VARCHAR(80) NOT NULL,
  car_colour VARCHAR(40) NOT NULL,
  rental_price DECIMAL(10,2) NOT NULL,
  booked BOOLEAN NOT NULL DEFAULT FALSE,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Cars
INSERT INTO car 
  (car_year, car_model, car_colour, rental_price, booked) 
VALUES
  (2020, 'Lamborghini', 'Yellow', 120.00, 0),
  (2018, 'Rolls Royce', 'White', 180.00, 0),
  (2021, 'BMW', 'Blue', 90.00, 0),
  (2019, 'TATA', 'Silver', 50.00, 0),
  (2022, 'Jeep', 'Red', 70.00, 0),
  (2023, 'Audi', 'Black', 95.00, 0),
  (2020, 'Mercedes', 'Grey', 100.00, 0);

-- -----------------------------
-- Table: booking
-- -----------------------------
CREATE TABLE booking (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  booking_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2) NOT NULL,
  car_id INT NOT NULL,
  username VARCHAR(50) NOT NULL,
  no_of_days INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (car_id) REFERENCES car(ID) ON DELETE CASCADE,
  FOREIGN KEY (username) REFERENCES user_registration(username) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Bookings
INSERT INTO booking 
  (total, car_id, username, no_of_days) 
VALUES
  (360.00, 1, 'admin', 3),
  (180.00, 4, 'bigyan', 3);

-- -----------------------------
-- Table: contact
-- -----------------------------
CREATE TABLE contact (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Contact
INSERT INTO contact 
  (name, email, subject, message) 
VALUES
  ('Bigyan', 'bigya@gmail.com', 'Pricing Inquiry', 'Could you provide details about long-term rentals?');
