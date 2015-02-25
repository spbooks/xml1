<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="catalog">
	<h1>Product Listing</h1>
	<ol>
	<xsl:apply-templates select="product">
	<xsl:sort/>
	</xsl:apply-templates>
	</ol>
</xsl:template>

<xsl:template match="product">
	<xsl:choose>
	<xsl:when test="@sku &lt; 100000">
	<li>
	<i><xsl:value-of select="."/> (<xsl:value-of select="@sku"/>)</i>
	</li>
	</xsl:when>
	<xsl:when test="@sku > 100000">
	<li>
	<b><xsl:value-of select="."/> (<xsl:value-of select="@sku"/>)</b>
	</li>
	</xsl:when>
	</xsl:choose>
</xsl:template>

</xsl:stylesheet>
