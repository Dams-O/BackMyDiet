<!DOCTYPE html> 
<html class="loading" lang="fr" data-textdirection="ltr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Nom recette</title>
</head>
    <body>
        <div id="recette-img">
            <img src="data:image/jpg;base64, {{ base64_encode(file_get_contents(url("https://young.postfinance.ch/sites/default/files/styles/desktop_detail_hero_image_1024_x_410_/public/2017-05/PF_Hero_Fotzelschnitte2.jpg?itok=C3cT-qDS"))) }}">
        </div>
        <div id="titre_recette">
            <h1 id="nom-recette">Titre de la recette</h1>
            <img src="data:image/png;base64, {{ base64_encode(file_get_contents(base_path('public/img/addrecette/type/unselected/ble_jaune.png'))) }}">
            <img src="data:image/png;base64, {{ base64_encode(file_get_contents(base_path('public/img/addrecette/type/unselected/pain.png'))) }}">
        </div>
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
                        <p>
                            <B>#Pain</B>
                            <br/><B>#FaitMaison</B>
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
                    <div id="logo">
                        <img src="data:image/png;base64, {{ base64_encode(file_get_contents(base_path('public/img/logo-master.png'))) }}">
                    </div>
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
            padding-right: 40px;
            padding-bottom: 20px;
        }
        #cuisson-hashtags
        {

            display: -webkit-box;
            display: -webkit-flex;
        }
        hr
        {
            border-top: dotted 4px black;
        }
        #left_flex
        {
            padding: 20px;
            overflow: hidden;
            width: 42%;
            padding-left:0%;
        }
        #right_flex
        {
            padding: 20px;
            overflow: hidden;
            width: 50%;
            min-height: 100%;
            border-left: dotted 4px black;
        }
        #instructions ul
        {
            padding: 40px;
            list-style-type: decimal;
            font-size: 20px;
        }
        #instructions ul li
        {
            padding-bottom: 20px;
        }
        #flex_info
        {

            display: -webkit-box;
            display: -webkit-flex;
            min-height: 80%;

        }
        #hashtags
        {
            width: 33%;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            border-right: dotted 4px black;
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
            overflow: hidden;
            position: relative;
            left: 0%;
            top: 0%;
            width: 97%;
            height: 350px;
        }
        #recette-img img 
        {
            width: 100%;
            height: 350px;
        }
        #nom-recette
        {
            font-size: 40px;
            padding-top: 18px;
            font-weight: 500;
            padding-left: 20px;
            padding-bottom: 0px;
            text-align: left;
            width: 50%;
            margin-right: 22%;
        }
        #titre_recette
        {
            display: -webkit-box;
            display: -webkit-flex;
            padding:20px;
        }
        #titre_recette img
        {
            padding-top: 32px;
            width: 50px;
            height: 50px;
        }
        #ingredients
        {
            font-size: 18px;
            border-top: dotted 4px black;
        }
        #ingredients ul
        {
            list-style-type: none;
        }
        #ingredients ul li
        {
            padding-bottom: 10px
        }

        #logo
        {
            margin-top:30%;
            width: 200px;
            height: 150px;
        }
        #logo img 
        {
            width: 200px;
            height: 150px;
        }
        </style>
</body>
</html>
