##1.) 
Zuerst:<br>
-> Neuste Docker-Version downloaden<br>
-> im Terminal in das Verzeichnis wechseln in dem das Projekt liegt<br>
    [ Beispielsweise liegt das Projekt unter "/Dokumente/git/Webshop"<br>
        1. Bei der Situation würde man im Terminal, sofern man sich in Home befindet: "cd /Dokumente/git/Webshop" eingeben um in das Verzeichnis zu kommen<br>
        2. Um sicherzustellen, dass man in dem Verzeichnis ist am besten "ls" in der Kommandozeile einzugeben, um angezeigt zu bekommen,<br>
           ob die Dateien auch in diesem Ordner sind. !!! Es ist erkennbar, sofern eine der Dateien "docker-compose.yml" heißt und auch die "composer.json" in dem Verzeichnis ist.<br>
    ]

##2.) 
Der zweite Schritt ist die Virtuellen Container hochzufahren.<br>
Das funktioniert mit: "docker-compose up"<br>

##!!! Sofern das nicht funktioniert 
/1. Schauen ob man im Terminal im richtigen Verzeichnis den Kommand eingegeben hat.  
/2. Ein yarn install im Verzeichnis im Terminal eingeben.
/3. Kontaktieren sie Mike: +49 176 70047943

##3.) 
Sofern alles geklappt hat müsste sichtbar sein,<br>dass die Container laufen, da das benutzte Terminal Fenster als Log der Server dient.<br>

##4.)
Anschließen gehen Sie in ein weiteres Terminal Fenster und gehen wieder per Kommantozeile in das Verzeichnis in dem das Projekt liegt.<br>
-> Sofern Sie dies gemacht haben und wieder die Krietrien von oben sehen, müssten die sich mit dem Container Verbinden um dem Projekt die dependecies zu holen.<br>
    Dies geht indem Sie:<br>
    /1. connect in der Kommandozeile eingeben<br>
    /2. und ein "composer install" ausführen.<br>
    /3. anschließend wär es auch praktisch vielleicht ein "yarn install" zu machen<br>

Die csv-Dateien mit Beispielinhalten befinden sich ebenfalls hier im Repository. (Datenbank.zip)<br>
<br>
Wenn alles geklappt hat und die Container am laufen sind können Sie auch in einen Browser gehen (am besten Chrome), einfach die Adresse<br>
http://localhost:8888/home eingeben und die Website sollte laufen.

