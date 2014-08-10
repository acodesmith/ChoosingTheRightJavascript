<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Choosing the right Javascript for the Job</h2>
        <p>Single page applications (SPA) are becoming more popular everyday. Due to their lack of reloading, fast interactivity and ability to separate the visual presentation from database activity
            a Single Page Application can turn a simple product into an impressive presentation.
            Complicated template logic can be hard to manage for a large project and some javascript
            frameworks can be overkill. We will analyze how each framework came to be, who maintains the codebase and top level components.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="well">
                    <p>
                        <img src="http://backbonejs.org/docs/images/backbone.png" alt="Backbone" width="200" />
                        <br />
                        <br />
                        Backbone.js gives structure to web applications by providing models with key-value binding and custom events,
                        collections with a rich API of enumerable functions, views with declarative event handling,
                        and connects it all to your existing API over a RESTful JSON interface.</p>

                    <p>

                    <p>
                        <a class="btn btn-primary" href="/spa/backbone">Backbone SPA</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <p>
                        <img src="https://angularjs.org/img/AngularJS-large.png" alt="Backbone" width="200" />
                        <br />
                        <br />
                        AngularJS lets you extend HTML vocabulary for your application.
                        The resulting environment is extraordinarily expressive, readable, and quick to develop.
                        AngularJS is a toolset for building the framework most suited to your application development.
                        It is fully extensible and works well with other libraries.
                    </p>
                    <p>
                        <a class="btn btn-primary" href="/spa/angular">Angular SPA</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <p>
                        <img src="http://emberjs.com/images/ember_logo.png" alt="Ember JS" />
                        <br />
                        <br />
                        Ember.js is a client-side JS web application framework based on the MVC pattern.
                        It allows developers to create scalable single-page applications by incorporating a rich object model,
                        declarative two-way data binding, computed properties, automatically-updating templates,
                        and a router for managing application state.
                    </p>
                    <p>
                        <a class="btn btn-primary" href="/spa/ember">Ember SPA</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
