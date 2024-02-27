INSERT INTO Users VALUES 
    (1, 'Pierluigi', 'Carrieri', 'tiamo', 'CRRPLG90M22E205T', 'Giulia Castaldini', 'Viale XII Giugno n. 15, Bologna', '1990-08-22', 'M'),
    (2, 'Giulia', 'Castaldini', 'tiamo', 'CSTGLI96H68A944C', 'Pierluigi Carrieri', 'Viale XII Giugno n. 15, Bologna', '1996-06-28', 'F');

INSERT INTO Books VALUES
    (1, 1, 'Php and MySql Web Development', 'EN', '9780321833891', 'https://m.media-amazon.com/images/I/81sOFJBUIzL._SL1500_.jpg', 'Paperback', 652, 'Addison-Wesley Professional', '2016-11-10', NULL),
    (2, 2, 'Fragola e Cioccolato', 'IT', '9788860631886', 'https://m.media-amazon.com/images/I/31zfziQmTBL.jpg', 'Paperback', 144, 'Coniglio Editore', '2009-01-01', 'Romanzo intensamente erotico, racconta le prime settimane di una passione amorosa attraverso gli occhi di una giovane disegnatrice di 25 anni. Osservatrice attenta dei propri slanci e desideri, ma anche dei propri dubbi, Aurélia Aurita parla d'' amore e di sesso con freschezza e sincerità. La sua visione ludica e gioiosa, mélange di crudezza e tenerezza, non ha paragoni nel panorama del fumetto e della letteratura erotica occidentale.')
    (3, 1, 'Harry Potter and The Philosopher''s Stone', 'EN', '9781526626585', 'https://m.media-amazon.com/images/I/91r0dvXhNGL._SL1500_.jpg', 'Hardback', 368, 'Bloomsbury Children''s Books', '2020-10-20', 'An irresistible new edition of Harry Potter and the Philosopher''s Stone created with ultra-talented designers MinaLima, the design magicians behind the gorgeous visual graphic style of the Harry Potter and Fantastic Beasts films. J.K. Rowling''s complete and unabridged text is accompanied by MinaLima''s handsome colour illustrations on nearly every page, superb design, and eight exclusive interactive paper-engineered elements - including Harry''s Hogwarts letter, the magical entrance to Diagon Alley, a sumptuous feast in the Great Hall of Hogwarts and more. Designed and illustrated by the iconic house of MinaLima - best known for establishing the graphic design of the Harry Potter and Fantastic Beasts films - this is the perfect gift for Harry Potter fans and a beautiful addition to any collector''s bookshelf, enticing readers of all ages to discover the Harry Potter novels all over again.'),
    (4, 2, 'L''Alfabeto della Saggezza. 21 Racconti da Tutto il Mondo', 'IT', '9788879268653', 'https://m.media-amazon.com/images/I/81qebmmDDWL._SL1369_.jpg', 'Hardback', 141, 'Einaudi Ragazzi', '2010-11-02', 'C''era una volta un pescatore che viveva con sua moglie in una vecchia capanna sulla riva del mare. Tutti i giorni saliva in barca, felice di vedere le onde bordate di schiuma, di sentire il sole accarezzargli il viso e il vento muovergli dolcemente i capelli. Talvolta, stordito dal calore del sole, stava lì immobile, preso dalla bellezza della natura, dimenticandosi perfino di gettare la rete. Un mattino in cui il mare era particolarmente calmo, lanciò le reti nell''acqua trasparente, ringraziando il cielo per una così bella giornata. Quando giunse il momento di tirarle su, si accorse che faceva molta fatica. Tirò con tutte le sue forze, pensando di aver catturato parecchi pesci di grosse dimensioni. Ma quale non fu la sua sorpresa nel vedere che la rete conteneva un solo pesce con le scaglie dorate. Per ogni lettera dell''alfabeto una parola dal significato forte e importante. E per ogni parola un racconto, tratto dalle storie tradizionali di tutto il mondo, che rappresenta una sorta di parabola. Questa edizione ripropone il testo in una nuova collana per ragazzi, dedicata ai loro animi avventurosi, sognatori e a volte ribelli. Storie ricche di forti emozioni scritte da autori fra i più affermati nella narrativa per l''infanzia arricchite dai disegni di grandi illustratori. Età di lettura: da 8 anni.');

INSERT INTO Authors VALUES
    (1, 'Luke', 'Welling'),
    (2, 'Laura', 'Thomson'),
    (3, 'Aurelia', 'Amata'),
    (4, 'J.K.', 'Rowling'),
    (5, 'Miraphora', 'Mina'),
    (6, 'Eduardo', 'Lima'),
    (7, 'Johanna', 'Marin Coles'),
    (8, 'Lydia', 'Marin Ross');

INSERT INTO Genres VALUES
    (1, 'Programming'),
    (2, 'Erotic'),
    (3, 'Comics'),
    (4, 'Manga'),
    (5, 'Hentai'),
    (6, 'Fantasy'),
    (7, 'Adventure'),
    (8, 'Children');

INSERT INTO Author_Book VALUES
    (1, 1),
    (2, 1),
    (3, 2)
    (4, 3),
    (5, 3),
    (6, 3),
    (7, 4),
    (8, 4);

INSERT INTO Book_Genre VALUES

    (1, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (3, 6),
    (3, 7),
    (3, 8),
    (4, 8);