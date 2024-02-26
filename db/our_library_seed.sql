INSERT INTO Users VALUES 
    (1, 'Pierluigi', 'Carrieri', 'tiamo', 'CRRPLG90M22E205T', 'Giulia Castaldini', 'Viale XII Giugno n. 15, Bologna', '1990-08-22', 'M'),
    (2, 'Giulia', 'Castaldini', 'tiamo', 'CSTGLI96H68A944C', 'Pierluigi Carrieri', 'Viale XII Giugno n. 15, Bologna', '1996-06-28', 'F');

INSERT INTO Books VALUES
    (1, 1, 'Php and MySql Web Development', '9780321833891', 'https://m.media-amazon.com/images/I/81sOFJBUIzL._SL1500_.jpg', 'paperback', 652, 'Addison-Wesley Professional', '2016', NULL),
    (2, 2, 'Fragola e Cioccolato', '9788860631886', 'https://m.media-amazon.com/images/I/31zfziQmTBL.jpg', 'paperback', 144, 'Coniglio Editore', '2009', 'Romanzo intensamente erotico, racconta le prime settimane di una passione amorosa attraverso gli occhi di una giovane disegnatrice di 25 anni. Osservatrice attenta dei propri slanci e desideri, ma anche dei propri dubbi, Aurélia Aurita parla di amore e di sesso con freschezza e sincerità. La sua visione ludica e gioiosa, mélange di crudezza e tenerezza, non ha paragoni nel panorama del fumetto e della letteratura erotica occidentale.');

INSERT INTO Authors VALUES
    (1, 'Luke', 'Welling'),
    (2, 'Laura', 'Thomson'),
    (3, 'Aurelia', 'Amata');

INSERT INTO Genres VALUES
    (1, 'Programming'),
    (2, 'Erotic');

INSERT INTO Author_Book VALUES
    (1, 1),
    (2, 1),
    (3, 2);

INSERT INTO Book_Genre VALUES

    (1, 1),
    (2, 2);