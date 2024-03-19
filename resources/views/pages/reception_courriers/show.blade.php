
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Fiche de Circulation de courrier "Arrivée" </title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
            line-height: 1.2; 
        }
        p.section-heading {
            line-height: 1.2; /* Ajuster l'interligne pour les h5 */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }
        

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
        
        
    </style>
</head>
<body>

    
                    <pre><b>Ministère de l'Economie et des Finances      République du Mali</b></pre>
                    <pre><b>Trésorerie Régionale de Sikasso           Un Peuple - Un But - Une Foi</b></pre>     
                    <H2><center>FICHE DE CIRCULATION DE COURRIER "ARRIVEE"</center></H2> 
    <table class="order-details">
        <thead>  
            <tr class="bg-blue">
                <th width="25%" colspan="1">Référence</th>
                <th width="25%" colspan="1">Date d'arrivée</th>
                <th width="50%" colspan="1">Origine</th>           
            </tr>
        </thead>
        <tr>
            <td>{{ $receptionCourrier->reference }}</td>
            <td>{{ $receptionCourrier->date_arrivee }}</td>
            <td>{{ $receptionCourrier->expeditaire }}</td>
        </tr>
    </table>
    <table class="order-details">
        <thead> 
            <tr class="bg-blue">
                <th width="25%" colspan="1">Nature Courrier</th>
                <th width="25%" colspan="1">Date Courrier</th>
                <th width="25%" colspan="1">Priorité</th>
                <th width="25%" colspan="1">Destinataire</th>
            </tr>
        </thead>        
        <tr>
            <td> {{ $receptionCourrier->courrier->type_courrier }}</td>
            <td>{{ $receptionCourrier->date_courrier }}</td>
            <td>{{ $receptionCourrier->priorite }}</td>
            <td>{{ $receptionCourrier->service->nom_service }}</td>
        </tr>
    </table>
    <table class="order-details">
    <p class="section-heading"><center>OBJET</center></p>
        <thead>
            <tr>            
                    <td><b>{{ $receptionCourrier->objet_courrier }}</b></td>
            </tr>
    </table>
    
    <table border="1">
    <p class="section-heading"><center>IMPUTATION</center></p>
    <tr>
        <td></td>
        <td>Trésorier Payeur</td>
        <td></td>
        <td>1° Fondé</td>
        <td></td>
        <td>2° Fondé</td>
        <td></td>
        <td>Div. Dépenses Visas</td>
    </tr>
    <tr>
        <td></td>
        <td>Div. Collectivités</td>
        <td></td>
        <td>Div. Comptabilité</td>
        <td></td>
        <td>Div. Recettes</td>
        <td></td>
        <td>Div. Centralisation</td>
    </tr>
    <tr>
        <td></td>
        <td>Secrétariat</td>
        <td></td>
        <td>Comptabilité Matières</td>
        <td></td>
        <td>Toutes les Divisions</td>
        <td></td>
        <td>Archive</td>
    </tr>
</table>
<table border="1">
<p class="section-heading"><center>ANNOTATION</center></p>
    <tr>
        <td></td>
        <td>Pour disposition à prendre</td>
        <td></td>
        <td>Pour attribution</td>
        <td></td>
        <td>M'en parler</td>
        <td></td>
        <td>Pour élément de réponse</td>
    </tr>
    <tr>
        <td></td>
        <td>Remis à l'intéressé</td>
        <td></td>
        <td>Pour diffusion</td>
        <td></td>
        <td>A saisir</td>
        <td></td>
        <td>Pour supervision</td>
    </tr>
    <tr>
        <td></td>
        <td>Pour représentation </td>
        <td></td>
        <td>Urgent</td>
        <td></td>
        <td>A classer</td>
        <td></td>
        <td>En instance</td>
    </tr>
    <tr>
        <td></td>
        <td>Pour information</td>
        <td></td>
        <td>M'accompagner</td>
        <td></td>
        <td>Pour  lecture</td>
        <td></td>
        <td>Pour Exploitation</td>
    </tr>
</table>
<p></p>
 <pre>                                                     Sikasso, le {{ date('d-m-Y') }}</pre>
 <pre>                                                    <b><u>Le Trésorerie Payeur</u></b></pre>
 <p><center>DIVISION</center></p>                  
    <pre><b>Agent Traitant                                        <u>Le Chef de Division</u></b></pre>
                    
                    
  
</body>
</html>
