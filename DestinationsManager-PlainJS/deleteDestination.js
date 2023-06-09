function deleteDestination() {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    if (id) {
        const xhr = new XMLHttpRequest();
        xhr.open("DELETE", `deleteDestination.php?id=${encodeURIComponent(id)}`);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                goToShowDestinations();
            } else {
                alert("Oops! Something went wrong. Please try again later.");
            }
        };
        xhr.send();
    }
}

function goToShowDestinations() {
    window.location.href = "showDestinations.html";
}
