INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (1, 'secret@law.uoa.gr', 'secretlaw', 'secretary');
INSERT INTO `eudoxusdb`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) VALUES (1, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Νομικής', 8, '6914423265', 'Ακαδημίας 45, Ακαδημία', '10672', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (2, 'elpiniki@law.uoa.gr', 'lawyered', 'student');
INSERT INTO `eudoxusdb`.`STUDENTS` (`idUser`, `SECRETARIES_id`, `AM`, `firstname`, `lastname`, `current_semester`, `phone`) VALUES (2, 1, '1112201700186', 'Ελπινίκη', 'Παπαδοπούλου', 1, '6947234223');

INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (3, 'secret@math.uoa.gr', 'secretmath', 'secretary');
INSERT INTO `eudoxusdb`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) VALUES (3, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Μαθηματικών', 8, '6912432153', 'Πανεπιστημιούπολη 12, Καισαριανή', '14621', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (4, 'secret@phil.uoa.gr', 'secretphil', 'secretary');
INSERT INTO `eudoxusdb`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) VALUES (4, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Φιλοσοφικής', 8, '6987428593', 'Πανεπιστημιούπολη 35, Καισαριανή', '14621', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (default, 1, NULL, 'Αστικό Δίκαιο', '17232', 'Χατζιδάκης Βενεδίκτος', 3, '');
INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (default, 1, 3, 'Μαθηματικό Δίκαιο', '12512', 'Παπαδάτος Γεώργιος', 7, 'Ελεύθερο Μάθημα');

INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (5, 'tziolas@pub.gr', 'tziolas', 'publisher');
INSERT INTO `eudoxusdb`.`PUBLISHERS` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`) VALUES (5, '12342151232123', 'Θανάσης', 'Τζιόλας', '691241232', '127.0.0.1');   /* TODO: change to more realistic */
INSERT INTO `eudoxusdb`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (6, 'benedict@pub.gr', 'cucubmerbatch', 'publisher');
INSERT INTO `eudoxusdb`.`PUBLISHERS` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`) VALUES (6, '12342151232123', 'Βενεδίκτος', 'Αγκουροπακέτος', '6942965968', '127.0.0.2');   /* TODO: change to more realistic */

INSERT INTO `eudoxusdb`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
						 VALUES (default, 5, 'Εισαγωγή στην Νομική', '1248-1428-2141-1232', 'Πατάπιος Ι. και Μέγας Αλέξανδρος', 2007, 673, 'εισαγωγή νομική νόμος', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eudoxusdb`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
						 VALUES (default, 5, 'Ιατρικό Δίκαιο', '1678-1523-2871-3454', 'Ιπποκράτης', 2009,  932, 'ιατρικό δίκαιο γιατρός γιατροί νομική νόμος δικαιοσύνη', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `eudoxusdb`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
						 VALUES (default, 6, 'Πώς να εκπαιδεύσετε τον δράκο σας', '7475-5647-4544-4754', 'Daennerys Targeryen', 2012, 423, 'δράκο εκπαιδεύσετε εκπαίδευση δράκου πώς', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/* ANNOUNCEMENTS */
INSERT INTO `eudoxusdb`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019', 'Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019', 
        'general', '2018-10-23');

INSERT INTO `eudoxusdb`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019', 'Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019\n\nΠαράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019.', 
        'secretaries', '2018-09-12');

/* GLOBAL SEARCH */
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/announcements.php', 'ανακοινώσεις ανακοίνωση announcements announcement', 'Ανακοινώσεις');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/faq.php', 'faq βοήθεια ερωτήσεις απαντήσεις πληροφορίες', 'FAQ');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/aboutus.php', 'faq about us πληροφορίες', 'About Us');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/contact.php', 'contact επικοινωνία email πληροφορίες', 'Επικοινωνία');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/book_search.php', 'book search αναζήτηση συγγραμμάτων συγγράμματα βιβλία βιβλίων βιβλίο', 'Αναζήτηση Συγγραμμάτων');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/book_declaration1.php', 'book declaration δήλωση συγγραμμάτων συγγράμματος φοιτητές φοιτητής', 'Δήλωση Συγγραμμάτων (Φοιτητές)');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/secretary_app.php', 'υποβολή μαθημάτων γραμματείες γραμματεία', 'Υποβολή Μαθημάτων (Γραμματείες)');
INSERT INTO `eudoxusdb`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/secretary_app3.php', 'υποβολή συγγραμμάτων γραμματείες γραμματεία', 'Υποβολή Συγγραμμάτων (Γραμματείες)');

/* TODO: add more */

INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (default, 1, 3, 'Τεχνητή Νοημοσύνη', '45678', 'Σταματόπουλος Τάκης', 3, 'Ελεύθερο Μάθημα');
INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES_has_BOOKS` (`UNIVERSITY_CLASSES_id`, `BOOKS_id`) VALUES (5, 4);
INSERT INTO `eudoxusdb`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
						 VALUES (default, 6, 'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ: ΜΙΑ ΣΥΓΧΡΟΝΗ ΠΡΟΣΕΓΓΙΣΗ', '960-209-873-2', 'STUART RUSSELL, PETER NORVIG', 2005, 1200, 'ΕΜΠΕΙΡΑ ΣΥΣΤΗΜΑΤΑ, ΕΥΦΥΗ ΣΥΣΤΗΜΑΤΑ, ΘΕΩΡΙΑ ΛΗΨΗΣ ΑΠΟΦΑΣΕΩΝ, ΛΟΓΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ, ΜΗΧΑΝΙΚΗ ΓΝΩΣΗΣ, ΠΡΑΚΤΟΡΕΣ, ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ', '2η', 'https://static.eudoxus.gr/books/preview/09/cover-13909.jpg', 'https://static.eudoxus.gr/books/preview/09/backcover-13909.jpg', 'https://www.klidarithmos.gr/texnhth-nohmosynh-2h-ekdosh', 'https://static.eudoxus.gr/books/09/toc-13909.pdf', 'https://static.eudoxus.gr/books/09/chapter-13909.pdf', '[21 x 29]', 'Σκληρό Εξώφυλλο');

INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (default, 1, NULL, 'Πολτική Οικονομία', '67233', 'Χατζιδάκης Βενεδίκτος', 1, '');
INSERT INTO `eudoxusdb`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) VALUES (default, 1, NULL, 'Γενική Κοινωνιολογία', '87234', 'Someone Else', 1, '');


INSERT INTO `eudoxusdb`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) VALUES (default, 'Κλειδάριθμος', 'Στουρνάρη 27β 10682 Αθήνα', 'info@klidarithmos.gr', '210 3832044', 'Δευτέρα - Παρασκευή: 09:30 - 17:30, Σάββατο & Κυριακή κλειστά', 'https://maps.google.com/maps?q=%CF%83%CF%84%CE%BF%CF%85%CF%81%CE%BD%CE%AC%CF%81%CE%B7%2027%CE%B2&t=&z=13&ie=UTF8&iwloc=&output=embed');
INSERT INTO `eudoxusdb`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) VALUES (default, 'Ο Νούφριος', 'Ιωαννίδου 45 15423 Αθήνα', 'info@noufrios.gr', '210 1234567', 'Κάθε μέρα 9:00 με 20:00', 'https://maps.google.com/maps?q=%CF%80%CE%BB%CE%B7%CF%81%CE%BF%CF%86%CE%BF%CF%81%CE%B9%CE%BA%CE%AE%20%CE%BA%CE%B1%CE%B9%20%CF%84%CE%B7%CE%BB%CE%B5%CF%80%CE%B9%CE%BA%CE%BF%CE%B9%CE%BD%CF%89%CE%BD%CE%B9%CF%8E%CE%BD&t=&z=13&ie=UTF8&iwloc=&output=embed');

INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('1', '1', '5');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('2', '1', '27');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('1', '2', '2');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('1', '3', '8');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('1', '4', '4');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES ('2', '4', '89');


/* temp */
ALTER TABLE distribution_points MODIFY COLUMN map_url VARCHAR(512);

ALTER TABLE publishers ADD email varchar(256) DEFAULT "genericpublisheremail@gmail.com";