<?xml version="1.0" ?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:esi="https://esi-bru.be/WEBR4">

    <xsl:output method="html" />

    <xsl:template match="text()" />

    <xsl:template match="/">
        <html>
            <head>
                <meta charset="UTF-8" />
                <title>Carnet d'adresses</title>

            </head>
            <body>
                <h1>Relations</h1>
                <xsl:apply-templates />
            </body>
        </html>
    </xsl:template>

    <xsl:template match="esi:person">
        <h2>
            <xsl:variable name="id" select="@id" />
            <xsl:value-of select="concat(substring($id,2,3),'.')" />
            <xsl:text></xsl:text>
            <xsl:value-of select="esi:identity/esi:lastname" />
            <xsl:text></xsl:text>
            <xsl:value-of select="esi:identity//esi:firstname[1]" />
            <xsl:text></xsl:text>
            <xsl:variable name="died" select="esi:identity//esi:death" />
            <xsl:if test="$died='NULL'">
                <xsl:text>✝</xsl:text>
            </xsl:if>
            <xsl:text> [</xsl:text>
            <xsl:variable name="sex" select="esi:identity//esi:sex" />
            <xsl:value-of select="substring($sex,1,1)" />
            <xsl:text>]</xsl:text>
        </h2>
        <table>
            <xsl:variable name="hasRelation" select="boolean(esi:relations//text())" />
            <xsl:choose>
                <xsl:when test="$hasRelation='True'">
                    <tr>
                        <th style="font-weight: bold;font: 16px;">degré</th>
                        <th style="font-weight: bold;font: 16px;">personne</th>
                    </tr>
                    <xsl:for-each select="esi:relations/esi:relation">
                        <tr>
                            <td>
                                <xsl:value-of select="esi:level" />
                            </td>
                            <td>
                                <xsl:value-of select="esi:person_id" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </xsl:when>
            </xsl:choose>

        </table>

    </xsl:template>

</xsl:stylesheet>