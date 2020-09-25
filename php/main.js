let id = $("input[name*='movie_id']")
id.attr("readonly", "readonly");


$(".btnedit").click(e => {
    let textvalues = displayData(e);
    let moviename = $("input[name*='movie_name']");
    let movieyear = $("input[name*='movie_year']");
    let movierate = $("input[name*='movie_rate']");

    id.val(textvalues[0]);
    moviename.val(textvalues[1]);
    movieyear.val(textvalues[2]);
    movierate.val(textvalues[3].replace("/ 10", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td) {
        if (value.dataset.id == e.target.dataset.id) {
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}