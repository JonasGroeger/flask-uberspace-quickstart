#!/usr/bin/env python2.7
# -*- coding: utf8 -*-

from flask import Flask, render_template

app = Flask(__name__)
app.config.update(
	DEBUG=True,
	SECRET_KEY='You_will_never_know_:)'
)

@app.route('/')
def index():
  return render_template('index.html', name='Isabell')

@app.route('/about')
def about():
  return render_template('about.html')

if __name__ == '__main__':
    app.run()