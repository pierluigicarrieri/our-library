CREATE TABLE Users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    cf VARCHAR(16) NOT NULL,
    name_fiansato VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    sex VARCHAR(1) NOT NULL
);

CREATE TABLE Books (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    ISBN VARCHAR(13) NOT NULL,
    cover_img VARCHAR(255) NOT NULL,
    cover_type VARCHAR(255) NOT NULL,
    number_of_pages INT NOT NULL,
    publisher VARCHAR(255) NOT NULL,
    publication_date VARCHAR(4) NOT NULL,
    review TEXT,
    FOREIGN KEY(user_id) REFERENCES Users(id)
);

CREATE TABLE Authors (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL
);

CREATE TABLE Genres (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

/* Pivot tables */

CREATE TABLE Author_Book (
    author_id INT UNSIGNED NOT NULL,
    book_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (author_id, book_id),
    FOREIGN KEY(author_id) REFERENCES Authors(id),
    FOREIGN KEY (book_id) REFERENCES Books(id)
);

CREATE TABLE Book_Genre (
    book_id INT UNSIGNED NOT NULL,
    genre_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (book_id, genre_id),
    FOREIGN KEY(book_id) REFERENCES Books(id),
    FOREIGN KEY (genre_id) REFERENCES Genres(id)
);