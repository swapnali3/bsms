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
                            <img src="http://apar.ftspl.in/webroot/img/apar_logo.png" alt=""
                                style="width: 180px; max-width: 400px; height: auto; display: block;">
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
            <p>Hi</p>
            <p>PO : <?= $poNumber ?> , Item: <?= $item ?> qty should be greater than <?= $total ?></p>
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