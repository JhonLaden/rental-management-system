<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize Flatpickr on the inputRentalStart field
        flatpickr("#inputRentalStart", {
            dateFormat: "Y-m-d",  // Date format
            minDate: "today",  // Ensure only today and future dates are selectable
            onChange: function(selectedDates, dateStr, instance) {
                // When a date is selected in inputRentalStart, update the minDate for inputReturnDate
                const returnDatePicker = flatpickr("#inputReturnDate");
                const nextDay = new Date(selectedDates[0]);
                nextDay.setDate(nextDay.getDate() + 1);  // Get the day after the selected date
                returnDatePicker.set("minDate", nextDay);  // Set minDate for returnDate
            }
        });

        // Initialize Flatpickr on the inputReturnDate field
        flatpickr("#inputReturnDate", {
            dateFormat: "Y-m-d",  // Date format
            minDate: "today",  // Initially, prevent past dates
        });
    });
</script>
