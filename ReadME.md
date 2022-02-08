1.) 
Zuerst:
-> Neuste Docker Downloaden
-> im Terminal in das Verzeichnis wechseln in dem das Projekt liegt
    [ Beispielsweise liegt das Projekt unter "/Dokumente/git/Webshop"
        1. Bei der Situation würde man im Terminal, sofer man im Home ist: "cd /Dokumente/git/Webshop" eingeben um in das Verzeichnis zu kommen
        2. Um sicherzustellen, dass man in dem Verzeichnis ist am besten "ls" in der Kommandozeile einzugeben, um angezeigt zu bekommen
           ob die Dateien auch in diesem Ordner sind. !!! Es ist erkennbar, sofern eine der Dateien "docker-compose.yml" heißt und auch die "composer.json" in dem                Verzeichnis ist.
    ]

2.) 
Der zweite Schritt ist die Virtuellen Container hockzufahren.
Das funktioniert mit: "docker-compose up"

!!! Sofern das nicht funktioniert 
/1. Schauen ob man im Terminal im richtigen Verzeichnis den Kommand eingegeben hat.  
/2. Ein yarn install im Verzeichnis im Terminal eingeben.
/3. Kontaktieren sie Mike: +49 176 70047943

3.) 
Sofern alles geklappt hat müsste es sichtbar sein das die Container laufen, da das benutzte Terminal Fenster als Log der Server dient.

Wenn alles geklappt hat und die Container am laufen sind können Sie aud einen Browser gehen am besten Chrome und hier öffnen Sie einfach die Adresse
http://localhost:8888/home ein.

##After in php container 
composer install 
