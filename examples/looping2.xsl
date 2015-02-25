<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="/">
	<script>
	skulist = new Array(
	<xsl:for-each select="catalog/product">
		<xsl:value-of select="@sku"/>
		<xsl:if test="position() != last()">, </xsl:if> 
	</xsl:for-each>
	);</script>
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="catalog">
	<h1>Product Listing</h1>
	<script>document.write(skulist[0])</script>
</xsl:template>
</xsl:stylesheet>
