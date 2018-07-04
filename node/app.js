var app = require('express')();
var bodyParser = require('body-parser');
var mustacheExpress = require('mustache-express');
var rp = require('request-promise');

app.engine('mustache', mustacheExpress());
app.set('view engine', 'mustache');
app.use(bodyParser.json()); // for parsing application/json
app.use(bodyParser.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencoded

var endpointPrefix = process.env.MES_AIDES_CALLBACK_PREFIX || 'http://localhost:9000/api/situations/via/';
var username = process.env.MES_AIDES_API_USERNAME || 'local_node_test';
var password = process.env.MES_AIDES_API_PASSWORD || 'token';

app.get('/', function (req, res) {
  if (! req.query.code) {
    return res.render('index', { fields: [], username: username });
  }

  rp({
    uri: endpointPrefix + req.query.code,
    headers: {
        'User-Agent': 'Mes-Aides-Test',
        'Authorization': 'Basic ' + Buffer(username + ':' + password).toString('base64'),
    },
    json: true
  }).catch(function(response) {
    console.warn(response.error);
    return [];
  }).then(function(data) {
    var fields = Object.keys(data).map(function(key) {
      return {
        key: key,
        value: data[key]
      }
    })
    res.render('index', { fields: fields, username: username });
  })
});

app.post('/result', function (req, res) {
  var data = Object.keys(req.body).map(function(key) {
    return {
      key: key,
      value: req.body[key]
    }
  })
  res.render('result', { fields: data });
});

app.listen(3000);
