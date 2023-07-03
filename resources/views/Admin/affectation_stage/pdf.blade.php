<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>table</title>

    <style type="text/css">
        .P1 {
            font-size: 11pt;
            line-height: 115%;
            margin-bottom: 0.353cm;
            margin-top: 0cm;
            text-align: center ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
        }

        .P2 {
            font-size: 8pt;
            line-height: 150%;
            margin-bottom: 0.353cm;
            margin-top: 0cm;
            text-align: justify ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
        }

        .P3 {
            font-size: 11pt;
            line-height: 100%;
            margin-bottom: 0.353cm;
            margin-top: 0cm;
            text-align: center ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
        }

        .P4 {
            font-size: 11pt;
            line-height: 100%;
            margin-bottom: 0.353cm;
            margin-top: 0cm;
            text-align: center ! important;
            font-family: Times New Roman;
            writing-mode: horizontal-tb;
            direction: ltr;
            font-weight: bold;
        }

        .P5 {
            font-size: 14pt;
            line-height: 115%;
            margin-bottom: 0.353cm;
            margin-top: 0cm;
            text-align: center ! important;
            font-family: Times New Roman;
            writing-mode: horizontal-tb;
            direction: ltr;
            font-weight: bold;
        }

        .P6_borderStart {
            font-size: 11pt;
            line-height: 115%;
            margin-top: 0cm;
            text-align: left ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
            padding: 0cm;
            border-left-style: none;
            border-right-style: none;
            border-top-width: 0.018cm;
            border-top-style: solid;
            border-top-color: #000000;
            padding-bottom: 0.353cm;
            border-bottom-style: none;
        }

        .P6 {
            font-size: 11pt;
            line-height: 115%;
            text-align: left ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
            padding: 0cm;
            border-left-style: none;
            border-right-style: none;
            padding-bottom: 0.353cm;
            padding-top: 0cm;
            border-top-style: none;
            border-bottom-style: none;
        }

        .P6_borderEnd {
            font-size: 11pt;
            line-height: 115%;
            margin-bottom: 0.353cm;
            text-align: left ! important;
            font-family: Calibri;
            writing-mode: horizontal-tb;
            direction: ltr;
            padding: 0cm;
            border-left-style: none;
            border-right-style: none;
            border-bottom-style: none;
            padding-top: 0cm;
            border-top-style: none;
        }

        .P7 {
            font-size: 11pt;
            line-height: 115%;
            margin-bottom: 0cm;

            admin.demande_stage.pdf' margin-top:0cm; text-align:left ! important; font-family:Book Antiqua; writing-mode:horizontal-tb; direction:ltr; }
.T1 {
                font-family: Times New Roman;
                font-size: 12pt;
            }

            .T3 {
                font-family: Times New Roman;
                font-weight: bold;
            }

            .T4 {
                font-family: Times New Roman;
                font-size: 14pt;
                font-weight: bold;
            }

            .T5 {
                font-family: Times New Roman;
            }

            .T6 {
                font-family: Bodoni MT Black;
                font-size: 16pt;
                font-weight: bold;
            }

            .T7 {
                font-size: 14pt;
            }

            .Standard {
                font-size: 11pt;
                font-family: Calibri;
                writing-mode: horizontal-tb;
                direction: ltr;
                margin-top: 0cm;
                margin-bottom: 0.353cm;
                line-height: 115%;
                text-align: left ! important;
            }

    </style>
    <style>
        table {
            border: 1px solid black;
            padding: 5px;
            width: 50em
        }

        table {
            border-spacing: 15px;
        }
        table {
            border-collapse: collapse;
            margin-left: 25px;
            text-align: left;
            /* margin-right: auto; */
        }

    </style>
</head>

<body dir="ltr"
    style="max-width:21.001cm;margin-top:1.249cm; margin-bottom:0.3cm; margin-left:2.499cm; margin-right:2.499cm; ">
    <table style="width:100%; border-spacing:0px; padding:0px">
        <tr>
            <td style="width:30% ; border-right: solid 1px; text-align:center" rowspan="4"><img
                    src="{{ asset('images/a.png') }}" style="width:100%">
                </td>

            <td style="width:40% ; border-right: solid 1px; text-align:center;font-weight: bold;font-size: 18px"  rowspan="4"> AFFECTATION DE STAGE</td>
            <td style="width:30% ; text-align:center; border-bottom: solid 1px;">DC-ST-08
                </td>
        </tr>
        @foreach ($documents as $document)
        <tr>
            <td style=" text-align:center;border-bottom: solid 1px;">Date : 05/08/2022</td>

        </tr>
        <tr>
            <td style=" text-align:center;border-bottom: solid 1px;">Révision:00</td>
        </tr>
        <tr>
            <td style=" text-align:center;">Page : 1/1</td>
        </tr>
    </table>

    <br><br><br>
   <table style="width:100%; border-spacing:0px; padding:0px" border="1" >


    <tr>
        <th style="width:100%;">Année Universitaire :</th>
        <th style="width:100%;">  {{$firstYear}}-{{$secondYear}} </th>
    </tr>
    <tr>
        <th >Nature de Stage :</th>
        <th>
            @switch( $document->year )
            @case(1)
            Stage initiation à la vie professionnelle
            @break

            @case(2)
            Perfectionnement
            @break

            @case(3)
            Stage PFE
            @break

            @default
                0
        @endswitch
        </th>
    </tr>


   </table>
   <table style="width:100%; border-spacing:0px; padding:0px">


<tr>
<td>

    <p class="P6"><span class="P2">Sfax le :{{$date}}</span></p>

            <p  class="P2" >
L’élève ingénieur  {{ $document->nom }} {{ $document->prenom }} est inscrit en
                      @switch( $document->year )
                @case(1)
                    1ére année
                @break

                @case(2)
                    2éme Année
                @break

                @case(3)
                    3éme Année
                @break

                @default
                    0
            @endswitch
              année {{ $document->speciality }}

<br><br><br>


                Dans le cadre de la formation, l’élève {{ $document->nom }} {{ $document->prenom }} est appelé
                <span style="font-weight: bold;" >obligatoirement</span> et
                <span style="font-weight: bold;" >pratiquement</span>    à
                <br><br>
                effectuer un stage Initiation à la vie professionnelle au sein de la société : …………
                <br><br>
                <span style="font-weight: bold;" >
                    Lieu de Stage :
                </span>
…………….
<br><br>
<span style="font-weight: bold;" >
    de la Période de Stage : Du ……… au ……….
</span>

<br><br>
Nous vous signalons, que durant la période de stage, l’étudiant(e) est couvert(e) par l’assurance
<br><br>
 ZITOUNA TAKAFUL (Multirisque professionnelle) sous le N°40040100007810.
<br><br><br><br><br>
</p>

    @endforeach
<hr>
<p class="P3"><span style="font-weight: bold">Le Directeur</span></p>
<p class="P3"><span style="font-weight: bold;font-size: 20px">Dr. ISSAM KSENTINI </span></p>
<br><br><br><br>
<hr>

<p>
    <p class="P1">
        Décharge d’acceptation de l’organisme d’accueil :
    </p>

<p class="Standard">
    Date :…………………………
</p>

<p class="P1">
    Signature
</p>
<br><br>
</p>

</td>
</tr>
</table>
</body>

</html>
