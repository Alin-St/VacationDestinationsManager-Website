$((function () {
    let currentPage = 1;
    let numberOfPages = 0;
    let countryNameInput = $("#country_name");
    const table = $("table");
    const info = $("#info");

    // Refresh the contents of the current page.
    function refreshCurrentPage() {
        $.getJSON("showDestinations.php", {country_name: countryNameInput.val(), page: currentPage})
            .done(function(json) {
                // Clear existing rows (except the header)
                table.find("tr:gt(0)").remove();

                // Add new rows with data from the server response
                json.forEach(function (row) {
                    $("table").append(`<tr>
                                    <td>${row[1]}</td>
                                    <td>${row[2]}</td>
                                    <td>${row[3]}</td>
                                    <td>${row[4]}</td>
                                    <td>${row[5]}</td>
                                    <td>
                                        <a href=updateDestination.html?id=${row[0]}>Update</a>
                                        <br>
                                        <a href=deleteDestination.html?id=${row[0]}>Delete</a>
                                        <br>
                                    </td>
                                   </tr>`);
                });

                // Update the information display with page details
                const text = `Page ${currentPage}/${numberOfPages}. Results are${countryNameInput.val() ? ` filtered` + 
                    ` with country "${countryNameInput.val()}".` : " not filtered."}`;
                info.text(text);
            })
            .fail(function (error) {
                console.error("Error fetching data:", error);
            });
    }

    // Go back to page 1, refresh the data and calculate the number of pages.
    function refresh() {
        currentPage = 1;
        $.getJSON("showDestinations.php", {country_name: countryNameInput.val(), count_only: true})
            .done(function(data) {
                numberOfPages = Math.ceil(data / 4);
                refreshCurrentPage();
            })
            .fail(function (error) {
                console.error("Error fetching data:", error);
            });
    }

    // Event handler for input changes in the country name filter
    countryNameInput.on("input", refresh)

    function goToPreviousPage() {
        if (currentPage > 1) {
            currentPage--;
            refreshCurrentPage();
        }
    }

    function goToNextPage() {
        if (currentPage < numberOfPages) {
            currentPage++;
            refreshCurrentPage();
        }
    }

    $("#prev-btn").click(goToPreviousPage);
    $("#next-btn").click(goToNextPage);

    // Initial data refresh
    refresh();
}));
