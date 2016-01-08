<?php
include "include/access.php";
check_access(TEACHER);
include "include/header.php";
include "include/chart.php";
?>
<!--Liniendiagramm
   -->
<div style="margin-left: 14px; width: 400px; height: 221px; background-color: white; margin-top: 40px; float: left; position: absolute;">
    <canvas id="chart" ></canvas>
</div>
<script type="text/javascript">
 var chart = new LineChart(classes, document.getElementById("chart"));
</script>

<!-- Selfmade-Challenge vorschlagen
     evtl noch insofern ändern, dass nicht eine Beschreibung gefordert ist, sondern jenes formuliert werden muss, was auch wir für eine Challenge ausarbeiten (kategorie, punktzahl, einbettung...... gefahr: zu hohe hürde, eine eigene challenge zu formulieren)
   -->
<div
    style="margin-left: 14px;
           margin-top: 300px;
           float: left;
           background-color:#1BAB3F;
           width: 400px;
           height: auto;">

    <span style="margin-left: 14px;">
        <b>Selfmade-Challenge vorschlagen</b></span><br>
        <div style="margin-left: 14px">
            <textarea cols="50" row="1">Challenge-Titel</textarea>
        </div>
        <br>
        <div style="color: white; margin-left: 14px">
            <textarea cols="50" row=8";>Challenge-Beschreibung</textarea>

            <span style="font-size: 13px; color: black"><br>
                <b>Hilfestellung:</b>
            </span>
            <span style="font-size: 13px; color: white">Die Challenge-Beschreibung sollte --lorem ipsum dolor sit atmet und so weiter etc pp (Beschreibung der notwendigen Inhalte und evtl der Länge einer Challenge-Beschreibung) beinhalten.
            </span><br>

            <span style="font-size: 13px; color: black"><br>
                <b>Hinweis:</b>
            </span>
            <span style="font-size: 13px; color: white">
                Die vorgeschlagene Challenge wird nicht sofort hinzugefügt, sondern erst zur Prüfung an eine beauftragte Person geschickt.
            </span><br>
            <input type="submit" value="Abschicken" style="background-color:  green; margin-left: 258px;">
        </div>
</div>

<div class=".abstand" style="background-color:#1BAB3F;
                             z-index: 1;
                             width: 223px;
                             height: 220px;
                             float: right;
                             margin-top: 40px;
                             margin-right: 40px;
                             margin-bottom: 50px;
                             margin-left: ;
                             text-align:center;
                             color: black;
                             font-size: 13px;
                             ">
    <section class="container">
            <!--Klasse wechseln, Logout
               -->
            <div style="background-color:#1BAB3F;
                        z-index: 1;
                        width:223px;
                        height: auto;
                        margin-top: 50px;
                        margin-right: 50px;
                        margin-bottom: 10px;
                        margin-left: auto;
                        text-align:center;
                        color: black;
                        font-size: 13px;
                        position: relative;
                        ">
                <b>Angemeldet als:</b><span style="color: white"> Klassenname</span><br>
                <span style="margin-bottom: 4px; margin-top: 9px; font-size:13px; color: black"><form method="POST">
                    <b>Klasse wechseln:</b>
                    <select name="klasse" size="1">
                        <option id="#">Die Sojapatronen</option>
                        <option id="#">Mc Do Not</option>
                    </select>
                </form></span>
                <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
                <!--"Klasse wechseln" nur anzeigen, wenn ein Lehrer für mehrere Klassen verantwortlich ist. In der Auswahlliste nur die Klassen anzeigen, die mit dem Konto des Lehrers verbunden sind -->
            </div>


            <!--Abgeschlossene Challenge eintragen
               -->
            <div style="background-color:#1BAB3F;
                        z-index: 1;
                        width:223px;
                        height: auto;
                        margin-top: 20px;
                        margin-right: 50px;
                        margin-bottom: 10px;
                        margin-left: auto;
                        text-align:center;
                        color: black;
                        font-size: 13px;
                        position: relative;
                        ">
                <b>Abgeschlossene Challenge</b><br>
                <span style="margin-bottom: 4px; margin-top: 9px; font-size:13px; color: black"><form method="POST">

                    <select name="abschluss" size="1">
                        <option id="#">Bio-Frühstück</option>
                        <option id="#">Mc Do Not</option>
                    </select>
                </form></span>
                <input type="submit" value="eintragen" style="background-color: green"><br><br>

                <input type="submit" value="Letzten Eintrag entfernen" style="background-color: #52150D; font-size: 11px;">

                <!--"Klasse wechseln" nur anzeigen, wenn ein Lehrer für mehrere Klassen verantwortlich ist. In der Auswahlliste nur die Klassen anzeigen, die mit dem Konto des Lehrers verbunden sind -->
            </div>

            <?php include "include/footer.php"?>
