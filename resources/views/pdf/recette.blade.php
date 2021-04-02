<!DOCTYPE html> 
<html class="loading" lang="fr" data-textdirection="ltr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Nom recette</title>
</head>
    <body>
        <div id="recette-img">photo recette</div>
        <div id="titre_recette"><span id="nom-recette">Titre de la recette</span><img src="#">dessin blé<img src="#">dessin pain</div>
        <hr>


        <div id="flex_info">
            <div id="left_flex">
                <div id="cuisson-hashtags"> 
                    <div id="cuisson-preparation">
                        <p>Cuisson: <B>40min</B>
                            <br/>Préparation: <B>1h</B>
                        </p>
                    </div>

                    <div id="hashtags">
                        <p><B>#Pain</B> 
                            <br/> <B>#FaitMaison</B>
                            <br/><B>#Boulangerie</B>
                            <br/><B>#MieDePain</B>
                        </p>
                    </div>
                </div>
                <div id="ingredients">
                    <h1>Ingrédients:</h1>
                    <ul>
                        <li>500 g de farine type 55</li>
                        <li>1 sachet de levure </li>
                        <li>1.5 verre d’eau chaude</li>
                        <li>1 cuillère à café de sel</li>
                        <li>1 cuillère à soupe d’huile d’olive</li>
                    </ul>
                </div>
            </div>
            <div>
            </div>


            <div id="right_flex">
                <div id="instructions">
                    <ul>
                        <li>Mélangez la farine, l’huile 
                            d’olive, le sachet de levure, le 
                            sel et ajoutez l’eau. Malaxez 
                            jusqu’à l’obstention d’une 
                            pâte homogène. Le geste est 
                            important: faites comme si 
                            vous étiez en train de plier un 
                            mouchoir avec la pâte.
                        </li>
                        <li>Attention la pâte ne doit pas 
                            coller à la paroi! Rajoutez de la 
                            farine si elle colle, ou de l’eau si 
                            elle est trop .
                        </li>
                        <li>
                            Prenez un moule à cake et 
                            tapissez de papier cuisson, 
                            mettez le pain, faites les 
                            croisillons avec un couteau 
                            pointu.
                        </li>
                        <li>
                            Prenez un torchon propre, 
                            mouillez-le et mettez-le sur le 
                            pain.
                            Attendez une heure que la pâte 
                            soit levée.
                        </li>
                        <li>
                            Pendant ce temps-là, 
                            préchauffez le four à 
                            thermostat 7 ou à 220°C 
                            pendant 20 mn environ.
                        </li>
                        <li>
                            Enfournez pendant 40 mn.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    <style>
        /*Flexbox:
     
            != display:flex; 
            => display: -webkit-box; 
            et display: -webkit-flex;
        
        */

        body
        {
            font-family: 'Montserrat', sans-serif;  
            overflow-x: hidden;
            width:100%;
            height: 100%;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
        }
        #cuisson-hashtags
        {
            
            display: -webkit-box;
            display: -webkit-flex;
        }
        #left_flex
        {
            padding: 20px;
            overflow: hidden;
            width: 42%;
            padding-left:0%; 
        }
        #instructions ul
        {
            padding: 20px;
            list-style-type: decimal;
        }
        #flex_info
        {
           
            display: -webkit-box;
            display: -webkit-flex;
           
        }
        #hashtags
        {
            width: 33%;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            border-right: solid rgb(189, 189, 189) 1px; 
            display: -webkit-box;
            display: -webkit-flex;
            margin-bottom: 10px
        }
        #cuisson-preparation
        {
            width: 30%;
            padding: 30px;
            padding-left: 50px;
            padding-right: 50px;
            border-right: solid rgb(189, 189, 189) 1px; 
            display: -webkit-box;
            display: -webkit-flex;
            margin-bottom: 20px
        }
        #recette-img
        {
            position: relative;
            left: 0%;
            top: 0%;
            width: 97%;
            height: 350px;
            background-image: url('#'); /*On place l'image de la recette ici*/
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border: solid 1px black;
            text-align: center;
        }
        #nom-recette
        {
            font-size: 40px;
            padding-top: 18px;
            font-weight: 500;
            margin-right: 50%;
            padding-left: 20px;
            padding-bottom: 0px;
            text-align: left;
            width: 50%;
        }
        #titre_recette
        {
            padding:20px;
        }
        #ingredients
        {
            border-top: solid rgb(189, 189, 189) 1px; 
        }
        </style>
</body>
</html>
