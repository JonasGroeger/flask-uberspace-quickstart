**!**

**Ich warte dieses Projekt nicht mehr! Wenn jemand das ganze übernehmen möchte, forkt mich einfach und ich linke auf dein neues Projekt!**

**!**

# Jeder mag Demos!
[**Eine Demo, gemacht mit der folgenden Anleitung findest du hier.**](http://jonasgroeger.de/projekte/flask-uberspace-quickstart/)

# flask-uberspace-quickstart
Um auf [uberspace](https://uberspace.de) schnell eine [Flask](http://flask.pocoo.org/) Applikation mit schönen URLs zum laufen zu bringen, existiert dieses Projekt.
Man kann dann seine Applikation entwerfen und muss sich keine Sorgen um das deployen mehr machen.
    
Erst laden wir uns die Applikation in ein Verzeichnis herunter (ich wähle ~/html/projekte/):

    mkdir --parents ~/html/projekte/
    cd ~/html/projekte/
    git clone git://github.com/JonasGroeger/flask-uberspace-quickstart.git
    cd flask-uberspace-quickstart/
    
Jetzt installieren wir die benötigten Abhängigkeiten (Die Verwendung einer virtuallen Umgebung ist empfohlen, in [einem anderen Branch habe ich das gemacht](https://github.com/JonasGroeger/flask-uberspace-quickstart/tree/with-virtualenv)):

    pip install --requirement=requirements.txt    

Dann vergeben wir noch die korrekten Rechte und verschieben die .fcgi Datei in das entsprechende Verzeichnis.

    chmod 755 flask-uberspace-quickstart.fcgi
    mv flask-uberspace-quickstart.fcgi ~/fcgi-bin/

## Konfiguration
Jetzt müssen wir noch 2 Pfade konfigurieren:

1. **LOCAL_APPLICATION_PATH** in ~/fcgi-bin/flask-uberspace-quickstart.fcgi
2. **RELATIVE_WEB_URL_PATH** in ~/fcgi-bin/flask-uberspace-quickstart.fcgi

### LOCAL_APPLICATION_PATH
Das ist der absolte Pfad deiner flask Applikation. Da diese bei uberspace immer irgendwo unterhalb des $HOME Verzeichnisses liegt, habe ich den Teil mit Python schon übernommen: `os.path.expanduser('~')`
Der 2. Teil des Pfades muss allerdings angepasst werden. Bei mir wäre das `/html/projekte/flask-uberspace-quickstart`

### RELATIVE_WEB_URL_PATH
Dieser Pfad ist der Teil hinter der Domain.
Bei einem Zugriff von außen mittels `http://domain.com/projekte/flask-uberspace-quickstart` wäre dieser `/projekte/flask-uberspace-quickstart`.
Bei einem Zugriff von außen mittels `http://groeger.pegasus.uberspace.de/projekte/flask-uberspace-quickstart` wäre dieser der selbe: `/projekte/flask-uberspace-quickstart`

Danach solltet ihr auf `http://<dein-uberspace>.<dein-server>.uberspace.de/projekte/flask-uberspace-quickstart` die Flask Applikation laufen haben. Über eine eventuell vorhandene Domain ist der Zugriff natürlich auch möglich.

## Hinweis
Im Projekt ist eine .htaccess Datei die Standardmäßig auf `/fcgi-bin/flask-uberspace-quickstart.fcgi/` zeigt. Benennt man die .fcgi Datei um, so muss man das in der .htaccess Datei natürlich auch machen.
