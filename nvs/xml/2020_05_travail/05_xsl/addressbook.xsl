<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
	xmlns:esi="https://esi-bru.be/WEBR4">
	<xsl:output method="html"/>
	<xsl:template match="text()"/>
	<xsl:template match="/">
		<html>
			<head>
				<meta charset="UTF-8"/>
				<title>Carnet d'adresses</title>
			</head>
			<body>
				<h1>Relations</h1>
				<xsl:apply-templates/>
			</body>
		</html>
	</xsl:template>
	<xsl:template match="esi:person">
		<!-- Nom, Mort, sex-->
		<h2>
			<xsl:variable name="id" select="@id"/>
			<xsl:value-of select="concat(substring($id,2,3),'.')"/>&#160;            																																													
			<xsl:value-of select="esi:identity//esi:firstname[1]"/>&#160;            																																													
			<xsl:value-of select="esi:identity/esi:lastname"/>&#160;                       																																													
			<xsl:variable name="death" select="esi:identity//esi:death"/>
			<xsl:if test="$death!='NULL'">
				<xsl:text>(✟)</xsl:text>
			</xsl:if>
			<xsl:text> [</xsl:text>
			<xsl:variable name="sex" select="esi:identity//esi:sex"/>
			<xsl:value-of select="substring($sex,1,1)"/>
			<xsl:text>]</xsl:text>
		</h2>
		<!---->
		<xsl:variable name="hasRelation" select="boolean(esi:relations//text())"/>
		<xsl:choose>
			<xsl:when test="$hasRelation='True'">
				<table style="border:1px solid black; margin: auto; border-collapse: collapse;">
					<!--Header Table-->
					<tr style="border:1px solid black; margin: auto;">
						<th style="font-weight: bold;font: 16px;border:1px solid black; margin: auto;">degré</th>
						<th style="font-weight: bold;font: 16px;border:1px solid black; margin: auto;">personne</th>
					</tr>
					<!---->
					<xsl:for-each select="esi:relations/esi:relation">
						<xsl:sort select="esi:level" order="descending"/>
						<xsl:sort select="//esi:person[@id=current()/esi:person_id]//esi:lastname" />
						<xsl:variable name="contactID" select="esi:person_id"/>
						<tr style="border:1px solid black; margin: auto;">
							<xsl:variable name="degre" select="esi:level"/>
							<xsl:choose >
								<xsl:when test="$degre = -1">
									<!--Si -1 mettre gris-->
									<td style="border:1px solid black; margin: auto;background:lightgrey;text-align:center;">
										<xsl:value-of select="$degre"/>
									</td>
									<!---->
									<!--First name, lastname,mort-->
									<td style="border:1px solid black; margin: auto;background:lightgrey">
										<xsl:value-of select="//esi:person[@id=$contactID]//esi:firstname"/>&#160;																																																																																
										<xsl:value-of select="//esi:person[@id=$contactID]//esi:lastname"/>&#160;																																																																																
										<xsl:variable name="death" select="//esi:person[@id=$contactID]//esi:identity//esi:death"/>
										<xsl:if test="$death!='NULL'">
											<xsl:text>(✟)</xsl:text>
										</xsl:if>
									</td>
									<!---->
								</xsl:when>
								<!--Meme qu'au dessus, sans le coté gris-->
								<xsl:otherwise>
									<td style="border:1px solid black; margin: auto;text-align:center;">
										<xsl:value-of select="$degre"/>
									</td>
									<td style="border:1px solid black; margin: auto;">
										<xsl:value-of select="//esi:person[@id=$contactID]//esi:firstname"/>&#160;																																																																						
										<xsl:value-of select="//esi:person[@id=$contactID]//esi:lastname"/>&#160;																																																																						
										<xsl:variable name="died" select="//esi:person[@id=$contactID]//esi:identity//esi:death"/>
										<xsl:if test="$died!='NULL'">
											<xsl:text>(✟)</xsl:text>
										</xsl:if>
									</td>
								</xsl:otherwise>
								<!---->
							</xsl:choose>
						</tr>
					</xsl:for-each>
				</table>
			</xsl:when>
			<xsl:otherwise>
				<h4>Pas de relation connue pour cette personne</h4>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>