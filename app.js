var app = require('express')();
var bodyParser = require('body-parser');
var mustacheExpress = require('mustache-express');
var rp = require('request-promise');

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

app.get('/prefill', function (req, res) {
  if (! req.query.callback) {
    return res.render('prefill', { fields: [] });
  }

  rp({
    uri: req.query.callback,
    headers: {
        'User-Agent': 'Mes-Aides-Test',
        'Authorization': 'Bearer ' + process.env.MES_AIDES_CALLBACK_TOKEN,
    },
    json: true
  }).catch(function() {
    return [];
  }).then(function(data) {
    var fields = Object.keys(data).map(function(key) {
      return {
        key: key,
        value: data[key]
      }
    })
    res.render('teleservice', { fields: fields });
  })
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

