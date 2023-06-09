// Retrieve the destination ID from the query parameters
const urlParams = new URLSearchParams(window.location.search);
const destinationId = urlParams.get('id');

// Form elements
let form = null;
let destinationIdInput = null;
let locationNameInput = null;
let countryNameInput = null;
let descriptionInput = null;
let touristTargetsInput = null;
let estimatedCostInput = null;

// Load the form after the document is loaded.
document.addEventListener('DOMContentLoaded', loadData);

function loadData() {
    // Get the form elements
    form = document.getElementById("updateForm");
    destinationIdInput = document.getElementById('destination_id');
    locationNameInput = document.getElementById('location_name');
    countryNameInput = document.getElementById('country_name');
    descriptionInput = document.getElementById('description');
    touristTargetsInput = document.getElementById('tourist_targets');
    estimatedCostInput = document.getElementById('estimated_cost');

    // Update the displayed destination
    fetch(`updateDestination.php?operation=retrieve&id=${destinationId}`)
        .then(response => response.json())
        .then(json => {
            destinationIdInput.value = json[0];
            locationNameInput.value = json[1];
            countryNameInput.value = json[2];
            descriptionInput.value = json[3];
            touristTargetsInput.value = json[4];
            estimatedCostInput.value = json[5];
        })
        .catch(error => {
           console.log(error);
           alert('Error retrieving destination data.');
        });
}

function updateDestination () {
    // Prepare form data
    const formData = new FormData(form);

    // Send update request
    fetch('updateDestination.php?operation=update', {method: 'POST', body: formData})
        .then(
            resp => {
                alert("Destination updated.");
                goToShowDestinations();
            },
            reason => { alert("Failed to update. " + reason.message); }
        );
}

function goToShowDestinations() {
    window.location.href = "showDestinations.html";
}
