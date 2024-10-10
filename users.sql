CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telegram_username VARCHAR(255),
    phone_number VARCHAR(255),
    is_student BOOLEAN DEFAULT FALSE
);
