'use strict';

const express = require('express');
const session = require('express-session');
const cookie = require('cookie-parser');
const admin = require('./admin/admin.js');
const config = require('./admin/config.js');

const app = express();
app.use(cookie());
app.use(express.json());
app.use(session({secret: config.sessionSecret, saveUninitialized: false, resave: false, maxAge: 3600000 }));

app.use("/css", express.static(__dirname + '/css'));
app.use("/imgs", express.static(__dirname + '/imgs'));
app.use("/scripts", express.static(__dirname + '/scripts'));

app.get("/admin", (req, res) => {
  admin.runQuery(req, res);
});

app.post("/admin/doLogin", (req, res) => {
  admin.doLogin(req, res);
});

app.get('/*', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

const PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
  console.log(`App listening on port ${PORT}`);
  console.log('Press Ctrl+C to quit.');
});

module.exports = app;
