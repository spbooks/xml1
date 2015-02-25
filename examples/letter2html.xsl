<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="/">
<xsl:apply-templates />
</xsl:template>
<xsl:template match="to">
<b>TO:</b> <xsl:apply-templates/><br/>
</xsl:template>
<xsl:template match="from">
<b>FROM:</b> <xsl:apply-templates/><br/>
</xsl:template>
<xsl:template match="message">
<b>MESSAGE:</b> <xsl:apply-templates/><br/>
</xsl:template>
</xsl:stylesheet>
