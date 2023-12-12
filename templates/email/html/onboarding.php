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

            <p>We are thrilled to extend our warmest welcome to you as an official vendor partner of M/S. Apar
                Industries Limited, Rabale plant (if vendor extended to 1010 plant) / M/S. Apar Industries Limited
                Bhiwandi MegaWarehouse (if vendor extended to 1600 plant)!</p>

            <p>Your successful onboarding marks the beginning of what we believe will be a fruitful and mutually
                beneficial collaboration.</p>

            <p>It's evident that your commitment to quality and excellence aligns perfectly with our values, and we are
                excited to have you on board.</p>

            <p>We believe that together, we can achieve great success, and we're excited about the opportunities this
                partnership will bring. Our team is looking forward to working closely with you, leveraging your
                expertise, and delivering exceptional products/services to our clients and here's to a bright and
                prosperous future together!</p>

            <p>Login Credentials:
                <h3>Username : <?= $username ?></h3>
                <h3>Password : <?= $password ?></h3>
                <a href="<?= $link ?>" class="btn btn-primary" style="padding: 10px 15px; display: inline-block; border-radius: 5px; background: #F7941D; color: #000;"> Sign In </a>
            </p>
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