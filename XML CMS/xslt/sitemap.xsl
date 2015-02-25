<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="sitemap">
<html>
<head>
<title>Site Map</title>
<link href="xmlcms.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Site Map</h1>

sort: <a href="sitemapper.php?sortby=type">type</a> | <a href="sitemapper.php?sortby=headline">headline</a> |
<a href="sitemapper.php?sortby=date">date</a><br/>
<ul>
<xsl:apply-templates>
  <xsl:sort select="*[name()=$SORT]" order="ascending"/>
</xsl:apply-templates>
</ul>
<br/><br/>
<small>sorting by: <u><xsl:value-of select="$SORT"/></u></small>
</body>
</html>
</xsl:template>

<xsl:template match="content">
<li><a href="innerpage.php?id={@id}"><xsl:value-of select="headline"/></a> (<xsl:value-of select="type"/>)</li>
</xsl:template>


</xsl:stylesheet>
