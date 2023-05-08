create table users
(
    userID   int          not null primary key AUTO_INCREMENT,
    name     varchar(100) not null,
    username varchar(100) not null,
    password varchar(100) not null,
    age      int          not null,
    role     varchar(100) not null,
    email    varchar(100) not null,
    webpage  varchar(100) not null
);

INSERT INTO users (name, username, password, age, role, email, webpage)
VALUES
    ('John Doe', 'johndoe', 'password123', 28, 'user', 'johndoe@example.com', 'https://johndoe.com'),
    ('Jane Smith', 'janesmith', 'pass456', 35, 'user', 'janesmith@example.com', 'https://janesmith.com'),
    ('Mark Johnson', 'markjohnson', 'secret123', 42, 'user', 'markjohnson@example.com', 'https://markjohnson.com'),
    ('Anna Lee', 'annalee', 'password456', 25, 'user', 'annalee@example.com', 'https://annalee.com'),
    ('Mike Smith', 'mikesmith', 'password789', 30, 'user', 'mikesmith@example.com', 'https://mikesmith.com'),
    ('Emily Brown', 'emilybrown', 'test123', 27, 'user', 'emilybrown@example.com', 'https://emilybrown.com'),
    ('Tom Williams', 'tomwilliams', 'pass123', 39, 'user', 'tomwilliams@example.com', 'https://tomwilliams.com'),
    ('Sarah Wilson', 'sarahwilson', 'password999', 31, 'user', 'sarahwilson@example.com', 'https://sarahwilson.com'),
    ('Peter Davis', 'peterdavis', 'peterpass', 36, 'user', 'peterdavis@example.com', 'https://peterdavis.com'),
    ('Linda Jackson', 'lindajackson', 'jacksonpass', 33, 'user', 'lindajackson@example.com', 'https://lindajackson.com');
