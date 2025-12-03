<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>상품 목록 | Galaxy Gadgets</title>
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
        <h2>📦 신상품 입고</h2>
        <div class="product-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM products");
            while ($row = $stmt->fetch()):
            ?>
            <div class="card">
                <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="상품 이미지">
                <div class="card-body">
                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                    <p class="price">₩<?= number_format($row['price']) ?></p>
                    <p><?= htmlspecialchars($row['description']) ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>
