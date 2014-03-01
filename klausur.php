<!DOCTYPE html>
<html>
    <head>
        <title>Ged&auml;chtnisprotokoll von Klausur zu Entwurf verteilter Systeme (WS13/14) - nepf</title>
        <style type="text/css">
            .code {
                font-family: monospace;
                color: green;
            }
            pre.code {
                border: 1px solid green;
                margin: 10px 40px 10px 40px;
                padding: 10px;
            }
            .terminal {
                color: #ffffff;
                background: #000000;
                font-family: monospace;
                padding: 5px;
                margin: 10px 40px 10px 40px;
            }
            #ship1 td, #ship2 td {
                height: 40px;
                width: 40px;
                text-align: center;
                vertical-align: middle;
            }
            #ship2 td {
                empty-cells: show;
                border: 1px solid #000000;
            }
            .example {
                border: 1px solid blue;
                margin: 10px 40px 10px 40px;
                padding: 10px;
            }
        </style>
    </head>
<body>
<h1>Ged&auml;chtnisprotokoll von Klausur zu Entwurf verteilter Systeme (WS13/14) - nepf</h1>
<small>Ged&auml;chtnisprotokoll vom 27.2.2014. &Uuml;berall durfte jQuery verwendet werden. Das HTML sollte nicht ver&auml;ndert
werden, wenn man ganz kleine Sachen &auml;ndern wollte, sollte man dies kenntlich machen. Die gegebenen
CSS haben keinerlei Bedeutung.</small>
<hr>

<h2>Aufgabe 1</h2>
<p>Gegeben ist folgende HTML Seite:</p>

<pre class="code">
<?php
$html = <<<EOL
<html>
    <head><title>Hourse Scores</title></head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><!-- welche Version hier genau war, weiss ich leider nicht mehr -->
    <script type="text/javascript" src="country_func.js"></script>
    <script type="text/javascript" src="winner_func.js"></script>
<body>
    <h1>Hourse Scores</h1>
    <hr>
    <table id="tab">
        <tr><th>Name</th><th>Country</th><th>rank</th></tr>
        <tr><td>Rosie</td><td>Belgium</td><td></td></tr>
        <tr><td>Tilly</td><td>Germany</td><td></td></tr>
        <tr><td>Poppy</td><td>Belgium</td><td></td></tr>
        <tr><td>Jack</td><td>Azerbaijan</td><td></td></tr>
        <tr><td>Charlie</td><td>Comoros</td><td></td></tr>
        <tr><td>Billy</td><td>France</td><td></td></tr>
        <tr><td>Ruby</td><td>France</td><td></td></tr>
        <tr><td>Bella</td><td>Argentina</td><td></td></tr>
    </table>
    <p><input type="button" onclick="country_func()" value="country" /></p>
    <p><input type="button" onclick="winner_func()" value="winner" /></p>
</body>
</html>
EOL;
echo htmlspecialchars($html);
?>
</pre>
<p>Mit folgendem Aussehen:</p>
<div class="example">
    <table id="tab" border="1">
        <tr>
            <th>Name</th> <th>Country</th> <th>rank</th>
        </tr>
        <tr>
            <td>Rosie</td> <td>Belgium</td> <td></td>
        </tr>
        <tr>
            <td>Tilly</td> <td>Germany</td> <td></td>
        </tr>
        <tr>
            <td>Poppy</td> <td>Belgium</td> <td></td>
        </tr>
        <tr>
            <td>Jack</td> <td>Azerbaijan</td> <td></td>
        </tr>
        <tr>
            <td>Charlie</td> <td>Comoros</td> <td></td>
        </tr>
        <tr>
            <td>Billy</td> <td>France</td> <td></td>
        </tr>
        <tr>
            <td>Ruby</td> <td>France</td> <td></td>
        </tr>
        <tr>
            <td>Bella</td> <td>Argentina</td> <td></td>
        </tr>
    </table>
    <p><input type="button" onclick="country_func()" value="country" /></p>
    <p><input type="button" onclick="winner_func()" value="winner" /></p>
</div>

<h3>Aufgabe 1a</h3>
<p>Wenn auf <button>country</button> geklickt wird, soll die Ausgabe folgenderma&szlig;en aussehen:</p>

<div class="example">
    <table id="tab" border="1">
        <tr>
            <th>Name</th> <th>Country</th> <th>rank</th>
        </tr>
        <tr>
            <td>Rosie</td> <td>Belgium</td> <td></td>
        </tr>
        <tr>
            <td>Tilly</td> <td>Germany</td> <td></td>
        </tr>
        <tr>
            <td>Poppy</td> <td>Belgium</td> <td></td>
        </tr>
        <tr>
            <td>Jack</td> <td>Belgium</td> <td></td>
        </tr>
        <tr>
            <td>Charlie</td> <td>Comoros</td> <td></td>
        </tr>
        <tr>
            <td>Billy</td> <td>France</td> <td></td>
        </tr>
        <tr>
            <td>Ruby</td> <td>France</td> <td></td>
        </tr>
        <tr>
            <td>Bella</td> <td>Argentina</td> <td></td>
        </tr>
    </table>
    <p><input type="button" onclick="country_func()" value="country" /></p>
    <p><input type="button" onclick="winner_func()" value="winner" /></p>
    <p>3 horse(s) from Belgium</p>
    <p>1 horse(s) from Germany</p>
    <p>1 horse(s) from Comoros</p>
    <p>2 horse(s) from France</p>
    <p>1 horse(s) from Argentina</p>
</div>
<p>Schreibe dazu die Funktion <span class="code">country_func</span> in der entsprechenden eingebundenen Datei.</p>

<h3>Aufgabe 1b</h3>
<p>
    Der Webservice http://horserank.ranks.de/cgi-bin/rank.py gibt auf Anfrage die Reihenfolge der Pferde zur&uuml;ck.
    Der folgende Telnet-Dialog soll die Funktionsweise verdeutlichen:
</p>
<pre class="terminal">
$ telnet horserank.ranks.de 80
Trying 176.221.42.46...
Connected to nepda.eu.
Escape character is '^]'.
GET /cgi-bin/rank.py HTTP/1.1
Host: horserank.ranks.de

HTTP/1.1 200 OK
Content-Type: text/plain; charset=utf-8

{"score": ['Bella', 'Billy', 'Ruby', ... ]}
</pre>
<p>Wenn auf <button>winner</button> geklickt wird, soll die Ausgabe folgenderma&szlig;en aussehen:</p>


<div class="example">
    <table id="tab" border="1">
        <tr>
            <th>Name</th> <th>Country</th> <th>rank</th>
        </tr>
        <tr>
            <td>Rosie</td> <td>Belgium</td> <td>7</td>
        </tr>
        <tr>
            <td>Tilly</td> <td>Germany</td> <td>8</td>
        </tr>
        <tr>
            <td>Poppy</td> <td>Belgium</td> <td>5</td>
        </tr>
        <tr>
            <td>Jack</td> <td>Belgium</td> <td>6</td>
        </tr>
        <tr>
            <td>Charlie</td> <td>Comoros</td> <td>4</td>
        </tr>
        <tr>
            <td>Billy</td> <td>France</td> <td>2</td>
        </tr>
        <tr>
            <td>Ruby</td> <td>France</td> <td>3</td>
        </tr>
        <tr>
            <td>Bella</td> <td>Argentina</td> <td>1</td>
        </tr>
    </table>
    <p><input type="button" onclick="country_func()" value="country" /></p>
    <p><input type="button" onclick="winner_func()" value="winner" /></p>
</div>
<p>Schreibe dazu die Funktion <span class="code">winner_func</span> in der entsprechenden eingebundenen Datei.</p>


<hr>
<h2>Aufgabe 2</h2>

<p>Angenommen ein Jemand sitzt in Chemnitz am Rechner und hat folgende Seite vor sich:</p>
<?php
$html = '<table id="ship1">' . PHP_EOL;

    for ($i = 0; $i < 5; $i++) {
        $html .= "    <tr>" . PHP_EOL;
        for ($c = 0; $c < 5; $c++) {
            $html .= '        <td><input type="button" value="X"/></td>' . PHP_EOL;
        }
        $html .= "</tr>" . PHP_EOL;
    }
$html .= '</table>';
?>
<div class="example">
<?php echo $html; ?>
</div>
<?php
$t = <<<EOL
<html>
    <head>
        <title>SQUARE SEND</title>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><!-- welche Version hier genau war, weiss ich leider nicht mehr -->
        <script type="text/javascript" src="init_sq_send.js"></script>
        <script type="text/javascript">
        $(document).ready(init_sq_send);
        </script>
    </head>
<body>
<h1>SQUARE SEND</h1>
%s
</body>
</html>
EOL;
?>
<p>Mit diesem HTML im Hintergrund:</p>
<pre class="code">
<?php echo htmlspecialchars(sprintf($t, $html)); ?>
</pre>

<p>Und ein anderer Jemand sitzt in Berlin und hat diese Seite vor sich:</p>
<?php
$html = '<table id="ship2">' . PHP_EOL . '    ';

for ($i = 0; $i < 5; $i++) {
    $html .= "<tr>" . PHP_EOL . '        ';
    for ($c = 0; $c < 5; $c++) {
        $html .= '<td></td>';
    }
    $html .= PHP_EOL . "    </tr>";
}
$html .= PHP_EOL . '</table>';
?>
<div class="example">
    <?php echo $html; ?>
</div>
<?php
$t = <<<EOL
<html>
    <head>
        <title>SQUARE RECV</title>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><!-- welche Version hier genau war, weiss ich leider nicht mehr -->
        <script type="text/javascript" src="init_sq_recv.js"></script>
        <script type="text/javascript">
        $(document).ready(init_sq_recv);
        </script>
    </head>
<body>
<h1>SQUARE RECV</h1>
%s
</body>
</html>
EOL;

?>
<p>Mit diesem HTML im Hintergrund:</p>
<pre class="code">
<?php echo htmlspecialchars(sprintf($t, $html)); ?>
</pre>

<p>
    Wenn der Jemand in Chemnitz auf ein <button>X</button> dr&uuml;ckt, soll der Hintergrund der Zelle bei dem Jemand
    in Berlin blau werden. Es darf immer <strong>nur eine Zelle blau</strong> sein.
</p>
<h3>Aufgabe 2a</h3>
<p>
    Schreiben Sie die Funktion <span class="code">init_sq_send</span> und <span class="code">init_sq_recv</span> in den
    jeweils eingebundenen Dateien. Es
    darf kein Reload-, Refresh-, Vor- oder Zur&uuml;ck-Funktionalit&auml;t des Browsers verwendet werden.
</p>
<h3>Aufgabe 2b</h3>
<p>
    Beschreiben (nicht implementieren) Sie weitere Softwarekomponenten, die Sie  ggf. zus&auml;tzlich ben&ouml;tigen.
</p>


<hr>
<h2>Aufgabe 3</h2>
<p>
    Sie haben eine Wetterapp geschrieben, die ihre Daten von <span class="code">http://example.org/w/weather.amx</span>
    bekommt. Alles gut. Einen Monat sp&auml;ter funktioniert Ihre App nicht mehr, Sie stellen fest, der Dienst ist nun unter
    <span class="code">http://example.net/weather.aspx</span> erreichbar. Sie beheben das Problem. Es wiederholt sich
    [...] Sie stellen fest, dass der Dienst st&auml;ndig seine Adresse &auml;ndert.
</p>
<h3>Aufgabe 3a</h3>
<p>
    Welche Architektur k&ouml;nnte Ihnen in diesem Fall weiter helfen? Ziel ist es, dass Sie nie wieder Ihre App anpassen
    m&uuml;ssen. Keine Konfigurationsdateien, Datenbankeintr&auml;ge o.&Auml;.
</p>

<h3>Aufgabe 3b</h3>
<p>
    Skizzieren Sie diese Architektur.
</p>

<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
    _paq.push(["setCookieDomain", "*.*"]);
    _paq.push(["trackPageView"]);
    _paq.push(["enableLinkTracking"]);

    (function() {
        var u=(("https:" == document.location.protocol) ? "https" : "http") + "://piwik.nepda.eu/";
        _paq.push(["setTrackerUrl", u+"piwik.php"]);
        _paq.push(["setSiteId", "43"]);
        var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
        g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
    })();
</script>
</body>
</html>