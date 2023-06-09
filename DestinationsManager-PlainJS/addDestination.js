// Form elements
let form = null;
let locationNameInput = null;
let countryNameInput = null;
let descriptionInput = null;
let touristTargetsInput = null;
let estimatedCostInput = null;

// Load the form after the document is loaded.
document.addEventListener('DOMContentLoaded', loadData);

function loadData () {
    // Get the form elements
    form = document.getElementById("addForm");
    locationNameInput = document.getElementById('location_name');
    countryNameInput = document.getElementById('country_name');
    descriptionInput = document.getElementById('description');
    touristTargetsInput = document.getElementById('tourist_targets');
    estimatedCostInput = document.getElementById('estimated_cost');
}

function addDestination () {
    // Prepare form data
    const formData = new FormData(form);

    // Send add request
    fetch('addDestination.php', {method: 'POST', body: formData})
        .then(
            resp => {
                alert("Destination added.");
                goToShowDestinations();
            },
            reason => { alert("Failed to add. " + reason.message); }
        );
}

function goToShowDestinations() {
    window.location.href = "showDestinations.html";
}
