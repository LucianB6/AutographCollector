function search(name) {
    fetchSearchData(name);
}

function fetchSearchData(name) {
    fetch('searchCeleb.php', {
        method: 'POST',
        body: new URLSearchParams('name=' + name);
    })
        .then()
}
