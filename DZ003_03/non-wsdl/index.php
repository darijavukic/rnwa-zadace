<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />

<body>

    <div class="row">
        <div class="col-6 col-s-9">
            <form method="POST" action="">
                <label>Pretražite kurseve koje student pohadja</label><br>
                <input id="naziv" type="text" name="id" placeholder="Unesite ID studenta"><br><br>
                <hr>
                <button type="submit" id="filter">Pretraga</button>
                <br><br>
            </form>
            <table id="result">
                <thead>
                    <tr>
                        <th>Ime i Prezime</th>
                        <th>Ime kursa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_POST['id']) {
                        $id = $_POST['id'];
                        ini_set('soap.wsdl_cache_enabled',0);
                        ini_set('soap.wsdl_cache_ttl',0);
                        $client = new SoapClient(null, [
                            'location' => 'http://localhost/DZ003/non-wsdl/server.php',
                            'uri' => 'http://test-uri'
                        ]);
                        $return = $client->returnStudent($id);
                        echo $return;
                    }
                    // if ($id) {
                    //     $client = new SoapClient(null, array(
                    //         'location' => "http://localhost/server.php",
                    //         'trace' => true,
                    //         'keep_alive' => true,
                    //         'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
                    //         'uri'      => "http://test-uri"
                    //     ));
                    //     $return = $client->__soapCall("returnStudent", array($id));
                    //     echo $return;
                    // }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>