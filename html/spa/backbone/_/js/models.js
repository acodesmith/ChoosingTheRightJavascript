
app.Categories = Backbone.Model.extend({
    defaults: {
        title: ''
    }
});

app.Locations = Backbone.Model.extend({
    defaults: {
        title: '',
        description: '',
        address: ''
    }
});

app.Session = Backbone.Model.extend({
    defaults: {
        category:{},
        title: '',
        description: '',
        speaker: {}
    }
});

app.Schedule = Backbone.Model.extend({
    defaults: {
        day: new Date(),
        time: new Date(),
        session: {},
        location: {}
    }
});

