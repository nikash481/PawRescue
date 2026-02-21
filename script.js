const form = document.getElementById("reportForm");

if (form) {
    form.addEventListener("submit", function(event) {
        const phone = form.phone.value.trim();
        if (!/^\d{10}$/.test(phone)) {
            alert("Please enter a valid 10-digit phone number.");
            event.preventDefault();
            return;
        }

        alert("Thank you! Rescue team has been notified.");
    });
}