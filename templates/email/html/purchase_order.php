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

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #F7941D;
            color: #fff;
            text-decoration: none;
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
                        <td valign="middle" class="hero bg_white" style="border-left: 1px solid rgb(19, 58, 88);"></td>
                        <!-- <td valign="middle" class="hero bg_white" style="padding: 0em 0px;">
                            <img src="http://apar.ftspl.in/webroot/img/logo_s.png" alt=""
                                style="width: 280px; max-width: 600px; height: auto; display: block;">
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $vendor_name ?>,
            </p>

            <p>We are writing to confirm the creation of Purchase Order <?= $po_header->po_no ?> and to provide you with the delivery schedule for the associated products/services.</p>
            <p>
                <b>Purchase Order Details:</b><br>
                <ul>
                    <li>PO Number: <?= $po_header->po_no ?></li>
                    <li>PO Date: <?= $po_header->created_on->format('Y-m-d') ?></li>
                    <li>Vendor: <?= $vendor_name ?></li>
                    <li>Payment Terms: <?= $pay_term->description ?></li>
                    <li>Currency: <?= $po_header->currency ?></li>
                    <li>Total Amount: <?= $ttlamt ?></li>
                </ul>
            </p>
            <?php if (isset($po_footer)) : ?>
                <p>
                    <b>Product/Service Details:</b>
                    <?php foreach ($po_footer as $mat) : ?>
                        <ul>
                            <li>Material: <b><?= h($mat->MATNR) ?></b> <?= h($mat->TXZ01) ?></li>
                            <li>Quantity: <?= h($mat->MENGE) ?> <?= h($mat->MEINS) ?></li>
                            <li>Unit Price: <?= h($mat->PEINH) ?></li>
                            <li>Total Amount: <?= h($mat->NETPR) ?></li>
                        </ul>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>

            <p> Please review the details mentioned above carefully. If you have any questions or concerns regarding the
                Purchase Order, delivery schedule, or any other aspect of this transaction, please do not hesitate to
                contact us.</p>
            <p>
                1. Acknowledgment: Please acknowledge receipt of this email and confirm your acceptance of the Purchase
                Order and delivery schedule. If there are any discrepancies or issues, kindly let us know immediately.
                <br>
                2. Delivery Confirmation: As the delivery date approaches, we kindly request that you send us a
                confirmation once the products/services have been dispatched or delivered, including any tracking or
                waybill information if applicable. ASN is highly appreciated.
                <br>
                3. Invoice Submission: After delivery, please send the corresponding invoice to us. Ensure that the
                invoice references the Purchase Order number for prompt processing.
            </p>
            Best regards,
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png"
                style="width: 100px; max-width: 100px; height: auto; display: block;">
            <h3>APAR Industries Limited 18</h3>
            <h5>
                TTC.,MIDC Industrial Area, Thane Belapur Road,
                <br>Opp. Rabale Railway Station, Rabale, Navi Mumbai - 400701, India
                <br>+91 22 6111 0444 / 6123 7545
                <br>www.apar.com
            </h5>
        </div>
    </div>
</body>

</html>