<?php
require 'vendor/autoload.php'; // Composerでインストールされたライブラリを読み込む

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPとMongoDBの情報だよー</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #333;
        }
        p {
            color: #555;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            background: #eee;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .info {
            background: #d9edf7;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>PHPとMongoDBの情報です</h1>

    <div class="info">
        <h2>MongoDB接続情報を確認してね</h2>
        <p><strong>ホスト:</strong> mongo</p>
        <p><strong>ポート:</strong> 27017</p>
        <p><strong>接続URI:</strong> mongodb://mongo:27017</p>
    </div>

    <?php
    // MongoDBに接続
    try {
        $client = new MongoDB\Client("mongodb://mongo:27017");
        $dbs = $client->listDatabases();
        echo "<h2 class='success'>MongoDBに正常に接続できたよー！！</h2>";
        echo "<h3>利用可能なデータベース:</h3>";
        echo "<ul>";
        foreach ($dbs as $db) {
            echo "<li>" . $db->getName() . "</li>";
        }
        echo "</ul>";
    } catch (Exception $e) {
        echo "<h2 class='error'>残念だけど、MongoDBへの接続に失敗したよ・・・・・:</h2>";
        echo "<p>" . $e->getMessage() . "</p>";
    }

    // PHP情報の表示
    echo "<h2>PHP情報は以下を参照して</h2>";
    phpinfo();
    ?>
</div>
</body>
</html>
