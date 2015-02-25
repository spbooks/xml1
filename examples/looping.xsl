<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="catalog">
	<h1>Product Listing</h1>
	<ol>
	<xsl:for-each select="product">
		<xsl:if test="@sku > 100000">
		<li><xsl:value-of select="."/></li>
		</xsl:if>
	</xsl:for-each>
	</ol>
</xsl:template>


</xsl:stylesheet>
