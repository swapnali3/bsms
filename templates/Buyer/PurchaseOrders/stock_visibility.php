<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/jquery/dist/jquery.js"></script>
<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>

<h3><?php echo $reportName?></h3>
<div id="reportContainer" style="width:100vw; height:85vh"></div>


<script>
    var models = window['powerbi-client'].models;
    const tokenType = '1';
    const permissions = models.Permissions.All;

    var embedConfiguration= {
        type: 'report',
        tokenType: tokenType == '0' ? models.TokenType.Aad : models.TokenType.Embed,
        id: '<?php echo $report?>',
        embedUrl: "<?php echo $embedUrl ?>",
        accessToken: "<?php echo $embedToken; ?>" ,
        datasetId : "<?php echo $datasetId; ?>" ,
        permissions: permissions,
        viewMode:models.ViewMode.View
    };

    console.log('Embed Config', embedConfiguration);

    var $reportContainer = $('#reportContainer');

    var report = powerbi.embed($reportContainer.get(0), embedConfiguration);
</script>