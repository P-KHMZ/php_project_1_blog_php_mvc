# Simple Bog php project
---

## This is project initiates to the MVC paradigm
### In this project we use MySQL DataBase called simple_blog for storing data.
### it has for the time that I am writing this " .ReadMe.md" 2 tables called blog_entry and comment respectively
### Considering the size of the project I use the single table data gateway pattern with 3 classes( class Table, class ### Blog_entry_Table and finally the class comment_Table) all located in the models folder 
# DB_NAME = simple_blog
``` sql

    CREATE DATABASE simple_blog;
    USE simple_blog;
```
# DB_TABLES = blog_entry and comment
# Note: the blog_entry and comment have the '.is-a' relationship
## the blog_entry table is linked to the comment table with a its primary key 