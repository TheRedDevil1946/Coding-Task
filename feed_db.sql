CREATE DATABASE feed_db;

USE feed_db;

CREATE TABLE items (
    entity_id INT PRIMARY KEY,
    category_name VARCHAR(255),
    sku VARCHAR(255),
    name VARCHAR(255),
    description TEXT,
    shortdesc TEXT,
    price DECIMAL(10, 2),
    link TEXT,
    image TEXT,
    brand VARCHAR(255),
    rating INT,
    caffeine_type VARCHAR(50),
    count INT,
    flavored VARCHAR(50),
    seasonal VARCHAR(50),
    instock VARCHAR(50),
    facebook INT,
    is_kcup INT
);
