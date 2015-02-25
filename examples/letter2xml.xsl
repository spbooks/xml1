<xsl:stylesheet
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns="http://www.w3.org/TR/REC-html40"
version="1.0">
<xsl:output method="xml" indent="yes"/>

<xsl:template match="letter">
<letter>
<recipient><xsl:value-of select="to"/></recipient>
<sender><xsl:value-of select="from"/></sender>
<body><xsl:value-of select="message"/></body>
</letter>
</xsl:template>


</xsl:stylesheet>
