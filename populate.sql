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

/* TODO: add more */