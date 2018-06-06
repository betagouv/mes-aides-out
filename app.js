var app = require('express')();
var bodyParser = require('body-parser');
var mustacheExpress = require('mustache-express');

app.engine('mustache', mustacheExpress());
app.set('view engine', 'mustache');
app.use(bodyParser.json()); // for parsing application/json
app.use(bodyParser.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencoded

app.get('/', function (req, res) {
  res.render('index');
});

app.post('/prefill', function (req, res) {
  var data = Object.keys(req.body).map(function(key) {
    return {
      key: key,
      value: req.body[key]
    }
  })
  res.render('prefill', { fields: data });
});

app.post('/teleservice', function (req, res) {
  var data = Object.keys(req.body).map(function(key) {
    return {
      key: key,
      value: req.body[key]
    }
  })
  res.render('teleservice', { fields: data });
});

app.listen(3000);

