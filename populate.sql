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

/* TODO: add more */