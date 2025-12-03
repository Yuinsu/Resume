<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>주문 내역 | Galaxy Gadgets</title>
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
        <h2>📋 실시간 주문 현황</h2>
        <table>
            <thead>
                <tr>
                    <th>주문번호</th>
                    <th>주문자</th>
                    <th>상품명</th>
                    <th>수량</th>
                    <th>주문일시</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM orders ORDER BY id DESC");
                while ($row = $stmt->fetch()):
                ?>
                <tr>
                    <td>#<?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['customer_name']) ?></td>
                    <td style="color: var(--primary);"><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= $row['quantity'] ?>개</td>
                    <td><?= $row['order_date'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
