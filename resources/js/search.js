// js search
jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: {
            url: '/search?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $("#search").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        name: 'list',
        displayKey: 'name',
        templates: {
            empty: [
                `
                <div class="list-group search-results-dropdown">
                    <div class="list-group-item">Not found</div>
                </div>
                `
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<a href="/music/' + data.id + '" class="list-group-item">' + data.name + '</a>'
            }
        }
    });
});
