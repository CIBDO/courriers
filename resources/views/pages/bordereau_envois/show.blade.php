<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordereau d'Envoi - Ministère</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header {
            margin-bottom: 20px;
        }
        .header p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
        .bordereau-info {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        .bordereau-info th,
        .bordereau-info td {
            border: 3px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .bordereau-info th {
            background-color: #696969;
        }
        .align-right {
            text-align: right;
        }
        .right-align {
  float: right; /* Aligner à droite */
  }
  .entete {
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  font-size: 18px;
  font-weight: bold; 
}
.entete1 {
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  font-size: 22px; 
}
.signature {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 20px; 
  font-weight: bold;
}
.signature1 {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 20px; 
  font-weight: bold;
}
.st {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 20px; 
  font-weight: bold;
}
  
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <p>MINISTERE DE L'ECONONOMIE <span class="right-align">REPUBLIQUE DU MALI</span></p>
            <p style="margin-left: 25px;">ET DES FINANCES <span class="right-align">Un Peuple Un But Une Foi</span></p>
               <p style="margin-left: 35px;">_=_=_=_=_=_=_=_</p>
            <p>DIRECTION NATIONALE DU TRESOR </p>
            <p>ET DE LA COMPTABILITE PUBLIQUE </p>
              <p style="margin-left: 35px;">_=_=_=_=_=_=_=_</p>
              <p>TRESORERIER REGIONAL DE SIKASSO</p>
              <br>
              <p style="margin-right: 50px;"><span class="right-align">Sikasso,le {{$bordereauEnvoi->date_bordereau}} </span></p>
              <br>
              <br>
              <br>
              
            <div class="align-right">
                <p class="entete">Le Trésorier Payeur Régional de Sikasso</p>
                <p class="entete1" style="margin-right: 180px;">A</p>
                <p>{{$bordereauEnvoi->destinateur}}</p>
                <br>
                <br>
            </div>
        </div>

        <h3>BORDEREAU D'ENVOI N° 2024_______/MEF/TPR-SIKASSO</h3>
        
        <table class="bordereau-info">
            <tr>
                <th style="text-align: left;">Désignation</th>
        <th style="text-align: center;">Nbre de Pièces</th>
        <th style="text-align: center; width: 120px; word-wrap: break-word;">Observations</th>

            </tr>
            <tr>
                <td >{{$bordereauEnvoi->designation}} </td>
                <td style="text-align: center;">{{$bordereauEnvoi->nbre_piece}} </td>
                <td>{{$bordereauEnvoi->disposition->nom_disposition}}</td>
            </tr>
            
            <tr>
                <td class="st" >Total</td>
                <td class="st" style="text-align: center;">{{$bordereauEnvoi->nbre_piece}}</td>
                <td></td>
                
            </tr>
        </table>

        <div class="footer">
            <p class="signature" style="margin-right: 100px;"><span class="right-align">Le Trésorier Payeur </span></p>
        <br>
        <br>
        <br>
        <br>
        <br>
         <p class="signature1" style="margin-right: 100px;"><span class="right-align"><u>{{$bordereauEnvoi->signataire->nom}}</u> </span></p>
        <p style="margin-right: 105px;"><span class="right-align"><i>Inspecteur de Trésor</i> </span></div>
        </p>  
        
    </div>
</body>
</html>
