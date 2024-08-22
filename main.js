// Example: Simple form validation
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    
    if (form) {
        form.addEventListener('submit', function (event) {
            const checkInDate = document.querySelector('input[name="check_in_date"]').value;
            const checkOutDate = document.querySelector('input[name="check_out_date"]').value;

            if (new Date(checkInDate) >= new Date(checkOutDate)) {
                alert("Check-out date must be after check-in date.");
                event.preventDefault();
            }
        });
    }
});
