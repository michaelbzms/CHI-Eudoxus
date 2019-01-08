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