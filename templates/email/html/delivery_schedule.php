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
                            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" style="width: 180px; max-width: 180px; height: auto; display: block;">
                        </td>
                        <!-- <td valign="middle" class="hero bg_white" style="border-left: 1px solid rgb(19, 58, 88);"></td>
                        <td valign="middle" class="hero bg_white" style="padding: 0em 0px;">
                            <img src="http://apar.ftspl.in/webroot/img/logo_s.png" alt=""
                                style="width: 280px; max-width: 600px; height: auto; display: block;">
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $vendor_name ?>,</p>
            <p>We have created/modified purchase order number <?= $po ?>. Your timely confirmation and adherence to the
                delivery schedule are essential to meet our project milestones and commitments.</p>
            <p>We have added line items in purchase order number <?= $po ?>.</p>
            <p>
                Line Item #<?= $po_item->item ?><br>
                <?= $po_item->material ?>   |   <?= $po_item->short_text ?> | Qty <?= $schedule->actual_qty ?> | DEL Date <?= $schedule->delivery_date->format('d-m-Y') ?>
            </p>
            <p>Please review this purchase order & schedule carefully. If any adjustments are necessary due to
                unforeseen circumstances, please inform us as soon as possible so that we can make appropriate
                accommodations.</p>
            <p>Additionally, if you have any specific requirements or concerns related to this delivery schedule, please
                feel free to share them with us, and we will do our best to address them.</p>
            <p>Thank you for your cooperation and commitment to delivering a successful project/product. We look forward
                to a productive partnership.</p>
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo180.png" style="width: 100px; max-width: 100px; height: auto; display: block;">
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