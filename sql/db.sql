-- DBNAME simple_db
-- blog_entry
CREATE TABLE blog_entry
(
    entry_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(150),
    entry_text TEXT,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(entry_id)
)
-- comment
CREATE TABLE comment
(
    comment_id INT NOT NULL AUTO_INCREMENT,
    entry_id INT NOT NULL,
    author VARCHAR(75),
    txt TEXT,
    dates TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(comment_id),
    FOREIGN KEY(entry_id) REFERENCES blog_entry(entry_id)
)
-- Login
CREATE TABLE admin
(
    admin_id INT NOT NULL AUTO_INCREMENT,
    email TEXT,
    pssword VARCHAR(35), --the size of 35 refers to the algorithm MD5 which encrypte the password to 35 characters
    PRIMARY KEY(admin_id)
)
