$(document).ready(function() {
    if ($("h1").length > 0 && $("h1").text().trim() === "CNIC Configuration") {
        $("h1").remove();
    }
});