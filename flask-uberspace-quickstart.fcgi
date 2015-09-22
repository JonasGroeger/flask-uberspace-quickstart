#!/usr/bin/env python2.7

# This is the path relative to /
# If your application is available at www.domain.com/subdir/subdir2/myapplication this should be /subdir/subdir2/myapplication
RELATIVE_WEB_URL_PATH = '/projekte/flask-uberspace-quickstart'

import os
# This points to the application on the local filesystem.
LOCAL_APPLICATION_PATH = os.path.expanduser('~') + '/html/projekte/flask-uberspace-quickstart'

import sys
sys.path.insert(0, LOCAL_APPLICATION_PATH)

from flup.server.fcgi import WSGIServer
from app import app


class ScriptNamePatch(object):
    def __init__(self, app):
        self.app = app

    def __call__(self, environ, start_response):
        environ['SCRIPT_NAME'] = RELATIVE_WEB_URL_PATH
        return self.app(environ, start_response)

app = ScriptNamePatch(app)

if __name__ == '__main__':
    WSGIServer(app).run()
