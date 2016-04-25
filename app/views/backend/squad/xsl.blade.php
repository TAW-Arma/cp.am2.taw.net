<?xml version="1.0" encoding="ISO-8859-1"?>
<!-- Transformation XSLT-->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    
    <!-- Modèles Implicites source: http://www.grappa.univ-lille3.fr/~jousse/enseignement/XML_XSLT/xslt.html -->
    <xsl:template match="text()"><xsl:value-of select="."/></xsl:template>
    <xsl:template match="*"><xsl:apply-templates/></xsl:template>
    <xsl:template match="/">
    
<!--    Fichier XSL
        Template pour le squad.xml d'ArmA2 réalisé par KissDavid le 11.07.09
-->

    <!-- HTML -->
    <html>
    <head>
        <title><xsl:value-of select="/squad/@nick"/></title>
        <link rel="stylesheet" type="text/css" href="squad.css" title="CSS du squad.xsl" />
    </head>
    
    <body>
        <div id="cadre">
        <!-- Menu -->
        <div id="menu">
            <img id="logo" src="{{ $squad->nickname }}.png" alt="Logo TAW"/>
            <h1><xsl:value-of select="/squad/name"/></h1>
            <p><em>Tag : </em>[<xsl:value-of select="/squad/@nick"/>]</p>
            <p><em>Email : </em><xsl:value-of select="/squad/email"/></p>
            <p><em>Web Site : </em><a><xsl:attribute name="href"><xsl:value-of select="/squad/web"/></xsl:attribute><xsl:value-of select="/squad/web"/></a></p>
            <p><em>Title : </em><xsl:value-of select="/squad/title"/></p>
        </div>
        
        <!-- Liste des membres -->
        <div id="liste">
        <table class="fiche">
            <tr>
                <th>Members</th>
                <th>Player ID</th>
                <th>Names</th>
                <th>E-Mail</th>
                <th>ICQ</th>
            </tr>
            <xsl:for-each select="/squad/member">
            <tr>
                <!-- Alternance des couleurs (Nombre pair/ impair)-->
                <xsl:attribute name="class">
                    <xsl:choose>
                        <xsl:when test="position() mod 2 = 0">impair</xsl:when>
                        <xsl:otherwise>pair</xsl:otherwise>
                    </xsl:choose>
                </xsl:attribute>
                <td class="nick" rowspan="2"><xsl:value-of select="@nick"/></td>
                <td class="id"><xsl:value-of select="@id"/></td>
                <td class="name"><xsl:value-of select="name"/></td>
                <td class="email">
                    <a>
                        <xsl:attribute name="href">mailto:<xsl:value-of select="email"/></xsl:attribute>
                        <xsl:value-of select="email"/>
                    </a>
                </td>
                <td class="icq"><xsl:value-of select="icq"/></td>
            </tr>

            <tr>
                <!-- Alternance des couleurs (Nombre pair/ impair)-->
                <xsl:attribute name="class">
                    <xsl:choose>
                        <xsl:when test="position() mod 2 = 0">impair</xsl:when>
                        <xsl:otherwise>pair</xsl:otherwise>
                    </xsl:choose>
                </xsl:attribute>
                <td class="remark" colspan="4"><strong>Remark : </strong><xsl:value-of select="remark"/></td>
            </tr>
            </xsl:for-each>
        </table>
        </div>
    
        <!-- Liste des membres -->
        <div id="footer">
        <p id="copyright">  © The logo ArmA 3 and Wallpaper are the property of Bohemia Interactive (http://www.bistudio.com/) - Available in the website ARMA 3<br/>
                            Template for the "squad.xml" of ArmA 3 - Realized by KissDavid - 2013<br/>
                            Buy the Game here: <a href="http://store.bistudio.com" target="_blank" title="Store.bistudio.com">STORE.BISTUDIO.COM</a>
        </p>
        </div>
        
    </div>
    </body>
    </html>
    <!-- Fin HTML -->
    
    </xsl:template>

</xsl:stylesheet>
