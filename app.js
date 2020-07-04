'use strict';

/* Import the required modules */
const express = require('express');
const admin   = require('./admin/admin.js');

/* Get the express app */
const app = express();

/* Configure static directories */
app.use("/css", express.static(__dirname + '/css'));
app.use("/imgs", express.static(__dirname + '/imgs'));
app.use("/scripts", express.static(__dirname + '/scripts'));

/* Initialize the admin module */
admin.initApp(app, express);

/* For the favicon */
app.get('/favicon.ico', (req, res) => {
  res.sendFile(__dirname + '/favicon.ico');
});

/* For root route to home page */
app.get('/*', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

/* Get the port and set listening */
const PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
  console.log(`App listening on port ${PORT}`);
  console.log('Press Ctrl+C to quit.');
});

/* Export our app */
module.exports = app;
