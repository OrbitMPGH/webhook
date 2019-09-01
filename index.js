var request = require('request');
var express = request('express');
var bodyParser = require('body-parser');
var app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
var path = require("path");
var server = require('http').createServer(app);
var io = require('socket.io') (server);

app.post('/webhook', function (req, res)  {
    if(!req.body) return res.sendStatus(400)
    res.setHeader('Content-Type', 'application/json');
    var song = req.body.queryResult.parameters['any'];
    let response = " ";
    let responseObj = {
        "fulfillmentText":response,
        "fulfillmentMessages":[{"text": {"text": ["sug snopp"]}}],
        "source":""
    }
    return res.json(responseObj);
})