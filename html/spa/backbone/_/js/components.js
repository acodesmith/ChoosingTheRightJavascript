/**
 * Search Filter
 */
var FilterCollection = new app.FilterList(
    [
        new app.FilterType({ name: "Category", property: "category" }),
        new app.FilterType({ name: "Title", property: "title" }),
        new app.FilterType({ name: "Description", property: "description" })
    ]
);