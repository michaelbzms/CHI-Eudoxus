/* USERS: SECREATARIES */
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (1, 'secret@law.uoa.gr', 'secretlaw', 'secretary');
INSERT INTO `sdi1500102`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) 
	VALUES (1, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Νομικής', 8, '6914423265', 'Ακαδημίας 45, Ακαδημία', '10672', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (3, 'secret@math.uoa.gr', 'secretmath', 'secretary');
INSERT INTO `sdi1500102`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) 
	VALUES (3, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Μαθηματικών', 8, '6912432153', 'Πανεπιστημιούπολη 12, Καισαριανή', '14621', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (4, 'secret@phil.uoa.gr', 'secretphil', 'secretary');
INSERT INTO `sdi1500102`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) 
	VALUES (4, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Φιλοσοφικής', 8, '6987428593', 'Πανεπιστημιούπολη 35, Καισαριανή', '14621', 'Νομός Αττικής', 'Αθήνα');
    
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (13, 'secret@econ.opa.gr', 'secretecon', 'secretary');
INSERT INTO `sdi1500102`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) 
	VALUES (13, 'Οικονομικό Πανεπιστήμιο Αθηνών', 'Τμήμα Οικονομίκών', 8, '6982395019', 'Ομμόνοιας 42, Ομμόνοια', '10253', 'Νομός Αττικής', 'Αθήνα');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (14, 'secret@it.opa.gr', 'secretit', 'secretary');
INSERT INTO `sdi1500102`.`SECRETARIES` (`idUser`, `university`, `department`, `number_of_semesters`, `phone`, `address`, `TK`, `county`, `city`) 
	VALUES (14, 'Οικονομικό Πανεπιστήμιο Αθηνών', 'Τμήμα Πληροφορικής', 8, '6950130023', 'Ομμόνοιας 43, Ομμόνοια', '10253', 'Νομός Αττικής', 'Αθήνα');


/* USERS: STUDENTS */
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (2, 'elpiniki@law.uoa.gr', 'lawyered', 'student');
INSERT INTO `sdi1500102`.`STUDENTS` (`idUser`, `SECRETARIES_id`, `AM`, `firstname`, `lastname`, `current_semester`, `phone`) VALUES (2, 1, '1112201700186', 'Ελπινίκη', 'Παπαδοπούλου', 1, '6947234223');
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (16, 'anaksimandros@it.opa.gr', 'anaks', 'student');
INSERT INTO `sdi1500102`.`STUDENTS` (`idUser`, `SECRETARIES_id`, `AM`, `firstname`, `lastname`, `current_semester`, `phone`) VALUES (16, 14, '458920', 'Αναξίμανδρος', 'Αναξιμάνδρου', 5, '6985236487');
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (17, 'jonsnow@law.uoa.gr', 'winter', 'student');
INSERT INTO `sdi1500102`.`STUDENTS` (`idUser`, `SECRETARIES_id`, `AM`, `firstname`, `lastname`, `current_semester`, `phone`) VALUES (17, 4, '1111222233333', 'Γιάννης', 'Χιόνης', 7, '6945671239');


/* USERS: PUBLISHERS */
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (5, 'tziolas@pub.gr', 'tziolas', 'publisher');
INSERT INTO `sdi1500102`.`PUBLISHERS` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`, `email`) 
	VALUES (5, '6730125258', 'Αλέξανδρος', 'Τζιόλας', '691241232', 'Κολοκοτρώνη 59Β, Στοά Κουρτάκη, Αθήνα, 10560', 'tziolas@pub.gr');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (6, 'benedict@pub.gr', 'cucubmerbatch', 'publisher');
INSERT INTO `sdi1500102`.`PUBLISHERS` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`, `email`) 
	VALUES (6, '5182000184', 'Βενεδίκτος', 'Αγκουροπακέτος', '6942965968', 'Μηλιώνη 8, Αθήνα, 10673', 'cucumberbatch@pub.gr');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (15, 'george@pub.gr', 'patak', 'publisher');
INSERT INTO `sdi1500102`.`PUBLISHERS` (`idUser`, `AFM`, `firstname`, `lastname`, `phone`, `address`, `email`) 
	VALUES (15, '1314289239', 'Γιώργος', 'Πατάκης', '6942415234', 'Μεγάλου Αλεξάνδρου 13, Καλλιθέα, Αθήνα, 15373', 'ekdoseispataki@pub.gr');


/* BOOKS (must be inserted after publishers and before dist points) */
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (1, 6, 'ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ: ΜΙΑ ΣΥΓΧΡΟΝΗ ΠΡΟΣΕΓΓΙΣΗ', '960-209-873-2', 'STUART RUSSELL, PETER NORVIG', 2005, 1200, 'ΕΜΠΕΙΡΑ ΣΥΣΤΗΜΑΤΑ, ΕΥΦΥΗ ΣΥΣΤΗΜΑΤΑ, ΘΕΩΡΙΑ ΛΗΨΗΣ ΑΠΟΦΑΣΕΩΝ, ΛΟΓΙΚΟΣ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟΣ, ΜΗΧΑΝΙΚΗ ΓΝΩΣΗΣ, ΠΡΑΚΤΟΡΕΣ, ΤΕΧΝΗΤΗ ΝΟΗΜΟΣΥΝΗ', '2η', 'https://static.eudoxus.gr/books/preview/09/cover-13909.jpg', 'https://static.eudoxus.gr/books/preview/09/backcover-13909.jpg', 'https://www.klidarithmos.gr/texnhth-nohmosynh-2h-ekdosh', 'https://static.eudoxus.gr/books/09/toc-13909.pdf', 'https://static.eudoxus.gr/books/09/chapter-13909.pdf', '[21 x 29]', 'Σκληρό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (2, 5, 'ΕΙΣΑΓΩΓΗ ΣΤΟ ΑΣΤΙΚΟ ΔΙΚΑΙΟ', '978-960-562-549-8', 'ΚΩΝΣΤΑΝΤΙΝΟΣ ΠΑΝΑΓΟΠΟΥΛΟΣ', 2016, 264, 'εισαγωγή νομική νόμος', '1η', 'https://static.eudoxus.gr/books/02/cover-59395802.jpg', 'https://static.eudoxus.gr/books/preview/https://static.eudoxus.gr/books/02/backcover-59395802.jpg', NULL, NULL, NULL, '17x24', 'Μαλακό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (3, 5, 'Νομική υπόσταση του τραύματος', '978-960-6650-37-6', 'Λίτης Δημήτριος Φ.', 2009,  158, 'ιατρικό δίκαιο γιατρός γιατροί νομική νόμος δικαιοσύνη', '1η', 'https://static.eudoxus.gr/books/preview/65/cover-23965.jpg', 'https://static.eudoxus.gr/books/preview/65/backcover-23965.jpg', NULL, NULL, NULL, '[14 x 21]', 'Σκληρό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (4, 6, 'Εισαγωγή στην εκπαιδευτική αξιολόγηση', '978-960-602-225-8', 'ΒΕΝΤΟΥΡΗΣ ΑΝΤΩΝΗΣ', 2018, 120, 'αξιολόγηση εκπαιδεύσετε εκπαίδευση πώς', '1η', 'https://static.eudoxus.gr/books/39/cover-77120639.jpg', 'https://static.eudoxus.gr/books/preview/39/backcover-77120639.png', NULL, NULL, NULL, '[14 x 21]', 'Μαλακό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (5, 15, 'ΦΥΣΙΚΗ ΓΙΑ ΕΠΙΣΤΗΜΟΝΕΣ ΚΑΙ ΜΗΧΑΝΙΚΟΥΣ', '978-960-461-509-4', 'RAYMOND A. SERWAY, JOHN W. JEWETT', 2013, 1048, 'ΗΛΕΚΤΡΙΣΜΟΣ ΚΑΙ ΜΑΓΝΗΤΙΣΜΟΣ, ΗΛΕΚΤΡΟΜΑΓΝΗΤΙΣΜΟΣ, ΟΠΤΙΚΗ, ΣΥΓΧΡΟΝΗ ΦΥΣΙΚΗ, ΦΥΣΙΚΗ', '8η', 'https://static.eudoxus.gr/books/preview/12/cover-22750112.jpg', 'https://static.eudoxus.gr/books/preview/12/backcover-22750112.jpg', NULL, 'https://static.eudoxus.gr/books/12/toc-22750112.pdf', 'https://static.eudoxus.gr/books/12/chapter-22750112.pdf', '[21 x 29]', 'Σκληρό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (6, 15, 'ΕΙΣΑΓΩΓΗ ΣΤΗΝ ΑΛΛΗΛΕΠΙΔΡΑΣΗ ΑΝΘΡΩΠΟΥ-ΥΠΟΛΟΓΙΣΤΗ', '978-960-530-165-1', 'ΝΙΚΟΛΑΟΣ ΑΒΟΥΡΗΣ, ΧΡΗΣΤΟΣ ΚΑΤΣΑΝΟΣ, ΝΙΚΟΛΑΟΣ ΤΣΕΛΙΟΣ, ΚΩΝΣΤΑΝΤΙΝΟΣ ΜΟΥΣΤΑΚΑΣ', 2016, 530, 'ΕΑΜ αλληλεπίδραση άνθρωπος μηχανή υπολογιστής', '1η', 'https://static.eudoxus.gr/books/preview/72/cover-59366672.jpg', 'https://static.eudoxus.gr/books/preview/72/backcover-59366672.jpg', NULL, 'https://static.eudoxus.gr/books/72/toc-59366672.pdf', 'https://static.eudoxus.gr/books/72/chapter-59366672.pdf', '[17 x 24]', 'Μαλακό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (7, 6, 'Το Σύνταγμα και ο νομικός ρεαλισμός', '978-960-02-3381-0', 'Troper M.', 2018, 174, 'ΝΟΜΙΚΟΣ ΡΕΑΛΙΣΜΟΣ, συνταγματικό δίκαιο', '1η', 'https://static.eudoxus.gr/books/57/cover-77111557.jpg', 'https://static.eudoxus.gr/books/57/backcover-77111557.jpg', NULL, NULL, NULL, '[14 x 21]', 'Μαλακό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (8, 6, 'Στοιχεία Δικαίου και Τεχνική Νομοθεσία', '978-960-418-227-5', 'Μαρχαβίλας Π.', 2010, 380, 'Αστικό Δίκαιο, Δίκαιο, Δημόσια Έργα, Εκδόσεις Τζιόλα, Μαρχαβίλας, Νομική, Στοιχεία Δικαίου', '1η', 'https://static.eudoxus.gr/books/preview/14/cover-18549014.jpg', 'https://static.eudoxus.gr/books/14/backcover-18549014.jpg', NULL, NULL, NULL, '[17 x 24]', 'Σκληρό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (9, 15, 'ΣΤΟΙΧΕΙΑ ΕΙΣΑΓΩΓΗΣ ΣΤΗ ΦΙΛΟΣΟΦΙΑ', '978-960-6835-96-4', 'ΤΕΡΕΖΗΣ ΑΘ. ΧΡΗΣΤΟΣ', 2018, 888, 'ΑΛΗΘΕΙΑ, ΑΝΤΙΚΕΙΜΕΝΙΚΟΤΗΤΑ, ΑΡΙΣΤΟΤΕΛΗΣ , ΒΗΣΣΑΡΙΩΝ, ΒΥΖΑΝΤΙΟ, ΓΛΩΣΣΑ, ΓΝΩΣΗ', '1η', 'https://static.eudoxus.gr/books/06/cover-77120106.jpg', 'https://static.eudoxus.gr/books/06/backcover-77120106.jpg', NULL, NULL, NULL, '[14 x 21]', 'Σκληρό Εξώφυλλο');
INSERT INTO `sdi1500102`.`BOOKS` (`idBook`, `published_by`, `title`, `ISBN`, `authors`, `published_year`, `pagecount`, `keywords`, `version`, `front_page_url`, `back_page_url`, `webpage_url`, `contents_url`, `excerpt_url`, `dimensions`, `Tie`) 
	VALUES (10, 6, 'Ανάλυση Μηχανολογικών Καταστροφών', '978-960-85-334-3-1', 'Stein Kira, Μακρής Παναγιώτης', 2003, 284, 'αναλυση μηχανολογοι καταστροφες', '2η', 'https://static.eudoxus.gr/books/49/cover-77119649.jpg', 'https://static.eudoxus.gr/books/49/backcover-77119649.jpg', NULL, NULL, NULL, '[17 x 24]', 'Μαλακό Εξώφυλλο');

	
/* USERS: DISTRIBUTION POINTS */
INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (7, 'info@klidarithmos.gr', 'klidarithmos', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (7, 'Κλειδάριθμος', 'Στουρνάρη 27β 10682 Αθήνα', 'info@klidarithmos.gr', '210 3832044', 'Δευτέρα - Παρασκευή: 09:30 - 17:30, Σάββατο & Κυριακή κλειστά', 'https://maps.google.com/maps?q=%CF%83%CF%84%CE%BF%CF%85%CF%81%CE%BD%CE%AC%CF%81%CE%B7%2027%CE%B2&t=&z=13&ie=UTF8&iwloc=&output=embed');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (7, 1, 5);
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (7, 2, 2);
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (7, 3, 8);
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (7, 4, 4);

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (8, 'info@noufrios.gr', 'noufrios', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (8, 'Ο Νούφριος', 'Ιωαννίδου 45 15423 Αθήνα', 'info@noufrios.gr', '210 1234567', 'Κάθε μέρα 9:00 με 20:00', 'https://maps.google.com/maps?q=%CF%80%CE%BB%CE%B7%CF%81%CE%BF%CF%86%CE%BF%CF%81%CE%B9%CE%BA%CE%AE%20%CE%BA%CE%B1%CE%B9%20%CF%84%CE%B7%CE%BB%CE%B5%CF%80%CE%B9%CE%BA%CE%BF%CE%B9%CE%BD%CF%89%CE%BD%CE%B9%CF%8E%CE%BD&t=&z=13&ie=UTF8&iwloc=&output=embed');
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (8, 1, 27);
INSERT INTO `distribution_points_has_books` (`DISTRIBUTION_POINTS_id`, `BOOKS_id`, `count`) VALUES (8, 4, 89);

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (9, 'info@ianos.gr', 'ianos', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (9, 'Ιανός', 'Αριστοτέλους 7, 54624 Θεσσαλονίκη', 'info@ianos.gr', '2310 277 004', 'Δευτέρα - Παρασκευή 09:00 έως 21:00 & Σάββατο: 09:00 έως 20:00', 'https://maps.google.com/maps?q=%CE%91%CF%81%CE%B9%CF%83%CF%84%CE%BF%CF%84%CE%AD%CE%BB%CE%BF%CF%85%CF%82%207%2C%2054624%20%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7&t=&z=13&ie=UTF8&iwloc=&output=embed');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (10, 'epikoinonia@politeianet', 'politeia', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (10, 'Πολιτεία', 'Ασκληπιού 1-3 & Ακαδημίας Αθήνα, 10679 Αθήνα', 'epikoinonia@politeianet.gr', '210-3600235', 'Καθημερινά 09:00-21:00, Σάββατο 09:00-18:00', 'https://maps.google.com/maps?q=%CE%91%CF%83%CE%BA%CE%BB%CE%B7%CF%80%CE%B9%CE%BF%CF%8D%201-3%20%26%20%CE%91%CE%BA%CE%B1%CE%B4%CE%B7%CE%BC%CE%AF%CE%B1%CF%82%20%CE%91%CE%B8%CE%AE%CE%BD%CE%B1%2C%2010679%20%CE%91%CE%B8%CE%AE%CE%BD%CE%B1&t=&z=13&ie=UTF8&iwloc=&output=embed');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (11, 'info@evripidis', 'evripidis', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (11, 'Ευριπίδης', 'Ανδρέα Παπανδρέου 8, 152 32 Χαλάνδρι', 'info@evripidis.gr', '210 6813661', 'Δευτέρα – Παρασκευή: 9.00 – 21.00, Σάββατο: 9.00 – 18.00', 'https://maps.google.com/maps?q=%CE%91%CE%BD%CE%B4%CF%81%CE%AD%CE%B1%20%CE%A0%CE%B1%CF%80%CE%B1%CE%BD%CE%B4%CF%81%CE%AD%CE%BF%CF%85%208%2C%20152%2032%20%CE%A7%CE%B1%CE%BB%CE%AC%CE%BD%CE%B4%CF%81%CE%B9&t=&z=13&ie=UTF8&iwloc=&output=embed');

INSERT INTO `sdi1500102`.`USERS` (`idUser`, `email`, `password`, `user_type`) VALUES (12, 'info@savalas.gr', 'savalas', 'distPoint');
INSERT INTO `sdi1500102`.`DISTRIBUTION_POINTS` (`idUser`, `name`, `address`, `email`, `phone`, `working_hours`, `map_url`) 
	VALUES (12, 'Σαββάλας', 'Ζ. Πηγής 18 106 81 Αθήνα', 'info@savalas.gr', '210 3301251', 'Δευτέρα και Τετάρτη: 09:00 – 17:00, Τρίτη, Πέμπτη και Παρασκευή: 09:00 – 20:00, Σάββατο: 09:00 – 16:00', 'https://maps.google.com/maps?q=%CE%96.%20%CE%A0%CE%B7%CE%B3%CE%AE%CF%82%2018%20106%2081%20%CE%91%CE%B8%CE%AE%CE%BD%CE%B1&t=&z=13&ie=UTF8&iwloc=&output=embed');


/* ANNOUNCEMENTS */
INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019', 'Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019 Έναρξη Δήλωσης και Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2018-2019', 
        'general', '2018-10-23');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Προγραμματισμένες εργασίες συντήρησης 16/05/2018', 'Στο πλαίσιο προγραμματισμένων εργασιών συντήρησης στην υποδομή της υπηρεσίας του Ευδόξου, ενδέχεται η πρόσβαση στις εφαρμογές του Ευδόξου να μην είναι δυνατή, κατά διαστήματα, την Τετάρτη 16/05/2018 στο διάστημα 09:00 - 13:00. Ζητούμε συγγνώμη για την αναστάτωση.', 
        'general', '2018-05-16');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Τροποποίηση Συγκρότησης Επιτροπής Ελέγχου Κοστολόγησης Διδακτικών Συγγραμμάτων', 'Την απόφαση για την τροποποίηση συγκρότησης της Επιτροπής Ελέγχου Κοστολόγησης Διδακτικών Συγγραμμάτων μπορείτε να βρείτε <a href="#">εδώ</a>.', 
        'publishers', '2018-09-13');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Παράταση ανάρτησης διδακτικών συγγραμμάτων ακαδημαϊκού έτους 2018‐2019 στο Π.Σ. Εύδοξος', 'Δημοσιεύτηκε το έγγραφο του Υπουργείου Παιδείας, Έρευνας και Θρησκευμάτων σύμφωνα με το οποίο η περίοδος ανάρτησης των διδακτικών συγγραμμάτων για το ακαδημαϊκό έτος 2018-2019, παρατείνεται μέχρι την Παρασκευή 10 Αυγούστου 2018.', 
        'publishers', '2018-07-27');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, 'Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019', 'Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019\n\nΠαράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019 Παράταση περιόδου καταχώρησης συνολικών καταλόγων συγγραμμάτων 2018-2019.', 
        'secretaries', '2018-09-12');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, ' Έναρξη Δήλωσης Συγγραμμάτων Χειμερινής Περιόδου 2017-18 ', 'Το έγγραφο του Υπουργείου Παιδείας και Θρησκευμάτων σχετικά με την έναρξη των δηλώσεων και της διανομής συγγραμμάτων για τη χειμερινή περιόδο του ακαδημαϊκού έτους 2017-18 μπορείτε να βρείτε <a href="#">εδώ</a>.', 
        'students', '2018-11-05');

INSERT INTO `sdi1500102`.`ANNOUNCEMENTS` (`idAnnouncement`, `title`, `text`, `category`, `date`) 
VALUES (default, ' Έναρξη Διανομής Συγγραμμάτων Χειμερινής Περιόδου 2017-18 ', 'Το έγγραφο του Υπουργείου Παιδείας και Θρησκευμάτων σχετικά με την έναρξη των δηλώσεων και της διανομής συγγραμμάτων για τη χειμερινή περιόδο του ακαδημαϊκού έτους 2017-18 μπορείτε να βρείτε <a href="#">εδώ</a>.', 
        'dist_points', '2018-11-06');


/* GLOBAL SEARCH */
/* general functions */
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/announcements.php', 'ανακοινώσεις ανακοίνωση announcements announcement', 'Ανακοινώσεις');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/faq.php', 'faq βοήθεια ερωτήσεις απαντήσεις πληροφορίες', 'FAQ');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/contact.php', 'contact επικοινωνία email πληροφορίες', 'Επικοινωνία');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/aboutus.php', 'faq about us πληροφορίες', 'About Us');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/book_search.php', 'book search αναζήτηση συγγραμμάτων συγγράμματα βιβλία βιβλίων βιβλίο', 'Αναζήτηση Συγγραμμάτων');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'selected book search αναζήτηση επιλεγμένων συγγραμμάτων συγγράμματα επιλεγμένα βιβλία βιβλίων βιβλίο', 'Αναζήτηση Επιλεγμένων Συγγραμμάτων');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/distribution_point_search.php', 'distritbution point search αναζήτηση σημείο σημεία σημείου σημείων διανομής διανομή παράδοση', 'Αναζήτηση Σημείων Διανομής');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/publisher_search.php', 'publisher search αναζήτηση εκδότη εκδοτών εκδοτικών οίκων εκδοτικός οίκος', 'Αναζήτηση Εκδοτών');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/register_page.php', 'register sign up εγγραφή', 'Εγγραφή');
/* students */
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/book_declaration1.php', 'book declaration δήλωση συγγραμμάτων συγγράμματος φοιτητή φοιτητών φοιτητές φοιτητής', 'Δήλωση Συγγραμμάτων (Φοιτητές)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'book exchange ανταλλαγή συγγραμμάτων συγγράμματος φοιτητή φοιτητών φοιτητές φοιτητής', 'Ανταλλαγή Συγγραμμάτων (Φοιτητές)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'book declaration δήλωση προηγούμενες παλιές δηλώσεις συγγραμμάτων συγγράμματος φοιτητή φοιτητών φοιτητές φοιτητής', 'Προηγούμενες Δηλώσεις Συγγραμμάτων (Φοιτητές)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/student_info.php', 'πληροφορίες στοιχεία φοιτητή φοιτητών φοιτητές φοιτητής', 'Επισκόπηση Στοιχείων Φοιτητή (Φοιτητές)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/help_student.php', 'πληροφορίες βοήθεια φοιτητή φοιτητών φοιτητές φοιτητής', 'Βοήθεια Φοιτητή (Φοιτητές)');
/* publishers */
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'διαχείριση συγγραμμάτων βιβλίων εκδότη εκδότης εκδότες εκδοτών', 'Διαχείρηση Συγγραμμάτων (Εκδότες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'κοστολόγιση τιμές εκδότη εκδότης εκδότες εκδοτών', 'Κοστολόγιση (Εκδότες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'πληροφορίες στοιχεία εκδότη εκδότης εκδότες εκδοτών', 'Επισκόπηση Στοιχείων Εκδότη (Εκδότες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/help_publisher.php', 'πληροφορίες βοήθεια εκδότη εκδότης εκδότες εκδοτών', 'Βοήθεια Εκδότη (Εκδότες)');
/* secretaries */
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/secretary_app.php', 'υποβολή μαθημάτων ΠΣ Πρόγραμμα Σπουδών γραμματείες γραμματεία γραμματειών γραμματείας', 'Υποβολή Μαθημάτων (Γραμματείες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/secretary_app3.php', 'υποβολή συγγραμμάτων βιβλίων ΠΣ Πρόγραμμα Σπουδών γραμματείες γραμματεία γραμματειών γραμματείας', 'Υποβολή Συγγραμμάτων (Γραμματείες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/secretary_info.php', 'πληροφορίες στοιχεία γραμματείας γραμματεία γραμματείες γραμματειών', 'Επισκόπηση Στοιχείων Γραμματείας (Γραμματείες)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/help_secretary.php', 'πληροφορίες βοήθεια γραμματείας γραμματεία γραμματείες γραμματειών', 'Βοήθεια Γραμματείας (Γραμματείες)');
/* distribution points */
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'παράδοση συγγραμμάτων σημείου σημείο σημείων διανομής διανομή', 'Παράδοση Συγγραμμάτων (Σημεία Διανομής)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/notimplemented.php', 'πληροφορίες στοιχεία σημείου σημείο σημείων διανομής διανομή', 'Επισκόπηση Στοιχείων Σημείου Διανομής (Σημεία Διανομής)');
INSERT INTO `sdi1500102`.`GLOBAL_SEARCH` (`idSearchItem`, `link`, `keywords`, `title`) VALUES (default, '/sdi1500102_sdi1500165/php/help_distPoint.php', 'πληροφορίες βοήθεια σημείου σημείο σημείων διανομής διανομή παράδοση', 'Βοήθεια Σημείου Διανομής (Σημεία Διανομής)');


/* UNIVERSITY_CLASSES */
INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) 
	VALUES (1, 1, 3, 'Τεχνητή Νοημοσύνη', '45678', 'Σταματόπουλος Τάκης', 3, 'Ελεύθερο Μάθημα');
INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES_has_BOOKS` (`UNIVERSITY_CLASSES_id`, `BOOKS_id`) VALUES (1, 4);

INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) 
	VALUES (2, 1, NULL, 'Πολτική Οικονομία', '67233', 'Χατζιδάκης Βενεδίκτος', 1, '');

INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) 
	VALUES (3, 1, NULL, 'Γενική Κοινωνιολογία', '87234', 'Γενίκιος Κενόβιος', 1, '');

INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) 
	VALUES (4, 1, NULL, 'Αστικό Δίκαιο', '17232', 'Χατζιδάκης Βενεδίκτος', 3, '');
	
INSERT INTO `sdi1500102`.`UNIVERSITY_CLASSES` (`idClass`, `SECRETARIES_id`, `FREE_CLASS_SECRETARIES_id`, `title`, `code`, `professors`, `semester`, `comments`) 
	VALUES (5, 1, 3, 'Μαθηματικό Δίκαιο', '12512', 'Παπαδάτος Γεώργιος', 7, 'Ελεύθερο Μάθημα');
