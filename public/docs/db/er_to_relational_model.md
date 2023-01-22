# Converting ER to Relational Model

## 1. Create Tables For Entity Sets
For every entity set and every multivalued attribute (ignoring composite and derived values)

### User(<u>uID</u>, username, first_name, last_name, email, password)
```
CREATE TABLE User (
    uID INTEGER NOT NULL,
    username CHAR NOT NULL,
    first_name CHAR,
    last_name CHAR,
    email CHAR,
    password CHAR,
    PRIMARY KEY(uID)
)
```
### Author(<u>aID</u>, description, birthdate, hometown, first_name, last_name)
```
CREATE TABLE Author (
    aID INTEGER NOT NULL, 
    description CHAR, 
    birthdate DATE, 
    hometown CHAR, 
    first_name CHAR, 
    last_name CHAR, 
    PRIMARY KEY(aID)
)
```
### Synopsis(<u>sID</u>, uID, isbn, rating, date)
Note: this is a weak entity, thus needs the aID along with sID and isbn to make primary key
```
CREATE TABLE Synopsis(
    sID INTEGER NOT NULL, 
    aID INTEGER NOT NULL,
    isbn INTEGER NOT NULL, 
    rating INTEGER,
    date DATE,
    PRIMARY KEY(sID, aID),
    FOREIGN KEY(aID) REFERENCES Author ON DELETE CASCADE
)
```

#### MVGenre(sID,genre)
Note: Since genre is multivalues, it gets its own table like its a weak entity

```
CREATE TABLE MVGenre(
    sID INTEGER NOT NULL, 
    genre CHAR NOT NULL,
    PRIMARY KEY(sID, genre),
    FOREIGN KEY(sID) REFERENCES Synopsis ON DELETE CASCADE
)
```

### Book(<u>isbn</u>,title, publisher, publish_date)

```
CREATE TABLE Book (
    isbn INTEGER NOT NULL,
    title CHAR, 
    publisher CHAR, 
    publish_date DATE,
    PRIMARY KEY(isbn)
)
```

### Location(lID, country, state, city, galaxy, solar_system, planet)
```
CREATE TABLE Location(
    lID INTEGER NOT NULL,
    country CHAR(20),
    state CHAR(20),
    city CHAR(20),
    galaxy CHAR(20),
    solar_system CHAR(20),
    planet CHAR(20),
    PRIMARY KEY(lID)

)
```

### Character(cID, description, gender, first_name, last_name)
```
CREATE TABLE Location(
    cID INTEGER NOT NULL,
    description CHAR(20),
    gender CHAR(20),
    first_name CHAR(20),
    last_name CHAR(20),
    PRIMARY KEY(cID)
)
```
## 2. Create Tables For Relationship Set

### Follows(<u>aID,uID</u>)
Since many, then primary key must be the combination of the two

```
CREATE TABLE Follows(
    aID INTEGER NOT NULL,
    uID INTEGER NOT NULL,
    PRIMARY KEY(aID, uID),
    FOREIGN KEY(aID) REFERENCES Author,
    FOREIGN KEY(uID) REFERENCES User

)
```

### Wrote(aID, isbn)
Since many:many, primary key is a combination of the two

```
CREATE TABLE Wrote(
    aID INTEGER NOT NULL,
    isbn INTEGER NOT NULL,
    PRIMARY KEY(aID, isbn),
    FOREIGN KEY(aID) REFERENCES Author,
    FOREIGN KEY(isbn) REFERENCES Book,
)
```


### In_Series_With(isbn_sequal, isbn_first_book)
Since in a relationship with itself, keys are the same but indicate which role it came from. 
In this case the sequals are the primary key since there can be many.

```
CREATE TABLE In_Series_With ( 
    isbn_sequal INTEGER NOT NULL, 
    isbn_prequal INTEGER, 
    PRIMARY KEY(isbn_prequal, isbn_sequal), 
    FOREIGN KEY(isbn_first_book) REFERENCES Book(isbn), 
    FOREIGN KEY(isbn_sequal) REFERENCES Book(isbn)
) 
```

### SynopsisRating(uID, sID, value)
- Since Rated has an attribute, need to combine with entity to create class

```
CREATE TABLE SynopsisRated ( 
    uID INTEGER NOT NULL, 
    sID INTEGER NOT NULL,
    value INTEGER, 
    comment CHAR(20), 
    PRIMARY KEY(uID,sID), 
    FOREIGN KEY(uID) REFERENCES User ON DELETE CASCADE
) 
```

### Wrote()
Note: We dont make a table for this since it is a weak entity and everything we 
need to know about rated is found in Synopsis table

### Describes()
Note: Dont need table since Synopsis is weak entity and already references isbn

### HasRead(uID, isbn)
- Since M:M, use both keys for primary key

```
CREATE TABLE HasRead(
    aID INTEGER NOT NULL,
    uID INTEGER NOT NULL,
    PRIMARY KEY(uID, isbn),
    FOREIGN KEY(uID) REFERENCES User,
    FOREIGN KEY(isbn) REFERENCES Book

)
```

### SetIn(lID, isbn)
```
CREATE TABLE SetIn(
    iID INTEGER NOT NULL,
    isbn INTEGER NOT NULL, 
    PRIMARY KEY(lID, isbn),
    FOREIGN KEY(lID) REFERENCES Location,
    FOREIGN KEY(isbn) REFERENCES Book
)
```

### Contains(cID, isbn)
- Relationship between book and character

```
CREATE TABLE Contains(
    cID INTEGER NOT NULL,
    isbn INTEGER NOT NULL, 
    PRIMARY KEY(cID, isbn),
    FOREIGN KEY(cID) REFERENCES Character,
    FOREIGN KEY(isbn) REFERENCES Book
)
```

# 3. Merge All Tables with same Primary Key
- There are no tables having the same primary keys, so dont need to merge