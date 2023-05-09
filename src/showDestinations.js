$((function () {
    let currentPage = 1;
    let totalPages = 1;

    function refresh() {
        let role = $("#role")
        $.getJSON("showDestinations.php", {role: role.val()}, function (json) {
            $("table tr:gt(0)").remove()
            json.forEach(function (thing) {
                $("table").append(`<tr>
                                <td>${thing[1]}</td>
                                <td>${thing[2]}</td>
                                <td>${thing[3]}</td>
                                <td>${thing[4]}</td>
                                <td>${thing[5]}</td>
                                <td>
                                    <a href=updateDestination.php?id=${thing[0]}>Update</a>
                                    <br>
                                    <a href=deleteDestination.php?id=${thing[0]}>Delete</a>
                                    <br>
                                </td>
                               </tr>`)
            })
        })
        $("#info").text(`The query has been done with the country "${role.val()}"`)
    }

    $("#role").on("input", function () {
        refresh()
    })

    refresh()
}));
