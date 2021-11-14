-- blog_entry
CREATE TABLE blog_entry
(
    entry_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(150),
    entry_txt TEXT,
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
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(comment_id),
    FOREIGN KEY(entry_id) REFERENCES blog_entry(entry_id)
)