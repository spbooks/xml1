<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />

<xsl:template match="/">
<xsl:apply-templates />
</xsl:template>

<xsl:template match="chapter">
<h1>Chapter <xsl:value-of select="@number"/></h1>
<xsl:apply-templates/>
</xsl:template>


<xsl:template match="chapter/title">
<h1><xsl:apply-templates/></h1>
</xsl:template>

<xsl:template match="chapter/section/title">
<h2><xsl:apply-templates/></h2>
</xsl:template>

<xsl:template match="chapter/section/section/title">
<h3><xsl:apply-templates/></h3>
</xsl:template>

<xsl:template match="chapter/section/section/section/title">
<h4><xsl:apply-templates/></h4>
</xsl:template>


<xsl:template match="para[@type='intro']">
<p><i><xsl:apply-templates/></i></p>
</xsl:template>

<xsl:template match="para[@type='normal']">
<p><xsl:apply-templates/></p>
</xsl:template>

<xsl:template match="para[@type='warning']">
<p style="background-color: #cccccc; border: thin solid;width:300px;color:#ff0000"><xsl:apply-templates/></p>
</xsl:template>

<xsl:template match="para[@type='note']">
<p style="background-color: #cccccc; border: thin solid; width:300px"><b><xsl:apply-templates/></b></p>
</xsl:template>


</xsl:stylesheet>
