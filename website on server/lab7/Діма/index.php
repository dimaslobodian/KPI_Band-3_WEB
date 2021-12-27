<!DOCTYPE html>
<html>
    <head>
        <title>Lab 7</title>
        <meta name="description" content="Learning DB">
    </head>
    <body>
        <link href="styles.css" rel="stylesheet">
        <?php
            $serverName = "DESKTOP-035M40Q";
            $connectionOptions = array("Database"=>"COMPUTER_MACHINERY");
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            if($conn == false){
                echo "No connection to MsSQL Server";
            }
        ?>
        <div class="main">
            <div>
                <h2>Enter data to insert into table "Machinery Type"</h2>
                <form method="POST">
                    <p>Type: <input type="text" name="Type"/></p>
                    <input type="submit" value="Insert" class="btn">
                </form>
            </div>
            <div>
                <h2>Enter data to insert into table "Computer Machinery"</h2>
                <form method="POST">
                    <p>Name: <input type="text" name="Name" /></p>
                    <p>Type ID: <input type="number" name="TypeId" /></p>
                    <p>Producing Country: <input type="text" name="ProducingCountry" /></p>
                    <p>Guarantee Month: <input type="text" name="GuaranteeMonth" /></p>
                    <input type="submit" value="Insert" class="btn">
                </form>
            </div> 
        </div>

        <div style="text-align: center;"><div style="display: inline-block">
    
        <?php
        try
        {
            $Type = "";
            $Name = "";
            $TypeId = "";
            $ProducingCountry = "";
            $GuaranteeMonth = "";

            if(isset($_POST["Type"])){
            
                $Type = $_POST["Type"];
            }
            if(isset($_POST["Name"])){
            
                $Name = $_POST["Name"];
            }
            if(isset($_POST["TypeId"])){
            
                $TypeId = $_POST["TypeId"];
            }
            if(isset($_POST["ProducingCountry"])){
            
                $ProducingCountry = $_POST["ProducingCountry"];
            }
            if(isset($_POST["GuaranteeMonth"])){
            
                $GuaranteeMonth = $_POST["GuaranteeMonth"];
            }
            
            if(isset($_POST["Type"])){
                $tsql = "INSERT INTO cMachineryType(Type) OUTPUT"
                    . " INSERTED.ID VALUES ('$Type')";

                $insertReview = sqlsrv_query($conn, $tsql);
                if($insertReview == FALSE)
                    die(FormatErrors( sqlsrv_errors()));

                sqlsrv_free_stmt($insertReview);
            }

            if(isset($_POST["Name"])){
                $tsql = "INSERT INTO cComputerMachinery(Name, TypeId, Producing_Country, Guarantee_Month) OUTPUT"
                    . " INSERTED.ID VALUES ('$Name', '$TypeId', '$ProducingCountry', '$GuaranteeMonth')";

                $insertReview = sqlsrv_query($conn, $tsql);
                if($insertReview == FALSE)
                    die(FormatErrors( sqlsrv_errors()));

                sqlsrv_free_stmt($insertReview);
            }
        }
        catch(Throwable $e)
        {
            echo("Error!");
        }
        ?>
                
        </div></div>

        <div class="main">
            <div>
                <h2>Table "Machinery Type"</h2>
                <?php
                try
                {
                    $sql = "SELECT * FROM cMachineryType";
                    $result = sqlsrv_query($conn, $sql); 
                    
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                    {
                        echo 'Type: '.$row['Type'] . "<br><br>";
                    }
                }
                catch(Throwable $e)
                {
                    echo("Error!");
                }
                ?>
            </div>
            <div>
                <h2>Table "Computer Machinery"</h2>
                <?php
                try
                {
                    $sql = "SELECT * FROM cComputerMachinery";
                    $result = sqlsrv_query($conn, $sql); 
                    
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                    {
                        
                        echo 'Name: '.$row['Name'] . "<br>";
                        echo 'TypeId: '.$row['TypeId'] . "<br>";
                        echo 'Producing Country: '.$row['Producing_Country'] . "<br>";
                        echo 'GuaranteeMonth: '.$row['Guarantee_Month'] . "<br><br>";
                    }
                }
                catch(Throwable $e)
                {
                    echo("Error!");
                }
                ?>
            </div> 
        </div>
    </body>
</html>