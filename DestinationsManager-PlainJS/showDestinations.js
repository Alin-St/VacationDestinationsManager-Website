$((function () {
    let currentPage = 1;
    let numberOfPages = 0;
    let countryNameInput = $("#country_name");

    function refreshCurrentPage() {
        $.getJSON("showDestinations.php", {country_name: countryNameInput.val(), page: currentPage}, function(json) {
            $("table tr:gt(0)").remove()
            json.forEach(function (row) {
                $("table").append(`<tr>
                                <td>${row[1]}</td>
                                <td>${row[2]}</td>
                                <td>${row[3]}</td>
                                <td>${row[4]}</td>
                                <td>${row[5]}</td>
                                <td>
                                    <a href=updateDestination.php?id=${row[0]}>Update</a>
                                    <br>
                                    <a href=deleteDestination.php?id=${row[0]}>Delete</a>
                                    <br>
                                </td>
                               </tr>`);
            });

            const text = `Page ${currentPage}/${numberOfPages}. Results are${countryNameInput.val() ? ` filtered with country "${countryNameInput.val()}".` : " not filtered."}`;
            $("#info").text(text);
        });
    }

    function refresh() {
        currentPage = 1;
        $.getJSON("showDestinations.php", {country_name: countryNameInput.val(), count: true}, function(data) {
            numberOfPages = Math.ceil(data / 4);
            console.log("Number of pages: " + numberOfPages);
            refreshCurrentPage();
        });
    }

    countryNameInput.on("input", function () {
        refresh();
    })

    refresh();

    function goPrev() {
        if (currentPage > 1) {
            currentPage--;
            refreshCurrentPage();
        }
    }

    function goNext() {
        if (currentPage < numberOfPages) {
            currentPage++;
            refreshCurrentPage();
        }
    }

    $("#prev-btn").click(goPrev);
    $("#next-btn").click(goNext);
}));
