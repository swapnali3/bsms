<!DOCTYPE html>
<html>

<head>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .content {
            padding: 20px;
        }

        a {
            color: #F7941D;
        }

        p,
        ul li,
        ol li {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" alt=""
                                style="width: 180px; max-width: 180px; height: auto; display: block;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $buyer->first_name ?> <?= $buyer->last_name ?>,</p>
            <p>This email is to inform you that your PO(<?= $poNumber ?>) has been <b>Rejected<b> by <?= $vendor->name ?>.</p>
            <?php if (isset($po_footer)) : ?>
                <p>
                    <b>Order Item Details:</b>
                    <?php foreach ($po_footer as $mat) : ?>
                        <ul>
                            <li>Material: <b><?= h($mat->material) ?></b> <?= h($mat->short_text) ?></li>
                            <li>Quantity: <?= h($mat->po_qty) ?> <?= h($mat->order_unit) ?></li>
                            <li>Unit Price: <?= h($mat->net_price) ?></li>
                            <li>Total Amount: <?= h($mat->net_value) ?></li>
                        </ul>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
            <p>The reason for the Order rejection was ("<?= $remark ?>").Please connect the vendor accordingly.</p>
            <p>Thank you for your cooperation and If you have any questions or concerns, please feel free to reach out to us at <?= $spt_email ?></p>            
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" style="width: 100px; max-width: 100px; height: auto; display: block;">
            <h3>APAR Industries Limited</h3>
            <h5>
                18,TTC.,MIDC Industrial Area, Thane Belapur Road,
                <br>Opp. Rabale Railway Station, Rabale, Navi Mumbai - 400701, India
                <br>+91 22 6111 0444 / 6123 7545
                <br>www.apar.com
            </h5>
        </div>
    </div>
</body>

</html>