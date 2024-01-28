function handleSubmit(event) {
    event.preventDefault();

    const form = document.getElementById('registrationForm');
    const formData = new FormData(form);

    // Build an object with form data
    const registrationData = {
        publicKey: formData.get('publicKey'),  // Adjust this based on your form field names
        id: formData.get('id'),  // Adjust this based on your form field names
    };

    // Send the data as JSON to the server
    fetch('http://localhost/path/to/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(registrationData),
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('accountIdDisplay').innerText = 'Votre ID de compte Hedera est : ' + data.accountId;
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}
    