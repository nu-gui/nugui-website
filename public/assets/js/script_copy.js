document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    // Fetch CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log('CSRF Token:', csrfToken); // Log CSRF Token for debugging

    if (hamburger && navLinks) {
        console.log('Hamburger and navLinks found');
        logToFile('Hamburger and navLinks found', csrfToken);
        
        hamburger.addEventListener('click', () => {
            try {
                console.log('Hamburger clicked');
                navLinks.classList.toggle('mobile-menu');
                hamburger.classList.toggle('active');
                console.log('Classes toggled:', navLinks.classList, hamburger.classList); // Log class list for debugging
                logToFile('Hamburger clicked and toggled class', csrfToken);
            } catch (error) {
                console.error('Error during hamburger click event:', error);
                logToFile(`Error during hamburger click event: ${error.message}`, csrfToken);
            }
        });
    } else {
        console.error('Hamburger or navLinks not found');
        logToFile('Error: Hamburger or navLinks not found', csrfToken);
    }
});

function logToFile(message, csrfToken) {
    fetch('/log-to-file', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
        },
        body: JSON.stringify({ message: message }),
    }).catch(error => {
        console.error('Error logging to file:', error);
        alert('Error logging to file. Check console for more details.');
    });
}
