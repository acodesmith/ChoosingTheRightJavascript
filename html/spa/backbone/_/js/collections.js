/**
 * Collections of Models
 * @type {void|*}
 */
app.SessionList = Backbone.Collection.extend({
    model: app.Session,
    localStorage: new Store("backbone-todo")
});