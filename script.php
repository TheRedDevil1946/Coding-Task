<?php
$host = 'localhost';
$dbname = 'feed_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $xml = simplexml_load_file('feed.xml') or die('Error: Cannot create object');

    $stmt = $pdo->prepare("
        INSERT INTO items (
            entity_id, category_name, sku, name, description, shortdesc, price, link, image, brand, rating, caffeine_type, count, flavored, seasonal, instock, facebook, is_kcup
        ) VALUES (
            :entity_id, :category_name, :sku, :name, :description, :shortdesc, :price, :link, :image, :brand, :rating, :caffeine_type, :count, :flavored, :seasonal, :instock, :facebook, :is_kcup
        )
    ");

    foreach ($xml->item as $item) {
        $stmt->bindParam(':entity_id', $item->entity_id);
        $stmt->bindParam(':category_name', $item->CategoryName);
        $stmt->bindParam(':sku', $item->sku);
        $stmt->bindParam(':name', $item->name);
        $stmt->bindParam(':description', $item->description);
        $stmt->bindParam(':shortdesc', $item->shortdesc);
        $stmt->bindParam(':price', $item->price);
        $stmt->bindParam(':link', $item->link);
        $stmt->bindParam(':image', $item->image);
        $stmt->bindParam(':brand', $item->Brand);
        $stmt->bindParam(':rating', $item->Rating);
        $stmt->bindParam(':caffeine_type', $item->CaffeineType);
        $stmt->bindParam(':count', $item->Count);
        $stmt->bindParam(':flavored', $item->Flavored);
        $stmt->bindParam(':seasonal', $item->Seasonal);
        $stmt->bindParam(':instock', $item->Instock);
        $stmt->bindParam(':facebook', $item->Facebook);
        $stmt->bindParam(':is_kcup', $item->IsKCup);

        $stmt->execute();
    }

    echo "Data inserted successfully.";
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
