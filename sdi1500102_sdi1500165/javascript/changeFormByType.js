function changeFormByType() {
    var currUser = document.getElementById('userType').value;
    var formNewHTML;
    switch (currUser) {
        case "1":       // Φοιτητής
            document.getElementById('registerTitle').textContent = "Εγγραφή Φοιτητή";
            formNewHTML = `
                <div class="form-group">
                    <label class="requiredField">Όνομα</label>
                    <input class="form-control" id="firstname" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Επώνυμο</label>
                    <input class="form-control" id="lastname" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Αριθμός Μητρώου</label>
                    <input class="form-control" id="am" required>
                </div>
                // TODO: Dropdown Σχολή, Τμήμα, Τρέχον Εξάμηνο
                <div class="form-group">
                    <label>Τηλέφωνο</label>
                    <input class="form-control" id="phone">
                </div>
            `;
            break;
        case "2":       // Εκδότης
            document.getElementById('registerTitle').textContent = "Εγγραφή Εκδότη";
            formNewHTML = `
                <div class="form-group">
                    <label class="requiredField">Όνομα</label>
                    <input class="form-control" id="firstname" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Επώνυμο</label>
                    <input class="form-control" id="lastname" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">ΑΦΜ</label>
                    <input class="form-control" id="afm" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Τηλέφωνο</label>
                    <input class="form-control" id="phone" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Νομός</label>
                    <input class="form-control" id="county" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Πόλη</label>
                    <input class="form-control" id="city" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Διεύθυνση</label>
                    <input class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                    <input class="form-control" id="tk" required>
                </div>
            `;
            break;
        case "3":       // Γραμματεία
            document.getElementById('registerTitle').textContent = "Εγγραφή Γραμματείας";
            formNewHTML = `
                <div class="form-group">
                    <label class="requiredField">Σχολή</label>
                    <input class="form-control" id="university" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Τμήμα</label>
                    <input class="form-control" id="department" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Πλήθος Εξαμήνων</label>
                    <input class="form-control" id="number_of_semesters" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Τηλέφωνο Γραμματείας</label>
                    <input class="form-control" id="phone" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Νομός</label>
                    <input class="form-control" id="county" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Πόλη</label>
                    <input class="form-control" id="city" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Διεύθυνση</label>
                    <input class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                    <input class="form-control" id="tk" required>
                </div>
            `;
            break;
        case "4":       // Σημείο Διανομής
            document.getElementById('registerTitle').textContent = "Εγγραφή Σημείου Διανομής";
            formNewHTML = `
                <div class="form-group">
                    <label class="requiredField">Επωνυμία</label>
                    <input class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Τηλέφωνο</label>
                    <input class="form-control" id="phone" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Νομός</label>
                    <input class="form-control" id="county" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Πόλη</label>
                    <input class="form-control" id="city" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Διεύθυνση</label>
                    <input class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Ταχυδρομικός Κώδικας</label>
                    <input class="form-control" id="tk" required>
                </div>
                <div class="form-group">
                    <label class="requiredField">Ώρες Λειτουργίας</label>
                    <textarea class="form-control" id="working_hours" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label>Ιστοσελίδα</label>
                    <input class="form-control" id="tk" required>
                </div>
            `;
            break;
        default:    // should never happen
            formNewHTML = "Invalid userType";
    }
    $('#variableDivByType').hide().html(formNewHTML).fadeIn('slow');
}
