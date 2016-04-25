/*  --------------------------------------------------------------------
    Fichier CSS
    Template pour le squad.xml d'ArmA 3 réalisé par KissDavid le 09.03.13 
------------------------------------------------------------------------ */

html {
    background-color: #CCCCCC;
    background-image: url('http://cp.am2.taw.net/assets/modules/squad/background_default_Arma3.jpg');
}

body {
    background-color: #COCOCO;
    margin: 30px auto;
    width: 760px;
    font-family: Arial;
}

#cadre {
    box-shadow: 0px 0px 15px green;
    background-color: black;
}
    
#menu {
    height: 270px;
    border: 1px solid black;
    color: white;
    background: #2b312e url('http://cp.am2.taw.net/assets/modules/squad/logo_arma3.png') no-repeat 98% 95%;
}

#logo {
    width: 256px;
    float: left;
    margin: 7px 10px;
}

#menu h1 {
    text-align:center;
    font-size: 32px;
    font-variant: small-caps;
    text-decoration: overline underline;
}

#menu em {
    color: #A6CC91;
    font-style: normal;
    font-variant: small-caps;
}

#footer {
    font-style: normal;
}

#copyright {
    text-align:center;
    color: grey;
    font-size: 10px;
}

.fiche {
    border: 1px solid black;
    border-top: none;
    border-spacing: 0px;
    color: black;
    font-size: 12px;
    width: 760px;
}

th {
    font-size: 13px;
    background-color: #B4AF91;
    font-variant: small-caps;
    border-bottom: 1px solid black;
}

tr.pair {
    background-color: #FCFAE1;
}

tr.impair{
    background-color: #EFECCA;
}

.nick, .id, .name, .email, .icq {
    width: 20%;
    text-align: center;
}

.nick {
    font-variant: small-caps;
}

.remark {
    font-size: 10px;
    text-align: left;
}

.id {
    color: #84815B;
}

a:link, a:visited, a:hover, a:active, a:focus {
    text-decoration: none; 
}

a:hover {
    color: #B4AF91;
}

a:link, a:visited {
    color: #787746 
}

strong {
    font-weight: bold;
}