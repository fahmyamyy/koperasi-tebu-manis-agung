// window.addEventListener('DOMContentLoaded', (event) => {
//     const alertBox = document.getElementById('customAlert');
//     if (alertBox) {
//         setTimeout(() => {
//             alertBox.style.opacity = 0; // Start the fade out
//             // Wait for the transition to finish before hiding the element completely
//             setTimeout(() => {
//                 alertBox.style.display = 'none';
//             }, 2000); // This should match the duration of the CSS transition
//         }, 3000); // 3 seconds until fade out starts
//     }
// });

window.onload = function () {
    const alert = document.getElementById('customAlert');
    if (alert) {
        setTimeout(function () {
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.remove();
            }, 2000);
        }, 2000);
    }
};

document.addEventListener('DOMContentLoaded', function () {

    const inputNominal = document.querySelectorAll('.nominal-format');
    inputNominal.forEach(form => {
        form.addEventListener('input', function () {
            let value = this.value;
            value = value.replace(/[^0-9]/g, '');
            value = value.replace(/^0+(\d)/, '$1');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            this.value = value;
        });
    });

    const inputNumber = document.querySelectorAll('.number-format');
    inputNumber.forEach(form => {
        form.addEventListener('input', function () {
            let value = this.value;
            value = value.replace(/[^0-9]/g, '');
            value = value.replace(/^0+(\d)/, '$1');
            this.value = value;
        });
    });

    const inputAlphabet = document.querySelectorAll('.alphabet-format');
    inputAlphabet.forEach(form => {
        form.addEventListener('input', function () {
            let value = this.value;
            // Remove any non-alphabetical characters, spaces, and repetitive dots
            value = value.replace(/[^a-zA-Z\s.]/g, ''); // Allow only letters, spaces, and dots
            value = value.replace(/\.+/g, match => match.length > 1 ? '.' : match); // Replace repetitive dots with a single dot
            this.value = value;
        });
    });

});