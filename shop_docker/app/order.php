<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>주문하기 | Galaxy Gadgets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">🌌 Galaxy Gadgets</a>
        <nav>
            <a href="products.php">상품목록</a>
            <a href="order.php">주문하기</a>
            <a href="my_orders.php">주문내역</a>
        </nav>
    </header>
    <main>
        <h2>⚡ 빠른 주문</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer = $_POST['customer'];
            $product = $_POST['product_name'];
            $qty = $_POST['quantity'];
            
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, product_name, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$customer, $product, $qty]);
            echo "<p style='color: #03dac6;'>✅ 주문이 완료되었습니다! <a href='my_orders.php' style='color:white;'>내역 확인하기</a></p>";
        }
        ?>
        <form method="post" style="max-width: 500px; margin: 0 auto; background: #1e1e1e; padding: 20px; border-radius: 10px;">
            <label>주문자명</label>
            <input type="text" name="customer" required placeholder="이름을 입력하세요">
            
            <label>상품 선택</label>
            <select name="product_name">
                <?php
                $stmt = $pdo->query("SELECT name, price FROM products");
                while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['name']}'>{$row['name']} (₩" . number_format($row['price']) . ")</option>";
                }
                ?>
            </select>
            
            <label>수량</label>
            <input type="number" name="quantity" value="1" min="1" max="10">
            
            <button type="submit" class="btn" style="width: 100%;">주문하기</button>
        </form>
    </main>
</body>
</html>
