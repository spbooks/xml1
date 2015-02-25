<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="catalog">
	<h1>Product Listing</h1>
	<p><i>Total products: <xsl:value-of select="count(product)"/> </i></p>
	<xsl:apply-templates select="product">
	<xsl:sort/>
	</xsl:apply-templates>
</xsl:template>

<xsl:template match="product">
	<p><xsl:value-of select="position()"/>. 
	<xsl:value-of select="."/> (<xsl:value-of select="@sku"/>)
	</p>
</xsl:template>

</xsl:stylesheet>
