<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="html"/>


<xsl:template match="webcopy">
<a href='javascript:window.print()'>Print This Page</a><br/><br/>
<table border='1' cellspacing='0' cellpadding='3' width='600'>
<tr><td>
<xsl:apply-templates />
</td></tr>
</table>
</xsl:template>

<xsl:template match="headline">
<h1><xsl:apply-templates/></h1>
</xsl:template>

<xsl:template match="description">
<p><i><xsl:apply-templates/></i></p>
</xsl:template>

<xsl:template match="pubdate">
<p><b>First published <xsl:apply-templates/></b></p>
</xsl:template>

<xsl:template match="body">
<xsl:apply-templates/>
</xsl:template>

</xsl:stylesheet>
