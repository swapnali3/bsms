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
                            <img src="http://apar.ftspl.in/webroot/img/apar_logo.png" style="width: 180px; max-width: 400px; height: auto; display: block;">
                        </td>
                        <td valign="middle" class="hero bg_white" style="border-left: 1px solid rgb(19, 58, 88);"></td>
                        <td valign="middle" class="hero bg_white" style="padding: 0em 0px;">
                            <img src="http://apar.ftspl.in/webroot/img/logo_s.png" alt=""
                                style="width: 280px; max-width: 600px; height: auto; display: block;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p>Dear <?= $vendor_name ?>,</p>
            <p>I hope this message finds you well. We would like to inform you of a change in our delivery schedule for the upcoming month. Due to unforeseen circumstances, we need to adjust the delivery dates for the following line items in PO Number:
                <?= $poDetail->po_no ?>
            </p>
            <p>
            Line Item #<?= $po_item->item ?><br>
            <?= $po_item->material ?>   |   <?= $po_item->short_text ?>|   <?= $item_po->actual_qty ?>|   <?= $item_po->delivery_date ?>
            
            </p>
            <p>We understand that this modification may cause inconvenience, and we sincerely apologize for any disruptions this may cause to your operations. We appreciate your understanding and cooperation in accommodating this change.</p><p>If you have any concerns or require further clarification, please don't hesitate to reach out to us at [Your Contact Information]. We value our partnership and look forward to your continued support.</p><p>Thank you for your attention to this matter.</p>
            </p><p>
        </div>
        <div class="content">
            <img src="http://apar.ftspl.in/webroot/img/apar_logo.png" style="width: 100px; max-width: 400px; height: auto; display: block;">
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