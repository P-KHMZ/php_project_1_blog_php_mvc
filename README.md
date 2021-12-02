# Simple Bog php project
---

## This is project initiates to the MVC paradigm
### In this project we use MySQL DataBase called simple_blog for storing data.
``` sql

    CREATE DATABASE simple_blog;
    USE simple_blog;
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

```
## DB_TABLES = blog_entry and comment
# Note: the blog_entry and comment have the 'is-a' relationship
## the blog_entry table is linked to the comment table with a its primary key 