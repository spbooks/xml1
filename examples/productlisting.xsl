<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="catalog">
	<h1>Reverse Alphabetical List of Products</h1>
	<xsl:apply-templates select="product">
	<xsl:sort order="descending"/>
	</xsl:apply-templates>
</xsl:template>

<xsl:template match="product">
	<p><xsl:apply-templates/></p>
</xsl:template>

</xsl:stylesheet>
