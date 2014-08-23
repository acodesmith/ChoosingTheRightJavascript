/**
 * Collections of Models
 * @type {void|*}
 */
app.SessionList = Backbone.Collection.extend({
    model: app.Session
});

app.FilterList = Backbone.Collection.extend({
    model: app.FilterType
});