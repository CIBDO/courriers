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
            font-family: Arial, sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: Arial, sans-serif;
            line-height: 1; 
        }
        p.section-heading {
            line-height: 1; /* Ajuster l'interligne pour les h5 */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 20px;
            text-align: left;
            font-size: 14px;
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
            font-size: 16px;
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
        .right-align {
            float: right; /* Aligner à droite */
        }
        .left-align {
            float: left; /* Aligner à gauche */
        }
        .header {
            margin-bottom: 20px;
        }
        .header p {
            margin: 5px 0;
        }
        .entete1 {
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  font-size: 22px; 
}
.signature {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 18px; 
  font-weight: bold;
}
.signature1 {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 20px; 
  font-weight: bold;
}
footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center; /* Centrage du texte */
        font-size: 12px;
        padding: 10px 0; /* Ajout de padding pour éviter que le texte touche les bords */
        border-top: 4px solid #000; /* Ligne horizontale épaisse */
        background: #fff; /* Fond blanc pour assurer la visibilité du texte et de la ligne */
    }
    .footer-content {
        width: 100%; /* Utilisation de toute la largeur disponible */
        display: block; /* Assure que le contenu est traité comme un bloc */
    }
  
  </style>
</head>
<body>  

<div class="header">
    <p>DIRECTION NATIONALE DU TRESOR <span class="right-align">REPUBLIQUE DU MALI</span></p>
    <p>ET DE LA COMPTABILITE PUBLIQUE <span class="right-align">Un Peuple - Un But - Une Foi</span> </p>
    <p style="margin-left: 45px;">_=_=_=_=_=_=_=_</p>
    <p >TRESORERIER REGIONAL DE SIKASSO</p>
</div>
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
                <th width="25%" colspan="1">N° Bordereau</th>
                <th width="25%" colspan="1">Priorité</th>
                <th width="25%" colspan="1">Destinataire</th>
            </tr>
        </thead>        
        <tr>
            <td> {{ $receptionCourrier->courrier->type_courrier }}</td>
            <td>{{ $receptionCourrier->bordereau }}</td>
            <td>{{ $receptionCourrier->priorite }}</td>
            <td>{{ $receptionCourrier->service->nom_service }}</td>
        </tr>
    </table>
    <table class="order-details">
    <div class="section-heading"><center>OBJET</center></div>
        <thead>
            <tr>            
                <td><b>{{ $receptionCourrier->objet_courrier }}</b></td>
            </tr>
    </table>
    <div class="section-heading"><center>IMPUTATION</center></div>
    <table border="1">
    <tr>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Trésorier Payeur</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>1° Fondé</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>2° Fondé</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Div. Dépenses Visas</td>
    </tr>
    <tr>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Div. Collectivités</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Div. Comptabilité</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Div. Recettes</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Div. Centralisation</td>
    </tr>
    <tr>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Secrétariat</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Comptabilité Matières</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Toutes les Divisions</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Archive</td>
    </tr>
</table>
<div class="section-heading"><center>ANNOTATION</center></div>
<table border="1">
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
        <td style="padding: 10px;">&nbsp;</td>
        <td>information</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>M'accompagner</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Pour lecture</td>
        <td style="padding: 10px;">&nbsp;</td>
        <td>Exploitation</td>
    </tr>
</table>
 <p style="margin-right: 50px;"><span class="right-align">Bamako, le {{ date('d-m-Y') }}</span></p>
 <br style=" margin-bottom: -10px;">
 <p class="signature">
    <span class="right-align">
        <u>{{ $receptionCourrier->signataire ? $receptionCourrier->signataire->fonction : 'Fonction non disponible' }}</u>
    </span>
</p><br>
 <p><center><u><b>DIVISION</b></u></center></p><br>                
    <p class="signature">Agent Traitant <span class="right-align"><u>Le Chef de Division</u></span></p>               
 </div> 
 <footer>
    <div class="footer-content">
      <p>Adresse : {Votre Adresse}</p>
    </div>
</footer>
</body>
</html>
